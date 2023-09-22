<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">

    @if(Route::is('home'))
        <title>Fitness Club</title>
    @else
        <title>@yield('title') | Fitness Club</title>
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/vendor/vendor.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">

    <!-- Scripts -->
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}
</head>
<body>
<div id="app">
    <div id="page" class="section">
        <!-- Header Section Start -->
        <div class="header-section header-transparent sticky-header header-fluid section">
            <div class="header-inner">
                <div class="container position-relative">
                    <div class="row justify-content-between align-items-center">

                        <!-- Header Logo Start -->
                        <div class="col-xl-2 col-auto">
                            <div class="header-logo">
                                <a href="{{ route('home') }}">
                                    <img class="dark-logo" src="{{asset('assets/images/logo/logo.png')}}" alt="Fitness Logo">
                                    <img class="light-logo" src="{{asset('assets/images/logo/logo.png')}}" alt="Fitness Logo">
                                </a>
                            </div>
                        </div>
                        <!-- Header Logo End -->

                        <!-- Header Main Menu Start -->
                        <div class="col d-none d-xl-block">
                            <div class="menu-column-area d-none d-xl-block position-static">
                                <nav class="site-main-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('home') }}"><span class="menu-text">Home</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="menu-text">Services</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="menu-text">About</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><span class="menu-text">Contact</span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Header Main Menu End -->

                        <!-- Header Right Start -->
                        <div class="col-xl-2 col-auto d-flex align-items-center justify-content-end">

                            @guest
                                <!-- Header Cart Start -->
                                <div class="header-cart">
                                    <a class="btn btn-outline-white btn-hover-primary btn-width-100" href="{{ route('login') }}">
                                        Login
                                    </a>
                                </div>
                                <!-- Header Cart End -->

                                <!-- Header Cart Start -->
                                <div class="header-cart">
                                    <a class="btn btn-primary btn-hover-secondary btn-width-100" href="{{ route('request.membership') }}">
                                        Request Now
                                    </a>
                                </div>
                                <!-- Header Cart End -->
                            @else
                                <!-- Header Cart Start -->
                                <div class="header-cart">
                                    <a class="btn btn-primary btn-hover-secondary btn-width-100" href="{{route('dashboard')}}">
                                        Dashboard
                                    </a>
                                </div>
                                <!-- Header Cart End -->
                            @endguest

                            <!-- Header Mobile Menu Toggle Start -->
                            <div class="header-mobile-menu-toggle d-xl-none ml-sm-2">
                                <button class="toggle">
                                    <i class="icon-top"></i>
                                    <i class="icon-middle"></i>
                                    <i class="icon-bottom"></i>
                                </button>
                            </div>
                            <!-- Header Mobile Menu Toggle End -->
                        </div>
                        <!-- Header Right End -->

                    </div>
                </div>
            </div>
        </div>
        <!-- Header Section End -->

        <div class="section">
            <div class="container-fluid p-0">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>{{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fa fa-exclamation-circle me-2"></i>{{$message}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($message = Session::get('errors'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul style="list-style: none;">
                            <li>
                                @foreach($errors->all() as $error)
                                    <li><i class="fa fa-exclamation-circle me-2"></i> {{$error}}</li>
                                @endforeach
                            </li>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        @yield('content')

        <div class="footer-section section section-fluid-240" data-bg-color="#1C1C1C">
            <div class="container">

                <!-- Footer Top Widgets Start -->
                <div class="row mb-lg-14 mb-md-10 mb-6 align-items-center">

                    <!-- Footer Widget Start -->
                    <div class="col-lg-3 col-md-5 col-sm-12 col-12 col-12 mb-6">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="{{asset('assets/images/logo/footer-logo.png')}}" alt="Logo"></a>
                            </div>
                            <div class="footer-widget-content">
                                <div class="footer-social-inline">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin"></i></a>
                                    <a href="#"><i class="fab fa-vimeo-v"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget End -->

                    <!-- Footer Widget Start -->
                    <div class="offset-lg-1 col-lg-5 col-md-7 col-sm-12 col-12 mb-6">
                        <div class="footer-widget">
                            <div class="footer-widget-content">
                                <ul class="column-2">
                                    <li><a href="#">Hastheme for Business</a></li>
                                    <li><a href="#">Teach on Udemy</a></li>
                                    <li><a href="#">Get the app</a></li>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Contact us</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Help and Support</a></li>
                                    <li><a href="#">Affiliate</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget End -->

                    <!-- Footer Widget Start -->
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12 mb-6">
                        <div class="footer-widget">
                            <div class="footer-widget-content">
                                <div class="ft-instagram-list">

                                    <div class="instagram-grid-wrap">

                                        <!-- Start Single Instagram -->
                                        <div class="item-grid grid-style--1">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/images/instagram/instagram1.png"
                                                         alt="instagram images">
                                                </a>
                                                <div class="item-info">
                                                    <div class="inner">
                                                        <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                        <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Single Instagram -->

                                        <!-- Start Single Instagram -->
                                        <div class="item-grid grid-style--1">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/images/instagram/instagram2.png"
                                                         alt="instagram images">
                                                </a>
                                                <div class="item-info">
                                                    <div class="inner">
                                                        <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                        <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Single Instagram -->

                                        <!-- Start Single Instagram -->
                                        <div class="item-grid grid-style--1">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/images/instagram/instagram3.png"
                                                         alt="instagram images">
                                                </a>
                                                <div class="item-info">
                                                    <div class="inner">
                                                        <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                        <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Single Instagram -->

                                        <!-- Start Single Instagram -->
                                        <div class="item-grid grid-style--1">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/images/instagram/instagram4.png"
                                                         alt="instagram images">
                                                </a>
                                                <div class="item-info">
                                                    <div class="inner">
                                                        <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                        <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Single Instagram -->

                                        <!-- Start Single Instagram -->
                                        <div class="item-grid grid-style--1">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/images/instagram/instagram5.png"
                                                         alt="instagram images">
                                                </a>
                                                <div class="item-info">
                                                    <div class="inner">
                                                        <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                        <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Single Instagram -->

                                        <!-- Start Single Instagram -->
                                        <div class="item-grid grid-style--1">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="assets/images/instagram/instagram6.png"
                                                         alt="instagram images">
                                                </a>
                                                <div class="item-info">
                                                    <div class="inner">
                                                        <a href="#"><i class="fas fa-heart"></i>1k</a>
                                                        <a href="#"><i class="fas fa-comment-dots"></i>9</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Start Single Instagram -->

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget End -->

                </div>
                <!-- Footer Top Widgets End -->

                <!-- Footer Copyright Start -->
                <div class="row">
                    <div class="col">
                        <p class="copyright">Copyright &copy; 2021 All Rights Reserved | Made with <i
                                class="fal fa-heart"></i> by <a href="https://hasthemes.com/">HasThemes</a>. </p>
                    </div>
                </div>
                <!-- Footer Copyright End -->

            </div>
        </div>

        <!-- Scroll Top Start -->
        <a href="#" class="scroll-top" id="scroll-top">
            <i class="arrow-top fal fa-long-arrow-up"></i>
            <i class="arrow-bottom fal fa-long-arrow-up"></i>
        </a>
        <!-- Scroll Top End -->

    </div>
    <div id="site-main-mobile-menu" class="site-main-mobile-menu">
        <div class="site-main-mobile-menu-inner">
            <div class="mobile-menu-header">
                <div class="mobile-menu-logo">
                    <a href="{{ route('home') }}"><img src="{{asset('assets/images/logo/logo.png')}}" alt=""></a>
                </div>
                <div class="mobile-menu-close">
                    <button class="toggle">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-menu-content">
                <nav class="site-mobile-menu">
                    <ul>
                        <li>
                            <a href="{{ route('home') }}"><span class="menu-text">Home</span></a>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">Services</span></a>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">About</span></a>
                        </li>
                        <li>
                            <a href="#"><span class="menu-text">Contact</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>

<script src="{{asset('assets/js/vendor/vendor.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/plugins.min.js')}}"></script>

<!-- Main Activation JS -->
<script src="{{asset('assets/js/main.js')}}"></script>

</body>
</html>
