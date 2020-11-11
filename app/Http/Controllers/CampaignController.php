<?php

namespace App\Http\Controllers;
use Auth;
use File;
use Cookie;
use App\User;
use Pusher\Pusher;
use App\Models\Faqs;
use App\Models\Images;
use App\Models\Message;
use App\Events\TestEvent;
use App\Models\Addresses;
use App\Models\Campaigns;
use App\Models\Suggestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\CampaignSubmissionMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageNotificationMail;
use App\Mail\UserToAdminNotification;
use App\Http\Requests\CampaignSubmitRequest;

class CampaignController extends Controller
{   
        
    
    public function setDraftCampaign(CampaignSubmitRequest $request)
    {
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
        if($request->deliveryDate != null ){
        $deliveryDate = $request->deliveryDate;
        $campaign->deliveryDate = $deliveryDate;
        }else{
            $campaign->deliveryDate = date('Y-m-d H:i:s');
        }
        
        $campaign->status = 1;
        $campaign->save();
        if($request->cookie('imageName0')){
            $imageName0 = $request->cookie('imageName0');
	        $oldpath = public_path().'/storage/garbage/'.$imageName0;
            $newpath = public_path(). '/storage/CampaignImages/';
            $pathsave =  '/storage/CampaignImages/';
            $imageurl = $pathsave.$imageName0;
            File::move($oldpath,$newpath.$imageName0 );
            $image = new Images();
            $image->url =$imageurl;
            $image->save();
            $campaign->images()->attach($image->id);
            Cookie::queue('imageName0', '', -1);
            
        };
        if($request->cookie('imageName1')){
            $imageName1 = $request->cookie('imageName1');
            $oldpath = public_path().'/storage/garbage/'.$imageName1;
            $newpath = public_path() . '/storage/CampaignImages/';
            $pathsave =  '/storage/CampaignImages/';
            $imageurl = $pathsave.$imageName1;
            File::move($oldpath,$newpath.$imageName1 );
            $image = new Images();
            $image->url =$imageurl;
            $image->save();
            $campaign->images()->attach($image->id);
            Cookie::queue('imageName1', '', -1);
        };
        if($request->cookie('imageName2')){
            $imageName2 = $request->cookie('imageName2');
            $oldpath = public_path().'/storage/garbage/'.$imageName2;
            $newpath = public_path() . '/storage/CampaignImages/';
            $pathsave =  '/storage/CampaignImages/';
            $imageurl = $pathsave.$imageName2;
            File::move($oldpath,$newpath.$imageName2 );
            $image = new Images();
            $image->url =$imageurl;
            $image->save();
            $campaign->images()->attach($image->id);
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
        Mail::to($user->email)->send(new CampaignSubmissionMail($user,$campaign));
        Cookie::queue('campaignName', '', -1);
        Cookie::queue('designID', '', -1);
        Cookie::queue('productID', '', -1);
        Cookie::queue('AnswerIds', '', -1);
        Cookie::queue('FaqIds', '', -1);
        Cookie::queue('PrintLocations', '', -1);     
        Cookie::queue('SelectColors', '', -1);
        Cookie::queue('bagAndTag', '', -1);
        Cookie::queue('color', '', -1);   
        Cookie::queue('printType', '', -1);
        Cookie::queue('shippingOption', '', -1);
        Cookie::queue('suggestions', '', -1);
        Cookie::queue('FrontSuggestion', '', -1);
        Cookie::queue('BackSuggestion', '', -1);
        Cookie::queue('PocketSuggestion', '', -1);
        Cookie::queue('SleevesSuggestion', '', -1);
        Cookie::queue('FrontColors', '', -1);
        Cookie::queue('BackColors', '', -1);
        Cookie::queue('PocketColors', '', -1);    
        Cookie::queue('SleevesColors', '', -1);
        DB::commit();
        return redirect()->route('allCampaigns');
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex->getMessage());
            return redirect()->route('deliveryAddressScreen');
        }
    }
    public function campaignScreen($id)
    {
        $campaign = Campaigns::where('id',$id)->first();
        $user = Auth::user();
        // $campaigns = Campaigns::where('id',$id)->get();
        $arr = [];
        
            foreach($campaign->faqs as $faq){
                array_push($arr,$faq->id);
            }
        $faqs = Faqs::where('questions', 'LIKE', '%' . 'Estimated Quantity' . '%')->get();
        $my_id = Auth::id();
        $user_id = 1;
        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();
        $data = array(
            "campaign"=> $campaign,
            "messages" =>$messages,
        );
        return view('web.campaignScreen')->with($data);
    }
    public function allCampaigns(){
        $user =  Auth::user();
        $closedCampaigns = $user->campaigns()->where('status',5)->get();
        $activeCampaigns = $user->campaigns()->where('status',1)->get();
        $data = array(
            "closedCampaigns"=> $closedCampaigns,
            "activeCampaigns"=>$activeCampaigns
        );
        return view('web.allCampaigns')->with($data);
    }
    public function allCampaignsAdmin()
    {
        $campaigns = Campaigns::all();
        $data = array(
            "campaigns"=> $campaigns,
        );
        return view('admin.campaignsGrid')->with($data);
    }
    public function setForApprovalCampaigns()
    {
        $campaigns = Campaigns::where('status','1')->get();
        $data = array(
            "campaigns"=> $campaigns,
        );
        return view('admin.pendingApprovalCampaigns')->with($data);
    }
    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $campaignId= $request->campaign_id;
        $message = $request->message;
        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();
        $user = User::where('id',$to)->first();
        $message = Message::where('id',$data->id)->first();
        $customer = User::where('id',$from)->first();
        if($from == '1'){
            Mail::to($user->email)->send(new MessageNotificationMail($user,$message));
        }else{
            Mail::to($user->email)->send(new UserToAdminNotification($user,$message,$customer));
        }
        $pusher = new Pusher("629eecc55450630967da", "629f709434b064e55202", "1102594", array('cluster' => 'ap2'));
        $data = ['from' => $from, 'to' => intval($to)];
        $response = $pusher->trigger('my-channel', 'my-event', $data);
        
    }
    public function campaignScreenAdmin($id)
    {
        $campaign = Campaigns::where('id',$id)->first();
        $arr = [];
        
            foreach($campaign->faqs as $faq){
                array_push($arr,$faq->id);
            }
        
        $faqs = Faqs::where('questions', 'LIKE', '%' . 'Estimated Quantity' . '%')->get();
        $data = array(
            "campaign"=> $campaign,
        );
        return view('admin.campaignScreen')->with($data);
    }
    public function campaignScreenAdmin1($id)
    {
        $campaign = Campaigns::where('id',$id)->first();
        $arr = [];
        
            foreach($campaign->faqs as $faq){
                array_push($arr,$faq->id);
            }
        
        $faqs = Faqs::where('questions', 'LIKE', '%' . 'Estimated Quantity' . '%')->get();
        $data = array(
            "campaign"=> $campaign,
        );
        return view('admin.singleCampaign')->with($data);
    }
    public function getMessages($id)
    {
        $my_id = Auth::id();
        $user_id = $id;
        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);
        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();
        $data = array(
            "messages" =>$messages,
        );
        return view('web.helpers.messages')->with($data);
    }
    // public function testEmail(){
    //     $campaigns = Campaigns::where('id',111113)->get();
    //     $user = Auth::user();
    //     $data = array(
    //         "campaign" => $campaigns[0],
    //         "user" => $user,
    //     );
    //     return view('web.emails.userRegisterMail')->with($data);
    // }
    
}
