<header>
    <nav class="navbar navbar-expand-lg navbar-light nav-slider pt-5">
        <div class="container">
            @if($_SERVER['REQUEST_URI']=='/')
                <a class="navbar-brand d-block d-lg-none sm-logo" href="{{route('index')}}">
                    <img src="{{asset('images/logo.png')}}">
                </a>
                <button class="navbar-toggler collapsed blue-bg text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars default-color "></i>
                </button>
            @else
                <a class="navbar-brand d-block d-lg-none sm-logo" href="{{route('home')}}">
                    <img src="{{asset('images/logo.png')}}">
                </a>
                <button class="navbar-toggler collapsed default-bg" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            @endif
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if($_SERVER['REQUEST_URI']=='/')
                    <a class="navbar-brand d-none d-lg-block mx-5 lg-logo mx-auto" href="{{route('index')}}">
                        <img src="{{asset('images/logo.png')}}" class="mx-5 wow zoomIn">
                    </a>
                    <div class="navbar-nav ">
                        @include('Web.layouts.partials.langChange')
                    </div>
                @else
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">
                                <i class="fas fa-home"></i> الرئيسية
                            </a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="far fa-user"></i> الصفحة الشخصية
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="far fa-bell"></i> الإشعارات
                                </a>
                            </li>
                        @endauth
                    </ul>
                    <a class="navbar-brand d-none d-lg-block mx-5 lg-logo mx-auto" href="{{route('home')}}">
                        <img src="{{asset('images/logo.png')}}" class="mx-5">
                    </a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-percent mx-1"></i> نسبة الموقع
                            </a>
                        </li>
                        @auth
                            @if(auth()->user()->type=='PROVIDER')
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="fas fa-plus-circle"></i>إضافة خدمة
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-power-off"></i> تسجيل خروج
                                </a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            @include('Web.layouts.partials.langChange')
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
