@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container py-5">
        <div class="row ltr">
            <div class="col-md-9 mx-auto rtl my-auto wow fadeIn py-3">
                <div>
                    {{-- <div class="owl-carousel owl-theme text-center" id="indexSlider">
                        <div class="item my-3">
                            <img src="{{asset('images/vec1.png')}}" class="img-fluid  wow zoomIn" alt="">
                            <p class="mt-4">
                                {{ __('message.intro_1') }}
                            </p>
                        </div>
                        <div class="item my-3">
                            <img src="{{asset('images/vec2.png')}}" class="img-fluid  wow zoomIn" alt="">
                            <p class="mt-4">
                                {{ __('message.intro_2') }}
                            </p>
                        </div>
                    </div> --}}
                    <div class="item my-3">
                        <img src="{{asset('images/vec1.png')}}" class="img-fluid  wow zoomIn" alt="">
                        <p class="mt-4">
                            {{ __('message.intro_1') }}
                        </p>
                    </div>
                </div>
                <div class="text-center my-3">
                    <a href="{{route('login',['type'=>'user'])}}" class="btn btn-blue px-md-5 px-4 my-md-0 my-3">{{ __('message.user_name') }}</a>
                    <a href="{{route('login',['type'=>'provider'])}}" class="btn btn-yellow px-md-5 px-4 mr-2 my-md-0 my-3">{{ __('message.provider_name') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
