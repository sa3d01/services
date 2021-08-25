<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\MasterController;
use App\Http\Requests\Api\Auth\PasswordUpdateRequest;
use App\Http\Requests\Api\Auth\ProfileUpdateRequest;
use App\Http\Requests\Api\UploadImageRequest;
use App\Http\Resources\ProviderLoginResourse;
use App\Http\Resources\UserLoginResourse;
use App\Models\Social;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SettingController extends MasterController
{
    public function updateProfile(ProfileUpdateRequest $request): object
    {
        $user = auth('api')->user();
        $data=$request->validated();
        $data['last_ip'] = $request->ip();
        $user->update($data);
        if ($user->type=='PROVIDER'){
            $social=Social::where('user_id',$user->id)->first();
            if (!$social){
                $social=Social::create(['user_id'=>$user->id]);
            }
            $social->update($data);
            return $this->sendResponse(new ProviderLoginResourse($user));
        }
        return $this->sendResponse(new UserLoginResourse($user));
    }

    public function updatePassword(PasswordUpdateRequest $request): object
    {
        $user = auth('api')->user();
        if (Hash::check($request['old_password'], $user->password)) {
            $user->update([
                'password' => $request['new_password'],
            ]);
            if ($user['type']!='USER'){
                return $this->sendResponse(new ProviderLoginResourse($user));
            }else{
                return $this->sendResponse(new UserLoginResourse($user));
            }
        }
        return $this->sendError('كلمة المرور غير صحيحة.');
    }

    public function updateAvatar(UploadImageRequest $request):object
    {
        $user = auth('api')->user();
        $user->update([
            'image'=>$request->file('image')
        ]);
        return $this->sendResponse([
            "image" => $user->image
        ]);
    }
}
