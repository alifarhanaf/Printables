<?php

namespace App\Mail;

use App\User;
use App\Models\Message;
use App\Models\Campaigns;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MessageNotificationMail extends Mailable
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
        $data = array(
            "user"=> $this->user,
            "campaign"=>$this->campaign
        );
        return $this->from($this->sender, 'Geneologie')->subject(' New Message from Admin')->view('web.emails.adminNotificationMail')->with($data);
    
    }
}
