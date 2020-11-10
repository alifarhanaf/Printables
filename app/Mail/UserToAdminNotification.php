<?php

namespace App\Mail;

use App\User;
use App\Models\Message;
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
    public $string;
    public $customer;
    public function __construct(User $user,Message $message,User $customer)
    {
        $this->user = $user;
        $this->string = $message;
        $this->customer = $customer;
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
            "string"=>$this->string,
            "customer"=>$this->customer,
            // "sender" => $this->sender
        );
        return $this->from($this->user->email, 'User')->subject(' New Message from User')->view('web.emails.userNotificationMail')->with($data);
    
    }
}
