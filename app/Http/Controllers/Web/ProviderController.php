<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Models\Package;
use App\Models\PackageUser;
use App\Models\Rate;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends MasterController
{
    public function __construct()
    {
      //  $this->middleware('auth');
        parent::__construct();
    }
    public function profile()
    {
        return view('Web.auth.provider-editprofile');
    }
    public function updateProfile($id,Request $request)
    {
        $provider=User::find($id);
        $provider->update($request->all());
        $social=Social::where('user_id',$id)->first();
        if (!$social){
            $social=Social::create(['user_id'=>$id]);
        }
        $social->update($request->all());
        return redirect()->back();
    }
    public function show($id)
    {
        $provider=User::find($id);
        return view('Web.user-providerProfile',compact('provider'));
    }
    public function rateStore(Request $request)
    {
        Rate::create($request->all());
        return redirect()->back();
    }
    public function subscribePackagePage($id)
    {
        return view('Web.provider-receipt',compact('id'));
    }
    public function subscribePackage(Request $request)
    {
        $data = $request->except('image');
        $package=Package::find($request['package_id']);
        $data['amount']=$package->price;
        $data['user_id'] = auth()->id();
        $package_user=PackageUser::create($data);
        $package_user->update([
            'image'=>$request['image']
        ]);
        return redirect()->back()->with('status','يرجي انتظار مراجعة الادارة لبياناتك');
    }
}
