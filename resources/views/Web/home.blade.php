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
                <a class="navbar-brand d-block d-lg-none sm-logo" href="home.blade.php">
                    <img src="../../../../public/images/logo.png">
                </a>
                <button class="navbar-toggler collapsed default-bg" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="home.blade.php">
                                <i class="fas fa-home"></i> الرئيسية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <i class="far fa-user"></i> الصفحة الشخصية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="far fa-bell"></i> الإشعارات
                            </a>
                        </li>

                    </ul>


                    <a class="navbar-brand d-none d-lg-block mx-5 lg-logo mx-auto" href="home.blade.php">
                        <img src="../../../../public/images/logo.png" class="mx-5">
                    </a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-percent mx-1"></i> نسبة الموقع
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-power-off"></i> تسجيل خروج
                            </a>
                        </li>

                        <li class="nav-item">
                            <select class="border-0 nav-link">
                                <option value="ar">اللغة العربية</option>
                                <option value="en">English</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--  -->
    <div class="container p-relative">
        <div class="row ltr">
            <div class="col-md-6 rtl my-3 p-md-5">
                <img src="../../../../public/images/header.png" class="img-fluid p-md-5 p-4 wow zoomIn" alt="">
            </div>
            <div class="col-md-6 rtl my-auto wow fadeIn py-3 ">
                <h4 class="w-700">
                    عن موقع في الخدمة
                </h4>
                <p>
                    هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق
                </p>
                <div>
                    <div class="input-group my-3 pt-3 w-75">
                        <input type="text" class="form-control br-25 px-4" placeholder="بحث عن مزود خدمة">
                        <div class="input-group-append">
                            <a href="user-search.blade.php" class="btn btn-blue mr-3 search-btn "><i class="fas fa-search yellow"></i></a>
                        </div>
                    </div>
                </div>
                <div class="w-75">
                    <div class="owl-carousel owl-theme " id="headerSlider">
                        <div class="item my-3">
                            <img src="../../../../public/images/headerSlide.png" class="img-fluid br-25" alt="">
                        </div>
                        <div class="item my-3">
                            <img src="../../../../public/images/headerSlide.png" class="img-fluid br-25" alt="">
                        </div>
                        <div class="item my-3">
                            <img src="../../../../public/images/headerSlide.png" class="img-fluid br-25" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- social -->
        <div class="headerSocial  d-none d-lg-block">
            <ul class="p-0 m-0 social mt-4">
                <li class="my-2">
                    <a href=" " class="text-white">
                        <img src="../../../../public/images/icons/fb.png" class="img-fluid" alt="">
                    </a>
                </li>
                <li class="my-2">
                    <a href=" " class="text-white">
                        <img src="../../../../public/images/icons/tw.png" class="img-fluid" alt="">
                    </a>
                </li>
                <li class="my-2">
                    <a href=" " class="text-white">
                        <img src="../../../../public/images/icons/snap.png" class="img-fluid" alt="">
                    </a>
                </li>
                <li class="my-2">
                    <a href=" " class="text-white">
                        <img src="../../../../public/images/icons/insta.png" class="img-fluid" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- fields -->
    <div class="container px-md-0 p-5">
        <h4 class="w-700 pb-4">
            المجالات
        </h4>
        <div class="row">
            <div class="owl-carousel owl-theme mt-3 text-center" id="fields">
                <div class="item ">
                    <a href="user-majors.blade.php">
                        <div class="bg-light p-3">
                            <img src="../../../../public/images/icons/f1.png" class="img-fluid w-auto d-inline-block" alt="">
                            <h4 class="d-inline-block pr-2 m-0 blue">سباكة</h4>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="user-majors.blade.php">
                        <div class="bg-light p-3">
                            <img src="../../../../public/images/icons/f2.png" class="img-fluid w-auto d-inline-block" alt="">
                            <h4 class="d-inline-block pr-2 m-0 blue">بناء</h4>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="user-majors.blade.php">
                        <div class="bg-light p-3">
                            <img src="../../../../public/images/icons/f3.png" class="img-fluid w-auto d-inline-block" alt="">
                            <h4 class="d-inline-block pr-2 m-0 blue">عقارات</h4>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="user-majors.blade.php">
                        <div class="bg-light p-3">
                            <img src="../../../../public/images/icons/f4.png" class="img-fluid w-auto d-inline-block" alt="">
                            <h4 class="d-inline-block pr-2 m-0 blue">نجارة</h4>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="user-majors.blade.php">
                        <div class="bg-light p-3">
                            <img src="../../../../public/images/icons/f1.png" class="img-fluid w-auto d-inline-block" alt="">
                            <h4 class="d-inline-block pr-2 m-0 blue">سباكة</h4>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="user-majors.blade.php">
                        <div class="bg-light p-3">
                            <img src="../../../../public/images/icons/f1.png" class="img-fluid w-auto d-inline-block" alt="">
                            <h4 class="d-inline-block pr-2 m-0 blue">سباكة</h4>
                        </div>
                    </a>
                </div>
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
                <div class="item ">
                    <a href="">
                        <div class="bg-light br-25  p-3">
                            <div class="yellow f-25 w-700">
                                <i class="far fa-star"></i>
                                <h5 class="f-25 d-inline-block mb-3">8</h5>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <img src="../../../../public/images/user.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="mr-2">
                                    <h6 class="text-dark">
                                        عبد الرحمن المهدي
                                    </h6>
                                    <label class="text-muted">
                                    00966457892
                                </label>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="">
                        <div class="bg-light br-25  p-3">
                            <div class="yellow f-25 w-700">
                                <i class="far fa-star"></i>
                                <h5 class="f-25 d-inline-block mb-3">8</h5>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <img src="../../../../public/images/user.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="mr-2">
                                    <h6 class="text-dark">
                                        عبد الرحمن المهدي
                                    </h6>
                                    <label class="text-muted">
                                    00966457892
                                </label>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="">
                        <div class="bg-light br-25  p-3">
                            <div class="yellow f-25 w-700">
                                <i class="far fa-star"></i>
                                <h5 class="f-25 d-inline-block mb-3">8</h5>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <img src="../../../../public/images/user.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="mr-2">
                                    <h6 class="text-dark">
                                        عبد الرحمن المهدي
                                    </h6>
                                    <label class="text-muted">
                                    00966457892
                                </label>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="">
                        <div class="bg-light br-25  p-3">
                            <div class="yellow f-25 w-700">
                                <i class="far fa-star"></i>
                                <h5 class="f-25 d-inline-block mb-3">8</h5>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <img src="../../../../public/images/user.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="mr-2">
                                    <h6 class="text-dark">
                                        عبد الرحمن المهدي
                                    </h6>
                                    <label class="text-muted">
                                    00966457892
                                </label>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="">
                        <div class="bg-light br-25  p-3">
                            <div class="yellow f-25 w-700">
                                <i class="far fa-star"></i>
                                <h5 class="f-25 d-inline-block mb-3">8</h5>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <img src="../../../../public/images/user.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="mr-2">
                                    <h6 class="text-dark">
                                        عبد الرحمن المهدي
                                    </h6>
                                    <label class="text-muted">
                                    00966457892
                                </label>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="">
                        <div class="bg-light br-25  p-3">
                            <div class="yellow f-25 w-700">
                                <i class="far fa-star"></i>
                                <h5 class="f-25 d-inline-block mb-3">8</h5>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <img src="../../../../public/images/user.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="mr-2">
                                    <h6 class="text-dark">
                                        عبد الرحمن المهدي
                                    </h6>
                                    <label class="text-muted">
                                    00966457892
                                </label>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="item ">
                    <a href="">
                        <div class="bg-light br-25  p-3">
                            <div class="yellow f-25 w-700">
                                <i class="far fa-star"></i>
                                <h5 class="f-25 d-inline-block mb-3">8</h5>
                            </div>
                            <div class="d-flex">
                                <div>
                                    <img src="../../../../public/images/user.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="mr-2">
                                    <h6 class="text-dark">
                                        عبد الرحمن المهدي
                                    </h6>
                                    <label class="text-muted">
                                    00966457892
                                </label>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


        </div>
    </div>
    <!-- contact form -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-md-7 p-5 yellow-bg br-25 mx-auto" id="contactForm">
                <h4 class="w-700 pb-4 text-center text-white">
                    تواصل معنا
                </h4>
                <form action="" class="px-md-5">
                    <div class="form-group wow fadeInDown">
                        <select class="form-control" name="" id="">
                            <option hidden>نوع رسالة التواصل</option>
                            <option value="cairo">شكوى</option>
                        </select>
                        <i class="fas fa-chevron-down yellow"></i>
                    </div>
                    <div class="form-group wow fadeInDown">
                        <textarea class="form-control p-4 br-25" rows="5" placeholder="الرسالة"></textarea>
                    </div>
                    <a href="user-signupActivation.blade.php" class="btn btn-blue mt-4 w-100 wow fadeInUp">ارسال</a>
                </form>
            </div>
        </div>
    </div>
    <!-- banks -->
    <div class="container pt-5 " id="banks">
        <h4 class="w-700 pb-4">
            الحسابات البنكية
        </h4>
        <div class="row">
            <div class="col-lg-2 col-md-4 my-3 wow zoomIn">
                <div class="bg-light br-25 text-center p-3">
                    <img src="../../../../public/images/bank1.png" class="img-fluid" alt="">
                    <h6>
                        البنك الأهلي السعودي
                    </h6>
                    <label class="text-muted">
                        12345678901234
                    </label>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 my-3 wow zoomIn">
                <div class="bg-light br-25 text-center p-3">
                    <img src="../../../../public/images/bank1.png" class="img-fluid" alt="">
                    <h6>
                        البنك الأهلي السعودي
                    </h6>
                    <label class="text-muted">
                        12345678901234
                    </label>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 my-3 wow zoomIn">
                <div class="bg-light br-25 text-center p-3">
                    <img src="../../../../public/images/bank2.png" class="img-fluid" alt="">
                    <h6>
                        البنك الأهلي السعودي
                    </h6>
                    <label class="text-muted">
                        12345678901234
                    </label>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 my-3 wow zoomIn">
                <div class="bg-light br-25 text-center p-3">
                    <img src="../../../../public/images/bank1.png" class="img-fluid" alt="">
                    <h6>
                        البنك الأهلي السعودي
                    </h6>
                    <label class="text-muted">
                        12345678901234
                    </label>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 my-3 wow zoomIn">
                <div class="bg-light br-25 text-center p-3">
                    <img src="../../../../public/images/bank1.png" class="img-fluid" alt="">
                    <h6>
                        البنك الأهلي السعودي
                    </h6>
                    <label class="text-muted">
                        12345678901234
                    </label>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container pt-5">
            <div class="row  pb-lg-3">
                <div class="col-md-4 mb-lg-0 mb-4 pl-5">
                    <img src="../../../../public/images/Logo.png" alt="" class="img-fluid logo">
                    <p class="pt-4">
                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد
                    </p>
                </div>
                <div class="col-md-4 mb-lg-0 mb-4">
                    <h5 class="default-color w-700 mb-3">
                        تواصل معنا
                    </h5>
                    <label class="d-block">
                        01123456789
                    </label>
                    <a href="mailto: felkhedma@gmail.com " class="text-muted ">felkhedma@gmail.com</a>
                    <div>
                        <ul class="p-0 m-0 social mt-4">
                            <li class="d-inline-block mx-1">
                                <a href=" " class="text-white">
                                    <img src="../../../../public/images/icons/fb.png" class="img-fluid" alt="">
                                </a>
                            </li>
                            <li class="d-inline-block mx-1">
                                <a href=" " class="text-white">
                                    <img src="../../../../public/images/icons/tw.png" class="img-fluid" alt="">
                                </a>
                            </li>
                            <li class="d-inline-block mx-1">
                                <a href=" " class="text-white">
                                    <img src="../../../../public/images/icons/snap.png" class="img-fluid" alt="">
                                </a>
                            </li>
                            <li class="d-inline-block mx-1">
                                <a href=" " class="text-white">
                                    <img src="../../../../public/images/icons/insta.png" class="img-fluid" alt="">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 mb-lg-0 mb-4 ">
                    <h5 class="default-color w-700 mb-3">
                        روابط مهمة
                    </h5>
                    <div>
                        <ul class="m-0 p-0">
                            <li>
                                <a href="" class="text-dark">
                                نسبة الموقع
                               </a>
                            </li>
                            <li>
                                <a href="" class="text-dark">
                                    الشروط و الأحكام
                               </a>
                            </li>
                            <li>
                                <a href="" class="text-dark">
                                    سياسة الخصوصية
                               </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>
        <div class="copy-right text-center py-3 text-muted default-bg ">
            <p class="m-0 px-5 ">
                جميع الحقوق محفوظة © 2021 - موقع في الخدمة
            </p>
        </div>
    </footer>
    <!--scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/jquery-3.2.1.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/bootstrap.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/wow.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/owl.carousel.min.js "></script>
    <script type="text/javascript " src="../../../../public/js/scripts.js "></script>
</body>

</html>
