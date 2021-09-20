@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <!-- content -->
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto text-center my-5">
                <img src="{{asset('images/addServ.png')}}" class="img-fluid mb-4" alt="">
                <p class="w-700 my-4 d-inline-block">
                    حتي يتم إضافة الخدمة بنجاح نرجو منك اختيار اشتراك و دفع قيمته
                </p>
                <a href="{{route('home')}}#packages" class="btn btn-border wow fadeInUp mx-2">عرض الاشتراكات</a>
            </div>
        </div>
    </div>
    @include('Web.layouts.partials.footer')
@endsection
