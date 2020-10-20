<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Images;
use App\BrandImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    public function index(){
        return view ('admin.brandform');
    }

    public function brandgrid(){
        $brands = Brands::all();
        // $groups = Groups::all();
        // dd($brands);
        $data = array(
            "brands"=> $brands,
            // "groups"=> $groups,
        );
        return view ('admin.brandsgrid')->with($data);
    }


    public function submitBrand(BrandRequest $request){
        // dd($request);
        DB::beginTransaction();
        try {
            
        $brand = new Brands();
        $brand->name = request('name');
        $brand->description = request('description');
        $brand->save();

        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/brandImages/';
        $pathsave =  '/storage/brandImages/';
        $request->image->move($path, $imageName);
        $imageurl = $pathsave.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        
        $imageid = $image->id;
        $brandid = $brand->id;
        $brandimage = new BrandImages();
        $brandimage->brand_id = $brandid;
        $brandimage->image_id = $imageid;
        $brandimage->save();
        DB::commit();
        return redirect()->route('brand.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('brand.form')->with('message',$ex->getMessage());
        }

       
    }

    public function editbrand($id){
        

        $brands = Brands::where('id',$id)->get();
        $data = array(
            "brands"=> $brands,
        );
        return view ('admin.editbrandform')->with($data);
    }

    public function destroy($id)
    {
        Brands::destroy($id);
    }
}
