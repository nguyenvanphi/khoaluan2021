<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- <title>@yield('title')</title> --}}
    <title>The GMEN</title>
    <!--== Favicon ==-->
    <link rel="shortcut icon" href="{{('public/frontend/images/favicon2.ico')}}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700%7CPoppins:400,400i,500,600&display=swap" rel="stylesheet">

    <!-- build:css public/frontend/css/app.min.css -->
    <!--== Leaflet Min CSS ==-->
    <link href="{{('public/frontend/css/leaflet.min.css')}}" rel="stylesheet" />
    <!--== Nice Select Min CSS ==-->
    <link href="{{('public/frontend/css/nice-select.min.css')}}" rel="stylesheet" />
    <!--== Slick Slider Min CSS ==-->
    <link href="{{('public/frontend/css/slick.min.css')}}" rel="stylesheet" />
    <!--== Magnific Popup Min CSS ==-->
    <link href="{{('public/frontend/css/magnific-popup.min.css')}}" rel="stylesheet" />
    <!--== Slicknav Min CSS ==-->
    <link href="{{('public/frontend/css/slicknav.min.css')}}" rel="stylesheet" />
    <!--== Animate Min CSS ==-->
    <link href="{{('public/frontend/css/animate.min.css')}}" rel="stylesheet" />
    <!--== Ionicons Min CSS ==-->
    <link href="{{('public/frontend/css/ionicons.min.css')}}" rel="stylesheet" />
    <!--== Font-Awesome Min CSS ==-->
    <link href="{{('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!--== Bootstrap Min CSS ==-->
    <link href="{{('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!--== Main Style CSS ==-->
    <link href="{{('public/frontend/css/style.css')}}" rel="stylesheet" />
    <!--== Helper Min CSS ==-->
    <link href="{{('public/frontend/css/helper.min.css')}}" rel="stylesheet" />
    <!-- endbuild -->

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!--== Start Header Area ==-->
    <header class="header-area">
        <div class="container container-wide">
            <div class="row align-items-center">
                <div class="col-sm-4 col-lg-2">
                    <div class="site-logo text-center text-sm-left">
                        <a href="{{URL::to('/')}}"><img src="{{('public/frontend/images/logogmen.png')}}" alt="Logo" /></a>
                        {{-- <a href="index.html" style="font-size: xx-large;color: black;font-weight: bold;">GMEN</a> --}}
                    </div>
                </div>

                <div class="col-lg-8 d-none d-lg-block">
                    <div class="site-navigation">
                        <ul class="main-menu nav">
                            <li class="has-submenu"><a href="{{URL::to('/')}}">Trang chủ</a>
                            </li>
                            <li class="has-submenu"><a href="{{URL::to('/shop')}}">Sản phẩm</a>
                            </li>
                            <li><a href="{{URL::to('/about')}}">Giới thiệu</a></li>
                            <li><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-8 col-lg-2">
                    <div class="site-action d-flex justify-content-center justify-content-sm-end align-items-center">
                        <style>
                            .dropdown:hover>.dropdown-menu {
                                display: block;
                            }
                            .dropdown>.dropdown-toggle:active {
                            /*Without this, clicking will make it sticky*/
                                pointer-events: none;
                            }
                            .dropdown-menu {
                                right: 0px !important;
                                left: unset;
                                margin: unset;
                                box-shadow: 0 2px 2px rgb(0 0 0 / 20%);
                                border-radius: unset;
                                border-top: unset;
                                border: unset;
                            }
                            .dropdown-toggle::after {
                                display: none !important;
                            }
                            .user-avatar-header{
                                width: 30px;
                                height: 30px;
                                border-radius: 50%!important;
                            }

                        </style>
                        <?php if(Auth::check()){?>
                            <div class="dropdown">
                                <a href="{{URL::to('/profile')}}" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{('public/frontend/images/admin.jpg')}}" alt="" class="user-avatar-header"></a>
                                {{-- <i style="font-size: 25px" class="fa fa-user dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> --}}
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{URL::to('/profile')}}"><i class="fa fa-user"> </i> Tài khoản của tôi</a>
                                    <a class="dropdown-item" href="{{URL::to('/history-orders')}}"><i class="fa fa-clipboard"></i></i> Lịch sử mua hàng</a>
                                    <a class="dropdown-item" href="{{URL::to('/logout')}}"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <div class="dropdown">
                                <i style="font-size: 25px" class="fa fa-user dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{URL::to('/login')}}"><i class="fa fa-sign-in"> </i> Đăng nhập</a>
                                    <a class="dropdown-item" href="{{URL::to('/register')}}"><i class="fa fa-pencil-square-o"></i> Đăng ký</a>
                                </div>
                            </div>
                        <?php } ?>
                        {{-- <div class="mini-cart-wrap">
                            <a href="{{URL::to('/cart')}}" class="btn-mini-cart"> --}}
                                {{-- <i class="fa fa-bell" style="font-size: 1.5rem;"></i> --}}
                                {{-- <img src="{{('public/frontend/images/icons/iconfinder_icon-ios7-bell-outline_211693.png')}}" style="width: 2rem"/>
                                <span class="cart-total">3</span>
                            </a>
                        </div> --}}
                        <div class="mini-cart-wrap">
                            <a href="{{URL::to('/cart')}}" class="btn-mini-cart">
                                <i class="ion-bag"></i>
                                <span class="cart-total">0</span>
                            </a>
                            {{-- <div class="mini-cart-content">
                                <div class="mini-cart-product">
                                    <div class="mini-product">
                                        <div class="mini-product__thumb">
                                            <a href="single-product.html"><img src="{{('public/frontend/images/product/product-1.png')}}" alt="product" /></a>
                                        </div>
                                        <div class="mini-product__info">
                                            <h2 class="title"><a href="single-product.html">Auto Clutch & Brake</a></h2>

                                            <div class="mini-calculation">
                                                <p class="price">5 x <span>$20.33</span></p>
                                                <button class="remove-pro"><i class="ion-trash-b"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mini-product">
                                        <div class="mini-product__thumb">
                                            <a href="single-product.html"><img src="{{('public/frontend/images/product/product-2.png')}}" alt="product" /></a>
                                        </div>
                                        <div class="mini-product__info">
                                            <h2 class="title"><a href="single-product.html">Leather Steering Wheel</a></h2>

                                            <div class="mini-calculation">
                                                <p class="price">5 x <span>$20.33</span></p>
                                                <button class="remove-pro"><i class="ion-trash-b"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mini-product">
                                        <div class="mini-product__thumb">
                                            <a href="single-product.html"><img src="{{('public/frontend/images/product/product-3.png')}}" alt="product" /></a>
                                        </div>
                                        <div class="mini-product__info">
                                            <h2 class="title"><a href="single-product.html">Leather Steering Wheel</a></h2>

                                            <div class="mini-calculation">
                                                <p class="price">5 x <span>$20.33</span></p>
                                                <button class="remove-pro"><i class="ion-trash-b"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>

                        <div class="responsive-menu d-lg-none">
                            <button class="btn-menu">
                                <i class="fa fa-bars "></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--== End Header Area ==-->