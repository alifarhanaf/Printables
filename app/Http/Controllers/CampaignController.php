<?php

namespace App\Http\Controllers;
use Auth;
use File;
use Cookie;
use App\User;
use Carbon\Carbon;
use Pusher\Pusher;
use App\Models\Faqs;
use App\Models\Images;
use App\Models\Designs;
use App\Models\Message;
use App\Events\TestEvent;
use App\Models\Addresses;
use App\Models\Campaigns;
use App\Models\Suggestions;
use Illuminate\Http\Request;
use App\Mail\ApproveDesignMail;
use App\Mail\CampaignApprovalMail;
use Illuminate\Support\Facades\DB;
use App\Mail\CampaignSubmissionMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageNotificationMail;
use App\Mail\UserToAdminNotification;
use App\Models\SuggestedDesignGroups;
use App\Http\Requests\CampaignSubmitRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DesignApprovalNotification;
use App\Notifications\CampaignSubmissionNotification;

class CampaignController extends Controller
{   
        
    
    public function setDraftCampaign(CampaignSubmitRequest $request)
    {
        // if($request->deliveryDate == null ){
        //     $date = now()->addDays(10);
        //     dd($date->date);
        // }
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
            $campaign->deliveryDate = date('Y-m-d H:i:s')->addDays(10); 
            // date('Y-m-d H:i:s')
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
        if($request->cookie('FrontSuggestion')){
            $suggestions->frontSuggestion = $request->cookie('FrontSuggestion');
        }
        if($request->cookie('BackSuggestion')){
            $suggestions->backSuggestion = $request->cookie('BackSuggestion');
        }
        if($request->cookie('PocketSuggestion')){
            $suggestions->pocketSuggestion = $request->cookie('PocketSuggestion');
        }
        if($request->cookie('SleevesSuggestion')){
            $suggestions->sleevesSuggestion = $request->cookie('SleevesSuggestion');
        }
        if($request->cookie('FrontColors')){
            $suggestions->frontColors = $request->cookie('FrontColors');
        }
        if($request->cookie('BackColors')){
            $suggestions->backColors = $request->cookie('BackColors');
        }
        if($request->cookie('PocketColors')){
            $suggestions->pocketColors = $request->cookie('PocketColors');
        }
        if($request->cookie('SleevesColors')){
            $suggestions->sleevesColors = $request->cookie('SleevesColors');
        }
        $suggestions->save();
        $campaign->suggestions()->sync($suggestions->id);
        $admins = User::where('id', 1)->first();
        Notification::send($admins, new CampaignSubmissionNotification($campaign));
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
        // dd($campaign->deliveryDate);
        $user = Auth::user();
        // $campaigns = Campaigns::where('id',$id)->get();
        $arr = [];
        
            // foreach($campaign->faqs as $faq){
            //     array_push($arr,$faq->id);
            // }
        // $faqs = Faqs::where('questions', 'LIKE', '%' . 'Estimated Quantity' . '%')->get();
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
        $activeCampaigns = $user->campaigns()->get();
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
        $campaign = Campaigns::find($campaignId);
        $message = $request->message;
        $data = new Message();
        $data->from = $from;
        $data->campaign_id = $campaignId;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();
        $user = User::where('id',$to)->first();
        $message = Message::where('id',$data->id)->first();
        $customer = User::where('id',$from)->first();
        if($from == '1'){
            Mail::to($user->email)->send(new MessageNotificationMail($user,$campaign));
        }else{
            Mail::to($user->email)->send(new UserToAdminNotification($user,$campaign,$customer));
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
        $data = array(
            "campaign"=> $campaign,
        );
        return view('admin.singleCampaign')->with($data);
    }
    public function campaignScreenAdmin2($id,$bid)
    {
        $user = User::find(1);
        // dd($user);
        $user->unreadNotifications()->where('id',$bid)->update(['read_at' => Carbon::now()]);
        // $notification = Notification();
        $campaign = Campaigns::where('id',$id)->first();
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
    public function testMessages(){
        // $details = [
        //     'greeting' => 'Hi Artisan',
        //     'body' => 'This is my first notification from ItSolutionStuff.com',
        //     'thanks' => 'Thank you for using ItSolutionStuff.com tuto!',
        //     'actionText' => 'View My Site',
        //     'actionURL' => url('/'),
        //     'order_id' => 101
        // ];
       
        $admins = User::where('id', 1)->first();
        Notification::send($admins, new CampaignSubmissionNotification($details));
  
        
  
        // Notification::send($user, new MyFirstNotification($details));
        
    }
    
    public function smallBigImages($id){
        $design = Designs::where('id',$id)->first();
        $data = array(
            "design"=>$design
        );
        return view('web.helpers.modalContent')->with($data)->render();
    }
    public function smallBigImagesSuggested($id){
        // $campaign = Campaigns::where('id',$id)->first();
        $designGroup = SuggestedDesignGroups::where('id',$id)->first();
        // dd($designGroup->campaigns);
        // $suggestedDesigns = $designGroups->suggested_images;
        $data = array(
            "designGroup" => $designGroup
        );
        return view('web.helpers.modalContentSuggested')->with($data)->render();
    }
    public function allSuggestedDesignGroups($id){
        $campaign = Campaigns::where('id',$id)->first();
        $suggestedDesigns = $campaign->suggested_design_groups;
        // dd($suggestedDesigns);
        $data = array(
            "suggestedDesigns" => $suggestedDesigns
        );
        return $data;
    }
    public function approveDesign($id,$bid) {
        // dd($bid);
        $designs = SuggestedDesignGroups::find($bid);
        $designs->approved_for = $id;
        $designs->save();
        $campaign = Campaigns::find($id);
        $campaign->status = 3;
        $campaign->save();
        $admin = User::find(1);
        $u = $campaign->users->first();
        $vid = $u->id;
        // dd($vid);
        $user = User::find($vid);
        // dd($user);
        $admins = User::where('id', 1)->first();
        Notification::send($admins, new DesignApprovalNotification($campaign));
        Mail::to($admin->email)->send(new ApproveDesignMail($user,$campaign));

        return redirect()->route('campaignScreen',$campaign->id);

    }
    public function testEmail2(){
        $campaigns = Campaigns::where('id',111154)->first();
        
        $admin = User::find(1);
        $u = $campaigns->users->first();
        $vid = $u->id;
        $user = User::find($vid);
        $data = array(
            "campaign" => $campaigns,
            "user" => $user,
          
        );
        // dd($campaigns->users[0]->email);
        // dd($customer);
        return view('web.emails.campaignApprovalMail')->with($data);
    }
    public function approveCampaign(Request $request,$id) 
    {
        // dd($request);
        $campaign = Campaigns::find($id);
        $campaign->price = $request->CampaignPrice;
        $campaign->status = 4;
        $campaign->save();
        
        $u = $campaign->users->first();
        
        $vid = $u->id;
        
        $user = User::find($vid);
        // dd($user);
        Mail::to($user->email)->send(new CampaignApprovalMail($user,$campaign));
        return redirect()->route('campaignScreenAdmin1',$campaign->id);
    }
    public function rushDelivery(Request $request , $id){
        // dd($request);
        $campaign = Campaigns::find($id);
        $campaign->deliveryDate = $request->deliveryDate ;
        $campaign->rush_delivery = $request->rushDelivery;
        $campaign->save();
        return redirect()->back();
    }
    public function editAddress(Request $request, $id){
        // dd($request);
        $address = Addresses::find($id);
        $address->addressName = $request->addressName;
        $address->firstName = $request->firstName;
        $address->lastName = $request->lastName;
        $address->addressLine1 = $request->addressLine1;
        $address->addressLine2 = $request->addressLine2;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zipCode = $request->zipCode;
        $address->save();
        return redirect()->back();
        
    }
    
}
