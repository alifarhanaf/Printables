<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Events;
use App\Models\Products;
use App\Models\Variants;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Models\Organizations;
use App\Models\PrimaryEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


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
    public function getProductImage($id) {
        $variant = Variants::where('id',$id)->first();
        // dd($variant->images);
         $url = $variant->images[0]->url;
         $data = array(
            "url" => $url,
         );
        return view('web.helpers.imageUpdate')->with($data)->render();
        // $url = public_path().$variant->images[0]->url;
        // return $url;
    }

    public function joinOurHouse(){
        return view ('web.joinOurHouse');
    }
    public function submitJoinOurHouse(Request $request){
        // dd($request);
        $user =  Auth::user();
        $userid = $user->id;
        $userUpdate = User::find($userid);
        $userUpdate->phone = $request->phone;
        $userUpdate->save();
        if($user->details()){
            // dd($user->details->id);
            $userDetail = UserDetails::find($user->details->id);
        }else{
            $userDetail = new UserDetails();
        }
        
        $userDetail->user_id = $userid;
        $userDetail->position = $request->position;
        $userDetail->total_members = $request->members;
        $userDetail->fraternity = $request->chapter;
        $userDetail->graduation_year = $request->graduation_year;
        $userDetail->university = $request->school;
        $userDetail->ready_submit_design = $request->are_you_ready;
        $userDetail->save();
        return redirect()->back();
        // $user = User::where('')

    }
    public function setSession(Request $request){
        // dd($request->all());
        Session::put('addressName', $request->input('addressName') ); 
        Session::put('firstName', $request->input('fname') ); 
        Session::put('lastName', $request->input('lastname') ); 
        Session::put('address1', $request->input('address1') ); 
        Session::put('address2', $request->input('address2') ); 
        Session::put('city', $request->input('city') ); 
        Session::put('state', $request->input('state') ); 
        Session::put('zip', $request->input('zip') ); 


    }
    public function allproductscount(){
        $products = Products::all();
        return $products;
    }
    

}
