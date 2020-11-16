<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DesignSuggestionMail extends Mailable
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
            "campaign"=> $this->campaign
        );
        return $this->from($this->sender, 'Geneologie')->subject('New Design Suggestion')->view('web.emails.mail')->with($data);
    }
}
