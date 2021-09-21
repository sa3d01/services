@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container mt-5">
        <!-- majors -->
        <h4 class="w-700 my-3">
            التخصصات
        </h4>
        <!--  -->
        <ul class="nav nav-pills row" role="tablist">
            @foreach($category->childs as $sub)
            <li class="nav-item col-lg-2 col-6 my-3">
                <a class="nav-link @if($loop->first) active @endif" data-toggle="pill" href="#major-{{$sub->id}}">
                    <div class="bg-light br-25 text-center p-4 h-100">
                        <h5 class="m-0 mt-3">
                            {{$sub->name_ar}}
                        </h5>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
        <!-- providers-->
        <div class="tab-content mt-5">
            <h4 class="w-700 my-3">
                مزودين الخدمات
            </h4>
            @foreach($category->childs as $sub)
                <div id="major-{{$sub->id}}" class="container tab-pane @if($loop->first) active @endif">
                    <div class="row" id="providerSearch">
                        @php
                            $userIds=\App\Models\Product::where('category_id',$sub->id)->pluck('user_id')->toArray();
                        @endphp
                        @foreach(\App\Models\User::whereIn('id',$userIds)->get() as $provider)
                        <div class="col-lg-2 col-md-4 my-3">
                            <a href="{{route('provider.show',$provider->id)}}">
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
{{--                    <!-- pagination -->--}}
{{--                    <div class="text-center">--}}
{{--                        <ul class="pagination d-inline-flex">--}}
{{--                            <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                            <li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
{{--                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
                </div>
            @endforeach
        </div>
    </div>
    <!-- footer -->
    @include('Web.layouts.partials.footer')
@endsection
