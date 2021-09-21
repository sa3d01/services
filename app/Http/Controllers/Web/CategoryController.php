<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\User;

class CategoryController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function show($id)
    {
        $category=Category::find($id);
        $providers=User::where(['type'=>'PROVIDER','banned'=>0]);
        return view('Web.user-majors',compact('category'));

    }
}
