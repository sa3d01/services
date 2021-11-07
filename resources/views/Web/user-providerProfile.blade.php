@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container px-md-0 p-3">
        <div class="row">
            <div class="col-lg-8 my-3">
                <!-- services -->
                <div>
                    <h4 class="w-700 my-3">
                        الخدمات
                    </h4>
                    <div class="mt-3" id="">
                        <div class="item">
                            <div class="row">
                                @foreach($provider->products as $product)
                                    <div class="col-md-6 my-3">
                                        <div class="bg-light br-25 pt-5 pb-4 px-4">
                                            <h1 class="d-inline-block w-700 fontS-50 lineH-0">
                                                {{$product->price}}
                                            </h1>
                                            <span class="d-inline-block">
                                                ريال سعودي
                                            </span>
                                            <label class="text-muted d-block mb-3">
                                                {{$product->category->name_ar .'-'. $product->category->parent->name_ar}}
                                            </label>
                                            <p class="m-0">
                                                {{$product->note}}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Business Gallery -->
                <div class="mt-5">
                    <h4 class="w-700 py-3">
                        معرض الأعمال
                    </h4>
                    <div>
                        @foreach($provider->galleries as $gallery)
                        <div class="row py-3">
                            <div class="col-md-4">
                                <img src="{{$gallery->image}}" class="img-fluid br-25" alt="">
                            </div>
                            <div class="col-md-8">
                                <p>
                                    {{$gallery->note}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 my-3 mt-100">
                <!-- provider details -->
                <div class="br-25 yellow-bg text-center px-5 pb-4 bg-img">
                    <div>
                        <img src="{{$provider->image}}" class="img-fluid providerImg" alt="">
                    </div>
                    <div>
                        <h4 class="text-white">
                            {{$provider->name}}
                        </h4>
                        <span class="d-block text-white">
                            {{$provider->phone}}
                        </span>
                        <span class="d-block text-white">
                            {{$provider->city->name_ar}}
                        </span>
                    </div>
                    <div>
                        @for($i=0;$i<$provider->averageRate();$i++)
                            <i class="fas fa-star text-white"></i>
                        @endfor
                    </div>
                    <div>
                        <ul class="p-0 m-0 social mt-3">
                            @if($provider->socials->first()->facebook)
                            <li class="d-inline-block mx-1">
                                <a target="_blank" href="{{$provider->socials->first()->facebook}}" class="text-white">
                                    <img src="{{asset('images/icons/fb2.png')}}" class="img-fluid" alt="">
                                </a>
                            </li>
                            @endif
                            @if($provider->socials->first()->twitter)
                            <li class="d-inline-block mx-1">
                                <a target="_blank" href="{{$provider->socials->first()->twitter}}" class="text-white">
                                    <img src="{{asset('images/icons/tw2.png')}}" class="img-fluid" alt="">
                                </a>
                            </li>
                            @endif
                            @if($provider->socials->first()->snap)
                            <li class="d-inline-block mx-1">
                                <a target="_blank" href="{{$provider->socials->first()->snap}}" class="text-white">
                                    <img src="{{asset('images/icons/snap2.png')}}" class="img-fluid" alt="">
                                </a>
                            </li>
                            @endif
                            @if($provider->socials->first()->insta)
                            <li class="d-inline-block mx-1">
                                <a target="_blank" href="{{$provider->socials->first()->insta}}" class="text-white">
                                    <img src="{{asset('images/icons/insta2.png')}}" class="img-fluid" alt="">
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <!-- rating -->
                <div class="bg-light br-25 mt-5 p-4">
                    <h4 class="w-700 mb-3">
                        التقييمات
                    </h4>
                    @if(auth()->check())
                    <div>
                        <form method="POST" class="border-bottom pb-4" action="{{route('rate')}}">
                            @csrf
                            <input type="hidden" name="rated_id" value="{{$provider->id}}">
                            <input type="hidden" name="user_id" value="{{auth()->id()}}">
                            <input type="hidden" name="rate" value="3">
                            <div class="form-group">
                                <textarea name="feedback" class="form-control bg-white br-25 py-4 px-3" rows="5" placeholder="تعليقك"></textarea>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div id="dataReview" class="d-inline-block" data-rating-stars="5" data-rating-input="#dataInput"></div>
                                <button type="submit" class="btn btn-blue px-3 wow fadeInUp">إرسال تقييمك</button>
                            </div>
                        </form>
                    </div>
                    @endif
                    <div>
                        @foreach ($provider->rates as $rate)
                        <div class="d-flex my-3">
                            <div>
                                <img src="{{$rate->user->image}}" class="img-fluid userImg" alt="">
                            </div>
                            <div class="w-100">
                                <div class="mr-2 d-flex justify-content-between">
                                    <h6 class="text-dark my-auto">
                                        {{$rate->user->name}}
                                    </h6>
                                    <div class="yellow w-700 my-auto">
                                        <h5 class="d-inline-block mt-3">{{$rate->rate}}</h5>
                                        <i class="far fa-star"></i>
                                    </div>
                                </div>
                                <p class="m-0">
                                    {{$rate->feedback}}
                                </p>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    @include('Web.layouts.partials.footer')
@endsection
