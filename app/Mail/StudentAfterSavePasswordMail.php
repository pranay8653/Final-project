<?php

namespace App\Mail;

use App\Models\student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentAfterSavePasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mail_subject,$password,student $student)
    {
        $this->mail_subject = $mail_subject;
        $this->password = $password;
        $this->student = $student;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mail_subject)->view('mail.StudentAfterSavePasswordMail',['student' =>$this->student,'password' =>$this->password]);
    }
}
