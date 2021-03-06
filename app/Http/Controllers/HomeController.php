<?php

namespace App\Http\Controllers;
use Cookie;
use App\Models\Colors;
use App\Models\Events;
use App\Models\Designs;
use App\Models\Products;
use App\Models\Variants;
use App\Models\OrderTenures;
use Illuminate\Http\Request;
use App\Models\Organizations;
use App\Models\PrimaryEvents;
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

    public function collections(Request $request)
    {   
        $events = Events::all();
        $primaryEvents = PrimaryEvents::all();
        $organizations = Organizations::all();
        if ($request->has('search')) {
            // dd($request->input('search'));
            $search = $request->search;
            $designs=  Designs::where('name', 'LIKE', '%' . $request->input('search') . '%')->get();
            // dd($designs);
            $recentdesigns = Designs::where('name', 'LIKE', '%' . $request->input('search') . '%')->orderBy('created_at','DESC')->get();
            // $recentdesigns = $recentdesigns->sortByDesc('created_at');
            $data = array(
                "designs"=> $designs,
                "recents"=> $recentdesigns,
                "search" => $search,
                "events" => $events,
                "primaryEvents" => $primaryEvents,
                "organizations" => $organizations,
            );
            return view('web.designScreen')->with($data);
        }
        $designs = Designs::all();
        $recentdesigns = Designs::all()->sortByDesc('created_at');
        $data = array(
            "designs"=> $designs,
            "recents"=> $recentdesigns,
            "events" => $events,
            "primaryEvents" => $primaryEvents,
            "organizations" => $organizations,
        );
        return view('web.designScreen')->with($data);
    }
    public function products(Request $request)
    {   
        $products = Products::all();
        // dd($products);
        // dd($products[3]->variants[0]->images[0]->url);
        $colors = Colors::all();
        $designID = $request->cookie('designID');
        
        $design = Designs::where('id',$designID)->get();
        // dd($design);
        $data = array(
            "design" =>$design,
            "products" =>$products,
            "colors" =>$colors
        );
        return view('web.productScreen')->with($data);
    }
    public function designDetailScreen(Request $request)
    {
        // dd($request);
        $printLocations = PrintLocations::all();
        $designID = $request->cookie('designID');
        $design = Designs::where('id',$designID)->get();
        $productID = $request->cookie('productID');
        $variantID = $request->cookie('variantID');
        // dd($variantID);

        // dd($productID);
        $variant = Variants::where('id',$variantID)->first();
        // dd($variant);
        $product = Products::where('id',$productID)->get();
        // dd($product[0]->print_locations);
        $data = array(
            "design" =>$design,
            "variant" =>$variant,
            "printLocations" => $printLocations,
            "product" => $product
        );
        return view('web.designDetailScreen')->with($data);
    }
    public function printTypeScreen(Request $request){
        $shippingOptions = ShippingOptions::all();
        $productID = $request->cookie('productID');
        $variantID = $request->cookie('variantID');
        $product = Products::where('id',$productID)->get();
        $variant = Variants::where('id',$variantID)->first();
        // dd($product[0]->groups[0]->print_types);
        $data = array(
            "product" =>$product,
            "shippingOptions"=>$shippingOptions,
            "variant"=> $variant
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
