<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscController extends Controller
{
    public function TandC(){
        return view ('web.termsConditions');
    }
    public function privacyPolicy(){
        return view('web.privacyPolicy');
    }
}
