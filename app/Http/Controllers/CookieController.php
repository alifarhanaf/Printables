<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function setProductCookie(Request $request){
        Cookie::queue('productID', $request->productID, 60);
        Cookie::queue('color', $request->color, 60);
        return redirect()->route('designDetailScreen');
     }
     public function setDesignDetailCookie(Request $request){
        $str = implode(',', $request->printLocations);
        Cookie::queue('campaignName', $request->CampaignName, 60);
        Cookie::queue('FrontSuggestion', $request->FrontSuggestion, 60);
        Cookie::queue('FrontColors', $request->FrontColors, 60);
        Cookie::queue('BackSuggestion', $request->BackSuggestion, 60);
        Cookie::queue('BackColors', $request->BackColors, 60);
        Cookie::queue('PocketSuggestion', $request->PocketSuggestion, 60);
        Cookie::queue('PocketColors', $request->PocketColors, 60);
        Cookie::queue('SleevesSuggestion', $request->SleevesSuggestion, 60);
        Cookie::queue('SleevesColors', $request->SleevesColors, 60);
        Cookie::queue('PrintLocations', $str, 60);
        return redirect()->route('printTypeScreen');
     }
     public function setPrintTypeCookie(Request $request){
        $strFaqIds = implode(',', $request->faqIDs);
        $strAnswerIds = implode(',', $request->answers);
        Cookie::queue('FaqIds', $strFaqIds, 60);
        Cookie::queue('AnswerIds', $strAnswerIds, 60);
        Cookie::queue('printType', $request->print_type, 60);
        Cookie::queue('shippingOption',  $request->shippingOption, 60);
        Cookie::queue('bagAndTag',  $request->bagAndTag, 60);
        return redirect()->route('deliveryAddressScreen');

    }
    public function setAddressCookie(Request $request){
        Cookie::queue('savePreference', $request->savePreference, 60);
        Cookie::queue('addressName', $request->addressName, 60);
        Cookie::queue('firstName', $request->firstName, 60);
        Cookie::queue('lastName',  $request->lastName, 60);
        Cookie::queue('addressLine1',  $request->addressLine1, 60);
        Cookie::queue('addressLine2', $request->addressLine2, 60);
        Cookie::queue('city', $request->city, 60);
        Cookie::queue('state', $request->state, 60);
        Cookie::queue('zipCode',  $request->zipCode, 60);
        Cookie::queue('deliveryDate',  $request->deliveryDate, 60);
        return redirect()->route('cartScreen');
    }
    public function setCookie(Request $request){
        Cookie::queue('designID', $request->designID, 60);
        return redirect()->route('productScreen');
    }
}
