@extends('Web.layouts.master')
@section('title', 'في الخدمة')
@section('content')
    <div class="container ">
        <div class="row py-5">
            <div class="col-md-9 mx-auto">
                <h4 class="w-700 pb-5 text-center">
                    تعديل الخدمة
                </h4>
                <form id="editProfile-form" enctype="multipart/form-data" method="POST" class="row" action="{{route('product.update',$product->id)}}">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group wow fadeInUp ">
                            <select required id="parent_category_id" name="parent_category_id" class="form-control">
                                <option value="{{$product->category->parent->id}}">
                                    {{$product->category->parent->name_ar}}
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
                                <option value="{{$product->category->id}}">
                                    {{$product->category->name_ar}}
                                </option>
                                @foreach(\App\Models\Category::where('parent_id',$product->category->id)->get() as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name_ar}}
                                    </option>
                                @endforeach

                            </select>
                            <i class="fas fa-chevron-down yellow"></i>
                        </div>
                        <div class="form-group wow fadeInUp ">
                            <input value="{{$product->price}}" required name="price" type="number" min="0" class="form-control" placeholder="سعر الخدمة بالريال السعودي">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <textarea required name="note" class="form-control p-4 br-25 h-111" rows="4" placeholder="تفاصيل الخدمة">{{$product->note}}</textarea>
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
