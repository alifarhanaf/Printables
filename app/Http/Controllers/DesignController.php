<?php

namespace App\Http\Controllers;
use Cookie;
use App\Models\Events;
use App\Models\Images;
use App\Models\Designs;
use App\Models\DesignImages;
use Illuminate\Http\Request;
use App\Models\Organizations;
use App\Models\PrimaryEvents;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DesignRequest;
use Illuminate\Support\Facades\Response;

class DesignController extends Controller
{
    //Design Form
    public function index()
    {
        $events = Events::all();
        $primaryEvents = PrimaryEvents::all();
        $organizations = Organizations::all();
        $data = array(
            'events'=> $events,
            'primaryEvents'=> $primaryEvents,
            'organizations' => $organizations,
        );

        return view ('admin.designform')->with($data);
    }
    public function updatedDesigns(Request $request) {
        $array = json_decode($request->getContent(), true);
        // dd($array);
        // dd(count($array));
        $designs = [];
        
        $query = Events::query();
        if (array_key_exists("0",$array)) {
            $query = $query->where('name', $array[0]);
            }

        for($i=1; $i<count($array); $i++){
            if (array_key_exists($i,$array)) {
            $query = $query->orWhere('name', $array[$i]);
            }
        }
        $events = $query->get();
        // if (array_key_exists("0",$array)) {
        // $query = $query->where('name', $array[0]);

        // }
        // if (array_key_exists("1",$array)){
        // // if ($array[1]) {
        // $query = $query->orWhere('name', $array[1]);
        // }
        // if (array_key_exists("2",$array)) {
        // $query = $query->orWhere('name', $array[2]);
        // }


        

        $pquery = PrimaryEvents::query();
        if (array_key_exists("0",$array)) {
            $pquery = $pquery->where('name', $array[0]);
            }
        for($i=1; $i<count($array); $i++){
            if (array_key_exists($i,$array)) {
            $pquery = $pquery->orWhere('name', $array[$i]);
            }
        }
        $pevents = $pquery->get();
        // if (array_key_exists("1",$array)){
        
        // $pquery = $pquery->orWhere('name', $array[1]);
        // }
        // if (array_key_exists("2",$array)) {
        // $pquery = $pquery->orWhere('name', $array[2]);
        // }

        $oquery = Organizations::query();
        if (array_key_exists("0",$array)) {
            $oquery = $oquery->where('name', $array[0]);
            }
        for($i=1; $i<count($array); $i++){
            if (array_key_exists($i,$array)) {
            $oquery = $oquery->orWhere('name', $array[$i]);
            }
        }
        $orgs = $oquery->get();


        




        foreach($events as $event){
            foreach($event->designs as $design){
                array_push($designs,$design->id);
            } 
        };
        foreach($pevents as $pevent){
            foreach($pevent->designs as $pdesign){
                array_push($designs,$pdesign->id);
            } 
        };
        foreach($orgs as $org){
            foreach($org->designs as $odesign){
                array_push($designs,$odesign->id);
            } 
        };
        $designs = array_unique($designs);
        // dd($designs);
        $allDesigns = Designs::find($designs);
        $recentDesigns = Designs::orderBy('created_at', 'DESC')->find($designs);
        $data = array(
            "designs" => $allDesigns,
            "recents" => $recentDesigns,

        );
        // dd($allDesigns);
        return view('web.helpers.filteredDesigns')->with($data)->render();


    }
    //Design Submit
    public function submitDesign(DesignRequest $request)
    {
        // dd($request);
        DB::beginTransaction();
        try {
        $design = new Designs();
        $design->name = request('name');
        $design->description = request('description');
        $design->enabled = request('status');
        $design->save();
        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/designImages/';
        $pathsave =  '/storage/designImages/';
        $request->image->move($path, $imageName);
        $imageurl = $pathsave.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $imageid = $image->id;
        
        $design->events()->sync(request('eventId'));
        $design->primary_events()->sync(request('primaryEventId'));
        $design->organizations()->sync(request('organizationId'));
        $design->images()->sync($imageid);
        DB::commit();
        return redirect()->route('design.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('design.form')->with('message',$ex->getMessage());
        }
       
    }
    //Design Grid
    public function designgrid()
    {
        $designs = Designs::all();
        $data = array(
            "designs"=> $designs,
        );
        return view ('admin.designgrid')->with($data);
    }
    //Design Edit Form
    public function editDesign($id){
        $design = Designs::where('id',$id)->first();
        $data = array(
            "design"=> $design,
        );
        return view ('admin.designform')->with($data);
    }
    //Submit Edited Design
    public function submitEditedDesign(Request $request,$id)
    {
        DB::beginTransaction();
        try {
        $design = Designs::find($id);
        $design->name = request('name');
        $design->description = request('description');
        $design->enabled = request('status');
        $design->save();
        if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/designImages/';
        $pathsave =  '/storage/designImages/';
        $request->image->move($path, $imageName);
        $imageurl = $pathsave.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $imageid = $image->id;
        $design->images()->sync($imageid);
        }
        DB::commit();
        return redirect()->route('design.edit',$design->id)->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('design.edit',$design->id)->with('message',$ex->getMessage());
        }

    }
    

    //Design Delete
    public function destroy($id)
    {   
        DB::beginTransaction();
        try {
        $design = Designs::find($id);
        if($design->images){
        $ids = idsgenerator($design->images);
        Images::destroy($ids);
        $design->images()->detach($ids);
        }
        Designs::destroy($id);
        DB::commit();
        return redirect()->route('design.grid')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('design.grid')->with('message',$ex->getMessage());
        }
    }
    //Fetch Design Details By ID
    public function designByID($id)
    {
        $design = Designs::where('id',$id)->get();
        $images = $design[0]->images;
        $data = array(
            "design"=> $design,
            "designImages"=>$images,
        );
        return $data;
    }
    public function allDesigns(){
        $designs = Designs::all();
        $data = array(
            "designs"=>$designs
        );
        return $data;
    }
    
}
