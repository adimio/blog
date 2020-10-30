<?php


namespace App\Wheel\Email;


use http\Env\Request;
use Illuminate\Support\Facades\Mail;

class Email
{
    private $user_email;
    private $content;


    public function __construct($email)
    {
        $this->user_email = $email;
    }

    public function sendEmail(){//发邮件
        $info = '';
        $receive_email = '';
        Mail::send('',compact('info'),function ($message) use ($receive_email) {
            $to = $receive_email;
            $message->to($to)->subject();
        });
    }

    public function getFile(Request $request){

    }

}
