@extends('frontend.layout.shared')
@section('content')
<style>
    .product-item .product-item__content .btn{
        border: unset;
        border-radius: unset !important;
        height: unset;
        font-weight: unset;
        padding: 0 15px; 
    }
</style>
    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img" data-bg="{{('public/frontend/images/bg/shop.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        {{-- <div class="page-header-content-inner">
                            <h1>Shop</h1>

                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="current"><a href="#">Shop</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area ==-->

    <!--== Start Page Content Wrapper ==-->
<div class="page-content-wrapper sp-y">
    <div class="shop-page-action-bar mb-30">
        <div class="container container-wide">
            <div class="action-bar-inner">
                <div class="row align-items-center">
                    {{-- <div class="col-sm-2">
                        <div class="shop-layout-switcher mb-15 mb-sm-0">
                            <ul class="layout-switcher nav">
                                <li data-layout="grid" class="active"><i class="fa fa-th"></i></li>
                                <li data-layout="list"><i class="fa fa-th-list"></i></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="col-sm-6">
                        <style>
                            .form-control:focus{
                                border-color: unset;
                                box-shadow: unset;
                            }
                        </style>
                        <form action="{{URL::to('/search-product')}}" method="GET" class="search-form" style="max-width: 300px; height: 40px;">
                            {{ csrf_field() }}
                            <input class="form-control mr-sm-2" type="text" name="search_product" placeholder="Tìm kiếm sản phẩm" value="<?php if(!empty($search)) echo $search; ?>" aria-label="Search" style="border-radius: unset;">
                            <button type="submit" class="search-trigger" style="position: absolute;top: 7px;left: 50%;"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="sort-by-wrapper">
                            <label for="sort" class="sr-only">Sắp xếp</label>
                            <select name="sort" id="sort">
                                <option value="sbp">Sắp xếp theo tên A-Z</option>
                                <option value="sbn">Sắp xếp theo tên Z-A</option>
                                <option value="sbt">Sắp xếp theo giá tăng dần</option>
                                <option value="sbr">Sắp xếp theo giá giảm dần</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="shop-page-product">
        <div class="container container-wide">
            <div class="product-wrapper product-layout layout-grid">
                <div class="row mtn-30">
                    @if ($products)
                        @foreach ($products as $product)
                            <!-- Start Product Item -->
                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                <div class="product-item">
                                    <div class="product-item__thumb">
                                        <a href="{{URL::to('/singleproduct'.'/'.$product->id)}}">
                                            <img class="thumb-primary" src="{{ URL::to('/') }}/public/storage/products/@php
                                            echo $product->images
                                        @endphp" alt="Product" />
                                            <img class="thumb-secondary" src="{{ URL::to('/') }}/public/storage/products/@php
                                            echo $product->images
                                        @endphp" alt="Product" />
                                        </a>
            
                                        {{-- <div class="ratting">
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star"></i></span>
                                            <span><i class="ion-android-star-half"></i></span>
                                        </div> --}}
                                    </div>
            
                                    <div class="product-item__content">
                                        <div class="product-item__info">
                                            <h4 class="title"><a href="{{URL::to('/singleproduct'.'/'.$product->id)}}">@php
                                                echo $product->name
                                            @endphp</a></h4>
                                            @if ($product->sale!=null)
                                            <span class="price"><strong>Giá:</strong> @php
                                                echo $product->sale
                                            @endphp VNĐ<br><del> @php
                                                echo $product->price
                                            @endphp VNĐ</del></span>
                                            @else
                                                <span class="price"><strong>Giá:</strong> @php
                                                    echo $product->price
                                                @endphp VNĐ</span>
                                            @endif
                                            <br>
                                            <a href="{{URL::to('/singleproduct'.'/'.$product->id)}}" type="button" class="btn btn-secondary">Chọn ngay</a>
                                        </div>
            
                                        {{-- <div class="product-item__action" style="padding-top: 10px;padding-left: 10px;">
                                            <button class="btn-add-to-cart"><i class="ion-bag"></i></button> --}}
                                            {{-- <button class="btn-add-to-cart"><i class="ion-ios-loop-strong"></i></button>
                                            <button class="btn-add-to-cart"><i class="ion-ios-heart-outline"></i></button> --}}
                                            {{-- <button class="btn-add-to-cart"><i class="ion-eye"></i></button>
                                        </div> --}}
                                    </div>
            
                                    {{-- <div class="product-item__sale">
                                        <span class="sale-txt">25%</span>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach 
                    @else
                        <h4 class="ml-3 mt-3">Không có sản phẩm !</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="shop-page-action-bar mt-30">
        <div class="container container-wide">
            <div class="action-bar-inner">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <nav class="pagination-wrap mb-10 mb-sm-0">
                            {{-- <style>
                                .pagination li a[rel="next"]::before {
                                    content: "\f3d5";
                                }
                                .pagination li a[rel="prev"]::before {
                                    content: "\f3d5";
                                }
                                .pagination .disabled span::before {
                                    content: "\f3d5";
                                }
                            </style> --}}
                            @if ($products)
                                {!! $products->render() !!}
                            @endif
                        </nav>
                    </div>

                    <div class="col-sm-6 text-center text-sm-right">
                        <p>Showing {{ $from }}–{{ $to }} of {{ $products->total() }} results</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="shop-page-action-bar mt-30">
        <div class="container container-wide">
            <div class="action-bar-inner">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <nav class="pagination-wrap mb-10 mb-sm-0">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="ion-ios-arrow-thin-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-sm-6 text-center text-sm-right">
                        <p>Showing 1–12 of 26 results</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<!--== End Page Content Wrapper ==-->

 @endsection