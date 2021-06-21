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
                <a class="navbar-brand d-block d-lg-none sm-logo" href="../provider-home.blade.php">
                    <img src="../../../../public/images/logo.png">
                </a>
                <button class="navbar-toggler collapsed default-bg" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../provider-home.blade.php">
                                <i class="fas fa-home"></i> الرئيسية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="provider-editprofile.blade.php">
                                <i class="far fa-user"></i> الصفحة الشخصية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../provider-notification.blade.php">
                                <i class="far fa-bell"></i> الإشعارات
                            </a>
                        </li>

                    </ul>
                    <a class="navbar-brand d-none d-lg-block mx-5 lg-logo mx-auto" href="../provider-home.blade.php">
                        <img src="../../../../public/images/logo.png" class="mx-5">
                    </a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../provider-add.blade.php">
                                <i class="fas fa-plus-circle"></i>إضافة خدمة
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
                                <div id="imagePreview" style="background-image: url(../../../../public/images/user.jpg);" class="e-userImg">
                                </div>
                            </div>
                        </div>
                    </div>
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

                    </div>
                    <div class="col-md-6 mx-auto">
                        <a href="../provider-home.blade.php" type="submit" class="btn btn-blue mt-4 w-100 wow fadeInUp">حفظ التعديل</a>
                        <div class="mt-5">
                            <p class="my-auto text-center">
                                هل تريد تغير كلمة المرور ؟
                                <a href="user-changePass.blade.php" class="yellow w-700">
                                    اضغط هنا
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
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
                                <a href="../user-terms.blade.php" class="text-dark">
                                    الشروط و الأحكام
                               </a>
                            </li>
                            <li>
                                <a href="../user-policy.blade.php" class="text-dark">
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
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>

</body>

</html>
