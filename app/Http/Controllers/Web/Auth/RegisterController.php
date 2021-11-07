<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProviderLoginResourse;
use App\Http\Resources\UserLoginResourse;
use App\Models\PhoneVerificationCode;
use App\Models\Social;
use App\Models\User;
use App\Traits\UserPhoneVerificationTrait;
use App\Utils\PreparePhone;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    use UserPhoneVerificationTrait;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    use AuthenticatesUsers;

    public function showRegisterForm($type)
    {
        return view('Web.auth.signup',compact('type'));
    }

    public function RegisterSubmit(Request $request)
    {
        if ($request->has('phone')) {
            $phone = new PreparePhone($request->phone);
            if (!$phone->isValid()) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors([$phone->errorMsg()]);
            }
            $request->merge(['phone' => $phone->getNormalized()]);
        }
        $this->validator($request);
        $data=$request->all();
        $data['last_ip'] = $request->ip();
        if ($request['type']=='user'){
            $data['type']='USER';
        }else{
            $data['type']='PROVIDER';
        }
        if ($request['lat'])
        {
            $data['location']=[
                'lat'=>$request['lat'],
                'lng'=>$request['lng'],
            ];
        }
        $user = User::create($data);
        $data['user_id'] = $user->id;
        Social::create($data);
        $user->refresh();
        $role = Role::findOrCreate($user->type);
        $user->assignRole($role);
        $this->createPhoneVerificationCodeForUser($user);
        if(Auth::guard($request['type'])->attempt($request->only('phone','password'),$request->filled('remember'))){
            return redirect()
                ->route('activate',['phone'=>$request['phone']]);
        }
        return $this->registerFailed();
    }

    private function validator(Request $request)
    {
        if ($request->type=='user'){
            $rules = [
                'name' => 'required|string|min:4|max:255',
                'phone' => 'required|string|max:90|unique:users',
                'password' => 'required|string|min:6|max:15',
                'city_id' => 'required|numeric|exists:drop_downs,id',
            ];
        }else{
            $rules = [
                'name' => 'required|string|min:4|max:255',
                'phone' => 'required|string|max:90|unique:users',
                'password' => 'required|string|min:6|max:15',
                'nationality' => 'nullable|string|max:100',
                'city_id' => 'required|numeric|exists:drop_downs,id',
                'facebook' => 'nullable',
                'twitter' => 'nullable',
                'insta' => 'nullable',
                'snap' => 'nullable',
                'marketer_id' => 'nullable',
            ];
        }

        $request->validate($rules);
    }

    private function registerFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['يوجد مشاكل بالبيانات المدخلة .. من فضلك حاول ثانية']);
    }

    public function showActivationPage()
    {
        $phone=\request()->input('phone');
        return view('Web.auth.signupActivation',compact('phone'));
    }

    public function ActivationSubmit(Request $request)
    {
        $user = User::where('phone', $request['phone'])->first();
        $code = $request->number_4.$request->number_3.$request->number_2.$request->number_1;
        if ($user->phone_verified_at != null) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['هذا الحساب مفعل.']);
        }
        $verificationCode = PhoneVerificationCode::where([
            'phone' => $request['phone'],
            'code' => $code,
        ])->latest()->first();
        if (!$verificationCode) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['كود التفعيل غير صحيح! حاول مرة أخرى.']);
        }
        if (Carbon::now()->gt(Carbon::parse($verificationCode->expires_at))) {
            return $this->sendError('Code expired. ');
        }
        DB::transaction(function () use ($user, $verificationCode) {
            $now = Carbon::now();
            $verificationCode->update(['verified_at' => $now]);
            $user->update(['phone_verified_at' => $now]);
        });
        if ($user['type'] != 'USER') {
            return redirect()
                ->route('home')
                ->with('status','يرجى انتظار موافقة إدارة التطبيق.');
        } else {
            Auth::login($user);
            return redirect()
                ->route('home')
                ->with('status','You are Logged in!');
        }
    }

}
