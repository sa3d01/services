        <!-- services-->
        <div class="container px-md-0 p-5">
            <h4 class="w-700 pb-4">
                خدماتي
            </h4>
            <div class="row">
                <div class="owl-carousel owl-theme mt-3" id="providerServices">
                    <div class="item ">
                        <div class="row">
                            @if (count(auth()->user()->products)==0)
                                <div class="bg-light br-25 pt-5 pb-4 px-4 h-100">
                                    <h1 class="d-inline-block w-700 fontS-50 lineH-0">
                                        لا توجد لديك خدمات بعد !
                                    </h1>
                                </div>
                            @endif
                            @foreach (auth()->user()->products as $product)
                                <div class="col-md-4 my-3">
                                    <div class="bg-light br-25 pt-5 pb-4 px-4 h-100">
                                        <h1 class="d-inline-block w-700 fontS-50 lineH-0">
                                            {{$product->price}}
                                        </h1>
                                        <span class="d-inline-block">
                                            ريال سعودي
                                        </span>
                                        <label class="text-muted d-block mb-3">
                                            {{$product->category['name_'.session()->get('locale')]}}
                                        </label>
                                        <p class="m-0">
                                            {{$product->note}}
                                        </p>
                                        <div class="actions ">
                                            <div class="d-inline-block bg-light">
                                                <a href="{{route('product.edit',$product->id)}}">
                                                    <i class="fas fa-pen yellow"></i>
                                                </a>
                                            </div>
                                            <div class="d-inline-block bg-light">
                                                <button class="btn delete p-0">
                                                    <i class="far fa-trash-alt text-danger"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Business Gallery -->
        <div class="container px-md-0 p-5">
            <h4 class="w-700 pb-4">
                معرض أعمالي
            </h4>
            <div class="row">
                <div class="owl-carousel owl-theme mt-3 " id="BusinessGallery">
                    <div class="item ">
                        <div class="row">
                            @if (count(auth()->user()->galleries)==0)
                                <div class="bg-light br-25 pt-5 pb-4 px-4 h-100">
                                    <h1 class="d-inline-block w-700 fontS-50 lineH-0">
                                        لا توجد لديك أعمال بعد !
                                    </h1>
                                </div>
                            @endif
                            @foreach (auth()->user()->galleries as $gallery)
                                <div class="col-md-6">
                                    <div class="row py-3">
                                        <div class="col-md-5">
                                            <img src="{{$gallery->image}}" class="img-fluid br-25" alt="">
                                            <div class="actions">
                                                <div class="d-inline-block">
                                                    <a href="{{route('gallery.edit',$gallery->id)}}">
                                                        <i class="fas fa-pen yellow"></i>
                                                    </a>
                                                </div>
                                                <div class="d-inline-block">
                                                    <button class="btn delete p-0">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <p>
                                               {{$gallery->note}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- rating -->
        <div class="container bg-light br-25 p-4">
            <div class="d-flex justify-content-between">
                <h4 class="w-700 ">
                    التقييمات
                </h4>
                {{-- <div class="yellow">
                    <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i> <i class="far fa-star"></i>
                </div> --}}
            </div>
            <div class="row pt-3">
                @if (count(auth()->user()->rates)==0)
                    <div class="bg-light br-25 pt-5 pb-4 px-4 h-100">
                        <h1 class="d-inline-block w-700 fontS-50 lineH-0">
                            لا توجد لديك تقييمات بعد !
                        </h1>
                    </div>
                @endif
                @foreach (auth()->user()->rates as $rate)
                    <div class="col-md-6 ">
                        <div class="d-flex my-2">
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
                    </div>
                @endforeach


            </div>
        </div>
        <!-- Subscriptions -->
        @php
            $package_user=\App\Models\PackageUser::where('user_id',auth()->id())->latest()->first();
        @endphp
        @if (!$package_user || ($package_user->status=='rejected'))
        <div id="packages" class="container pt-5">
            <h4 class="w-700 pb-4">
                الاشتراكات
            </h4>
            <div class="row">
                <div class="col-md-6">
                    <img src="{{asset('images/Subscriptions.png')}}" class="img-fluid p-5" alt="">
                </div>
                <div class="col-md-6">
                    <div class="row">
                        @foreach (\App\Models\Package::where('banned',0)->get() as $package)
                            <div class="col-md-6 my-4">
                                <div class="br-25 bg-light text-center px-5 pb-4 pt-5">
                                    <div class=" yellow-bg subscripIcon">
                                        <img src="images/icons/calendar.png" class="img-fluid" alt="">
                                    </div>
                                    <div>
                                        <h5>
                                            {{$package['name_'.session()->get('locale')]}}
                                        </h5>
                                        <h1 class="m-0">
                                            {{$package->price}}
                                        </h1>
                                        <span>
                                            ريال سعودي
                                        </span>
                                        <a href="{{route('provider.subscribe.show',$package->id)}}" class="btn btn-blue mt-4 w-100 wow fadeInUp btn-subscribe">
                                            اشترك الآن
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
        @endif

