<?php

namespace App\Http\Controllers;

use App\Brands;
use App\Groups;
use App\Images;
use App\Products;
use App\BrandsProducts;
use App\GroupsProducts;
use App\ImagesProducts;
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
        // dd($brands);
        $data = array(
            "products"=> $products,
            // "groups"=> $groups,
        );
        return view ('admin.productgrid')->with($data);
    }

    public function index(){
        $brands = Brands::all();
        $groups = Groups::all();
        // dd($brands);
        $data = array(
            "brands"=> $brands,
            "groups"=> $groups,
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

        $product = Products::where('id',1)->get();
        // dd($product->images);
        $groups = Groups::all();
        $brands = Brands::all();
        // dd($brands);
        $data = array(
            "product"=> $product,
            "brands"=> $brands,
            "groups"=> $groups,
        );
        return view ('admin.editproductform')->with($data);
    }
    public function editProductSubmit(Request $request,$id){
        // dd($id);
        dd($request);

        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/productImages/';
        $request->image->move($path, $imageName);
        $imageurl = $path.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        // $product = new Products();
        $product = Products::find($id);
        $product->name = request('name');
        $product->sizes = request('sizes');
        $product->price = request('price');
        $product->description = request('description');
        $product->save();
        $imageid = $image->id;
        $productid = $product->id;
        // $productimage = ProductImages::find()
        $productimage = new ProductImages();
        $productimage->products_id = $productid;
        $productimage->images_id = $imageid;
        $productimage->save();
        $brandproducts = new brandProducts();
        $brandproducts->brand_id = request('brand_id');
        $brandproducts->product_id = $productid;
        $brandproducts->save();
        $groupproducts = new groupProducts();
        $groupproducts->group_id = request('group_id');
        $groupproducts->product_id = $productid;
        $groupproducts->save();


    }


    public function submitProduct(Request $request){
        // dd($request);
        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/productImages/';
        $request->image->move($path, $imageName);
        $imageurl = $path.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $product = new Products();
        $product->name = request('name');
        $product->sizes = request('sizes');
        $product->price = request('price');
        $product->description = request('description');
        $product->save();
        $imageid = $image->id;
        $productid = $product->id;
        $productimage = new ImagesProducts();
        $productimage->products_id = $productid;
        $productimage->images_id = $imageid;
        $productimage->save();
        $brandproducts = new BrandsProducts();
        $brandproducts->brands_id = request('brand_id');
        $brandproducts->products_id = $productid;
        $brandproducts->save();
        $groupproducts = new GroupsProducts();
        $groupproducts->groups_id = request('group_id');
        $groupproducts->products_id = $productid;
        $groupproducts->save();
        return redirect()->route('product.form');
        

    }
    public function destroy($id)
    {
        Products::destroy($id);
    }
}
