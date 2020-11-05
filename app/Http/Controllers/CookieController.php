<?php

namespace App\Http\Controllers;
use File;
use Cookie;
use Storage;
use App\Models\Brands;
use App\Models\Colors;
use App\Models\Images;
use App\Models\Designs;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductCookieRequest;
use App\Http\Requests\PrintTypeCookieRequest;
use App\Http\Requests\DesignDetailCookieRequest;

class CookieController extends Controller
{
    public function setProductCookie(ProductCookieRequest $request){
        DB::beginTransaction();
        try {
        Cookie::queue('productID', $request->productID, 60);
        Cookie::queue('color', $request->color, 60);
        DB::commit();
        return redirect()->route('designDetailScreen');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('productScreen')->with('message',$ex->getMessage());
        }
        
     }
     public function setDesignDetailCookie(DesignDetailCookieRequest $request){
        //  dd($request);
         $i=0;
         DB::beginTransaction();
        try {
        $str = implode(',', $request->printLocations);
        Cookie::queue('campaignName', $request->CampaignName, 60);
        Cookie::queue('FrontSuggestion', $request->FrontSuggestion, 60);
        Cookie::queue('FrontColors', $request->FrontColors, 60);
        Cookie::queue('BackSuggestion', $request->BackSuggestion, 60);
        Cookie::queue('BackColors', $request->BackColors, 60);
        Cookie::queue('PocketSuggestion', $request->PocketSuggestion, 60);
        Cookie::queue('PocketColors', $request->PocketColors, 60);
        Cookie::queue('SleevesSuggestion', $request->SleevesSuggestion, 60);
        Cookie::queue('SleevesColors', $request->SleevesColors, 60);
        Cookie::queue('PrintLocations', $str, 60);
        if ($request->hasFile('myfile')) {
            //
        
        foreach($request->myfile as $file){
            $imageName = time().$i.'.'.$file->extension();  
            $garbagepath = public_path().'/storage/garbage';
            $garbagepath1 = "'storage'garbage";
            $file->move($garbagepath, $imageName);
            $pathsave =  '/storage/CampaignImages/';
            $imageurl = $pathsave.$imageName;
            $oldpath=str_replace("'",'',public_path().addslashes($garbagepath1).addslashes("'".$imageName));
            $newpath = public_path() . '/storage/CampaignImages/';
            Cookie::queue('imageName'.$i, $imageName, 60);
            $i++;
            };
        }
            DB::commit();
            return redirect()->route('printTypeScreen');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('designDetailScreen')->with('message',$ex->getMessage());
        }
            
        
        // dd($request);
        // return redirect()->route('printTypeScreen');
     }
     public function setPrintTypeCookie(PrintTypeCookieRequest $request){
        //  dd($request);
        DB::beginTransaction();
        try {
        $strFaqIds = implode(',', $request->faqIds);
        $strAnswerIds = implode(',', $request->answers);
        Cookie::queue('FaqIds', $strFaqIds, 60);
        Cookie::queue('AnswerIds', $strAnswerIds, 60);
        Cookie::queue('printType', $request->print_type, 60);
        Cookie::queue('shippingOption',  $request->shippingOption, 60);
        Cookie::queue('bagAndTag',  $request->bagAndTag, 60);
        DB::commit();
        return redirect()->route('deliveryAddressScreen');
    } catch (\Exception $ex) {
        DB::rollback();
        return redirect()->route('printTypeScreen')->with('message',$ex->getMessage());
    }
        // return redirect()->route('deliveryAddressScreen');

    }
    public function setAddressCookie(Request $request){
        Cookie::queue('savePreference', $request->savePreference, 60);
        Cookie::queue('addressName', $request->addressName, 60);
        Cookie::queue('firstName', $request->firstName, 60);
        Cookie::queue('lastName',  $request->lastName, 60);
        Cookie::queue('addressLine1',  $request->addressLine1, 60);
        Cookie::queue('addressLine2', $request->addressLine2, 60);
        Cookie::queue('city', $request->city, 60);
        Cookie::queue('state', $request->state, 60);
        Cookie::queue('zipCode',  $request->zipCode, 60);
        Cookie::queue('deliveryDate',  $request->deliveryDate, 60);
        return redirect()->route('cartScreen');
    }
    public function setCookie(Request $request){
        Cookie::queue('designID', $request->designID, 60);
        return redirect()->route('productScreen');
    }
    public function productsByBrandID(Request $request , $id){
       
        $brand = Brands::where('id',$id)->get();
        $products = $brand[0]->products;
        $colors = Colors::all();
        $designID = $request->cookie('designID');
        $design = Designs::where('id',$designID)->get();
        
        $data = array(
            "products"=>$products,
            "colors"=>$colors,
            "design"=>$design
        );
        return view('web.helpers.productFilter')->with($data)->render();
        
  
    }
    
    public function productsByCategoryID(Request $request , $id){
       
        $category = Categories::where('id',$id)->get();
        // dd($category[0]->products);
        $products = $category[0]->products;
        // dd($products);
        $colors = Colors::all();
        $designID = $request->cookie('designID');
        $design = Designs::where('id',$designID)->get();
        
        $data = array(
            "products"=>$products,
            "colors"=>$colors,
            "design"=>$design
        );
        return view('web.helpers.productFilter')->with($data)->render();
        
  
    }
    
    public function productsByBrandAndCategoryID(Request $request,$bid,$cid ){
       
        $products = DB::table('products')
        ->join('brands_products', 'products.id', '=', 'brands_products.products_id')
        ->join('brands', 'brands.id', '=', 'brands_products.brands_id')
        ->join('categories_products', 'products.id', '=', 'categories_products.products_id')
        ->join('categories', 'categories.id', '=', 'categories_products.categories_id')
        ->where('brands.id', '=', $bid)
        ->where('categories.id', '=', $cid)
        ->select('products.id')->get();
        $arr = [];
        foreach($products as $product){
            array_push($arr,$product->id);
        }
        $ids =  implode(',', $arr);
        $products = Products::findMany($ids);
        $colors = Colors::all();
        $designID = $request->cookie('designID');
        $design = Designs::where('id',$designID)->get();
        $data = array(
            "products"=>$products,
            "colors"=>$colors,
            "design"=>$design
        );
        return view('web.helpers.productFilter')->with($data)->render();
    }
    public function productsSearchWithBrandAndCategoryID(Request $request,$bid,$cid,$search ){
    //    dd($search);
        $products = DB::table('products')
        ->join('brands_products', 'products.id', '=', 'brands_products.products_id')
        ->join('brands', 'brands.id', '=', 'brands_products.brands_id')
        ->join('categories_products', 'products.id', '=', 'categories_products.products_id')
        ->join('categories', 'categories.id', '=', 'categories_products.categories_id')
        ->where('brands.id', '=', $bid)
        ->where('categories.id', '=', $cid)
        ->select('products.id')->get();
        $arr = [];
        foreach($products as $product){
            array_push($arr,$product->id);
        }
        $ids =  implode(',', $arr);
        // $designs=  Designs::where('name', 'LIKE', '%' . $request->input('search') . '%')->get();
        $products = Products::where('name', 'LIKE', '%' . $search . '%')->findMany($ids);
        $colors = Colors::all();
        $designID = $request->cookie('designID');
        $design = Designs::where('id',$designID)->get();
        $data = array(
            "products"=>$products,
            "colors"=>$colors,
            "design"=>$design
        );
        return view('web.helpers.productFilter')->with($data)->render();
    }
}
