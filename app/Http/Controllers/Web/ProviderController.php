<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use Illuminate\Http\Request;

class ProviderController extends MasterController
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
    public function subscribePackagePage()
    {
        return view('Web.provider-receipt');
    }
}
