@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container py-5">
        <div class="row ">
            <div class="col-md-6 mx-auto my-3">
                <h4 class="text-center w-700 mb-5">
                    تسجيل دخول
                    @if($type=='user')
                        {{ __('message.user_name') }}
                    @else
                        {{ __('message.provider_name') }}
                    @endif

                </h4>
                <form method="POST" action="{{route('login.submit')}}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="type" value="{{$type}}">
                    <div class="form-group wow fadeInDown">
                        <input name="phone" type="tel" class="form-control" placeholder="رقم الجوال" id="phone">
                    </div>
                    <div class="form-group wow fadeInDown">
                        <input name="password" type="password" class="form-control" placeholder="كلمة المرور" id="pass">
                        <i class="fas fa-eye togglePass yellow " toggle="#pass"></i>
                    </div>
{{--                    <div>--}}
{{--                        <a href="user-forgetPass.blade.php" class="text-muted">--}}
{{--                            هل نسيت كلمة المرور ؟--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <button class="btn btn-blue mt-4 w-100 wow fadeInUp" type="submit">
                        تسجيل دخول
                    </button>
                    <div class="mt-5">
                        <p class="my-auto text-center">
                            لا تمتلك حساب ؟
                            <a href="{{route('signup',['type'=>$type])}}" class="yellow w-700">
                                 سجل الآن
                            </a>
                        </p>
                    </div>
                    @if($type=='user')
                        <div class="mt-5">
                            <p class="my-auto text-center">
                                هل تريد الدخول كمتخطي و تسجيل الدخول لاحقاً ؟
                                <a href="../home.blade.php" class="yellow w-700">
                                    تخطي
                                </a>
                            </p>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
