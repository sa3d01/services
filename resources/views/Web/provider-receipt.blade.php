@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container py-5">
{{--        <div class="row ">--}}
{{--            <div class="col-md-6 mx-auto my-3">--}}
{{--                <h4 class="text-center w-700 mb-5">--}}
{{--                    هل لديك كود خصم--}}
{{--                </h4>--}}
{{--                <form action="">--}}
{{--                    <div class="form-group wow fadeInDown">--}}
{{--                        <input type="text" class="form-control" placeholder="كود الخصم" id="code">--}}
{{--                    </div>--}}
{{--                    <a href="provider-home.blade.php" class="btn btn-blue mt-4 w-100 wow fadeInUp">--}}
{{--                        إرسال--}}
{{--                    </a>--}}
{{--                    <div class="mt-5">--}}
{{--                        <p class="my-auto text-center">--}}
{{--                            قيمة الاشتراك الشهري بعد الخصم--}}
{{--                            <strong>30</strong> ريال سعودي--}}
{{--                            <a href="provider-receipt.blade.php" class="btn btn-border wow fadeInUp mx-2">تأكيد الاشتراك</a>--}}
{{--                        </p>--}}
{{--                    </div>--}}

{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}

        <form enctype="multipart/form-data" method="POST" class="row" action="{{route('provider.subscribe')}}">
            @csrf
            <input type="hidden" name="package_id" value="{{$id}}">
                <div class="col-md-6 mx-auto text-center my-3 ">
                    <h5 class="w-700">
                        إرفاق إيصال التحويل البنكي
                    </h5>
                    <div class="form-group mt-5">
                        <input name="image" type="file" class="dropify id-img" data-height="300" />
                    </div>
                    <div class="form-group wow fadeInDown">
                        <input type="text" class="form-control" placeholder="كود الخصم" id="code">
                    </div>
                    <div class="mt-5">
                        <p class="my-auto text-center">
                            قيمة الاشتراك الشهري بعد الخصم
                            <strong>{{\App\Models\Package::where('id',$id)->value('price')}}</strong> ريال سعودي
                        </p>
                    </div>
                    <button type="submit" class="btn btn-blue mt-4 w-100 wow fadeInUp">إرسال</button>
                    <div class="mt-5">
                        <p class="my-auto text-center">
                            هل تريد الاطلاع على الحسابات البنكية ؟

                            <a href="{{route('home')}}#banks" class="yellow w-700">
                                اضغط هنا
                            </a>
                        </p>
                    </div>
                </div>
        </form>
    </div>
  <!-- footer -->
@include('Web.layouts.partials.footer')
@endsection
