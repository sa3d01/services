<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Dashboard\SliderStoreRequest;
use App\Models\Package;
use App\Models\Slider;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends MasterController
{
    public function __construct(Social $model)
    {
        $this->model = $model;
//        $this->middleware('permission:packages');
        parent::__construct();
    }

    public function index()
    {
        $socials=Social::where('user_id',null)->first();
        if (!$socials){
            Social::create();
        }
        return view('Dashboard.social.index',compact('socials'));
    }


    public function editLink($name):object
    {
        $row=Social::where('user_id',null)->first();
        return view('Dashboard.social.edit', compact('row','name'));
    }
    public function updateLink($name,Request $request)
    {
        $row=Social::where('user_id',null)->first();
        $row->update([
            $name=>$request['link']
        ]);
        return redirect()->back()->with('updated');

    }



}
