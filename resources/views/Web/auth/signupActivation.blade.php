@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container py-5">
        <div class="row ">
            <div class="col-md-6 mx-auto my-3">
                <h4 class="text-center w-700 mb-5 px-md-5">
                    من فضلك ادخل كود التفعيل المرسل إليك على رقم جوالك
                </h4>
                <form>
                    <div class="row px-3">
                        <div class="form-group wow fadeInUp col-3 px-1">
                            <input id="i4" type="number" class="i form-control text-align-last-center text-center">
                        </div>
                        <div class="form-group wow fadeInUp col-3 px-1">
                            <input id="i3" type="number" class="i form-control text-align-last-center text-center">
                        </div>
                        <div class="form-group wow fadeInUp col-3 px-1">
                            <input id="i2" type="number" class="i form-control text-align-last-center text-center">
                        </div>
                        <div class="form-group wow fadeInUp col-3 px-1">
                            <input id="i1" type="number" class="i form-control text-align-last-center text-center">
                        </div>
                    </div>

                    <a href="" class="btn btn-blue mt-4 w-100 wow fadeInUp">إرسال</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
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

    <script>
        var digitsPerBox = 1;
        /// EACH INPUT
        $(".i").on("input",function(e) {
            if (e.target.value.length === digitsPerBox) {
                var t = $( e.target );
                if (t.attr("id") === "i4") {
                    /// SUBMIT HERE
                    var txt = $("#i1").val() + "" + $("#i2").val() + "" + $("#i3").val() + "" + $("#i4").val();
                    alert(txt);
                } else {
                    /// AUTO FOCUS NEXT BOX
                    t.next().focus();
                }
            }
            /// LIMIT DIGITS PER BOX
            if (e.target.value.length > digitsPerBox) {
                e.target.value = e.target.value.substr(0,digitsPerBox);
            }
///// ONLY NUMBER ALLOWED
        }).keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode === 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });

    </script>
@endsection
