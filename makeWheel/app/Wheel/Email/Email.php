<?php


namespace App\Wheel\Email;


use http\Env\Request;
use Illuminate\Support\Facades\Mail;

class Email
{

     /**
     * @param string $receive_address 收件地址
     * @param string $email_title 邮件主题
     * @param mixed|object|array $email_receiver 收件人【相关信息】
     * @param mixed|array $view_info 模板页面信息
     * @param string  $annex 附件[file路径]
     * @param string $annex_name
     */
    public static function sendEmail( $receive_address,$email_title,$email_receiver,$view_info,$annex){
        Mail::send('',compact('view_info','email_receiver'),function ($message)
        use ($receive_address,$email_title,$annex) {

            //$file = storage_path();
            $message->to($receive_address)->subject($email_title);
        });

        if(count(Mail::failures()) < 1){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }

    /**
     * Email constructor.
     */
    public function __construct()
    {
    }


}
