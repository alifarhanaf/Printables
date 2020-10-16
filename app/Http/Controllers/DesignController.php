<?php

namespace App\Http\Controllers;

use App\Images;
use App\Designs;
use App\DesignImages;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function index(){
        return view ('admin.designform');

    }
    public function submitDesign(Request $request){

        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/designImages/';
        $request->image->move($path, $imageName);
        $imageurl = $path.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $design = new Designs();
        $design->name = request('name');
        $design->description = request('description');
        $design->save();
        $imageid = $image->id;
        $designid = $design->id;
        $designimage = new DesignImages();
        $designimage->design_id = $designid;
        $designimage->image_id = $imageid;
        $designimage->save();

       
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
