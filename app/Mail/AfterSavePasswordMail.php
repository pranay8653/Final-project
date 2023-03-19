<?php

namespace App\Mail;

use App\Models\student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class AfterSavePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct( $mail_subject, $password, student $student )
    {
        $this->student = $student;
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
        return $this->subject($this->mail_subject)->view('mail.AfterSavePasswordMail', ['student' => $this->student, 'password' =>$this->password]);
    }
}
