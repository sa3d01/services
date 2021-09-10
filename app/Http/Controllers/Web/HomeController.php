<?php

namespace App\Http\Controllers\Web;

use App\Models\Page;
use App\Models\Slider;
use App\Models\ContactType;
use Carbon\Carbon;

class HomeController extends MasterController
{
    public function index()
    {
        return view('Web.index');
    }

    public function home()
    {
        $data=Slider::all()->filter(function($slider) {
            $start_date=Carbon::parse($slider->start_date);
            $end_date=Carbon::parse($slider->end_date);
            if (Carbon::now()->between($start_date, $end_date)) {
                return $slider;
            }
        });
        $sliders=[];
        foreach ($data as $datum){
            $result['id']=$datum->id;
            if (request()->header('lang')=='ar'){
                $result['title']=$datum->title_ar;
                $result['note']=$datum->note_ar;
            }else{
                $result['title']=$datum->title_en;
                $result['note']=$datum->note_en;
            }
            $result['image']=$datum->image;
            $sliders[]=$result;
        }

        $contact_types=ContactType::where('status',1)->get();
        return view('Web.home',compact('contact_types','sliders'));
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
