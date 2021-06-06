<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Api\MasterController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\DropDownCollection;
use App\Models\Bank;
use App\Models\Category;
use App\Models\DropDown;

class BankController extends MasterController
{
    protected $model;

    public function __construct(Bank $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function index()
    {
        $banks=Bank::whereBanned(false)->get();
        $results=[];
        foreach ($banks as $bank){
            $arr['id']=$bank->id;
            if (request()->header('lang')=='ar'){
                $arr['name']=$bank->name_ar;
            }else{
                $arr['name']=$bank->name_en;
            }
            $arr['account_number']=$bank->account_number;
            $arr['logo']=$bank->logo;
            $results[]=$arr;
        }
        return $this->sendResponse($results);
    }


}
