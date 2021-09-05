<?php

namespace App\Traits;

use App\Models\PhoneVerificationCode;
use App\Models\Setting;
use Carbon\Carbon;

trait UserPhoneVerificationTrait
{

    protected function createPhoneVerificationCodeForUser($user)
    {
        $code=2021;//rand(1111,9999);
        $data = [
            'user_id' => $user->id,
            'phone' => $user->phone,
            'code' => $code,
            'expires_at' => Carbon::now()->addMinutes(15),
        ];
        PhoneVerificationCode::create($data);
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
