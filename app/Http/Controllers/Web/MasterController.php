<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Social;
use App\Models\Page;

abstract class MasterController extends Controller
{

    public function __construct()
    {
        $local=session()->get('locale');
        if($local!='ar' && $local!='en'){
            $local='ar';
        }
        $about=Page::where('type','about')->first();
        view()->share(array(
            'about_title'=>$about['title_'.$local],
            'about_note'=>$about['note_'.$local],
            'local'=>$local,
            'local_title'=>'title_'.$local,
            'local_note'=>'note_'.$local,
            'setting'=>Setting::first(),
            'facebook'=>Social::where('user_id', null)->value('facebook') ?? "#",
            'twitter'=>Social::where('user_id', null)->value('twitter') ?? "#",
            'insta'=>Social::where('user_id', null)->value('insta') ?? "#",
            'snap'=>Social::where('user_id', null)->value('snap') ?? "#",
           ));
    }

}
