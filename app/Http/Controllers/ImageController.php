<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Images;
use App\Models\Campaigns;
use Illuminate\Http\Request;
use App\Models\SuggestedImages;
use App\Mail\DesignSuggestionMail;
use Illuminate\Support\Facades\Mail;
use App\Models\SuggestedDesignGroups;

class ImageController extends Controller
{
    public function campaign_upload_image(Request $request,$id)
    {
        //  dd($request);
        $campaign = Campaigns::find($id);
        $campaign->status = 2;
        $campaign->save();
        $sdg = new SuggestedDesignGroups();
        $sdg->Name = $request->SuggestedDesignName;
        $sdg->description = $request->SuggestedDesignDescription;
        $sdg->save();
        $campaign->suggested_design_groups()->attach($sdg->id);
        $nsdg = SuggestedDesignGroups::find($sdg->id);
        foreach($request->images as $file){
        $imageName = time().'.'.$file->extension();  
        $path = base_path() . '/public/storage/campaignSuggestedImages/';
        $pathsave =  '/storage/campaignSuggestedImages/';
        $file->move($path, $imageName);
        $imageurl = $pathsave.$imageName;
        
        $image = new SuggestedImages();
        $image->url =$imageurl;
        $image->save();
        $imageid = $image->id;
        $nsdg->suggested_images()->attach($imageid);
        $user = User::find($campaign->users[0]->id);
        
        }
        Mail::to($campaign->users[0]->email)->send(new DesignSuggestionMail($user,$campaign));
        return redirect()->route('campaignScreenAdmin1',$campaign->id);
         
   
    }
    public function loginTest() {
        return view ('auth.newLogin');

    }
    public function loginTestPost(Request $request) {
        dd($request);

    }
 
}
