<?php

namespace App\Http\Controllers;

use App\Faqs;
use App\Groups;
use App\Images;
use App\FaqsGroups;
use App\GroupsFaqs;
use App\GroupImages;
use App\GroupsImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\GroupRequest;

class GroupController extends Controller
{
    public function index(){
        return view ('admin.groupform');

    }
    public function submitGroupFAQ(Request $request){
        // dd($request);
        $groupid = request('group_id');
        $faqs = new Faqs();
        $faqs->questions =request('question');
        $faqs->answers =request('answer');
        $faqs->save();
        $faqid = $faqs->id;
        $groupfaqs = new FaqsGroups();
        $groupfaqs->groups_id = $groupid;
        $groupfaqs->faqs_id = $faqid;
        $groupfaqs->save();
        return redirect()->route('group.edit',$groupid)->with('message','Faq Added Successfully');


    }
    public function submitGroup(GroupRequest $request){

        DB::beginTransaction();
        try {

            $group = new Groups();
            $group->name = request('name');
            $group->description = request('description');
            $group->save();

        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/groupImages/';
        $request->image->move($path, $imageName);
        $imageurl = $path.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        
        $imageid = $image->id;
        $groupid = $group->id;
        $groupimage = new GroupsImages();
        $groupimage->groups_id = $groupid;
        $groupimage->images_id = $imageid;
        $groupimage->save();
        DB::commit();
        return redirect()->route('group.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('group.form')->with('message',$ex->getMessage());
        }

       
    }
    public function editgroup($id){
        $group = Groups::where('id',$id)->get();
        // dd($group[0]->images[0]->url);
        $data = array(
            "group"=> $group,
        );
        return view ('admin.groupform')->with($data);
    }

    public function editgroupSubmit(Request $request){

        DB::beginTransaction();
        try {

            $group = new Groups();
            $group->name = request('name');
            $group->description = request('description');
            $group->save();

        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/groupImages/';
        $request->image->move($path, $imageName);
        $imageurl = $path.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        
        $imageid = $image->id;
        $groupid = $group->id;
        $groupimage = new GroupImages();
        $groupimage->group_id = $groupid;
        $groupimage->image_id = $imageid;
        $groupimage->save();
        DB::commit();
        return redirect()->route('group.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('group.form')->with('message',$ex->getMessage());
        }

       
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
    public function destroy($id)
    {
        Groups::destroy($id);
    }
    public function faqsdestroy($id)
    {
        
        $faqs = Faqs::find($id);
        $fid = $faqs->groups[0]->id;
        Faqs::destroy($id);
        return redirect()->route('group.edit',$fid)->with('message','Faq Deleted Successfully');
        
    }
    public function faqsindex()
    {
        
        
    }
}
