<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- title -->
    <title>@yield('title', 'في الخدمة')</title>
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
    @yield('styles')
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
                    <select class="border-0 Langchange">
                        <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>اللغة العربية</option>
                        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    </select>

                </div>
            </div>
        </div>
    </nav>

</header><!-- content -->
@yield('content')
<!--scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
<script type="text/javascript " src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript " src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript " src="{{asset('js/wow.min.js')}}"></script>
<script type="text/javascript " src="{{asset('js/owl.carousel.min.js')}}"></script>
<script type="text/javascript " src="{{asset('js/scripts.js')}}"></script>
<script type="text/javascript">
    var url = "{{ route('LangChange') }}";
    $(".Langchange").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
</script>
@yield('script')
</body>

</html>
