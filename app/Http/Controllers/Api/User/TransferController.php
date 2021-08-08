<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Api\MasterController;
use App\Http\Requests\Api\Order\RateOrderRequest;
use App\Http\Requests\Api\Provider\GalleryStoreRequest;
use App\Http\Requests\Api\Provider\GalleryUpdateRequest;
use App\Http\Requests\Api\Provider\ProductStoreRequest;
use App\Http\Requests\Api\Provider\ProductUpdateRequest;
use App\Http\Requests\Api\RateRequest;
use App\Http\Resources\FeedBackResource;
use App\Http\Resources\GalleryResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProviderResource;
use App\Http\Resources\SingleProviderResource;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\Package;
use App\Models\PackageUser;
use App\Models\Product;
use App\Models\Rate;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;

class TransferController extends MasterController
{
    protected $model;

    public function __construct(Transfer $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function store(Request $request)
    {
        $data = $request->except('image');
        $data['user_id'] = auth('api')->id();
        $transfer=Transfer::create($data);
        $transfer->update([
            'image'=>$request['image']
        ]);
        return $this->sendResponse([]);
    }

}
