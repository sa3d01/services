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
                <a class="navbar-brand d-block d-lg-none sm-logo" href="../home.blade.php">
                    <img src="../../../../public/images/logo.png">
                </a>
                <button class="navbar-toggler collapsed blue-bg text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars default-color "></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <a class="navbar-brand d-none d-lg-block mx-5 lg-logo mx-auto" href="../home.blade.php">
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
            <div class="col-md-6 mx-auto my-3">
                <h4 class="text-center w-700 mb-5 px-md-5">
                    من فضلك ادخل كلمة مرور جديدة حتى تتمكن من الدخول مرة أخرى إلى حسابك
                </h4>
                <form action="">
                    <div class="form-group wow fadeInDown">
                        <input type="password" class="form-control" placeholder="كلمة المرور الجديدة" id="pass">
                        <i class="fas fa-eye togglePass yellow " toggle="#pass"></i>
                    </div>

                    <a href="" class="btn btn-blue mt-4 w-100 wow fadeInUp">
                        حفظ
                    </a>
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
