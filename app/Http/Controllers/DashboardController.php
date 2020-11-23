<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Message;
use App\Models\Campaigns;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request){
        if ($request->has('datefilter')) {

            // dd($request->input('datefilter'));
            $strings = explode('- ',$request->input('datefilter'));
            $start_date = date('Y-m-d h:i:s',strtotime($strings[0]));
            $end_date = date('Y-m-d h:i:s',strtotime($strings[1]));
            $user_count = User::whereBetween('created_at', [$start_date, $end_date])->count();
            $campaigns_count = Campaigns::whereBetween('created_at', [$start_date, $end_date])->count();
            $completed_campaigns = Campaigns::where('status',4)->whereBetween('created_at', [$start_date, $end_date])->count();
            $pending_campaigns = Campaigns::where('status','!=',4)->whereBetween('created_at', [$start_date, $end_date])->count();
            $admin_id = 1;
            $messages = Message::where(function ($query) use ($admin_id) {
                $query->where('to', $admin_id)->where('is_read',0);
            })->get();
            $array = [];
            foreach($messages as $message){
                $campaign = Campaigns::where('id',$message->campaign_id)->first();
                $user = User::where('id',$message->from)->first();
                $data = array(
                    "messageID" =>  $message->id,
                    "message" => $message->message,
                    "campaignName" => $campaign->name,
                    "campaignId" => $campaign->id,
                    "from" => $user->name,
                    "created_at" => $message->created_at
                );
                array_push($array,$data);
            }
            $messages_count = count($messages);
            $notifications= auth()->user()->unreadnotifications;


            $data = array(
                "userCount" => $user_count,
                "campaignCount" => $campaigns_count,
                "completedCampaigns"=> $completed_campaigns,
                "pendingCampaigns"=> $pending_campaigns,
                "messageCount"=>$messages_count,
                "messages"=>$array,
                "notifications"=>$notifications,

            );
            return view('admin.dashboard')->with($data);
        }
        $user_count = User::count();
        $campaigns_count = Campaigns::count();
        $completed_campaigns = Campaigns::where('status',4)->count();
        $pending_campaigns = Campaigns::where('status','!=',4)->count();
        $admin_id = 1;
        $messages = Message::where(function ($query) use ($admin_id) {
            $query->where('to', $admin_id)->where('is_read',0);
        })->get();
        $array = [];
        foreach($messages as $message){
            $campaign = Campaigns::where('id',$message->campaign_id)->first();
            $user = User::where('id',$message->from)->first();
            if($campaign){
                $campaignName =$campaign->name;
                $campaignId = $campaign->id;
            }else{
                $campaignName = '';
                $campaignId= '';
            }
            
            $data = array(
                "messageID" =>  $message->id,
                "message" => $message->message,
                
                "campaignName" => $campaignName,
                
                "campaignId" => $campaignId,
                "from" => $user->name,
                "created_at" => $message->created_at
            );
            array_push($array,$data);
        }
        $messages_count = count($messages);
        $notifications= auth()->user()->unreadnotifications;
        // dd($notifications);
        $data = array(
            "userCount" => $user_count,
            "campaignCount" => $campaigns_count,
            "completedCampaigns"=> $completed_campaigns,
            "pendingCampaigns"=> $pending_campaigns,
            "messageCount"=>$messages_count,
            "messages"=>$array,
            "notifications"=>$notifications,
        );
        return view('admin.dashboard')->with($data);
    }
    public function indexa(){
        return view('home');
    }
}
