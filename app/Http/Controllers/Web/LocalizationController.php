<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function langChange(Request $request)
    {
        App::setLocale($request['lang']);
        session()->put('locale', $request['lang']);
        return view('Web.index');
    }
}
