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
    @if (session()->get('locale')=='ar')
        <link rel="stylesheet" href="{{asset('css/bootstrap-rtl.min.css')}}">
    @endif
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/all.css')}}">
    <link rel="stylesheet" href='{{asset('css/animate.css')}}'>
    <link rel="stylesheet" href="{{asset('css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('css/dropify.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/libs/toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> --}}

    @yield('styles')
</head>
<body>
<!-- header -->
@include('Web.layouts.partials.header')
<!-- content -->
<div style="visibility: hidden" id="msg" data-content={{session()->get('status')}}></div>

@yield('content')

<!--scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js "></script>
<script type="text/javascript " src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script type="text/javascript " src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript " src="{{asset('js/scripts.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjBZsq9Q11itd0Vjz_05CtBmnxoQIEGK8&callback=myMap"></script>
<!-- dropify js -->
<script src="{{asset('js/vendor.min.js')}}"></script>

<script src="{{asset('js/dropify.min.js')}}"></script>
<script src="{{asset('js/form-fileupload.init.js')}}"></script>

<script type="text/javascript">
    var url = "{{ route('LangChange') }}";
    $(".Langchange").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });
</script>

<script type="text/javascript " src="{{asset('js/wow.min.js')}}"></script>
<script type="text/javascript " src="{{asset('js/owl.carousel.min.js')}}"></script>

 <script src="{{asset('assets/libs/toastr/toastr.min.js')}}"></script>
 <script src="{{asset('assets/js/pages/toastr.init.js')}}"></script>
 <script type="text/javascript">
    @if(session()->has('status'))
        $(document).ready(function () {
            var msg=$('#msg').attr('data-content');
            console.log(msg);
            toastr.options = {
                "closeButton": true,
                "debug": true,
                "newestOnTop": false,
                "progressBar": true,
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
            toastr.success(msg)
        })
    @endif
</script>
@yield('script')

</body>
</html>
