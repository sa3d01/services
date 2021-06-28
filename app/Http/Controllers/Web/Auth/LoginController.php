<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    use AuthenticatesUsers;

    public function showLoginForm($type)
    {
        return view('Web.auth.login',compact('type'));
    }



    public function login(Request $request)
    {
        $this->validator($request);
        if(Auth::guard($request['type'])->attempt($request->only('phone','password'),$request->filled('remember'))){
            return redirect()
                ->intended(route('home'))
                ->with('status','You are Logged in!');
        }
        return $this->loginFailed();
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()
            ->route('index')
            ->with('status','has been logged out!');
    }

    private function validator(Request $request)
    {
        $rules = [
            'phone'    => 'required|exists:users|min:5|max:191',
            'password' => 'required|string|min:6|max:255',
        ];
        $request->validate($rules);
    }

    /**
     * Redirect back after a failed login.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function loginFailed()
    {
        return redirect()
            ->back()
            ->withInput()
            ->withErrors(['يوجد مشاكل بالبيانات المدخلة .. من فضلك حاول ثانية']);
    }
}
