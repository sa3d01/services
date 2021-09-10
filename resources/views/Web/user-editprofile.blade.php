@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <!-- content -->
    <div class="container ">
        <div class="row py-5">
            <div class="col-md-9 mx-auto py-md-5">
                <form id="editProfile-form" class="row">
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
                        <div class="form-group wow fadeInUp ">
                            <input value="{{auth()->user()->name}}" type="text" class="form-control" placeholder="الاسم">
                        </div>
                        <div class="form-group wow fadeInUp ">
                            <input value="{{auth()->user()->phone}}" type="tel" class="form-control" placeholder="رقم الجوال">
                        </div>
                        <div class="form-group wow fadeInUp ">
                            @php($city_name_column='name_'.session()->get('locale'))
                            <select class="form-control">
                                <option value="{{auth()->user()->city_id}}">
                                    {{auth()->user()->city->$city_name_column}}
                                </option>
                                @foreach(\App\Models\DropDown::whereClass('City')->whereStatus(1)->get() as $city)
                                    <option value="{{$city->id}}">{{$city->$city_name_column}}</option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down yellow"></i>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="googleMap" class="m-auto detailsMap"></div>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <a href="#" type="submit" class="btn btn-blue mt-4 w-100 wow fadeInUp">حفظ التعديل</a>
                        <div class="mt-5">
                            <p class="my-auto text-center">
                                هل تريد تغير كلمة المرور ؟
                                <a href="#" class="yellow w-700">
                                    اضغط هنا
                                </a>
                            </p>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @include('Web.layouts.partials.footer')
@endsection

