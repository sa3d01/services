<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Dashboard\SliderStoreRequest;
use App\Models\Package;
use App\Models\Slider;
use Illuminate\Http\Request;

class PackageController extends MasterController
{
    public function __construct(Package $model)
    {
        $this->model = $model;
//        $this->middleware('permission:packages');
        parent::__construct();
    }

    public function index()
    {
        $rows = $this->model->latest()->get();
        return view('Dashboard.package.index', compact('rows'));
    }

    public function create()
    {
        return view('Dashboard.package.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('image');
        $data['user_id'] = auth()->id();
        $package=$this->model->create($data);
        $package->update([
           'image'=>$request['image']
        ]);
        return redirect()->route('admin.package.index')->with('created');
    }

    public function edit($id):object
    {
        $row=$this->model->find($id);
        return view('Dashboard.package.edit', compact('row'));
    }
    public function update($id,Request $request)
    {
        $row=$this->model->find($id);
        $row->update($request->all());
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
