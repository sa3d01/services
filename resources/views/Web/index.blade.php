<!DOCTYPE html>
<html lang="ar">

<head>
    <!-- Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- title -->
    <title>في الخدمة</title>
    <link rel="shortcut icon" type="image/ico" href="{{asset('images/favIcon.ico')}}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href='{{asset('css/animate.css')}}'>
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <!-- header -->
    <header>
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light nav-slider pt-5">
            <div class="container">
                <a class="navbar-brand d-block d-lg-none sm-logo" href="home.blade.php">
                    <img src="{{asset('images/logo.png')}}">
                </a>
                <button class="navbar-toggler collapsed blue-bg text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars default-color "></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand d-none d-lg-block mx-5 lg-logo mx-auto" href="home.blade.php">
                        <img src="{{asset('images/logo.png')}}" class="mx-5 wow zoomIn">
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
        <div class="row ltr">
            <!-- <div class="col-md-6 rtl my-3">
            </div> -->
            <div class="col-md-9 mx-auto rtl my-auto wow fadeIn py-3">
                <!-- <h4 class="w-700">موقع في الخدمة</h4> -->
                <div>
                    <div class="owl-carousel owl-theme text-center" id="indexSlider">
                        <div class="item my-3">
                            <img src="{{asset('images/vec1.png')}}" class="img-fluid  wow zoomIn" alt="">

                            <p class="mt-4">
                                موقع في الخدمة هو منصة إلكترونية خاصة لعرض العديد من الخدمات و الأعمال فسوف تجد كل ما تحتاج له في مكان واحد فنحن في خدمتكم
                            </p>
                        </div>
                        <div class="item my-3">
                            <img src="{{asset('images/vec2.png')}}" class="img-fluid  wow zoomIn" alt="">

                            <p class="mt-4">
                                تستطيع عرض أعمالك و خدماتك و الوصول للعديد من طالبين الخدمات من خلال التطبيق عن طريق الاشتراك معنا بسهولة
                            </p>
                        </div>
                    </div>
                </div>
                <div class="text-center my-3">
                    <a href="user-signup.blade.php" class="btn btn-blue px-md-5 px-4 my-md-0 my-3">طالب خدمة</a>
                    <a href="provider-signup.blade.php" class="btn btn-yellow px-md-5 px-4 mr-2 my-md-0 my-3">مزود خدمة</a>
                </div>
            </div>
        </div>
    </div>
    <!--scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
    <script type="text/javascript " src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script type="text/javascript " src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript " src="{{asset('js/wow.min.js')}}"></script>
    <script type="text/javascript " src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript " src="{{asset('js/scripts.js')}}"></script>
</body>

</html>
