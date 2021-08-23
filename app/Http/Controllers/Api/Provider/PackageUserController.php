<?php

namespace App\Http\Controllers\Api\Provider;

use App\Http\Controllers\Api\MasterController;
use App\Http\Requests\Api\Provider\CheckPromoCodeRequest;
use App\Http\Requests\Api\Provider\SubscribeRequest;
use App\Models\Package;
use App\Models\PackageUser;
use App\Models\PromoCode;
use Carbon\Carbon;

class PackageUserController extends MasterController
{
    protected $model;

    public function __construct(PackageUser $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function canAdd(): object
    {
        $package_user = PackageUser::where('user_id', auth('api')->id())->latest()->first();
        if (!$package_user)
            return $this->sendResponse(['package_id' => '', 'subscribed' => false], 'you are not subscribed yet');
        if ($package_user->status == 'rejected') {
            return $this->sendResponse(['package_id' => '', 'subscribed' => false], 'your last subscribe is rejected');
        } elseif ($package_user->status == 'pending') {
            return $this->sendResponse(['package_id' => $package_user->package_id, 'subscribed' => false], 'your last subscribe is pending');
        } else {
            return $this->sendResponse(['package_id' => $package_user->package_id, 'subscribed' => true]);
        }
    }

    public function checkPromoCode(CheckPromoCodeRequest $request): object
    {
        $promo_code = PromoCode::where('code', $request['promo_code'])->first();
        if (!$promo_code) {
            return $this->sendError("هذا الكود غير صالح");
        } elseif (Carbon::parse($promo_code->end_date) < Carbon::now()) {
            return $this->sendError("هذا الكود غير صالح");
        } else {
            $new_price = ($request['total_price']) - (($promo_code->discount_percent * $request['total_price']) / 100);
            return $this->sendResponse(['total_price' => (double)$request['total_price'], 'new_price' => $new_price], "تم التأكد من صحة الكود");
        }
    }

    public function subscribe(SubscribeRequest $request): object
    {
        $data = $request->validated();
        $data['user_id'] = auth('api')->id();
        $package = Package::find($request['package_id']);
        $data['amount'] = $package->price;
        $data['discount'] = $package->price - $request['price'];
        PackageUser::create($data);
        return $this->sendResponse([]);
    }
}
