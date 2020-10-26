<?php

namespace App\Http\Controllers;

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
        return view('web.index');
    }

    public function collections()
    {
        return view('web.designScreen');
    }
    public function products()
    {
        return view('web.productScreen');
    }
    public function designDetailScreen()
    {
        return view('web.designDetailScreen');
    }
    public function printTypeScreen(){
        return view('web.printTypeScreen');
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
