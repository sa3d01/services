@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container ">
        <div class="row py-5">
            <div class="col-md-9 mx-auto py-md-5">
                <form id="editProfile-form" enctype="multipart/form-data" method="POST" class="row" action="{{route('provider.update',auth()->id())}}">
                    @csrf
                    <div class="col-md-12 form-group wow fadeInDown pb-3">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url({{auth()->user()->image}});" class="e-userImg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group wow fadeInDown ">
                            <input name="name" value="{{auth()->user()->name}}" type="text" class="form-control" placeholder="الاسم" id="name">
                        </div>
                        <div class="form-group wow fadeInDown ">
                            <input name="phone" value="{{auth()->user()->phone}}" type="text" class="form-control" placeholder="رقم الجوال" id="phone">
                        </div>
                        <div class="form-group wow fadeInUp ">
                            @php($city_name_column='name_'.session()->get('locale'))
                            <select name="city_id" class="form-control">
                                <option value="{{auth()->user()->city_id}}">
                                    {{auth()->user()->city->$city_name_column}}
                                </option>
                                @foreach(\App\Models\DropDown::whereClass('City')->whereStatus(1)->get() as $city)
                                    <option value="{{$city->id}}">{{$city->$city_name_column}}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down yellow"></i>
                        </div>

                        <div class="form-group wow fadeInDown ">
                            <h6 class="w-700">
                                الجنسية
                            </h6>
                            <div class="custom-control custom-radio d-inline-block">
                                <input type="radio" id="s3ode" name="nationality" class="custom-control-input" value="سعودي" @if(auth()->user()->nationality=='سعودي') checked @endif>
                                <label class="custom-control-label" for="s3ode">سعودي</label>
                            </div>
                            <div class="custom-control custom-radio d-inline-block">
                                <input type="radio" id="other" name="nationality" class="custom-control-input" value="other" @if(auth()->user()->nationality!='سعودي') checked @endif>
                                <label class="custom-control-label" for="other">غير ذلك</label>
                            </div>
                            <div class="form-group mt-2" id="nationality">
                                <input name="nationality" value="{{auth()->user()->nationality}}" type="text" class="form-control" placeholder="جنسيتك" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group wow fadeInDown ">
                            <input value="{{auth()->user()->socials()->first()->facebook}}" name="facebook" type="url" class="form-control" placeholder="فيسبوك" id="">
                        </div>

                        <div class="form-group wow fadeInDown ">
                            <input value="{{auth()->user()->socials()->first()->twitter}}" name="twitter" type="url" class="form-control" placeholder="تويتر" id="">
                        </div>

                        <div class="form-group wow fadeInDown ">
                            <input value="{{auth()->user()->socials()->first()->insta}}" name="insta" type="url" class="form-control" placeholder="انستجرام" id="">
                        </div>
                        <div class="form-group wow fadeInDown ">
                            <input value="{{auth()->user()->socials()->first()->snap}}" name="snap" type="url" class="form-control" placeholder="سناب شات" id="">
                        </div>

                    </div>
                    <div class="col-md-6 mx-auto">
                        <button type="submit" class="btn btn-blue mt-4 w-100 wow fadeInUp">حفظ التعديل</button>
{{--                        <div class="mt-5">--}}
{{--                            <p class="my-auto text-center">--}}
{{--                                هل تريد تغير كلمة المرور ؟--}}
{{--                                <a href="user-changePass.blade.php" class="yellow w-700">--}}
{{--                                    اضغط هنا--}}
{{--                                </a>--}}
{{--                            </p>--}}
{{--                        </div>--}}
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('Web.layouts.partials.footer')
@endsection

