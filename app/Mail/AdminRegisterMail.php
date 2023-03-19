<?php

namespace App\Mail;

use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminRegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $admin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admin)
    {
        $this->admin = $admin;
    }
    // public function __construct($mail_subject, $password, Admin $admin)
    // {
    //     $this->admin = $admin;
    //     $this->password = $password;
    //     $this->mail_subject =$mail_subject;


    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->admin)->view('mail.admin')->subject('registered Successful');
    }
    // public function build()
    // {
    //     return $this->subject($this->mail_subject)->view('mail.admin', ['admin' => $this->admin, 'password' => $this->password]);
    // }
}
