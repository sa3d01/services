@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="w-700">
                            إضافة خدمة
                        </h5>
                    </div>
                    <form enctype="multipart/form-data" method="POST" class="row" action="{{route('product.store')}}">
                        @csrf
                    <div class="col-md-6">
                        <div class="form-group wow fadeInUp ">
                            <select required id="parent_category_id" name="parent_category_id" class="form-control">
                                <option hidden>
                                    المجال
                                </option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name_ar}}
                                    </option>
                                @endforeach
                            </select>
                            <i class="fas fa-chevron-down yellow"></i>
                        </div>
                        <div class="form-group wow fadeInUp ">
                            <select required name="category_id" id="category_id" class="form-control">
                                <option hidden>
                                    التخصص
                                </option>

                            </select>
                            <i class="fas fa-chevron-down yellow"></i>
                        </div>
                        <div class="form-group wow fadeInUp ">
                            <input required name="price" type="number" min="0" class="form-control" placeholder="سعر الخدمة بالريال السعودي">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <textarea required name="product_note" class="form-control p-4 br-25 h-100" rows="4" placeholder="تفاصيل الخدمة"></textarea>
                    </div>
                    <div class="col-md-12 pt-4">
                        <h5 class="w-700">
                            إضافة لمعرض أعمالي
                        </h5>
                    </div>
                    <div class="col-md-6 mx-auto text-center form-group m-md-0">
                        <div class=" h-100 addWork">
                            <input required name="image" type="file" class="dropify id-img h-100" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <textarea required name="gallery_note" class="form-control p-4 br-25 h-111" rows="4" placeholder="الوصف"></textarea>
                        <button type="submit" class="btn btn-blue mt-4 w-100 wow fadeInUp">حفظ </button>
                    </div>
                    </form>
                </div>
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
            get_category_childs($('#parent_category_id').val(),host)

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

