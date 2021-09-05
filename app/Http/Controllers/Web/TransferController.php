<?php

namespace App\Http\Controllers\Web;

use App\Models\Transfer;
use Illuminate\Http\Request;

class TransferController extends MasterController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $data = $request->except('image');
        $data['user_id'] = auth()->id();
        $transfer=Transfer::create($data);
        $transfer->update([
            'image'=>$request['image']
        ]);
        return redirect()->back()->with('status','يرجي انتظار مراجعة الادارة لبياناتك');
    }
}
