<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Addresses;
use App\Models\Campaigns;
use App\Models\Suggestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CampaignController extends Controller
{
    
        public function setDraftCampaign(Request $request){
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
        $user->addresses()->sync($addressId);
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
        return redirect()->route('cartScreen');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('designDetailScreen');
        }
        
    }

    
}
