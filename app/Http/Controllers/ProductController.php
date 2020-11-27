<?php

namespace App\Http\Controllers;
use Cookie;
use App\Models\Brands;
use App\Models\Colors;
use App\Models\Groups;
use App\Models\Images;
use App\Models\Products;
use App\Models\Variants;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\BrandsProducts;
use App\Models\GroupsProducts;
use App\Models\ImagesProducts;
use App\Models\PrintLocations;
use App\Models\CategoriesProducts;
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
        $colors =  Colors::all();
        $categories = Categories::all();
        $printLocations = PrintLocations::all();
        // dd($brands);
        $data = array(
            "brands"=> $brands,
            "groups"=> $groups,
            "categories"=> $categories,
            "printLocations"=> $printLocations,
            "colors"=>$colors,

        );
        return view ('admin.productform')->with($data);
    }
    public function addVariants($id){
        $colors = Colors::all();
        $product = Products::where('id',$id)->first();
        $data = array(
            "product" => $product,
            "colors" => $colors,
        );
        return view ('admin.productVariantsForm')->with($data);

    }
    public function submitProductVariants(Request $request, $id){
        // dd($request->all());
        
        // dd($a);
        

        DB::beginTransaction();
        try {
            $colors = Colors::all();
            $a = array_filter($request->names);
            $cc = count($colors);
            for($i=0;$i<$cc;$i++){
            if(array_key_exists($i,$a)){
               $variant = new Variants();
               $variant->name = $a[$i];
               $variant->save();
               if(array_key_exists($i,$request->colors)){
                   $variant->colors()->sync($colors[$i]);
               }
               if(array_key_exists($i,$request->images)){
                $imageName = time().$i.'.'.$request->images[$i]->extension();  
                $path = base_path() . '/public/storage/variantImages/';
                $pathsave =  '/storage/variantImages/';
                $request->images[$i]->move($path, $imageName);
                $imageurl = $pathsave.$imageName;
                $image = new Images();
                $image->url =$imageurl;
                $image->save();
                $imageid = $image->id;
                $variant->images()->sync($imageid);
                $product = Products::find($id);
                $product->variants()->attach($variant->id);
            }
            }

        };
        DB::commit();
        return redirect()->route('product.grid')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('product.variants',$id)->with('message',$ex->getMessage());
        }
       
        

    }
    //Product Edit Form
    public function editproduct($id){
        $product = Products::where('id',$id)->get();
        $groups = Groups::all();
        $brands = Brands::all();
        $categories = Categories::all();
        $printLocations = PrintLocations::all();
        $data = array(
            "product"=> $product,
            "brands"=> $brands,
            "groups"=> $groups,
            "categories"=>$categories,
            "printLocations" => $printLocations,
        );
        return view ('admin.productform')->with($data);
    }
    //Product Update Method
    public function editProductSubmit(Request $request,$id){
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
        $product->groups()->sync(request('groups_id'));
        $product->categories()->sync(request('categories_id'));
        $product->print_locations()->sync(request('printLocation_ids'));
        $product_id = $product->id;
        DB::commit();
        return redirect()->route('product.edit',$product_id)->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('product.edit',$product_id)->with('message',$ex->getMessage());
        }
        
        
    }
    //Product Submit Method
    public function submitProduct(ProductRequest $request){
        // dd($request);
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
        // $product->colors()->attach($request->colors);
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
        $product->groups()->attach(request('groups_id'));
        $product->categories()->attach(request('categories_id'));
        $product->print_locations()->attach(request('printLocation_ids'));
        DB::commit();
        return redirect()->route('product.variants',$product->id);
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('product.form')->with('message',$ex->getMessage());
        }
    }
    //Product Delete Method
    public function destroy($id)
    {
        
        DB::beginTransaction();
        try {
        $product = Products::find($id);
        if($product->images){
        $ids = idsgenerator($product->categories);
        Images::destroy($ids);
        $product->images()->detach($ids);
        }
        if($product->categories){
            $ids = idsgenerator($product->categories);
            $product->categories()->detach($ids);
        }
        if($product->brands){
            $ids = idsgenerator($product->brands);
            $product->brands()->detach($ids);
        }
        if($product->groups){
            $ids = idsgenerator($product->groups);
            $product->groups()->detach($ids);
        }
        if($product->print_locations){
            $ids = idsgenerator($product->print_locations);
            $product->print_locations()->detach($ids);
        }
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
    // public function productByID($id){
    //     $products = Products::where('id',$id)->get();
    //     $images = $design[0]->images;
  
    //     $data = array(
    //         "design"=> $design,
    //         "designImages"=>$images,
    //     );
    //     return $data;
    // }
    

   
  
     

    
}
