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
use App\Models\Product;
use App\Models\Rate;
use App\Models\User;

class ProviderController extends MasterController
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function providers()
    {
        $providers=User::whereType('PROVIDER');
        if (request()->has('name')){
            $providers=$providers->where('name','LIKE','%'.request()->input('name').'%');
        }
        if (request()->has('city_id')){
            $providers=$providers->where('city_id',request()->input('city_id'));
        }
        if (request()->has('category_id')){
            $users=Product::where('category_id',request()->input('category_id'))->pluck('user_id');
            $providers=$providers->whereIn('id',$users);
        }
        return ProviderResource::collection($providers->paginate(10));
    }
    public function show($id)
    {
        return $this->sendResponse(new SingleProviderResource(User::find($id)));
    }
    public function providerProducts($id):object
    {
        $products=Product::where('user_id',$id)->paginate(10);
        return ProductResource::collection($products);
    }
    public function providerGalleries($id):object
    {
        $galleries=Gallery::where('user_id',$id)->paginate(10);
        return GalleryResource::collection($galleries);
    }
    public function providerFeedbacks($id):object
    {
        $rates=Rate::where('rated_id',$id)->paginate(10);
        return FeedBackResource::collection($rates);
    }


    public function rate($id,RateRequest $request):object
    {
        $data=$request->validated();
        $provider = User::find($id);
        if (!$provider || $provider->type!='PROVIDER') {
            return $this->sendError("حدثت مشكلة ما !");
        }
        $data['user_id']=auth('api')->id();
        $data['rated_id']=$id;
        Rate::Create($data);
        $title = sprintf('تم تقييمك من قبل المستخدم  %s  ',auth('api')->user()->name);
        $this->notify($provider,$title,'rate');
        return $this->sendResponse([], 'تم التقييم بنجاح');
    }
}
