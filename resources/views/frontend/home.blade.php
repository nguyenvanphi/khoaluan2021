
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
        .product-item .product-item__content .btn{
            border: unset;
            border-radius: unset !important;
            height: unset;
            font-weight: unset;
            padding: 0 15px; 
        }
    </style>
    <!--== Start Slider Area Wrapper ==-->
    <div class="slider-area-wrapper home-2">
        <div class="slider-content-active">
            <div class="slider-slide-item bg-img" data-bg="{{('public/frontend/images/slider/banner-slider-1.jpg')}}">
            </div>
            <div class="slider-slide-item bg-img" data-bg="{{('public/frontend/images/slider/banner-slider-1.jpg')}}">
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
                                <p>Cung cấp giao hàng tận nhà miễn phí cho tất cả các đơn hàng</p>
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

    @if ($products_sale)
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
                                @foreach ($products_sale as $item)
                                    <!-- Start Product Item -->
                                    <div class="product-item">
                                        <div class="product-item__thumb">
                                            <a href="{{URL::to('/singleproduct'.'/'.$item->id)}}">
                                                <img class="thumb-primary" src="{{ URL::to('/') }}/public/storage/products/@php
                                                echo $item->images
                                            @endphp"  alt="Product" />
                                                <img class="thumb-secondary" src="{{ URL::to('/') }}/public/storage/products/@php
                                                echo $item->images
                                            @endphp" alt="Product" />
                                            </a>
                                        </div>
                                        {{-- overflow: hidden;
                                        -webkit-line-clamp: 1;
                                        -webkit-box-orient: vertical;
                                        display: -webkit-box; --}}
                                        <div class="product-item__content">
                                            <h4 class="title"><a href="{{URL::to('/singleproduct'.'/'.$item->id)}}">@php
                                                echo $item->name
                                            @endphp</a></h4>
                                            <span class="price"><strong>Giá:</strong> @php
                                                echo $item->sale
                                            @endphp VNĐ<del> @php
                                                echo $item->price
                                            @endphp VNĐ</del></span>
                                            <a href="{{URL::to('/singleproduct'.'/'.$item->id)}}" type="button" class="btn btn-secondary">Chọn ngay</a>
                                        </div>
                                        {{-- <div class="product-item__action">

                                            <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                        
                                            
                                            <a href="{{URL::to('/singleproduct')}}" class="btn-add-to-cart"><i class="ion-eye"></i></a>
                                        </div> --}}

                                    </div>
                                    <!-- End Product Item -->
                                @endforeach  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    @if ($products_hot)
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
                            @foreach ($products_hot as $item)
                                <!-- Start Product Item -->
                                <div class="col">
                                    <div class="product-item">
                                        <div class="product-item__thumb">
                                            <a href="{{URL::to('/singleproduct'.'/'.$item->id)}}">
                                                <img class="thumb-primary" src="{{ URL::to('/') }}/public/storage/products/@php
                                                echo $item->images
                                            @endphp" alt="Product" />
                                                <img class="thumb-secondary" src="{{ URL::to('/') }}/public/storage/products/@php
                                                echo $item->images
                                            @endphp" alt="Product" />
                                            </a>
                                        </div>

                                        <div class="product-item__content">
                                            <h4 class="title"><a href="{{URL::to('/singleproduct'.'/'.$item->id)}}">@php
                                                echo $item->name
                                            @endphp</a></h4>
                                            @if ($item->sale!=null)
                                                <span class="price"><strong>Giá:</strong> @php
                                                    echo $item->sale
                                                @endphp VNĐ<del> @php
                                                    echo $item->price
                                                @endphp VNĐ</del></span>
                                            @else
                                                <span class="price"><strong>Giá:</strong> @php
                                                    echo $item->price
                                                @endphp VNĐ</span>
                                            @endif
                                            <a href="{{URL::to('/singleproduct'.'/'.$item->id)}}" type="button" class="btn btn-secondary">Chọn ngay</a>
                                        </div>

                                        {{-- <div class="product-item__action">
                                            <button class="btn-add-to-cart"><i class="ion-bag"></i></button>
                                            <a href="{{URL::to('/singleproduct')}}" class="btn-add-to-cart"><i class="ion-eye"></i></a>
                                            
                                        </div> --}}

                                    </div>
                                </div>
                                <!-- End Product Item -->
                            @endforeach 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--== End Products Area Wrapper ==-->
    @endif

    <!--== Start Brand Logo Area Wrapper ==-->
    <div class="brand-logo-area sm-top sm-bottom">

    </div>
    <!--== End Brand Logo Area Wrapper ==-->

    <!--== Start Footer Area Wrapper ==-->
@endsection