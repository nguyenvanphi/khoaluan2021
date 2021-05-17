@extends('frontend.layout.shared')
@section('content')

    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img" data-bg="{{asset('public/frontend/images/bg/thanks.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
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
                    <div class="col-12">
                        <div class="checkout-page-coupon-area">
                            <!-- Checkout Coupon Accordion Start -->
                            <div class="checkoutAccordion" id="checkOutAccordion">
                                <div class="card">
                                    <style>
                                        h3 a:hover{
                                            color: whitesmoke !important;
                                        }
                                    </style>
                                    <h3><i class="fa fa-gratipay"></i> Cảm ơn bạn đã tin tưởng và đặt mua sản phẩm ! <a href="{{URL::to('/shop')}}" style="color: #1b1b1c">
                                    Click vào đây để tiếp tục mua sắm</a>
                                    </h3>
                                </div>
                            </div>
                            <!-- Checkout Coupon Accordion End -->
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Checkout Form Area Start -->
                            <div class="checkout-billing-details-wrap">
                                <h2>Thông tin đặt hàng</h2>
                                <div class="billing-form-wrap">
                                    <div class="input-item">
                                        <label for="name" class="sr-only required">Full Name</label>
                                        <input type="text" value="{{$info_order['name']}}" disabled id="name" name="name_order" placeholder="Full Name" required />
                                        <p class="text-warning" id="error_name" style="margin-top: 10px"></p>
                                    </div>

                                    <div class="input-item">
                                        <label for="email" class="sr-only required">Email Address</label>
                                        <input type="email" value="{{$info_order['email']}}" disabled id="email" name="email_order" placeholder="Email Address" required />
                                        <p class="text-warning" id="error_email" style="margin-top: 10px"></p>
                                    </div>

                                    <div class="input-item">
                                        <label for="address" class="sr-only required">Street address</label>
                                        <input type="text" value="{{$info_order['address']}}" disabled id="address" name="address_order" placeholder="Street address" required />
                                        <p class="text-warning" id="error_address" style="margin-top: 10px"></p>
                                    </div>

                                    <div class="input-item">
                                        <label for="phone" class="sr-only">Phone</label>
                                        <input type="text" value="{{$info_order['phone']}}" disabled id="phone" name="phone_order" placeholder="Phone" />
                                        <p class="text-warning" id="error_phone" style="margin-top: 10px"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-xl-5 ml-auto">
                            <!-- Checkout Page Order Details -->
                            <div class="order-details-area-wrap">
                                <h2>Đơn hàng của bạn</h2>
                                <div class="order-details-table table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th style="width: 10% !important">Sản phẩm</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($order as $item)
                                                @php
                                                    if($item['product']['sale']==null){
                                                        $total = $total + $item['product']['price']*$item['qty']; 
                                                    }else{
                                                        $total = $total + $item['product']['sale']*$item['qty'];
                                                    }
                                                @endphp
                                                <tr class="cart-item">
                                                    <td><span class="product-title">{{$item['product']['name']}}({{$item['attribute'][0]['attribute']}}:{{$item['attribute'][0]['attributevalue']}})</span> <span
                                                    class="product-quantity">&#215;  {{$item['qty']}}</span></td>
                                                    <td>@if ($item['product']['sale']==null)
                                                        {{$item['product']['price']*$item['qty']}}
                                                    @else
                                                        {{$item['product']['sale']*$item['qty']}}
                                                    @endif VNĐ</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal" style="border-bottom: unset;">
                                                <th>Thành tiền</th>
                                                <td>{{$total}} VNĐ</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->

@endsection