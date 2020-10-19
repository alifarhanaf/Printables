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
use App\Http\Requests\ProductRequest;




class ProductController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function productgrid(){
        $products = Products::all();
        // $groups = Groups::all();
        // dd($products);
        $data = array(
            "products"=> $products,
            // "groups"=> $groups,
        );
        return view ('admin.productgrid')->with($data);
    }

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
      /**
     * To save the item For Later .
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editproduct($id){
        // // dd($id);
        // $products = Products::find(1)->images;
        // $productss = Products::all();
        // dd($productss[0]->groups);
        // // foreach($products[0]->images() as $images){
        // //     dd($images[0]);
        // // };
        // foreach($products as $product){
        //     // if($product->images()->count() > 0) {
        //     //     foreach($product->images() as $image) {
        //     //         dd($image);
        //     //     }
        //     // }
        //     dd($product[1]);
            
        // }

        $product = Products::where('id',$id)->get();
        // dd($product[0]->images);
        $groups = Groups::all();
        $brands = Brands::all();
        $categories = Categories::all();
        // dd($brands);
        $data = array(
            "product"=> $product,
            "brands"=> $brands,
            "groups"=> $groups,
            "categories"=>$categories,
        );
        return view ('admin.productform')->with($data);
    }
    public function editProductSubmit(Request $request,$id){
        // dd($id);
        dd($request);
        $sizes - [];
        foreach($request->sizes as $sizes){
            array_push($sizes,$sizes);

        };
        dd($sizes);

        // $imageName = time().'.'.$request->image->extension();  
        // $path = base_path() . '/public/storage/productImages/';
        // $pathsave =  '/storage/productImages/';
        
        // $request->image->move($path, $imageName);
        // $imageurl = $pathsave.$imageName;
        // $image = new Images();
        // $image->url =$imageurl;
        // $image->save();
        // $product = new Products();
        $product = Products::find($id);
        // dd($product->brands[0]->id);
        $product->name = request('name');
        $product->sizes = request('sizes');
        $product->price = request('price');
        $product->enabled = request('enable');
        $product->description = request('description');
        $product->save();
        // dd($product->id);
        // $imageid = $image->id;
        $productid = $product->id;
        // $productimage = ProductImages::find()
        // $productimage = new ProductImages();
        // $productimage->products_id = $productid;
        // $productimage->images_id = $imageid;
        // $productimage->save();
        $brandproducts = BrandsProducts::find($product->brands[0]->id);
        // dd($brandproducts);

        $brandproducts->brands_id = request('brand_id');
        $brandproducts->products_id = $productid;
        $brandproducts->save();

        $groupproducts = GroupsProducts::find($product->groups[0]->id);
        $groupproducts->groups_id = request('group_id');
        $groupproducts->products_id = $productid;
        $groupproducts->save();


    }


    public function submitProduct(Request $request){
        // dd($request);
        // $sizes1=[];
        // for($i=0;$i++;$i<sizeof($request->sizes)){
        //     $sizes1[i]== $request->sizes[i];

        // };
        // foreach($request->sizes as $sizes){
        //     array_push($sizes1,$sizes);

        // };
        $str = implode(', ', $request->sizes);
        // dd($str);
        $product = new Products();
        $product->name = request('name');
        $product->sizes = $str;
        $product->price = request('price');
        $product->description = request('description');
        $product->enabled = request('enable');
        $product->save();
        $productid = $product->id;
        $i=0;
        foreach($request->images as $file){
        // $imageName = time().'.'.$file->extension();
        $imageName = time().$i.'.'.$file->extension();  
        $path = base_path() . '/public/storage/productImages/';
        $pathsave =  '/storage/productImages/';
        $file->move($path, $imageName);
        $imageurl = $pathsave.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $imageid = $image->id;
        $productimage = new ImagesProducts();
        $productimage->products_id = $productid;
        $productimage->images_id = $imageid;
        $productimage->save();
        $i++;

        };
        $brandproducts = new BrandsProducts();
        $brandproducts->brands_id = request('brand_id');
        $brandproducts->products_id = $productid;
        $brandproducts->save();
        $groupproducts = new GroupsProducts();
        $groupproducts->groups_id = request('group_id');
        $groupproducts->products_id = $productid;
        $groupproducts->save();
        $categoryproducts = new CategoriesProducts();
        $categoryproducts->categories_id = request('categories_id');
        $categoryproducts->products_id = $productid;
        $categoryproducts->save();
        return redirect()->route('product.form');
    }
    public function destroy($id)
    {
        Products::destroy($id);
    }

    public function productdetail($id)
    {
        $product = Products::find($id);
        
    }
}
