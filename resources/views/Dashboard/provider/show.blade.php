@extends('Dashboard.layouts.master')
@section('title', 'بيانات مقدم خدمة')
@section('styles')
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-3">البيانات الرئيسية</h4>
                        <img class="card-img-top img-fluid" style="max-height: 400px" src="{{$user->image}}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title">{{$user->name}}</h4>
                            <p class="card-text">ID : {{$user->id}}</p>
                            <p class="card-text">Rate : {{$user->averageRate()}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>الهاتف : </strong><span>{{$user->phone}}</span></li>
                            <li class="list-group-item"><strong>المدينة : </strong><span>{{$user->city?$user->city->name_ar:''}}</span></li>
                            <li class="list-group-item"><strong>الجنسية : </strong><span>{{$user->nationality??''}}</span></li>
                            <li class="list-group-item"><strong>الرمز الخاص بالمسوق : </strong><span>{{$user->marketer_id??'ﻻ يوجد'}}</span></li>
                            <li class="list-group-item"><strong>تاريخ الانضمام : </strong><span>{{$user->created_at}}</span></li>
                            @if($user->approved==1)
                            <li class="list-group-item"><strong>تاريخ القبول : </strong><span>{{$user->approved_at}}</span></li>
                            @elseif($user->approved==-1)
                            <li class="list-group-item"><strong>سبب الرفض : </strong><span>{{$user->reject_reason}}</span></li>
                            @endif
                        </ul>
                    </div>
                </div>
                @if($user->location)
                <div class="col-xl-6">
                    {{--                location--}}
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-3">الموقع</h4>
                        <script async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjBZsq9Q11itd0Vjz_05CtBmnxoQIEGK8&&callback=initMap" type="text/javascript">
                        </script>
                        <div id="map" class="gmaps" style="position: relative; overflow: hidden;" data-lat="{{$user->location['lat']}}" data-lng="{{$user->location['lng']}}"></div>
                    </div>
                </div>
                @endif
{{--                credit--}}
            </div>
            {{--                products--}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-3">الخدمات</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>التصنيف</th>
                                    <th>الوصف</th>
                                    <th>السعر</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->products as $key=>$product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->category->name_ar}}</td>
                                        <td>{{$product->note}}</td>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-3">معرض الأعمال</h4>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>التصنيف</th>
                                    <th>الوصف</th>
                                    <th>الصورة</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->galleries as $key=>$gallery)
                                    <tr>
                                        <td>{{$gallery->id}}</td>
                                        <td>{{$gallery->category->name_ar}}</td>
                                        <td>{{$gallery->note}}</td>
                                        <td data-toggle="modal" data-target="#insuranceModal{{$gallery->id}}">
                                            <img width="50px" height="50px" class="img_preview" src="{{$gallery->image}}">
                                        </td>
                                        <div id="insuranceModal{{$gallery->id}}" class="modal fade" role="img">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img data-toggle="modal" data-target="#insuranceModal{{$gallery->id}}" class="img-preview" src="{{$gallery->image}}" style="max-height: 500px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        let map;
        let marker;
        function initMap() {
            // show map
            let lat_str = document.getElementById('map').getAttribute("data-lat");
            let long_str = document.getElementById('map').getAttribute("data-lng");
            let uluru = {lat:parseFloat(lat_str), lng: parseFloat(long_str)};
            let centerOfOldMap = new google.maps.LatLng(uluru);
            let oldMapOptions = {
                center: centerOfOldMap,
                zoom: 10
            };
            map = new google.maps.Map(document.getElementById('map'), oldMapOptions);
            marker = new google.maps.Marker({position: centerOfOldMap,animation:google.maps.Animation.BOUNCE});
            marker.setMap(map);
        }
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>
@endsection
