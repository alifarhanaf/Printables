<?php

namespace App\Http\Controllers;
use Cookie;
use App\Models\Images;
use App\Models\Designs;
use App\Models\DesignImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DesignRequest;
use Illuminate\Support\Facades\Response;

class DesignController extends Controller
{
    public function index(){
        return view ('admin.designform');

    }
    public function submitDesign(DesignRequest $request){
        
        DB::beginTransaction();
        try {
        $design = new Designs();
        $design->name = request('name');
        $design->description = request('description');
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
        $design->images()->sync($imageid);
        
        // $imageid = $image->id;
        // $designid = $design->id;
        // $designimage = new DesignImages();
        // $designimage->design_id = $designid;
        // $designimage->image_id = $imageid;
        // $designimage->save();
        DB::commit();
        return redirect()->route('design.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('design.form')->with('message',$ex->getMessage());
        }
       
    }
    public function designgrid(){
        $designs = Designs::all();
        // $groups = Groups::all();
        // dd($brands);
        $data = array(
            "designs"=> $designs,
            // "groups"=> $groups,
        );
        return view ('admin.designgrid')->with($data);
    }

    public function destroy($id)
    {
        Designs::destroy($id);
    }
    public function designByID($id){
        $design = Designs::where('id',$id)->get();
        $images = $design[0]->images;
        // dd($images);
        $data = array(
            "design"=> $design,
            "designImages"=>$images,
        );
        return $data;
    }
    public function setCookie(Request $request){
        // dd($request);
        Cookie::queue('designID', $request->designID, 10);
        return redirect()->route('productScreen');
     }
     public function setDesignDetailCookie(Request $request){
        $str = implode(',', $request->printLocations);
        Cookie::queue('Campaign Name', $request->CampaignName, 10);
        Cookie::queue('PrintLocations', $str, 10);
        Cookie::queue('suggestion', $request->suggestion, 10);
        Cookie::queue('SelectColors', $request->SelectColors, 10);
        return redirect()->route('printTypeScreen');
        // dd($request);
     }
    //  printTypeScreen
}
