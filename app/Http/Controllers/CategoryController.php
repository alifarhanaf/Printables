<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Categories;
use App\Models\CategoriesImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    //Category Form
    public function index(){
        return view ('admin.categoryform');
        
    }

    // Category Edit Form
    public function editCategory($id){
        $category = Categories::where('id',$id)->first();
        $data = array(
            "category"=> $category,
        );
        return view ('admin.categoryform')->with($data);
    }
    //Submit Category
    public function submitCategory(CategoryRequest $request){

        DB::beginTransaction();
        try {
            $category = new Categories();
            $category->name = request('name');
            $category->description = request('description');
            $category->enabled = request('status');
            $category->save();
        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/categoryImages/';
        $pathsave =  '/storage/categoryImages/';
        $request->image->move($path, $imageName);
        $imageurl = $pathsave.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $imageid = $image->id;
        $category->images()->sync($imageid);
        DB::commit();
        return redirect()->route('category.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('category.form')->with('message',$ex->getMessage());
        }
    }
    //Submit Edited Category
    public function submitEditedCategory(Request $request,$id){
     
        DB::beginTransaction();
        try {
            $category = Categories::find($id);
            $category->name = request('name');
            $category->description = request('description');
            $category->enabled = request('status');
            $category->save();
            if ($request->hasFile('image')) {
                $imageName = time().'.'.$request->image->extension();   
                $path = base_path() . '/public/storage/categoryImages/';
                $pathsave =  '/storage/categoryImages/';
                $request->image->move($path, $imageName);
                $imageurl = $pathsave.$imageName;
                $image = new Images();
                $image->url =$imageurl;
                $image->save();
                $imageid = $image->id;
                $category->images()->sync($imageid);
        }
        DB::commit();
        return redirect()->route('category.edit',$category->id)->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('category.edit',$category->id)->with('message',$ex->getMessage());
        }
    }


    //Category Grid
    public function categorygrid()
    {
        $categories = Categories::all();
        $data = array(
            "categories"=> $categories,
        );
        return view ('admin.categorygrid')->with($data);
    }

    //Deleting Category
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
        $category = Categories::find($id);
        if($category->images){
            $ids = idsgenerator($category->images);
            $category->images()->detach($ids);
            Images::destroy($ids);
        }
        Categories::destroy($id);
        DB::commit();
        return redirect()->route('category.grid')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('category.grid')->with('message',$ex->getMessage());
        }
    }

}
