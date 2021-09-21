<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Utils\PreparePhone;
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
        if(Auth::guard('web')->attempt($request->only('phone','password'),$request->filled('remember'))){
            return redirect()
                ->route('home')
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
