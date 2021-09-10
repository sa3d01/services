<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends MasterController
{
    public function langChange(Request $request)
    {
        App::setLocale($request['lang']);
        session()->put('locale', $request['lang']);
        return redirect()->back();
    }
}
