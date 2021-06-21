<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index($locale='ar')
    {
        App::setLocale($locale);
        return view('Web.index');
    }
}
