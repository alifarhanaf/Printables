<?php

namespace App\Http\Controllers;
use Cookie;
use App\Models\Colors;
use App\Models\Designs;
use App\Models\Products;
use App\Models\OrderTenures;
use Illuminate\Http\Request;
use App\Models\PrintLocations;
use App\Models\ShippingOptions;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $designs = Designs::all();
        // dd($designs[0]->images);
        $data = array(
            "designs"=> $designs,
        );
        return view('web.index')->with($data);
    }

    public function collections()
    {   
        $designs = Designs::all();
        $recentdesigns = Designs::all()->sortByDesc('created_at');
        // dd($recentdesigns[0]->images);
        $data = array(
            "designs"=> $designs,
            "recents"=> $recentdesigns,
        );
        return view('web.designScreen')->with($data);
    }
    public function products(Request $request)
    {   
        $products = Products::all();
        $colors = Colors::all();
        $designID = $request->cookie('designID');
        // dd($designID);
        $design = Designs::where('id',$designID)->get();
        $data = array(
            "design" =>$design,
            "products" =>$products,
            "colors" =>$colors
        );
        return view('web.productScreen')->with($data);
    }
    public function designDetailScreen(Request $request)
    {
        $printLocations = PrintLocations::all();
        $designID = $request->cookie('designID');
        $design = Designs::where('id',$designID)->get();
        $productID = $request->cookie('productID');
        $product = Products::where('id',$productID)->get();
        // dd($product[0]->print_locations);
        $data = array(
            "design" =>$design,
            "product" =>$product,
            "printLocations" => $printLocations
        );
        return view('web.designDetailScreen')->with($data);
    }
    public function printTypeScreen(Request $request){
        $shippingOptions = ShippingOptions::all();
        $productID = $request->cookie('productID');
        $product = Products::where('id',$productID)->get();
        // dd($product[0]->groups[0]->print_types);
        $data = array(
            "product" =>$product,
            "shippingOptions"=>$shippingOptions,
        );

        return view('web.printTypeScreen')->with($data);
    }
    public function deliveryAddressScreen(){
        $orderTenures = OrderTenures::all();
        $data = array(
            "orderTenures"=>$orderTenures
        );
        return view('web.deliveryAddressScreen')->with($data); 
    }
    public function cartScreen(Request $request){
        $designID = $request->cookie('designID');
        $design = Designs::where('id',$designID)->get();
        $productID = $request->cookie('productID');
        $product = Products::where('id',$productID)->get();
        $data = array(
            "design" =>$design,
            "product" =>$product,
        );
        return view('web.cartScreen')->with($data);
    }
    public function aboutUsScreen(){
        return view('web.aboutUsScreen');
    }
    
}
