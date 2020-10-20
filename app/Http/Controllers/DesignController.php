<?php

namespace App\Http\Controllers;

use App\Images;
use App\Designs;
use App\DesignImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DesignRequest;

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
        $request->image->move($path, $imageName);
        $imageurl = $path.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        
        $imageid = $image->id;
        $designid = $design->id;
        $designimage = new DesignImages();
        $designimage->design_id = $designid;
        $designimage->image_id = $imageid;
        $designimage->save();
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
}
