<?php

namespace App\Http\Controllers;

use App\Models\Designs;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $designID = $request->cookie('designID');
        $design = Designs::where('id',$designID)->get();
        $data = array(
            "design" =>$design,
            "products" =>$products
        );
        return view('web.productScreen')->with($data);
    }
    public function designDetailScreen(Request $request)
    {
        $designID = $request->cookie('designID');
        $design = Designs::where('id',$designID)->get();
        $productID = $request->cookie('productID');
        $product = Products::where('id',$productID)->get();
        // dd($product[0]->print_locations);
        $data = array(
            "design" =>$design,
            "product" =>$product
        );
        return view('web.designDetailScreen')->with($data);
    }
    public function printTypeScreen(Request $request){
        $productID = $request->cookie('productID');
        $product = Products::where('id',$productID)->get();
        // dd($product[0]->groups[0]->print_types);
        $data = array(
            "product" =>$product,
        );

        return view('web.printTypeScreen')->with($data);
    }
    public function deliveryAddressScreen(){
        return view('web.deliveryAddressScreen'); 
    }
    public function cartScreen(){
        return view('web.cartScreen');
    }
    public function aboutUsScreen(){
        return view('web.aboutUsScreen');
    }
}
