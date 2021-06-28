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
@include('Web.layouts.partials.header')
<!-- content -->
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
