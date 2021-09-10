 <!-- footer -->
 <footer>
    <div class="container pt-5">
        <div class="row  pb-lg-3">
            <div class="col-md-4 mb-lg-0 mb-4 pl-5">
                <img src="{{asset('images/logo.png')}}" alt="" class="img-fluid logo">
                <p class="pt-4">
                    {{$about_note}}
                </p>
            </div>
            <div class="col-md-4 mb-lg-0 mb-4">
                <h5 class="default-color w-700 mb-3">
                    تواصل معنا
                </h5>
                <label class="d-block">
                    {{$setting['mobile']}}
                </label>
                <a href="mailto: {{$setting['email']}} " class="text-muted ">{{$setting['email']}}</a>
                <div>
                    <ul class="p-0 m-0 social mt-4">
                        <li class="d-inline-block mx-1">
                            <a target="_blank" href="{{$facebook}}" class="text-white">
                                <img src="{{asset('images/icons/fb.png')}}" class="img-fluid" alt="">
                            </a>
                        </li>
                        <li class="d-inline-block mx-1">
                            <a target="_blank" href="{{$twitter}}"  class="text-white">
                                <img src="{{asset('images/icons/tw.png')}}" class="img-fluid" alt="">
                            </a>
                        </li>
                        <li class="d-inline-block mx-1">
                            <a target="_blank" href="{{$snap}}"  class="text-white">
                                <img src="{{asset('images/icons/snap.png')}}" class="img-fluid" alt="">
                            </a>
                        </li>
                        <li class="d-inline-block mx-1">
                            <a target="_blank" href="{{$insta}}" class="text-white">
                                <img src="{{asset('images/icons/insta.png')}}" class="img-fluid" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4 mb-lg-0 mb-4 ">
                <h5 class="default-color w-700 mb-3">
                    روابط مهمة
                </h5>
                <div>
                    <ul class="m-0 p-0">
                        <li>
                            <a href="{{route('siteRatio')}}" class="text-dark">
                            نسبة الموقع
                           </a>
                        </li>
                        <li>
                            <a href="{{route('terms')}}" class="text-dark">
                                الشروط و الأحكام
                           </a>
                        </li>
                        <li>
                            <a href="{{route('licence')}}" class="text-dark">
                                سياسة الخصوصية
                           </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
    <div class="copy-right text-center py-3 text-muted default-bg ">
        <p class="m-0 px-5 ">
            جميع الحقوق محفوظة © 2021 - موقع في الخدمة
        </p>
    </div>
</footer>
