@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('styles')
    <link href="{{asset('assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
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
                        <input required name="phone" type="tel" class="form-control" placeholder="رقم الجوال" id="phone" pattern="(05)(5|0|3|6|4|9|1|8|7)([0-9]{7})" oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'برجاء ادخال رقم جوال صحيح يبدأ بـ 05');"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                    </div>
                    <div class="form-group wow fadeInDown">
                        <input  required name="password" type="password" class="form-control" placeholder="كلمة المرور" id="pass">
                        <i class="fas fa-eye togglePass yellow" toggle="#pass"></i>
                    </div>
                    <button class="btn btn-blue mt-4 w-100 wow fadeInUp" type="submit">
                        تسجيل دخول
                    </button>
                </form>
                {{--                    <div>--}}
                {{--                        <a href="user-forgetPass.blade.php" class="text-muted">--}}
                {{--                            هل نسيت كلمة المرور ؟--}}
                {{--                        </a>--}}
                {{--                    </div>--}}
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
                            <a href="{{route('home')}}" class="yellow w-700">
                                تخطي
                            </a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('assets/libs/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/toastr.init.js')}}"></script>
    @if($errors->any())
        <div style="visibility: hidden" id="errors" data-content="{{$errors->first()}}"></div>
        <script type="text/javascript">
            $(document).ready(function () {
                var errors=$('#errors').attr('data-content');
                toastr.options = {
                    "closeButton": true,
                    "debug": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-left",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
                toastr.error(errors)
            })
        </script>
    @endif
@endsection
