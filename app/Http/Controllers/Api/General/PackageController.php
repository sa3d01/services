<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Api\MasterController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\DropDownCollection;
use App\Models\Bank;
use App\Models\Category;
use App\Models\DropDown;
use App\Models\Package;

class PackageController extends MasterController
{
    protected $model;

    public function __construct(Package $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function index()
    {
        $packages=Package::whereBanned(false)->get();
        $results=[];
        foreach ($packages as $package){
            $arr['id']=$package->id;
            if (request()->header('lang')=='ar'){
                $arr['name']=$package->name_ar;
            }else{
                $arr['name']=$package->name_en;
            }
            $arr['price']=$package->price;
            $results[]=$arr;
        }
        return $this->sendResponse($results);
    }


}
