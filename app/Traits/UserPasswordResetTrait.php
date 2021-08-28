<?php

namespace App\Traits;

use App\Models\PasswordReset;
use Carbon\Carbon;

trait UserPasswordResetTrait
{
    protected function createPasswordResetCodeForUser($user)
    {
        $code=rand(1111,9999);
        $data = [
            'phone' => $user->phone,
            'token' => $code,
            'expires_at' => Carbon::now()->addMinutes(10),
        ];
        PasswordReset::create($data);
        $this->sendMessage('كود التفعيل الخاص بمقدمي الخدمات :'.$code,$user->phone);
        return $data;
    }
    private function sendMessage($message, $phoneNumber)
    {
        $getdata = http_build_query(
            $fields = array(
                "Username" => "0550085823",
                "Password" => "Aa12345678",
                "Message" => $message,
                "RecepientNumber" => $phoneNumber,
                "ReplacementList" => "",
                "SendDateTime" => "0",
                "EnableDR" => False,
                "Tagname" => "خدماتك",
                "VariableList" => "0"
            ));
        $opts = array('http' =>
            array(
                'method' => 'GET',
                'header' => 'Content-type: application/x-www-form-urlencoded',

            )
        );
        $context = stream_context_create($opts);
        $results = file_get_contents('http://api.yamamah.com/SendSMSV2?' . $getdata, false, $context);
        return $results;
    }

}
