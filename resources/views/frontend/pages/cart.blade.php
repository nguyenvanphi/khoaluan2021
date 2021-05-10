@extends('frontend.layout.shared')
@section('content')

    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img" data-bg="{{('public/frontend/images/bg/shoppingcart.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        <div class="page-header-content-inner">
                            {{-- <h1>Shopping Cart</h1>

                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li class="current"><a href="#">Cart</a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area ==-->

    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper sp-y">
        <div class="cart-page-content-wrap">
            <div class="container container-wide">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shopping-cart-list-area">
                            <div class="shopping-cart-table table-responsive">
                                <table class="table table-bordered text-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td class="product-list">
                                                <div class="cart-product-item d-flex align-items-center">
                                                    <div class="remove-icon">
                                                        <button><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                    <a href="single-product.html" class="product-thumb">
                                                        <img src="{{('public/frontend/images/thegmen/1617940531014ervav4.jpg')}}" alt="Product" />
                                                    </a>
                                                    <a href="single-product.html" class="product-name">PIMA POLO SHIRT - COFFEE</a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="price">150000 VNĐ</span>
                                            </td>
                                            <td>
                                                <div class="pro-qty">
                                                    <input type="text" class="quantity" title="Quantity" value="1" />
                                                </div>
                                            </td>
                                            <td>
                                                <span class="price">150000 VNĐ</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="product-list">
                                                <div class="cart-product-item d-flex align-items-center">
                                                    <div class="remove-icon">
                                                        <button><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                    <a href="single-product.html" class="product-thumb">
                                                        <img src="{{('public/frontend/images/thegmen/1611071582309vqmxw2l.jpg')}}" alt="Product" />
                                                    </a>
                                                    <a href="single-product.html" class="product-name">
                                                        LINEN COLLAR SHIRT
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="price">150000 VNĐ</span>
                                            </td>
                                            <td>
                                                <div class="pro-qty">
                                                    <input type="text" class="quantity" title="Quantity" value="1" />
                                                </div>
                                            </td>
                                            <td>
                                                <span class="price">150000 VNĐ</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="product-list">
                                                <div class="cart-product-item d-flex align-items-center">
                                                    <div class="remove-icon">
                                                        <button><i class="fa fa-trash-o"></i></button>
                                                    </div>
                                                    <a href="single-product.html" class="product-thumb">
                                                        <img src="{{('public/frontend/images/thegmen/16041092557109t8zq.jpg')}}" alt="Product" />
                                                    </a>
                                                    <a href="single-product.html" class="product-name">SƠ MI KAKI DENIM</a>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="price">150000 VNĐ</span>
                                            </td>
                                            <td>
                                                <div class="pro-qty">
                                                    <input type="text" class="quantity" title="Quantity" value="1" />
                                                </div>
                                            </td>
                                            <td>
                                                <span class="price">150000 VNĐ</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="cart-coupon-update-area d-sm-flex justify-content-between align-items-center">
                                {{-- <div class="coupon-form-wrap">
                                    <form action="#" method="post">
                                        <label for="coupon" class="sr-only">Coupon Code</label>
                                        <input type="text" id="coupon" placeholder="Coupon Code" />
                                        <button class="btn-apply">Apply Button</button>
                                    </form>
                                </div> --}}

                                <div class="cart-update-buttons mt-15 mt-sm-0">
                                    <button class="btn-clear-cart">Xoá giỏ hàng</button>
                                    <button class="btn-update-cart">Cập nhật giỏ hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <!-- Cart Calculate Area -->
                        <div class="cart-calculate-area mt-sm-40 mt-md-60">
                            <h5 class="cal-title">Tổng tiền giỏ hàng</h5>

                            <div class="cart-cal-table table-responsive">
                                <table class="table table-borderless">
                                    <tr class="cart-sub-total">
                                        <th>Thành tiền</th>
                                        <td>450000 VNĐ</td>
                                    </tr>
                                    {{-- <tr class="shipping">
                                        <th>Shipping</th>
                                        <td>
                                            <ul class="shipping-method">
                                                <li>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="flat_shipping" name="shipping_method" class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="flat_shipping">Flat Rate :
                                                            $10</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="free_shipping" name="shipping_method" class="custom-control-input" />
                                                        <label class="custom-control-label" for="free_shipping">Free
                                                            Shipping</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="cod_shipping" name="shipping_method" class="custom-control-input" />
                                                        <label class="custom-control-label" for="cod_shipping">Cash on
                                                            Delivery</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr> --}}
                                    {{-- <tr class="order-total">
                                        <th>Total</th>
                                        <td><b>$299.93</b></td>
                                    </tr> --}}
                                </table>
                            </div>

                            <div class="proceed-checkout-btn">
                                <a href="{{URL::to('/checkout')}}" class="btn btn-brand d-block">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->

@endsection