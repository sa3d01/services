<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title -->
    <title>في الخدمة</title>
    <link rel="shortcut icon" type="image/ico" href="../../../../public/images/favIcon.ico" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="../../../../public/fonts/fontawesome/css/all.css">
    <link rel="stylesheet" href='css/animate.css'>
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light nav-slider pt-5">
            <div class="container">
                <a class="navbar-brand d-block d-lg-none sm-logo" href="provider-home.blade.php">
                    <img src="../../../../public/images/logo.png">
                </a>
                <button class="navbar-toggler collapsed blue-bg text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars default-color "></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand d-none d-lg-block mx-5 lg-logo mx-auto" href="provider-home.blade.php">
                        <img src="../../../../public/images/logo.png" class="mx-5 wow zoomIn">
                    </a>
                    <div class="navbar-nav ">
                        <select class="border-0 ">
                            <option value="ar">اللغة العربية</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                </div>
            </div>
        </nav>

    </header>
    <!-- content -->

    <div class="container py-5">
        <div class="row ">
            <div class="col-md-10 mx-auto my-3">
                <h4 class="text-center w-700 mb-5">
                    تسجيل حساب جديد لمزود الخدمة
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
    <!--scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/jquery-3.2.1.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/bootstrap.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/wow.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/owl.carousel.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/scripts.js "></script>
</body>

</html>
