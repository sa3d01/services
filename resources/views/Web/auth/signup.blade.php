@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('styles')
    <link href="{{asset('assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="container py-5">
        <div class="row ">
            <div class="col-md-10 mx-auto my-3">
                <h4 class="text-center w-700 mb-5">
                    تسجيل حساب جديد
                    @if($type=='user')
                        {{ __('message.user_name') }}
                    @else
                        {{ __('message.provider_name') }}
                    @endif
                </h4>
                <form method="POST" class="row" action="{{route('signup.submit')}}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="type" value="{{$type}}">
                    @if($type=='user')
                        <div class="col-md-6">
                            <div class="form-group wow fadeInDown ">
                                <input required name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="الاسم" id="name">
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group wow fadeInDown ">
                                <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" placeholder="رقم الجوال" id="phone" pattern="(05)(5|0|3|6|4|9|1|8|7)([0-9]{7})" oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' :'برجاء ادخال رقم جوال صحيح يبدأ بـ 05');"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')">
                            </div>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group wow fadeInDown ">
                                <select required class="form-control @error('city_id') is-invalid @enderror" name="city_id">
                                    <option hidden>المدينة</option>
                                    @foreach(\App\Models\DropDown::whereClass('City')->whereStatus(1)->get() as $city)
                                        @php($city_name_column='name_'.session()->get('locale')??'ar')
                                        <option value="{{$city->id}}">{{$city->$city_name_column}}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down yellow"></i>
                            </div>
                            @error('city_id')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group wow fadeInDown">
                                <input required name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور" id="pass">
                                <i class="fas fa-eye togglePass yellow " toggle="#pass"></i>
                            </div>
                            <div class="form-group custom-control custom-checkbox wow fadeInDown">
                                <input required type="checkbox" class="custom-control-input" id="checkTerms" name="terms">
                                <label class="custom-control-label" for="checkTerms">أوافق على الشروط و الأحكام</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-box">
                                <div id="map" class="gmaps"></div>
                                <input name="lat" type="hidden" id="lat">
                                <input name="lng" type="hidden" id="lng">
                            </div>
                        </div>
                    @else
                        <div class="col-md-6">
                            <div class="form-group wow fadeInDown ">
                                <input required name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="الاسم" id="name">
                            </div>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="form-group wow fadeInDown ">
                                <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="رقم الجوال" id="phone" >
                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group wow fadeInDown ">
                                <select class="form-control @error('city_id') is-invalid @enderror" name="city_id" id="city_id">
                                    <option hidden>المدينة</option>
                                    @foreach(\App\Models\DropDown::whereClass('City')->whereStatus(1)->get() as $city)
                                        @php($city_name_column='name_'.session()->get('locale'))
                                        <option value="{{$city->id}}">{{$city->$city_name_column}}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-chevron-down yellow"></i>
                            </div>
                            @error('city_id')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="form-group wow fadeInDown">
                                <input required name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="كلمة المرور" id="pass">
                                <i class="fas fa-eye togglePass yellow " toggle="#pass"></i>
                            </div>
                            @error('passord')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div>
                                <div class="form-group custom-control custom-checkbox wow fadeInDown">
                                    <input type="checkbox" class="custom-control-input" id="join" name="">
                                    <label class="custom-control-label" for="join">الانضمام عن طريق أحد مزودي الخدمات بالتطبيق</label>
                                </div>
                                <div class="form-group mt-2" id="providerCode">
                                    <input name="marketer_id" type="text" class="form-control" placeholder="الرمز الخاص لمزود الخدمة" id="">
                                </div>
                            </div>
                            <div class="form-group custom-control custom-checkbox wow fadeInDown">
                                <input required type="checkbox" class="custom-control-input" id="checkTerms" name="terms">
                                <label class="custom-control-label" for="checkTerms">أوافق على الشروط و الأحكام</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group wow fadeInDown ">
                                <input name="facebook" type="url" class="form-control" placeholder="فيسبوك" id="">
                            </div>

                            <div class="form-group wow fadeInDown ">
                                <input name="twitter" type="url" class="form-control" placeholder="تويتر" id="">
                            </div>

                            <div class="form-group wow fadeInDown ">
                                <input name="insta" type="url" class="form-control" placeholder="انستجرام" id="">
                            </div>
                            <div class="form-group wow fadeInDown ">
                                <input name="snap" type="url" class="form-control" placeholder="سناب شات" id="">
                            </div>
                            <div class="form-group wow fadeInDown ">
                                <h6 class="w-700">
                                    الجنسية
                                </h6>
                                <div class="custom-control custom-radio d-inline-block">
                                    <input type="radio" id="s3ode" name="nationality" class="custom-control-input" value="سعودي" checked>
                                    <label class="custom-control-label" for="s3ode">سعودي</label>
                                </div>
                                <div class="custom-control custom-radio d-inline-block">
                                    <input type="radio" id="other" name="nationality" class="custom-control-input" value="other">
                                    <label class="custom-control-label" for="other">غير ذلك</label>
                                </div>
                                <div class="form-group mt-2" id="nationality">
                                    <input type="text" class="form-control" placeholder="جنسيتك" id="">
                                </div>
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-blue mt-4 w-100 wow fadeInUp">تسجيل حساب جديد</button>
                </form>
                <div class="mt-5 text-center mx-auto">
                    <p class="my-auto text-center">
                        هل تمتلك حساب ؟
                        <a href="{{route('login',['type'=>$type])}}" class="yellow w-700">
                            سجل دخول الآن
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                // center: {lat:  window.lat   , lng:  window.lng   },
                center: {lat: 24.774265, lng: 46.738586},
                zoom: 15,
                mapTypeId: 'roadmap'
            });
            var marker;
            google.maps.event.addListener(map, 'click', function (event) {
                map.setZoom();
                var mylocation = event.latLng;
                map.setCenter(mylocation);
                $('#lat').val(event.latLng.lat());
                $('#lng').val(event.latLng.lng());
                setTimeout(function () {
                    if (!marker)
                        marker = new google.maps.Marker({position: mylocation, map: map});
                    else
                        marker.setPosition(mylocation);
                }, 600);
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjBZsq9Q11itd0Vjz_05CtBmnxoQIEGK8&&callback=initMap" type="text/javascript">
    </script>
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

@endsection
