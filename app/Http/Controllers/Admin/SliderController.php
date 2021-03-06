<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Dashboard\SliderStoreRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends MasterController
{
    public function __construct(Slider $model)
    {
        $this->model = $model;
//        $this->middleware('permission:sliders');
        parent::__construct();
    }

    public function index()
    {
        $rows = $this->model->latest()->get();
        return view('Dashboard.slider.index', compact('rows'));
    }

    public function create()
    {
        return view('Dashboard.slider.create');
    }

    public function store(SliderStoreRequest $request)
    {
        $data = $request->except('image');
        $data['user_id'] = auth()->id();
        $slider=$this->model->create($data);
        $slider->update([
           'image'=>$request['image']
        ]);
        return redirect()->route('admin.slider.index')->with('created');
    }

    public function edit($id):object
    {
        $row=$this->model->find($id);
        return view('Dashboard.slider.edit', compact('row'));
    }
    public function update($id,Request $request)
    {
        $row=$this->model->find($id);
        $row->update($request->all());
        return redirect()->back()->with('updated');

    }

    public function ban($id): object
    {
        $slider = $this->model->find($id);
        $slider->update(
            [
                'status'=>0,
            ]
        );
        $slider->refresh();
        $slider->refresh();
        return redirect()->back()->with('updated');
    }
    public function activate($id):object
    {
        $slider=$this->model->find($id);
        $slider->update(
            [
                'status'=>1,
            ]
        );
        $slider->refresh();
        $slider->refresh();
        return redirect()->back()->with('updated');
    }

}
