<?php

namespace App\Http\Controllers;
use Auth;
use File;
use Cookie;
use Pusher\Pusher;
use App\Models\Faqs;
use App\Models\Images;
use App\Models\Message;
use App\Models\Addresses;
use App\Models\Campaigns;
use App\Models\Suggestions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CampaignSubmitRequest;

class CampaignController extends Controller
{
    
        public function setDraftCampaign(CampaignSubmitRequest $request){
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
            // $garbagepath = "'storage'garbage";
            // $oldpath=str_replace("'",'',public_path().addslashes($garbagepath).addslashes("'".$imageName0));
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
            // $garbagepath = "'storage'garbage";
            // $oldpath=str_replace("'",'',public_path().addslashes($garbagepath).addslashes("'".$imageName1));
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
            // $garbagepath = "'storage'garbage";
            // $oldpath=str_replace("'",'',public_path().addslashes($garbagepath).addslashes("'".$imageName2));
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
            "campaigns"=> $campaigns,
            "messages" =>$messages,
        );
        return view('web.campaignScreen')->with($data);
    }
    public function allCampaigns(){
        $user =  Auth::user();
        $closedCampaigns = $user->campaigns()->where('status',5)->get();
        $activeCampaigns = $user->campaigns()->where('status',1)->get();
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
    public function allCampaignsAdmin(){
        
        $campaigns = Campaigns::all();
        $data = array(
            "campaigns"=> $campaigns,
        );
        return view('admin.campaignsGrid')->with($data);
    }
    public function setForApprovalCampaigns(){
        
        $campaigns = Campaigns::where('status','1')->get();
        $data = array(
            "campaigns"=> $campaigns,
        );
        return view('admin.pendingApprovalCampaigns')->with($data);
    }
    public function campaignScreenAdmin1($id){
        $campaigns = Campaigns::where('id',$id)->get();
        // $arr = [];
        // foreach($campaigns as $campaign){
        //     foreach($campaign->faqs as $faq){
        //         array_push($arr,$faq->id);
        //     }
        // }
        
        // $faqs = Faqs::where('questions', 'LIKE', '%' . 'Estimated Quantity' . '%')->get();
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
    // public function getMessage()
    // {
    //     $my_id = Auth::id();
    //     $user_id = 1;

    //     // Make read all unread message
    //     Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

    //     // Get all message from selected user
    //     $messages = Message::where(function ($query) use ($user_id, $my_id) {
    //         $query->where('from', $user_id)->where('to', $my_id);
    //     })->oRwhere(function ($query) use ($user_id, $my_id) {
    //         $query->where('from', $my_id)->where('to', $user_id);
    //     })->get();

    //     return view('messages.index', ['messages' => $messages]);
    // }
    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();
        dd($data->id);

        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }
    public function campaignScreenAdmin($id){
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
        $my_id = Auth::id();
        $user_id = 2;

        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();
        // dd($messages);
        $data = array(
            "campaigns"=> $campaigns,
            "messages" =>$messages,
        );
        return view('admin.campaignScreen')->with($data);
    }

    
}
