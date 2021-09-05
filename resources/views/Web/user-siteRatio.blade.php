@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 d-flex my-3">
                <div class="d-inline-block">
                    <img src="{{asset('images/ratio.png')}}" class="img-fluid" alt="">
                </div>
                <div class="d-inline-block px-3">
                    <h1 class="w-700 yellow d-inline-block m-0">{{$setting['app_ratio']}}</h1>
                    <span class="yellow">%</span>
                    <label class="text-muted d-block">
                        نسبة التطبيق
                    </label>
                    <p class="m-0">
                        <input value="{{$setting['app_ratio']}}" type="hidden" name="ratio" id="ratio">
                        في حالة استفادتك من التطبيق عليك بتحويل {{$setting['app_ratio']}}% من قيمة الخدمة المقدمة للمستخدم لأحد حسابتنا البنكية
                    </p>
                </div>
            </div>
            <div class="col-md-6 my-3 border-right pr-md-5">
                <h5 class="w-700">
                    الحاسبة
                </h5>
                <div>
                    <form action="" class="ratioForm">
                        إذا تم تقديم الخدمة بسعر
                        <div class="form-group wow fadeInDown d-inline-block w-25 text-center">
                            <input type="number" class="form-control text-center" placeholder="" id="amount">
                        </div>
                         فإن المبلغ المستحق دفعه
                        {{-- <button type="submit" class="btn btn-blue wow fadeInUp px-4 mx-2 mt-2">احسب</button> --}}
                        <label class="w-700">هو
                            <input disabled value="0" id="debit">
                            ريال سعودي</label>
                    </form>
                </div>
            </div>
            <form enctype="multipart/form-data" class="col-md-6 mx-auto text-center my-3 pt-md-5" method="POST" class="row" action="{{route('transfer')}}">
                @csrf
                {{-- <div class="col-md-6 mx-auto text-center my-3 pt-md-5"> --}}
                    <h5 class="w-700">
                        إرفاق إيصال التحويل البنكي
                    </h5>
                        <div class="form-group mt-5">
                            <input required name="image" type="file" class="dropify id-img" data-height="300" />
                        </div>
                        <button type="submit" class="btn btn-blue mt-4 w-100 wow fadeInUp">إرسال</a>
                {{-- </div> --}}
            </form>
            <br>
            <div class="mt-5">
                <p class="my-auto text-center" style="color: black">
                    هل تريد الاطلاع على الحسابات البنكية ؟
                    <a href="{{route('home')}}#banks" class="yellow w-700">
                        اضغط هنا
                    </a>
                </p>
            </div>

        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container pt-5">
            <div class="row  pb-lg-3">
                <div class="col-md-4 mb-lg-0 mb-4 pl-5">
                    <img src="{{asset('images/logo.png')}}">
                    <p class="pt-4">
                        {{$about_note}}                    </p>
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
    <script type="text/javascript">
        $(function(){
            $('#amount').on('input', function(e) {
                calculate();
            });
            function calculate(){
                var amount = parseInt($('#amount').val());
                var ratio = parseInt($('#ratio').val());
                var debit="";
                if(isNaN(amount) || isNaN(ratio)){
                    debit=" ";
                }else{
                    debit = ((amount * ratio) / 100);
                }
                $('#debit').val(debit);
            }
        });
    </script>
@endsection
