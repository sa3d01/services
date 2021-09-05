<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use Illuminate\Http\Request;

class UserController extends MasterController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        return view('Web.user-editprofile');
    }
}
