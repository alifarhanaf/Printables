<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserToAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    private $sender;
    public function __construct(User $user)
    {
        $this->user = $user;
        // $this->sender = $usertwo;
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
            // "sender" => $this->sender
        );
        return $this->from($this->user->email, 'User')->subject(' New Message from User')->view('web.emails.userNotificationMail')->with($data);
    
    }
}
