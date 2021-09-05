<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\ContactType;
use Illuminate\Support\Facades\App;

class HomeController extends MasterController
{
    public function index()
    {
        return view('Web.index');
    }

    public function home()
    {
        $contact_types=ContactType::where('status',1)->get();
        return view('Web.home',compact('contact_types'));
    }
    public function siteRatio()
    {
        return view('Web.user-siteRatio');
    }
    public function terms()
    {
        $local=session()->get('locale');
        if($local!='ar' && $local!='en'){
            $local='ar';
        }
        $local_title='title_'.$local;
        $local_note='note_'.$local;
        $title=Page::where(['type'=>'terms','for'=>'user'])->value($local_title);
        $note=Page::where(['type'=>'terms','for'=>'user'])->value($local_note);
        if(auth()->check()){
            if(auth()->user()->type=='PROVIDER'){
                $title=Page::where(['type'=>'terms','for'=>'provider'])->value($local_title);
                $note=Page::where(['type'=>'terms','for'=>'provider'])->value($local_note);
            }
        }
        return view('Web.user-terms',compact('title','note'));
    }
    public function licence()
    {
        $local=session()->get('locale');
        if($local!='ar' && $local!='en'){
            $local='ar';
        }
        $local_title='title_'.$local;
        $local_note='note_'.$local;

        $title=Page::where(['type'=>'licence','for'=>'user'])->value($local_title);
        $note=Page::where(['type'=>'licence','for'=>'user'])->value($local_note);
        if(auth()->check()){
            if(auth()->user()->type=='PROVIDER'){
                $title=Page::where(['type'=>'licence','for'=>'provider'])->value($local_title);
                $note=Page::where(['type'=>'licence','for'=>'provider'])->value($local_note);
            }
        }
        return view('Web.user-policy',compact('title','note'));
    }
}
