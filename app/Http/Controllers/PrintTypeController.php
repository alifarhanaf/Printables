<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use App\Models\PrintTypes;
use App\Models\PrintLocations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrintTypeController extends Controller
{
    public function index(){
        $faqs = Faqs::all();
        // dd($faqs[8]->answers);
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
        $printTypes->faqs()->attach(request('faq_ids'));

        DB::commit();
        return redirect()->route('printType.form')->with('message','Print Type Added Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('printType.form')->with('message',$ex->getMessage());
        }
      
    }
    public function plindex(){
        return view ('admin.printLocationform');
    }
    public function submitPrintLocation(Request $request){
        // dd($request);
        DB::beginTransaction();
        try {
        $printLocations = new PrintLocations();
        $printLocations->name =request('name');
        $printLocations->enabled = request('enable');
        $printLocations->save();
        // $printLocations->faqs()->attach(request('faq_ids'));

        DB::commit();
        return redirect()->route('printLocation.form')->with('message','Print Location Added Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('printLocation.form')->with('message',$ex->getMessage());
        }
      
    }
}
