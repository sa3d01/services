@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <!-- relative -->
    <div class="container p-relative">
        <div class="row ltr">
            <div class="col-md-6 rtl my-3 p-md-5">
                <img src="{{asset('images/header.png')}}" class="img-fluid p-md-5 p-4 wow zoomIn" alt="">
            </div>
            <div class="col-md-6 rtl my-auto wow fadeIn py-3 ">
                <h4 class="w-700">
                    {{$about_title}}
                </h4>
                <p>
                    {{$about_note}}
                </p>
                <div>
                    <div class="input-group my-3 pt-3 w-75">
                        <input type="text" class="form-control br-25 px-4" placeholder="بحث عن مزود خدمة">
                        <div class="input-group-append">
                            <a href="user-search.blade.php" class="btn btn-blue mr-3 search-btn "><i class="fas fa-search yellow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="w-75">
                    <div class="owl-carousel owl-theme " id="headerSlider">
                        <div class="item my-3">
                            <img src="{{asset('images/headerSlide.png')}}" class="img-fluid br-25" alt="">
                        </div>
                        <div class="item my-3">
                            <img src="{{asset('images/headerSlide.png')}}" class="img-fluid br-25" alt="">
                        </div>
                        <div class="item my-3">
                            <img src="{{'images/headerSlide.png'}}" class="img-fluid br-25" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- social -->
        <div class="headerSocial  d-none d-lg-block">
            <ul class="p-0 m-0 social mt-4">
                <li class="my-2">
                    <a target="_blank" href="{{$facebook}}" class="text-white">
                        <img src="{{asset('images/icons/fb.png')}}" class="img-fluid" alt="">
                    </a>
                </li>
                <li class="my-2">
                    <a target="_blank" href="{{$twitter}}"  class="text-white">
                        <img src="{{asset('images/icons/tw.png')}}" class="img-fluid" alt="">
                    </a>
                </li>
                <li class="my-2">
                    <a target="_blank" href="{{$snap}}"  class="text-white">
                        <img src="{{asset('images/icons/snap.png')}}" class="img-fluid" alt="">
                    </a>
                </li>
                <li class="my-2">
                    <a target="_blank" href="{{$insta}}" class="text-white">
                        <img src="{{asset('images/icons/insta.png')}}" class="img-fluid" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- categories -->
    <div class="container px-md-0 p-5">
        <h4 class="w-700 pb-4">
            المجالات
        </h4>
        <div class="row">
            <div class="owl-carousel owl-theme mt-3 text-center" id="fields">
                @foreach(\App\Models\Category::where('parent_id',null)->where('banned',0)->get() as $category)
                <div class="item ">
                    <a href="user-majors.blade.php">
                        <div class="bg-light p-3">
                            <img src="{{$category->image}}" class="img-fluid w-auto d-inline-block" alt="">
                            @php($category_name_column='name_'.session()->get('locale'))
                            <h4 class="d-inline-block pr-2 m-0 blue">{{$category->$category_name_column}}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Most rated -->
    <div class="container px-md-0 p-5">
        <h4 class="w-700 pb-4">
            الأكثر تقييماً
        </h4>
        <div class="row">
            <div class="owl-carousel owl-theme mt-3" id="rated">
                @foreach(\App\Models\User::whereType('PROVIDER')->take(10)->get() as $provider)
                <div class="item ">
                    <a href="">
                        <div class="bg-light br-25  p-3">
                            <div class="yellow f-25 w-700">
                                <i class="far fa-star"></i>
                                <h5 class="f-25 d-inline-block mb-3">{{$provider->averageRate()}}</h5>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <img src="{{$provider->image}}" class="img-fluid" alt="">
                                </div>
                                <div class="mr-2">
                                    <h6 class="text-dark">
                                        {{$provider->name}}
                                    </h6>
                                    <label class="text-muted">
                                        {{$provider->phone}}
                                </label>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- contact form -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-7 p-5 yellow-bg br-25 mx-auto" id="contactForm">
                <h4 class="w-700 pb-4 text-center text-white">
                    تواصل معنا
                </h4>
                <form class="px-md-5" method="POST" class="row" action="{{route('contact')}}">
                    @csrf
                    <div class="form-group wow fadeInDown">
                        <select class="form-control" name="contact_type_id" id="">
                            <option hidden>نوع رسالة التواصل</option>
                            @foreach ($contact_types as $contact_type)
                                <option value="{{$contact_type->id}}">{{$contact_type['name_ar']}}</option>
                            @endforeach
                        </select>
                        <i class="fas fa-chevron-down yellow"></i>
                    </div>
                    <div class="form-group wow fadeInDown">
                        <textarea name="message" class="form-control p-4 br-25" rows="5" placeholder="الرسالة"></textarea>
                    </div>
                    <button type="submit" class="btn btn-blue mt-4 w-100 wow fadeInUp">ارسال
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!-- banks -->
    <div class="container pt-5 " id="banks">
        <h4 class="w-700 pb-4">
            الحسابات البنكية
        </h4>
        <div class="row">
            @foreach(\App\Models\Bank::whereBanned(0)->get() as $bank)
                @php($bank_name_column='name_'.session()->get('locale'))
                <div class="col-lg-2 col-md-4 my-3 wow zoomIn">
                <div class="bg-light br-25 text-center p-3">
                    <img src="{{$bank->logo}}" class="img-fluid" alt="">
                    <h6>
                        {{$bank->$bank_name_column}}
                    </h6>
                    <label class="text-muted">
                        {{$bank->account_number}}
                    </label>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container pt-5">
            <div class="row  pb-lg-3">
                <div class="col-md-4 mb-lg-0 mb-4 pl-5">
                    <img src="{{asset('images/logo.png')}}" alt="" class="img-fluid logo">
                    <p class="pt-4">
                        {{$about_note}}
                    </p>
                </div>
                <div class="col-md-4 mb-lg-0 mb-4">
                    <h5 class="default-color w-700 mb-3">
                        تواصل معنا
                    </h5>
                    <label class="d-block">
                        {{$setting['mobile']}}
                    </label>
                    <a href="mailto: {{$setting['email']}} " class="text-muted ">{{$setting['email']}}</a>
                    <div>
                        <ul class="p-0 m-0 social mt-4">
                            <li class="d-inline-block mx-1">
                                <a target="_blank" href="{{$facebook}}" class="text-white">
                                    <img src="{{asset('images/icons/fb.png')}}" class="img-fluid" alt="">
                                </a>
                            </li>
                            <li class="d-inline-block mx-1">
                                <a target="_blank" href="{{$twitter}}"  class="text-white">
                                    <img src="{{asset('images/icons/tw.png')}}" class="img-fluid" alt="">
                                </a>
                            </li>
                            <li class="d-inline-block mx-1">
                                <a target="_blank" href="{{$snap}}"  class="text-white">
                                    <img src="{{asset('images/icons/snap.png')}}" class="img-fluid" alt="">
                                </a>
                            </li>
                            <li class="d-inline-block mx-1">
                                <a target="_blank" href="{{$insta}}" class="text-white">
                                    <img src="{{asset('images/icons/insta.png')}}" class="img-fluid" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 mb-lg-0 mb-4 ">
                    <h5 class="default-color w-700 mb-3">
                        روابط مهمة
                    </h5>
                    <div>
                        <ul class="m-0 p-0">
                            <li>
                                <a href="{{route('siteRatio')}}" class="text-dark">
                                نسبة الموقع
                               </a>
                            </li>
                            <li>
                                <a href="{{route('terms')}}" class="text-dark">
                                    الشروط و الأحكام
                               </a>
                            </li>
                            <li>
                                <a href="{{route('licence')}}" class="text-dark">
                                    سياسة الخصوصية
                               </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
        <div class="copy-right text-center py-3 text-muted default-bg ">
            <p class="m-0 px-5 ">
                جميع الحقوق محفوظة © 2021 - موقع في الخدمة
            </p>
        </div>
    </footer>
@endsection
