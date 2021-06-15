<?php

namespace App\Http\Resources;

use App\Models\Social;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ProviderLoginResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $token = auth('api')->login(User::find($this->id));
        User::find($this->id)->update([
            'device' => [
                'id' => $request['device.id'],
                'os' => $request['device.os'],
            ],
            'last_login_at' => Carbon::now(),
            'last_ip' => $request->ip(),
        ]);
        return [
            "user" => [
                'id' => (int)$this->id,
                'rating' => (double)$this->averageRate(),
                'type' => $this->type,
                'name' => $this->name,
                'phone' => $this->phone ?? "",
                'city' => new DropDownResource($this->city),
                'nationality' => $this->nationality,
                'socials'=>[
                    'facebook'=>Social::where('user_id',$this->id)->value('facebook')??"",
                    'twitter'=>Social::where('user_id',$this->id)->value('twitter')??"",
                    'insta'=>Social::where('user_id',$this->id)->value('insta')??"",
                    'snap'=>Social::where('user_id',$this->id)->value('snap')??"",
                ],
                'image' => $this->image,
            ],
            "access_token" => [
                'token' => $token,
                'token_type' => 'Bearer',
            ],

        ];
    }
}
