@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <!-- search -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">

                <form action="{{ route('search-provider') }}" method="GET" class="input-group my-3 pt-3">
                    @csrf
                    <input name="input_search" type="search" class="form-control br-25 px-4" placeholder="بحث عن مزود خدمة">

                    <div class="form-group wow fadeInDown">
                        <select name="city_id" class="form-control">
                            <option hidden>المدينة</option>
                            @foreach(\App\Models\DropDown::whereClass('City')->get() as $city)
                                <option value="{{$city->id}}">{{$city->name_ar}}</option>
                            @endforeach
                        </select>
                        <i class="fas fa-chevron-down yellow"></i>
                    </div>

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-blue mr-3 search-btn "><i class="fas fa-search yellow"></i></button>
                    </div>

                </form>



            </div>
        </div>
    </div>
    <!-- providers -->
    <div class="container px-md-0 p-3">
        <div class="d-md-flex justify-content-between row">
            <div class="col-md-6">
                <h4 class="w-700 my-3">
                    مزودين الخدمات
                </h4>
            </div>

        </div>
        <div class="row" id="providerSearch">
            @foreach($providers as $provider)
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
        <!-- pagination -->
        <div class="text-center">
            {{ $providers->links() }}
{{--            <ul class="pagination d-inline-flex">--}}
{{--                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item active"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--            </ul>--}}
        </div>
    </div>
    <!-- footer -->
    @include('Web.layouts.partials.footer')
@endsection
