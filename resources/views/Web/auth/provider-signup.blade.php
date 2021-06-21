@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container py-5">
        <div class="row ">
            <div class="col-md-10 mx-auto my-3">
                <h4 class="text-center w-700 mb-5">
                    {{ __('auth.provider-signup-title') }}
                </h4>
                <form action="" class="row">
                    <div class="col-md-6">
                        <div class="form-group wow fadeInDown ">
                            <input type="text" class="form-control" placeholder="الاسم" id="name">
                        </div>
                        <div class="form-group wow fadeInDown ">
                            <input type="tel" class="form-control" placeholder="رقم الجوال" id="phone">
                        </div>
                        <div class="form-group wow fadeInDown ">
                            <select class="form-control" name="" id="">
                                <option hidden>المدينة</option>
                                <option value="cairo">القاهره</option>
                            </select>
                            <i class="fas fa-chevron-down yellow"></i>
                        </div>
                        <div class="form-group wow fadeInDown ">
                            <input type="text" class="form-control" placeholder="الموقع" id="location">
                            <i class="fas fa-crosshairs yellow"></i>
                        </div>
                        <div class="form-group wow fadeInDown">
                            <input type="password" class="form-control" placeholder="كلمة المرور" id="pass">
                            <i class="fas fa-eye togglePass yellow " toggle="#pass"></i>
                        </div>
                        <div>
                            <div class="form-group custom-control custom-checkbox wow fadeInDown">
                                <input type="checkbox" class="custom-control-input" id="join" name="">
                                <label class="custom-control-label" for="join">الانضمام عن طريق أحد مزودي الخدمات بالتطبيق</label>
                            </div>
                            <div class="form-group mt-2" id="providerCode">
                                <input type="text" class="form-control" placeholder="الرمز الخاص لمزود الخدمة" id="">
                            </div>
                        </div>
                        <div class="form-group custom-control custom-checkbox wow fadeInDown">
                            <input type="checkbox" class="custom-control-input" id="checkTerms" name="">
                            <label class="custom-control-label" for="checkTerms">أوافق على الشروط و الأحكام</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group wow fadeInDown ">
                            <input type="text" class="form-control" placeholder="فيسبوك" id="">
                        </div>

                        <div class="form-group wow fadeInDown ">
                            <input type="text" class="form-control" placeholder="تويتر" id="">
                        </div>

                        <div class="form-group wow fadeInDown ">
                            <input type="text" class="form-control" placeholder="انستجرام" id="">
                        </div>
                        <div class="form-group wow fadeInDown ">
                            <input type="text" class="form-control" placeholder="سناب شات" id="">
                        </div>
                        <div class="form-group wow fadeInDown ">
                            <h6 class="w-700">
                                الجنسية
                            </h6>
                            <div class="custom-control custom-radio d-inline-block">
                                <input type="radio" id="s3ode" name="nationality" class="custom-control-input" value="s3ode" checked>
                                <label class="custom-control-label" for="s3ode">سعودي</label>
                            </div>
                            <div class="custom-control custom-radio d-inline-block">
                                <input type="radio" id="other" name="nationality" class="custom-control-input">
                                <label class="custom-control-label" for="other">غير ذلك</label>
                            </div>
                            <div class="form-group mt-2" id="nationality">
                                <input type="text" class="form-control" placeholder="جنسيتك" id="">
                            </div>
                        </div>
                    </div>
                    <a href="user-signupActivation.blade.php" class="btn btn-blue mt-4 w-100 wow fadeInUp">تسجيل حساب جديد</a>
                    <div class="mt-5 text-center mx-auto">
                        <p class="my-auto text-center">
                            هل تمتلك حساب ؟
                            <a href="provider-login.blade.php" class="yellow w-700">
                                سجل دخول الآن
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
