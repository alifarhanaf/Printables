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
    public function groupgrid(){
        $groups = Groups::all();
        $data = array(
            "groups"=> $groups,
        );
        return view ('admin.groupsgrid')->with($data);
    }

    public function submitGroupFAQ(Request $request){
        DB::beginTransaction();
        try {
        $groupid = request('group_id');
        $faqs = new Faqs();
        $faqs->questions =request('question');
        $faqs->answers =request('answer');
        $faqs->save();
        $faqid = $faqs->id;
        $faqs->groups()->sync($groupid);
        DB::commit();
        return redirect()->route('group.edit',$groupid)->with('message','Faq Added Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('group.edit',$groupid)->with('message',$ex->getMessage());
        }
      
    }

    public function submitGroup(GroupRequest $request){
        DB::beginTransaction();
        try {
            $group = new Groups();
            $group->name = request('name');
            $group->description = request('description');
            $group->enabled = request('enable');
            $group->save();

        $imageName = time().'.'.$request->image->extension();  
        $path = base_path() . '/public/storage/groupImages/';
        $pathsave =  '/storage/groupImages/';
        $request->image->move($path, $imageName);
        $imageurl = $pathsave.$imageName;
        $image = new Images();
        $image->url =$imageurl;
        $image->save();
        $imageid = $image->id;
        $group->images()->sync($imageid);
        DB::commit();
        return redirect()->route('group.form')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('group.form')->with('message',$ex->getMessage());
        }

       
    }
    public function editgroup($id){
        $group = Groups::where('id',$id)->get();
        $data = array(
            "group"=> $group,
        );
        return view ('admin.groupform')->with($data);
    }


    public function editgroupSubmit(Request $request,$id){
       
        DB::beginTransaction();
        try {
            $group = Groups::find($id);
            $group->name = request('name');
            $group->description = request('description');
            $group->enabled = request('enable');
            $group->save();
            if ($request->hasFile('image')) {
                $imageName = time().'.'.$request->image->extension();   
                $path = base_path() . '/public/storage/groupImages/';
                $pathsave =  '/storage/groupImages/';
                $request->image->move($path, $imageName);
                $imageurl = $pathsave.$imageName;
                $image = new Images();
                $image->url =$imageurl;
                $image->save();
                $imageid = $image->id;
                $group->images()->sync($imageid);
        }
        DB::commit();
        return redirect()->route('group.edit',$group->id)->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('group.edit',$group->id)->with('message',$ex->getMessage());
        }

       
    }


    
    public function destroy($id)
    {
        $imageids = [];
        $faqids = [];
        DB::beginTransaction();
        try {
        $group = Groups::find($id);
        if($group->images){
        foreach($group->images as $images){
            array_push($imageids,$images['id']);
        };
        Images::destroy($imageids);
        $group->images()->detach($imageids);
        }
        if($group->faqs){
            foreach($group->faqs as $faqs){
                array_push($faqids,$faqs['id']);
            };
            Faqs::destroy($faqids);
            $group->faqs()->detach($faqids);
            }
        Groups::destroy($id);
        DB::commit();
        return redirect()->route('group.grid')->with('message','Success');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('group.grid')->with('message',$ex->getMessage());
        }
        Groups::destroy($id);
    }
    public function faqsdestroy($id)
    {
        DB::beginTransaction();
        try {
        $faqs = Faqs::find($id);
        $group_id = $faqs->groups[0]->id;
        $image->groups()->detach($group_id);
        Faqs::destroy($id);
        DB::commit();
        return redirect()->route('group.edit',$group_id)->with('message','Faq Deleted Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('group.edit',$group_id)->with('message',$ex->getMessage());
        }
       
        
    }
    public function groupImageDelete($id)
    {
        DB::beginTransaction();
        try {
        $image = Images::find($id);
        $group_id = $image->groups[0]->id;
        $image->groups()->detach($group_id);
        Images::destroy($id);
        DB::commit();
        return redirect()->route('group.edit',$group_id)->with('message','Image Deleted Successfully');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('group.edit',$group_id)->with('message',$ex->getMessage());
        }
        
        
    }
}
