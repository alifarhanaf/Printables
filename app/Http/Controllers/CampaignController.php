<?php

namespace App\Http\Controllers;
use Auth;
use File;
use Cookie;
use App\Models\Faqs;
use App\Models\Images;
use App\Models\Addresses;
use App\Models\Campaigns;
use App\Models\Suggestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    
        public function setDraftCampaign(Request $request){
            // dd($request);

        DB::beginTransaction();
        try {
        $campaignName = $request->cookie('campaignName');
        $designID = $request->cookie('designID');
        $productID = $request->cookie('productID');
        $answerIds = $request->cookie('AnswerIds');
        $faqIds = $request->cookie('FaqIds');
        $printLocations = $request->cookie('PrintLocations');
        $selectColors = $request->cookie('SelectColors');
        $bagAndTag = $request->cookie('bagAndTag');
        $color = $request->cookie('color');
        $deliveryDate = $request->deliveryDate;
        $printType = $request->cookie('printType');
        $shippingOption = $request->cookie('shippingOption');
        $suggestions = $request->cookie('suggestions');
        $printType = $request->cookie('printType');
        $shippingOption = $request->cookie('shippingOption');
        $suggestions = $request->cookie('suggestions');
        $savePreference = $request->savePreference;
        $faqIds = explode(',', $faqIds);
        $answerIds = explode(',', $answerIds);
        $printLocations = explode(',', $printLocations);
        $campaign = new Campaigns();
        $campaign->name = $campaignName;
        $campaign->product_color = $color;
        $campaign->deliveryDate = $deliveryDate;
        $campaign->is_draft = true;
        $campaign->save();
        if($request->cookie('imageurl0')){
            $imageurl0 = $request->cookie('imageurl0');
            $oldpath0 = $request->cookie('oldpath0');
            $newpath0 = $request->cookie('newpath0');
            $imageName0 = $request->cookie('imageName0');
            // dd($oldpath0);
            File::move($oldpath0,$newpath0.$imageName0 );
            $image = new Images();
            $image->url =$imageurl0;
            $image->save();
            $campaign->images()->attach($image->id);
            
            Cookie::queue('imageurl0', '', -1);
            Cookie::queue('oldpath0', '', -1);
            Cookie::queue('newpath0', '', -1);
            Cookie::queue('imageName0', '', -1);
            
        };
        if($request->cookie('imageurl1')){
            $imageurl1 = $request->cookie('imageurl1');
            $oldpath1 = $request->cookie('oldpath1');
            $newpath1 = $request->cookie('newpath1');
            $imageName1 = $request->cookie('imageName1');
            // dd($oldpath0);
            File::move($oldpath1,$newpath1.$imageName1 );
            $image = new Images();
            $image->url =$imageurl1;
            $image->save();
            $campaign->images()->attach($image->id);
            Cookie::queue('imageurl1', '', -1);
            Cookie::queue('oldpath1', '', -1);
            Cookie::queue('newpath1', '', -1);
            Cookie::queue('imageName1', '', -1);
        };
        if($request->cookie('imageurl2')){
            $imageurl2 = $request->cookie('imageurl2');
            $oldpath2 = $request->cookie('oldpath2');
            $newpath2 = $request->cookie('newpath2');
            $imageName2 = $request->cookie('imageName2');
            // dd($oldpath0);
            File::move($oldpath2,$newpath2.$imageName2 );
            $image = new Images();
            $image->url =$imageurl2;
            $image->save();
            $campaign->images()->attach($image->id);
            Cookie::queue('imageurl2', '', -1);
            Cookie::queue('oldpath2', '', -1);
            Cookie::queue('newpath2', '', -1);
            Cookie::queue('imageName2', '', -1);
        };
        $address = new Addresses();
        $address->addressName = $request->addressName;
        $address->firstName = $request->firstName;
        $address->lastName = $request->lastName;
        $address->addressLine1 = $request->addressLine1;
        $address->addressLine2 = $request->addressLine2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zipCode = $request->zipCode;
        $address->save();
        $addressId = $address->id;
        $user =  Auth::user();
        $user->campaigns()->attach($campaign->id);
        $campaign->designs()->sync($designID);
        $campaign->addresses()->sync($addressId);
        $campaign->products()->sync($productID);
        $campaign->faqs()->sync($faqIds);
        $campaign->answers()->sync($answerIds);
        $campaign->print_locations()->sync($printLocations);
        $campaign->print_types()->sync($printType);
        $campaign->shipping_options()->sync($shippingOption);
        $suggestions = new Suggestions();
        $suggestions->frontSuggestion = $request->cookie('FrontSuggestion');
        $suggestions->backSuggestion = $request->cookie('BackSuggestion');
        $suggestions->pocketSuggestion = $request->cookie('PocketSuggestion');
        $suggestions->sleevesSuggestion = $request->cookie('SleevesSuggestion');
        $suggestions->frontColors = $request->cookie('FrontColors');
        $suggestions->backColors = $request->cookie('BackColors');
        $suggestions->pocketColors = $request->cookie('PocketColors');
        $suggestions->sleevesColors = $request->cookie('SleevesColors');
        $suggestions->save();
        $campaign->suggestions()->sync($suggestions->id);
        DB::commit();
        return redirect()->route('allCampaigns');
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex->getMessage());
            return redirect()->route('deliveryAddressScreen');
        }

        
        
    }
    public function campaignScreen($id){
        $campaigns = Campaigns::where('id',$id)->get();
        $arr = [];
        foreach($campaigns as $campaign){
            foreach($campaign->faqs as $faq){
                array_push($arr,$faq->id);
            }
        }
        // dd($arr);
        $faqs = Faqs::where('questions', 'LIKE', '%' . 'Estimated Quantity' . '%')->get();
        // dd($faqs[0]->id);
        // if(in_array($faqs[0]->id, $arr))
        // {

        

        // }
        // dd($campaigns);
        $data = array(
            "campaigns"=> $campaigns,
        );
        return view('web.campaignScreen')->with($data);
    }
    public function allCampaigns(){
        $user =  Auth::user();
        $closedCampaigns = $user->campaigns()->where('is_draft',CLOSED)->get();
        $activeCampaigns = $user->campaigns()->where('is_draft',AWAITING_DESIGN)->get();
        // $campaigns = Campaigns::all();
        $data = array(
            "closedCampaigns"=> $closedCampaigns,
            "activeCampaigns"=>$activeCampaigns
        );
        return view('web.allCampaigns')->with($data);
    }
    public function userCampaigns(){
        $user =  Auth::user();
        
        $campaigns = $user->campaigns;
        dd($campaigns);
        
        
    }

    
}
