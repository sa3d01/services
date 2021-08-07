<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Category;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;

class BankController extends MasterController
{
    public function __construct(Bank $model)
    {
        $this->model = $model;
//        $this->middleware('permission:banks');
        parent::__construct();
    }

    public function index()
    {
        $rows = $this->model->latest()->get();
        return view('Dashboard.bank.index', compact('rows'));
    }
    public function create()
    {
        return view('Dashboard.bank.create');
    }
    public function store(Request $request)
    {
        $data=$request->except('logo');
        $data['user_id']=auth()->id();
        $bank=$this->model->create($data);
        $bank->update([
            'logo'=>$request['logo']
        ]);
//        FileService::upload($request['logo'], $bank, "logos", false);
        return redirect()->route('admin.bank.index')->with('created');
    }
    public function edit($id):object
    {
        $bank=$this->model->find($id);
        return view('Dashboard.bank.edit', compact('bank'));
    }
    public function update($id,Request $request)
    {
        $bank=$this->model->find($id);
        $bank->update($request->all());
        return redirect()->back()->with('updated');

    }
    public function ban($id):object
    {
        $bank=$this->model->find($id);
        $bank->update(
            [
                'banned'=>1,
            ]
        );
        $bank->refresh();
        return redirect()->back()->with('updated');
    }
    public function activate($id):object
    {
        $bank=$this->model->find($id);
        $bank->update(
            [
                'banned'=>0,
            ]
        );
        $bank->refresh();
        return redirect()->back()->with('updated');
    }

}
