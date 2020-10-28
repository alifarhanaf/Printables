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
    public function index(){
        return view ('admin.categoryform');
    }

    public function submitCategory(CategoryRequest $request){

        DB::beginTransaction();
        try {
            $category = new Categories();
            $category->name = request('name');
            $category->description = request('description');
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
        $categoryid = $category->id;
        $categoryimage = new CategoriesImages();
        $categoryimage->images_id = $imageid;
        $categoryimage->categories_id = $categoryid;
        $categoryimage->save();
        DB::commit();
        return redirect()->route('category.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('category.form')->with('message',$ex->getMessage());
        }

       
    }

    public function categorygrid(){
        $categories = Categories::all();
        // dd($categories[0]->images);
        // $groups = Groups::all();
        // dd($brands);
        $data = array(
            "categories"=> $categories,
            // "groups"=> $groups,
        );
        return view ('admin.categorygrid')->with($data);
    }
    public function destroy($id)
    {
        Categories::destroy($id);
    }

}
