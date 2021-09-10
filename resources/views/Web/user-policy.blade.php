@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <!-- content -->
    <div class="container py-5">
        <div class="row ltr">
            <div class="col-md-6 rtl p-md-3">
                <img src="{{asset('images/policy.png')}}" class="img-fluid p-5" alt="">
            </div>
            <div class="col-md-6 rtl my-auto">
                <h4 class=" w-700 mb-3">
                    {{$title}}
                </h4>
                <p>
                    {{$note}}
                </p>
            </div>
        </div>
    </div>
    @include('Web.layouts.partials.footer')
@endsection
