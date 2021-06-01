<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Api\MasterController;
use App\Models\Page;

class PageController extends MasterController
{
    protected $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function getPage($user_type,$type)
    {
        $page=Page::where(['type'=>$type,'for'=>$user_type])->first();
        if (!$page)
            return $this->sendError('توجد مشكلة بالبيانات');
        $title['ar']=$page->title_ar;
        $title['en']=$page->title_en;
        $result['title']=$title;
        $note['ar']=$page->note_ar;
        $note['en']=$page->note_en;
        $result['note']=$note;
        return $this->sendResponse($result);
    }
}
