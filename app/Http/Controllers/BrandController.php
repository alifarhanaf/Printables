<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Images;
use App\BrandImages;
use Illuminate\Http\Request;

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


    public function submitBrand(Request $request){
        dd($request);

        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/brandImages/';
        $request->image->move($path, $imageName);
        $imageurl = $path.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $brand = new Brands();
        $brand->name = request('name');
        $brand->description = request('description');
        $brand->save();
        $imageid = $image->id;
        $brandid = $brand->id;
        $brandimage = new BrandImages();
        $brandimage->brand_id = $brandid;
        $brandimage->image_id = $imageid;
        $brandimage->save();

       
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
