<!-- categories -->
<div class="container px-md-0 p-5">
    <h4 class="w-700 pb-4">
        المجالات
    </h4>
    <div class="row">
        <div class="owl-carousel owl-theme mt-3 text-center" id="fields">
            @foreach(\App\Models\Category::where('parent_id',null)->where('banned',0)->get() as $category)
            <div class="item ">
                <a href="user-majors.blade.php">
                    <div class="bg-light p-3">
                        <img src="{{$category->image}}" class="img-fluid w-auto d-inline-block" alt="">
                        @php($category_name_column='name_'.session()->get('locale'))
                        <h4 class="d-inline-block pr-2 m-0 blue">{{$category->$category_name_column}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Most rated -->
<div class="container px-md-0 p-5">
    <h4 class="w-700 pb-4">
        الأكثر تقييماً
    </h4>
    <div class="row">
        <div class="owl-carousel owl-theme mt-3" id="rated">
            @foreach(\App\Models\User::whereType('PROVIDER')->take(10)->get() as $provider)
            <div class="item ">
                <a href="">
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
    </div>
</div>
