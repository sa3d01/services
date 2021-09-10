<?php

namespace App\Http\Controllers\Web;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends MasterController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        Contact::create($data);
        return redirect()->back()->with('status','يرجي انتظار مراجعة الادارة لبياناتك');
    }
}
