<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use App\Models\Organizations;
use App\Models\PrimaryEvents;
use Illuminate\Support\Facades\DB;

class MiscController extends Controller
{
    public function TandC(){
        return view ('web.termsConditions');
    }
    public function privacyPolicy(){
        return view('web.privacyPolicy');
    }
    public function addEvent(){
        return view ('admin.eventform');
    }
    public function addPrimaryEvent(){
        return view ('admin.primaryeventform');
    }
    public function addOrganization(){
        return view('admin.organizationform');
    }
    //Submit Category
    public function submitEvent(Request $request){
        // dd($request);

        DB::beginTransaction();
        try {
            $event = new Events();
            $event->name = request('name');
            $event->description = request('description');
            $event->enabled = request('status');
            $event->save();
        DB::commit();
        return redirect()->route('addEvent')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('addEvent')->with('message',$ex->getMessage());
        }
    }
    public function submitPrimaryEvent(Request $request){
        // dd($request);

        DB::beginTransaction();
        try {
            $event = new PrimaryEvents();
            $event->name = request('name');
            $event->description = request('description');
            $event->enabled = request('status');
            $event->save();
        DB::commit();
        return redirect()->route('addPrimaryEvent')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('addPrimaryEvent')->with('message',$ex->getMessage());
        }
    }
    public function submitOrganization(Request $request){
        // dd($request);

        DB::beginTransaction();
        try {
            $event = new Organizations();
            $event->name = request('name');
            $event->description = request('description');
            $event->enabled = request('status');
            $event->save();
        DB::commit();
        return redirect()->route('addOrganization')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('addOrganization')->with('message',$ex->getMessage());
        }
    }
    

}
