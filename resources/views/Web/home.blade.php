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
                @if (!auth()->check() || auth()->user()->type=='USER')
                    <div>

                        <form action="{{ route('search-provider') }}" method="GET" class="input-group my-3 pt-3 w-75">
                            @csrf
                            <input required name="input_search" type="text" class="form-control br-25 px-4" placeholder="بحث عن مزود خدمة">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-blue mr-3 search-btn "><i class="fas fa-search yellow"></i></button>
                            </div>
                        </form>


{{--                        <div class="input-group my-3 pt-3 w-75">--}}
{{--                            <input type="text" class="form-control br-25 px-4" placeholder="بحث عن مزود خدمة">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <a href="{{route('search-provider')}}" class="btn btn-blue mr-3 search-btn "><i class="fas fa-search yellow"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                    </div>
                @endif
                <div class="w-75">
                    <div class="owl-carousel owl-theme " id="headerSlider">
                        @foreach ($sliders as $slider)
                            <div class="item my-3">
                                <img src="{{$slider['image']}}" class="img-fluid br-25" alt="">
                            </div>
                        @endforeach
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
    @if (auth()->check() && auth()->user()->type=='PROVIDER')
        @include('Web.layouts.partials.provider-home')
    @else
        @include('Web.layouts.partials.user-home')
    @endif
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
    @include('Web.layouts.partials.footer')
@endsection
