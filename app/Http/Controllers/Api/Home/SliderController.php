<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Api\MasterController;
use App\Models\Slider;
use Carbon\Carbon;

class SliderController extends MasterController
{
    protected $model;

    public function __construct(Slider $model)
    {
        $this->model = $model;
        parent::__construct();
    }
    public function index(){
        $data=Slider::all()->filter(function($slider) {
            $start_date=Carbon::parse($slider->start_date);
            $end_date=Carbon::parse($slider->end_date);
            if (Carbon::now()->between($start_date, $end_date)) {
                return $slider;
            }
        });
        $results=[];
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
            $results[]=$result;
        }
        return $this->sendResponse($results);
    }
}
