<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\MasterController;
use App\Http\Requests\Api\Auth\UserRegisterationRequest;
use App\Models\Social;
use App\Models\User;
use App\Traits\UserPhoneVerificationTrait;
use Spatie\Permission\Models\Role;

class RegisterController extends MasterController
{
    use UserPhoneVerificationTrait;

    public function register(UserRegisterationRequest $request): object
    {
        $data = $request->validated();
        $data['last_ip'] = $request->ip();
        $user = User::create($data);
        $data['user_id'] = $user->id;
        Social::create($data);
        $user->refresh();
        $role = Role::findOrCreate($user->type);
        $user->assignRole($role);
        $this->createPhoneVerificationCodeForUser($user);
        return $this->sendResponse([
            "phone" => $request["phone"]
        ]);
    }
}
