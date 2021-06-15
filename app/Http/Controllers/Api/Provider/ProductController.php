<?php

namespace App\Http\Controllers\Api\Provider;

use App\Http\Controllers\Api\MasterController;
use App\Http\Requests\Api\Provider\GalleryStoreRequest;
use App\Http\Requests\Api\Provider\GalleryUpdateRequest;
use App\Http\Requests\Api\Provider\ProductStoreRequest;
use App\Http\Requests\Api\Provider\ProductUpdateRequest;
use App\Http\Resources\GalleryResource;
use App\Http\Resources\ProductResource;
use App\Models\Gallery;
use App\Models\Product;

class ProductController extends MasterController
{
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
        parent::__construct();
    }

    public function products():object
    {
        $products=Product::where('user_id',auth('api')->id())->paginate(10);
        return ProductResource::collection($products);
    }
    public function galleries():object
    {
        $galleries=Gallery::where('user_id',auth('api')->id())->paginate(10);
        return GalleryResource::collection($galleries);
    }
    public function storeProduct(ProductStoreRequest $request)
    {
        $product = $request->validated();
        $product['user_id'] = auth('api')->id();
        Product::create($product);
        $products=Product::where('user_id',auth('api')->id())->paginate(10);
        return ProductResource::collection($products);
    }
    public function storeGallery(GalleryStoreRequest $request)
    {
        $gallery = $request->validated();
        $gallery['user_id'] = auth('api')->id();
        Gallery::create($gallery);
        $galleries=Gallery::where('user_id',auth('api')->id())->paginate(10);
        return GalleryResource::collection($galleries);
    }

    public function updateProduct($id,ProductUpdateRequest $request):object
    {
        $product=Product::find($id);
        if (!$product || $product->user_id!=auth('api')->id()){
            return $this->sendError('توجد مشكلة بالبيانات');
        }
        $product->update($request->validated());
        $products=Product::where('user_id',auth('api')->id())->paginate(10);
        return ProductResource::collection($products);
    }
    public function updateGallery($id,GalleryUpdateRequest $request):object
    {
        $gallery=Gallery::find($id);
        if (!$gallery || $gallery->user_id!=auth('api')->id()){
            return $this->sendError('توجد مشكلة بالبيانات');
        }
        $gallery->update($request->validated());
        $galleries=Gallery::where('user_id',auth('api')->id())->paginate(10);
        return GalleryResource::collection($galleries);
    }
    public function destroyProduct($id):object
    {
        $product=Product::find($id);
        if (!$product || $product->user_id!=auth('api')->id()){
            return $this->sendError('توجد مشكلة بالبيانات');
        }
        $product->delete();
        $products=Product::where('user_id',auth('api')->id())->paginate(10);
        return ProductResource::collection($products);
    }
    public function destroyGallery($id):object
    {
        $gallery=Gallery::find($id);
        if (!$gallery || $gallery->user_id!=auth('api')->id()){
            return $this->sendError('توجد مشكلة بالبيانات');
        }
        $gallery->delete();
        $galleries=Gallery::where('user_id',auth('api')->id())->paginate(10);
        return GalleryResource::collection($galleries);
    }
}
