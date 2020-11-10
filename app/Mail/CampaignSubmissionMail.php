<?php

namespace App\Mail;

use App\User;
use App\Models\Campaigns;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CampaignSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $campaign;
    private $sender = 'admin@geneologie.com';
    public function __construct(User $user,Campaigns $campaign)
    {
        $this->user = $user;
        $this->campaign = $campaign;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($vendor);
        $data = array(
            "user"=> $this->user,
            "campaign"=> $this->campaign
        );
        return $this->from($this->sender, 'Geneologie')->subject(' New Campaign Submission Notification')->view('web.emails.mail')->with($data);
    }
}
