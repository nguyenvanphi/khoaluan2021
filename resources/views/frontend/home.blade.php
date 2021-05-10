
@extends('frontend.layout.shared')
{{-- @section('title')
    zxczxczx
@endsection --}}
@section('content')
       <!--== End Header Area ==-->
    <style>
        .product-item .product-item__content .title{
            text-transform: uppercase;
        }
    </style>
    <!--== Start Slider Area Wrapper ==-->
    <div class="slider-area-wrapper home-2">
        <div class="slider-content-active">
            <div class="slider-slide-item bg-img" data-bg="{{('public/frontend/images/slider/banner-slider-1.jpg')}}">
                {{-- <div class="container container-wide h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-lg-6 order-1 order-lg-0">
                            <div class="slide-content">
                                <div class="slide-content-inner">
                                    <h3>NEW TECHNOLOGY & BUILD</h3>
                                    <h2>LATEST &amp; POWERFUL ENGINE FOR YOU</h2>
                                    <a class="btn btn-white" href="shop.html">Shop Now</a>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-6 order-0 order-lg-1">
                            <div class="slide-img">
                                <img src="{{('public/frontend/images/slider/slider-2-2.png')}}" alt="Slider" />
                            </div>
                        </div> --}}
                    {{-- </div>
                </div> --}}
            </div>
            <div class="slider-slide-item bg-img" data-bg="{{('public/frontend/images/slider/banner-slider-1.jpg')}}">
                {{-- <div class="container container-wide h-100">
                    <div class="row align-items-center h-100">
                        <div class="col-lg-6 order-1 order-lg-0">
                            <div class="slide-content">
                                <div class="slide-content-inner">
                                    <h3>NEW TECHNOLOGY & BUILD</h3>
                                    <h2>WHEELS &amp; TIRES <br> COLLECTIONS</h2>
                                        <a class="btn btn-white" href="shop.html">Shop Now</a>
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="col-lg-6 order-0 order-lg-1">
                            <div class="slide-img">
                                <img src="{{('public/frontend/images/slider/slider-2-1.png')}}" alt="Slider" />
                            </div>
                        </div> --}}
                    {{-- </div>
                </div> --}}
            </div>
        </div>

        <div class="slider-dots-arrow-area">
            <div class="container container-wide">
                <div class="slider-dots-arrow">
                </div>
            </div>
        </div>
    </div>
    <!--== End Slider Area Wrapper ==-->

        <!--== Start Call to Action Area ==-->
        <div class="call-to-action-area sm-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        <div class="call-to-action-item mt-0">
                            <div class="call-to-action-item__icon">
                                <img src="{{('public/frontend/images/icons/icon-1.png')}}" alt="fast delivery">
                            </div>
                            <div class="call-to-action-item__info">
                                <h3>Giao hàng miễn phí</h3>
                                <p>Cung cấp giao hàng tận nhà miễn phí cho tất cả các đơn hàng trên 500K</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4 col-lg-4">
                        <div class="call-to-action-item">
                            <div class="call-to-action-item__icon">
                                <img src="{{('public/frontend/images/icons/icon-2.png')}}" alt="quality')}}">
                            </div>
                            <div class="call-to-action-item__info">
                                <h3>Chất lượng sản phẩm</h3>
                                <p>Chúng tôi đảm bảo chất lượng sản phẩm của chúng tôi mọi lúc</p>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-md-4 col-lg-4">
                        <div class="call-to-action-item">
                            <div class="call-to-action-item__icon">
                                <img src="{{('public/frontend/images/icons/icon-3.png')}}" alt="return">
                            </div>
                            <div class="call-to-action-item__info">
                                <h3>Hỗ trợ trực tuyến</h3>
                                <p>Để làm hài lòng khách hàng, chúng tôi cố gắng hỗ trợ trực tuyến</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--== End Call to Action Area ==-->

    <!--== Start Best Seller Products Area ==-->
    <div class="best-seller-products-area sm-top">
        <div class="container container-wide">
            <div class="row">
                <div class="col-lg-5 m-auto text-center">
                    <div class="section-title">
                        <h2 class="h3">Sản phẩm giảm giá</h2>
                        {{-- <p>All best seller product are now available for you and your can buy
                            this product from here any time any where so sop now</p> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="product-wrapper">
                        <div class="product-carousel">
                            <!-- Start Product Item -->
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/1617077628035tja7hg.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/1617077628035tja7hg.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">
                                    <h4 class="title"><a href="single-product.html">WEAVE POLO SHIRT - PINK PASTEL</a></h4>
                                    <span class="price"><strong>Giá:</strong> 165000 VNĐ<del> 180000 VNĐ</del></span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>

                            </div>
                            <!-- End Product Item -->

                            <!-- Start Product Item -->
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/1616380869479i3zz8x.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/1616380869479i3zz8x.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">
                                    
                                    <h4 class="title"><a href="single-product.html">DENIM JACKET - LIGHT BLUE</a></h4>
                                    <span class="price"><strong>Giá:</strong> 615000 VNĐ<del> 780000 VNĐ</del></span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>
                            </div>
                            <!-- End Product Item -->

                            <!-- Start Product Item -->
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/1617940531014ervav4.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/1617940531014ervav4.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">
                                    
                                    <h4 class="title"><a href="single-product.html">PIMA POLO SHIRT - COFFEE</a></h4>
                                    <span class="price"><strong>Giá:</strong> 65000 VNĐ<del> 80000 VNĐ</del></span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>

                            </div>
                            <!-- End Product Item -->

                            <!-- Start Product Item -->
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/1611071582309vqmxw2l.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/1611071582309vqmxw2l.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">
                                    <h4 class="title"><a href="single-product.html">LINEN STAND-UP COLLAR SHIRT</a></h4>
                                    <span class="price"><strong>Giá:</strong> 165000 VNĐ<del> 180000 VNĐ</del></span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>
                            </div>
                            <!-- End Product Item -->

                            <!-- Start Product Item -->
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/16041092557109t8zq.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/16041092557109t8zq.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">
                                    <h4 class="title"><a href="single-product.html">SƠ MI KAKI DENIM - XANH NHẠT</a></h4>
                                    <span class="price"><strong>Giá:</strong> 165000 VNĐ<del> 180000 VNĐ</del></span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>

                            </div>
                            <!-- End Product Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Best Seller Products Area ==-->

    <!--== Start Flash Deals Area ==-->
    {{-- <div class="flash-deals-area home-2 bg-img" data-bg="{{('public/frontend/images/bg/deal-bg-2.jpg')}}">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-6">
                    <div class="flash-deals-thumb text-center text-md-left">
                        <img src="{{('public/frontend/images/extra/chair.png')}}" alt="Deals" />
                    </div>
                </div>

                <div class="col-md-7 col-lg-6 text-center">
                    <div class="flash-deals-content">
                        <h2>FLASH DEALS</h2>
                        <h3>HURRY UP AND GET 25% DISCOUNT</h3>
                        <a href="cart.html" class="btn btn-brand">Add to cart</a>

                        <div class="deals-countdown-area">
                            <div class="ht-countdown" data-date="9/20/2019"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--== End Flash Deals Area ==-->


    <!--== Start Products Area Wrapper ==-->
    <div class="products-area-wrapper sm-top">
        <div class="container container-wide">
            <div class="row">
                <div class="col-lg-5 m-auto text-center">
                    <div class="section-title">
                        <h2 class="h3">Sản phẩm bán chạy</h2>
                        {{-- <p>All best seller product are now available for you and your can buy
                            this product from here any time any where so sop now</p> --}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="product-wrapper columns-5">
                        <!-- Start Product Item -->
                        <div class="col">
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/1611070841730ez9ar.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/1611070841730ez9ar.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">
                                    <h4 class="title"><a href="single-product.html">PORTOFINO LINEN SHIRT - DARK GREEN</a></h4>
                                    <span class="price"><strong>Giá:</strong> 165000 VNĐ</span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>

                            </div>
                        </div>
                        <!-- End Product Item -->

                        <!-- Start Product Item -->
                        <div class="col">
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/1605598698560q08n4.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/1605598698560q08n4.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">

                                    <h4 class="title"><a href="single-product.html">PLAID FLANNEL SHIRT - BLUE CARO</a></h4>
                                    <span class="price"><strong>Giá:</strong> 615000 VNĐ</span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Product Item -->

                        <!-- Start Product Item -->
                        <div class="col">
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/1605681517900y138q1.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/1605681517900y138q1.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">
                                    <h4 class="title"><a href="single-product.html">SLIM FIT POLO SHIRT - NAVY BLUE</a></h4>
                                    <span class="price"><strong>Giá:</strong> 65000 VNĐ</span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>

                            </div>
                        </div>
                        <!-- End Product Item -->

                        <!-- Start Product Item -->
                        <div class="col">
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/1611072899263i23cqh.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/1611072899263i23cqh.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">
                                    <h4 class="title"><a href="single-product.html">CONTRAST NECKLINE TSHIRT - ORANGE</a></h4>
                                    <span class="price"><strong>Giá:</strong> 165000 VNĐ</span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>
                            </div>
                        </div>
                        <!-- End Product Item -->

                        <!-- Start Product Item -->
                        <div class="col">
                            <div class="product-item">
                                <div class="product-item__thumb">
                                    <a href="single-product.html">
                                        <img class="thumb-primary" src="{{('public/frontend/images/thegmen/1611070809698bxniyb.jpg')}}" alt="Product" />
                                        <img class="thumb-secondary" src="{{('public/frontend/images/thegmen/1611070809698bxniyb.jpg')}}" alt="Product" />
                                    </a>
                                </div>

                                <div class="product-item__content">
                                    <h4 class="title"><a href="single-product.html">PORTOFINO LINEN SHIRT - NAVY BLUE</a></h4>
                                    <span class="price"><strong>Giá:</strong> 165000 VNĐ</span>
                                </div>

                                <div class="product-item__action">
                                    <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                   
                                    
                                    <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                </div>

                            </div>
                        </div>
                        <!-- End Product Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Products Area Wrapper ==-->

    <!--== Start Brand Logo Area Wrapper ==-->
    <div class="brand-logo-area sm-top sm-bottom">

    </div>
    <!--== End Brand Logo Area Wrapper ==-->

    <!--== Start Footer Area Wrapper ==-->
@endsection