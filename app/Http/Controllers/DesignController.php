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
    //Design Form
    public function index()
    {
        return view ('admin.designform');
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
    
}
