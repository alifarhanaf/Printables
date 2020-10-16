<?php

namespace App\Http\Controllers;

use App\Groups;
use App\Images;
use App\GroupImages;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        return view ('admin.groupform');

    }
    public function submitGroup(Request $request){

        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/groupImages/';
        $request->image->move($path, $imageName);
        $imageurl = $path.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $group = new Groups();
        $group->name = request('name');
        $group->description = request('description');
        $group->save();
        $imageid = $image->id;
        $groupid = $group->id;
        $groupimage = new GroupImages();
        $groupimage->group_id = $groupid;
        $groupimage->image_id = $imageid;
        $groupimage->save();

       
    }
    public function groupgrid(){
        $groups = Groups::all();
        // $groups = Groups::all();
        // dd($brands);
        $data = array(
            "groups"=> $groups,
            // "groups"=> $groups,
        );
        return view ('admin.groupsgrid')->with($data);
    }
}
