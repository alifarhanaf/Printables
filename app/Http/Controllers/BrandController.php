<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Images;
use App\Models\BrandImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    //Brand Form
    public function index()
    {
        return view ('admin.brandform');
    }
    //Brand Grid
    public function brandgrid()
    {
        $brands = Brands::all();
        $data = array(
            "brands"=> $brands,
        );
        return view ('admin.brandsgrid')->with($data);
    }
    //Submit Brand Method
    public function submitBrand(BrandRequest $request){
        DB::beginTransaction();
        try {
            
        $brand = new Brands();
        $brand->name = request('name');
        $brand->enabled = request('enable');
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
        $brand->images()->sync($imageid);
        DB::commit();
        return redirect()->route('brand.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('brand.form')->with('message',$ex->getMessage());
        }
       
    }
    //Edit Brand Form
    public function editbrand($id)
    {
        $brand = Brands::where('id',$id)->first();
        $data = array(
            "brand"=> $brand,
        );
        return view ('admin.brandform')->with($data);
    }
    //Submit Edited Brand
    public function editBrandSubmit(Request $request,$id)
    {
        DB::beginTransaction();
        try {
            $brand = Brands::find($id);
            $brand->name = request('name');
            $brand->description = request('description');
            $brand->enabled = request('status');
            $brand->save();
            if ($request->hasFile('image')) {
                $imageName = time().'.'.$request->image->extension();   
                $path = base_path() . '/public/storage/brandImages/';
                $pathsave =  '/storage/brandImages/';
                $request->image->move($path, $imageName);
                $imageurl = $pathsave.$imageName;
                $image = new Images();
                $image->url =$imageurl;
                $image->save();
                $imageid = $image->id;
                $brand->images()->sync($imageid);
        }
        DB::commit();
        return redirect()->route('brand.edit',$brand->id)->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('brand.edit',$brand->id)->with('message',$ex->getMessage());
        }
    }

    //Deleting Brand Method
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
        $brand = Brands::find($id);
        if($brand->images){
            $ids = idsgenerator($brand->images);
            $brand->images()->detach($ids);
            Images::destroy($ids);
        }
        Brands::destroy($id);
        DB::commit();
        return redirect()->route('brand.grid')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('brand.grid')->with('message',$ex->getMessage());
        }
    }
}
