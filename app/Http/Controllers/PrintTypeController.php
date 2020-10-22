<?php

namespace App\Http\Controllers;

use App\Faqs;
use App\PrintTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintTypeController extends Controller
{
    public function index(){
        $faqs = Faqs::all();
        $data = array(
            "faqs"=> $faqs,
        );

        return view ('admin.printTypeform')->with($data);

    }
    public function submitPrintType(Request $request){
        // dd($request);
        DB::beginTransaction();
        try {
        $printTypes = new PrintTypes();
        $printTypes->name =request('name');
        $printTypes->enabled = request('enable');
        $printTypes->save();
        DB::commit();
        return redirect()->route('printType.form')->with('message','Print Type Added Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('printType.form')->with('message',$ex->getMessage());
        }
      
    }
}
