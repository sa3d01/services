<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Api\MasterController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\DropDownCollection;
use App\Models\Category;
use App\Models\DropDown;

class CategoryController extends MasterController
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function index()
    {
        return $this->sendResponse(CategoryResource::collection(($this->model->where('parent_id',null)->whereBanned(0)->get())));
    }
    public function subCategory($id)
    {
        return $this->sendResponse(CategoryResource::collection(($this->model->where('parent_id',$id)->whereBanned(0)->get())));
    }

}
