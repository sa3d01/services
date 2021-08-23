<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class SubCategoryController extends MasterController
{
    public function __construct(Category $model)
    {
        $this->model = $model;
//        $this->middleware('permission:categories');
        parent::__construct();
    }

    public function index()
    {
        $rows = $this->model->where('parent_id','!=',null)->latest()->get();
        return view('Dashboard.sub_category.index', compact('rows'));
    }
    public function create()
    {
        $parents=Category::where('parent_id',null)->get();
        return view('Dashboard.sub_category.create',compact('parents'));
    }
    public function store(Request $request)
    {
        $category=$this->model->create($request->except('image'));
        return redirect()->route('admin.sub_category.index')->with('created');
    }
    public function show($id):object
    {
        $category=$this->model->find($id);
        return view('Dashboard.sub_category.show', compact('category'));
    }
    public function edit($id):object
    {
        $category=$this->model->find($id);
        $parents=Category::where('parent_id',null)->get();
        return view('Dashboard.sub_category.edit', compact('category','parents'));
    }
    public function update($id,Request $request)
    {
        $category=$this->model->find($id);
        $category->update($request->except('image'));
        return redirect()->back()->with('updated');

    }
    public function ban($id):object
    {
        $category=$this->model->find($id);
        $category->update(
            [
                'banned'=>1,
            ]
        );
        $category->refresh();
        $category->refresh();
        return redirect()->back()->with('updated');
    }
    public function activate($id):object
    {
        $category=$this->model->find($id);
        $category->update(
            [
                'banned'=>0,
            ]
        );
        $category->refresh();
        $category->refresh();
        return redirect()->back()->with('updated');
    }

}
