@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container ">
        <div class="row py-5">
            <div class="col-md-9 mx-auto">
                <h4 class="w-700 pb-5 text-center">
                    تعديل العمل
                </h4>
                <form id="editWork-form" enctype="multipart/form-data" method="POST" class="row" action="{{route('gallery.update',$gallery->id)}}">
                    @csrf
                    <div class="col-md-6 form-group">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" name="image" id="imageUpload" accept=".png, .jpg, .jpeg">
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image:{{$gallery->image}}" class="e-userImg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <textarea name="note" required class="form-control p-4 br-25 h-111" rows="4" placeholder="الوصف">{{$gallery->note}}</textarea>
                        <button type="submit" class="btn btn-blue mt-4 w-100 wow fadeInUp">حفظ </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- footer -->
    @include('Web.layouts.partials.footer')
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let host= "{{asset('')}}";
            $('#parent_category_id').on('change', function (e) {
                e.preventDefault();
                var id = $(this).val();
                get_category_childs(id,host)
            });
            function get_category_childs(parent_category_id,host)
            {
                $.ajax({
                    type: "GET",
                    url: host+'get_category_childs/'+parent_category_id,
                    dataType: 'json',
                    success: function( data ) {
                        $('#category_id').empty();
                        var res="";
                        $.each (data, function (key, value)
                        {
                            res +='<option value="'+value.id+'">'+value.name_ar+'</option>';
                        });
                        $('#category_id').html(res);
                    }
                });
            }

        });
    </script>
@endsection
