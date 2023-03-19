<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class After_Send_Forgot_Password_Mail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password, $mail_subject)
    {
        $this->user = $user;
        $this->password = $password;
        $this->mail_subject = $mail_subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mail_subject)->view('mail.AfterSendForgotPasswordMail',['user' => $this->user, 'password' => $this->password]);
    }
}
