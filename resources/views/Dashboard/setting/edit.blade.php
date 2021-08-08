@extends('Dashboard.layouts.master')
@section('title', 'الإعدادات العامة')
@section('styles')
    <link href="{{asset('assets/libs/dropify/dist/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-box">
                        <form method="POST" action="{{route('admin.settings.update')}}" enctype="multipart/form-data" data-parsley-validate novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="mobile">رقم الهاتف للتواصل*</label>
                                <input type="text" name="mobile" required class="form-control" id="mobile" value="{{$setting->mobile}}">
                            </div>
                            <div class="form-group">
                                <label for="email">البريد الإلكترونى للتواصل*</label>
                                <input type="email" name="email" required class="form-control" id="email" value="{{$setting->email}}">
                            </div>
                            <div class="form-group">
                                <label for="app_ratio">عمولة التطبيق*</label>
                                <input type="number" min="0" name="app_ratio" required class="form-control" id="app_ratio" value="{{$setting->app_ratio}}">
                            </div>

{{--                           <div class="form-group">--}}
{{--                                <label for="snap">رابط سناب شات*</label>--}}
{{--                                <input type="url" name="socials[snap]" required class="form-control" id="snap" value="{{$setting->socials['snap']}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="twitter">رابط twitter*</label>--}}
{{--                                <input type="url" name="socials[twitter]" required class="form-control" id="twitter" value="{{$setting->socials['twitter']}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="facebook">رابط facebook*</label>--}}
{{--                                <input type="url" name="socials[facebook]" required class="form-control" id="facebook" value="{{$setting->socials['facebook']}}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="instagram">رابط instagram*</label>--}}
{{--                                <input type="url" name="socials[instagram]" required class="form-control" id="instagram" value="{{$setting->socials['instagram']}}">--}}
{{--                            </div>--}}

                            <div class="form-group text-right mb-0">
                                <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                    تعديل
                                </button>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{asset('assets/libs/dropify/dist/js/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });
            // Used events
            var drEvent = $('#input-file-events').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });
            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });
            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });
            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>

    <!-- Validation js (Parsleyjs) -->
    <script src="{{asset('assets/libs/parsleyjs/parsley.min.js')}}"></script>
    <!-- validation init -->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection
