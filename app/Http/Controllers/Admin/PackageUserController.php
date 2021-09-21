<?php

namespace App\Http\Controllers\Admin;

use App\Models\Notification;
use App\Models\PackageUser;
use Edujugon\PushNotification\PushNotification;

class PackageUserController extends MasterController
{
    public function __construct(PackageUser $model)
    {
        $this->model = $model;
//        $this->middleware('permission:package_user');
        parent::__construct();
    }

    public function index()
    {
        $rows = $this->model->latest()->get();
        return view('Dashboard.package-user.index', compact('rows'));
    }

    public function reject($id): object
    {
        $transfer = $this->model->find($id);
        $transfer->update(
            [
                'status' => 'rejected',
            ]
        );
        $transfer->refresh();

        $usersTokens=[];
        if (key_exists('id',$transfer->user->device)){
            if ($transfer->user->device['id'] !='null'){
                $usersTokens[]=$transfer->user->device['id'];

                $push = new PushNotification('fcm');
                $push->setMessage([
                    'notification' => array('title'=>'تمت رفض حوالتك البنكية ', 'sound' => 'default'),
                    'data' => [
                        'title' => 'تمت رفض حوالتك البنكية',
                        'body' => 'تمت رفض حوالتك البنكية',
                        'status' => 'admin',
                        'type'=>'admin',
                    ],
                    'priority' => 'high',
                ])
                    ->setDevicesToken($usersTokens)
                    ->send()
                    ->getFeedback();
            }
        }


        Notification::create([
            'receiver_id'=>$transfer->user_id,
            'admin_notify_type'=>'single',
            'title'=>'تمت رفض حوالتك البنكية',
            'note'=>'تمت رفض حوالتك البنكية',
        ]);

        return redirect()->back()->with('updated');
    }

    public function accept($id)
    {
        $transfer = $this->model->find($id);
        $transfer->update(
            [
                'status' => 'accepted',
            ]
        );
        $transfer->refresh();

        $usersTokens=[];
        if (key_exists('id',$transfer->user->device)){
            if ($transfer->user->device['id'] !='null'){
                $usersTokens[]=$transfer->user->device['id'];
                $push = new PushNotification('fcm');
                $push->setMessage([
                    'notification' => array('title'=>'تمت الموافقة علي حوالتك البنكية بنجاح', 'sound' => 'default'),
                    'data' => [
                        'title' => 'تمت الموافقة علي حوالتك البنكية بنجاح',
                        'body' => 'تمت الموافقة علي حوالتك البنكية بنجاح',
                        'status' => 'admin',
                        'type'=>'admin',
                    ],
                    'priority' => 'high',
                ])
                    ->setDevicesToken($usersTokens)
                    ->send()
                    ->getFeedback();
            }
        }


        Notification::create([
            'receiver_id'=>$transfer->user_id,
            'admin_notify_type'=>'single',
            'title'=>'تمت الموافقة علي حوالتك البنكية بنجاح',
            'note'=>'تمت الموافقة علي حوالتك البنكية بنجاح',
        ]);

        return redirect()->back()->with('updated');
    }

}
