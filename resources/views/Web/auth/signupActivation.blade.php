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
                            <input type="text" class="form-control text-align-last-center text-center">
                        </div>
                        <div class="form-group wow fadeInUp col-3 px-1">
                            <input type="text" class="form-control text-align-last-center text-center">
                        </div>
                        <div class="form-group wow fadeInUp col-3 px-1">
                            <input type="text" class="form-control text-align-last-center text-center">
                        </div>
                        <div class="form-group wow fadeInUp col-3 px-1">
                            <input type="text" class="form-control text-align-last-center text-center">
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
@endsection
