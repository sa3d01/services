@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container py-5">
        <div class="py-3">
            <div class="row ">
                @if (count($notifications)==0)
                    <div class="bg-light br-25 pt-5 pb-4 px-4 h-100">
                        <h1 class="d-inline-block w-700 fontS-50 lineH-0">
                            لا توجد لديك اشعارات بعد !
                        </h1>
                    </div>
                @endif
                @foreach($notifications as $notification)
                <div class="col-md-6 my-3">
                    <div class="bg-light br-25 h-100 p-3 notification">
                        <div class="mb-2">
                            <div class="not-icon d-inline-block ml-2">
                                <i class="far fa-bell"></i>
                            </div>
                            <label class="text-muted">{{\Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</label>
                        </div>
                        <p class="w-700 m-0">
                            {{$notification->note}}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- footer -->
@include('Web.layouts.partials.footer')
@endsection
