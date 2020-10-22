<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Groups;
use App\Images;
use App\Products;
use App\Categories;
use App\BrandsProducts;
use App\GroupsProducts;
use App\ImagesProducts;
use App\CategoriesProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;




class ProductController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    // For Products Grid
    public function productgrid(){
        $products = Products::all();
        $data = array(
            "products"=> $products,
        );
        return view ('admin.productgrid')->with($data);
    }
    // Product Add Form
    public function index(){
        $brands = Brands::all();
        $groups = Groups::all();
        $categories = Categories::all();
        // dd($brands);
        $data = array(
            "brands"=> $brands,
            "groups"=> $groups,
            "categories"=> $categories,
        );
        return view ('admin.productform')->with($data);
    }
    //Product Edit Form
    public function editproduct($id){
        $product = Products::where('id',$id)->get();
        $groups = Groups::all();
        $brands = Brands::all();
        $categories = Categories::all();
        $data = array(
            "product"=> $product,
            "brands"=> $brands,
            "groups"=> $groups,
            "categories"=>$categories,
        );
        return view ('admin.productform')->with($data);
    }
    //Product Update Method
    public function editProductSubmit(Request $request,$id){
        // dd($request);
        // dd($id);
        $i=0;
        $imgids = [];
        $str = implode(', ', $request->sizes);
        DB::beginTransaction();
        try {
        $product = Products::find($id);        
        $product->name = request('name');
        $product->sizes = $str;
        $product->price = request('price');
        $product->enabled = request('enable');
        $product->description = request('description');
        $product->save();
        if ($request->hasFile('images')) {
            foreach($request->images as $file){
                $imageName = time().$i.'.'.$file->extension();  
                $path = base_path() . '/public/storage/productImages/';
                $pathsave =  '/storage/productImages/';
                $file->move($path, $imageName);
                $imageurl = $pathsave.$imageName;
                $image = new Images();
                $image->url =$imageurl;
                $image->save();
                $imageid = $image->id;
                array_push($imgids,$imageid);
                $i++;
                };
        }
        $product->images()->attach($imgids);
        $product->brands()->sync(request('brand_id'));
        $product->groups()->sync(request('group_id'));
        $product->categories()->sync(request('categories_id'));
        $product_id = $product->id;
        // dd($product_id);
        DB::commit();
        return redirect()->route('product.edit',$product_id)->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('product.edit',$product_id)->with('message',$ex->getMessage());
        }
        
        
    }
    //Product Submit Method
    public function submitProduct(ProductRequest $request){
        $i=0;
        $str = implode(', ', $request->sizes);
        DB::beginTransaction();
        try {
        $product = new Products();
        $product->name = request('name');
        $product->sizes = $str;
        $product->price = request('price');
        $product->description = request('description');
        $product->enabled = request('enable');
        $product->save();
        $productid = $product->id;
        foreach($request->images as $file){
        $imageName = time().$i.'.'.$file->extension();  
        $path = base_path() . '/public/storage/productImages/';
        $pathsave =  '/storage/productImages/';
        $file->move($path, $imageName);
        $imageurl = $pathsave.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $imageid = $image->id;
        $product->images()->attach($imageid);
        $i++;
        };
        $product->brands()->sync(request('brand_id'));
        $product->groups()->sync(request('group_id'));
        $product->categories()->sync(request('categories_id'));
        DB::commit();
        return redirect()->route('product.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('product.form')->with('message',$ex->getMessage());
        }
    }
    //Product Delete Method
    public function destroy($id)
    {
        $imageids = [];
        DB::beginTransaction();
        try {
        $product = Products::find($id);
        if($product->images){
        foreach($product->images as $images){
            array_push($imageids,$images['id']);
        };
        Images::destroy($imageids);
        $product->images()->detach($imageids);
        }
        $brandid =$product->brands[0]->id;
        $groupid =$product->groups[0]->id;
        $categoryid =$product->categories[0]->id;
        $product->groups()->detach($groupid);
        $product->categories()->detach($categoryid);
        $product->brands()->detach($brandid);
        Products::destroy($id);
        DB::commit();
        return redirect()->route('product.grid')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('product.grid')->with('message',$ex->getMessage());
        }
    }
    //Delete Images From Product Method
    public function destroyimage($id)
    {
        DB::beginTransaction();
        try {
        $image = Images::find($id);
        $product_id = $image->products[0]->id;
        $image->products()->detach($product_id);
        Images::destroy($id);
        DB::commit();
        return redirect()->route('product.edit',$product_id)->with('message','Image Deleted Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('product.edit',$product_id)->with('message',$ex->getMessage());
        }
    }

    
}
