<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('Web.index');
    }

    public function home()
    {
        return view('Web.home');
    }
}
