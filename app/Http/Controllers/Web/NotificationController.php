<?php

namespace App\Http\Controllers\Web;

use App\Models\Notification;

class NotificationController extends MasterController
{
    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
    }
    public function notifications()
    {
        $notifications = Notification::where('receiver_id', request()->user()->id)->orWhereJsonContains('receivers',auth()->id())->latest()->get();
        return view('Web.notification',compact('notifications'));
    }

}
