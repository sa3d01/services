<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends MasterController
{
    public function __construct(Category $model)
    {
        $this->model = $model;
//        $this->middleware('permission:categories');
        parent::__construct();
    }

    public function index()
    {
        $rows = $this->model->where('parent_id',null)->latest()->get();
        return view('Dashboard.category.index', compact('rows'));
    }
    public function create()
    {
        return view('Dashboard.category.create');
    }
    public function store(Request $request)
    {
        $category=$this->model->create($request->except('image'));
        if ($request->hasFile('image')){
            $category->update([
                'image'=>$request['image']
            ]);
        }
        return redirect()->route('admin.category.index')->with('created');
    }
    public function show($id):object
    {
        $category=$this->model->find($id);
        return view('Dashboard.category.show', compact('category'));
    }
    public function edit($id):object
    {
        $category=$this->model->find($id);
        return view('Dashboard.category.edit', compact('category'));
    }
    public function update($id,Request $request)
    {
        $category=$this->model->find($id);
        $category->update($request->all());
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
