<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\Social;
use App\Models\User;
use App\Traits\UserPhoneVerificationTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->validator($request);
        $data=$request->all();
        $data['last_ip'] = $request->ip();
        if ($request['type']=='user'){
            $data['type']='USER';
        }else{
            $data['type']='PROVIDER';
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
                ->route('activate',['user'=>auth()->user()]);
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

    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function registerFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['يوجد مشاكل بالبيانات المدخلة .. من فضلك حاول ثانية']);
    }

    public function showActivationPage()
    {
        $user=\request()->input('user');
        return view('Web.auth.signupActivation',compact('user'));
    }

}
