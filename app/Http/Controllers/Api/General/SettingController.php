<?php

namespace App\Http\Controllers\Api\General;

use App\Http\Controllers\Api\MasterController;
use App\Models\Setting;

class SettingController extends MasterController
{
    protected $model;

    public function __construct(Setting $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function getSettings()
    {
        $setting = Setting::first();
        $data = [];
        $data['mobile'] = $setting->mobile;
        $data['email'] = $setting->email;
        $data['socials'] = $setting->socials;
        $data['app_ratio'] =(int) $setting->app_ratio;
        return $this->sendResponse($data);
    }
}
