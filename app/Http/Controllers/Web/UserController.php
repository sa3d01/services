<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends MasterController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
    public function profile()
    {
        return view('Web.user-editprofile');
    }
    public function search(){

        $providers=User::where(['type'=>'PROVIDER','banned'=>0]);
        if (\request()->has('input_search')){
            $providers=$providers->where('name','LIKE','%'.\request()->input('input_search').'%');
        }
        if (\request()->has('city_id')){
            $providers=$providers->where('city_id',\request()->input('city_id'));
        }
        $providers=$providers->paginate(10);
        return view('Web.user-search',compact('providers'));
    }
}
