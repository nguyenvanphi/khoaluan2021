@extends('frontend.layout.shared')
@section('content')

    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img" data-bg="{{('public/frontend/images/bg/checkout.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        <div class="page-header-content-inner">
                            {{-- <h1>Checkout</h1>

                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li class="current"><a href="#">Checkout</a></li>
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
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="checkout-page-coupon-area">
                            <!-- Checkout Coupon Accordion Start -->
                            <div class="checkoutAccordion" id="checkOutAccordion">
                                <div class="card">
                                    <h3><i class="fa fa-info-circle"></i> Have a Coupon? <span data-toggle="collapse" data-target="#couponaccordion">
                                    Click here to Enter your Code</span>
                                    </h3>
                                    <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="apply-coupon-wrapper">
                                                        <p>If you have a coupon code, please apply it below.</p>
                                                        <form action="#" method="post">
                                                            <div class="row">
                                                                <div class="col-md-8">
                                                                    <div class="input-item mt-0">
                                                                        <input type="text" placeholder="Enter Your Coupon Code" required />
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4 mt-20 mt-md-0">
                                                                    <button class="btn btn-bordered">Apply Coupon</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Checkout Coupon Accordion End -->
                        </div>
                    </div>
                </div> --}}
                <form action="" id="order_form" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Checkout Form Area Start -->
                            <div class="checkout-billing-details-wrap">
                                <h2>Thông tin đặt hàng</h2>
                                <div class="billing-form-wrap">
                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-item mt-0">
                                                <label for="f_name" class="sr-only required">First Name</label>
                                                <input type="text" id="f_name" placeholder="First Name" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-item mt-md-0">
                                                <label for="l_name" class="sr-only required">Last Name</label>
                                                <input type="text" id="l_name" placeholder="Last Name" required />
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="input-item">
                                        <label for="name" class="sr-only required">Full Name</label>
                                        <input type="text" id="name" name="name_order" placeholder="Full Name" required />
                                        <p class="text-warning" id="error_name" style="margin-top: 10px"></p>
                                    </div>

                                    <div class="input-item">
                                        <label for="email" class="sr-only required">Email Address</label>
                                        <input type="email" id="email" name="email_order" placeholder="Email Address" required />
                                        <p class="text-warning" id="error_email" style="margin-top: 10px"></p>
                                    </div>

                                    {{-- <div class="input-item">
                                        <label for="com-name" class="sr-only">Company Name</label>
                                        <input type="text" id="com-name" placeholder="Company Name" />
                                    </div> --}}

                                    {{-- <div class="input-item">
                                        <label for="country" class="sr-only required">Country</label>
                                        <select name="country" id="country">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="London">London</option>
                                            <option value="Chaina">China</option>
                                        </select>
                                    </div> --}}

                                    <div class="input-item">
                                        <label for="address" class="sr-only required">Street address</label>
                                        <input type="text" id="address" name="address_order" placeholder="Street address" required />
                                        <p class="text-warning" id="error_address" style="margin-top: 10px"></p>
                                    </div>

                                    {{-- <div class="input-item">
                                        <input type="text" placeholder="Street address Line 2 (Optional)" />
                                    </div> --}}

                                    {{-- <div class="input-item">
                                        <label for="city" class="sr-only required">City</label>
                                        <input type="text" id="city" placeholder="City" required />
                                    </div> --}}

                                    {{-- <div class="input-item">
                                        <label for="state" class="sr-only">State / Divition</label>
                                        <input type="text" id="state" placeholder="State / Divition" />
                                    </div> --}}

                                    {{-- <div class="input-item">
                                        <label for="postcode" class="sr-only required">Postcode / ZIP</label>
                                        <input type="text" id="postcode" placeholder="Postcode / ZIP" required />
                                    </div> --}}

                                    <div class="input-item">
                                        <label for="phone" class="sr-only">Phone</label>
                                        <input type="text" id="phone" name="phone_order" placeholder="Phone" />
                                        <p class="text-warning" id="error_phone" style="margin-top: 10px"></p>
                                    </div>

                                    {{-- <div class="checkout-box-wrap">
                                        <div class="input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="create_pwd">
                                                <label class="custom-control-label" for="create_pwd">Create an
                                                    account?</label>
                                            </div>
                                        </div>
                                        <div class="account-create single-form-row">
                                            <p>Create an account by entering the information below. If you are a returning
                                                customer please login at the top of the page.</p>
                                            <div class="input-item">
                                                <label for="pwd" class="sr-only required">Account Password</label>
                                                <input type="password" id="pwd" placeholder="Account Password" required />
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="checkout-box-wrap">
                                        <div class="input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                                <label class="custom-control-label" for="ship_to_different">Ship to a
                                                    different
                                                    address?</label>
                                            </div>
                                        </div>
                                        <div class="ship-to-different single-form-row">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <label for="f_name_2" class="sr-only required">First Name</label>
                                                        <input type="text" id="f_name_2" placeholder="First Name" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="input-item">
                                                        <label for="l_name_2" class="sr-only required">Last Name</label>
                                                        <input type="text" id="l_name_2" placeholder="Last Name" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-item">
                                                <label for="email_2" class="sr-only required">Email Address</label>
                                                <input type="email" id="email_2" placeholder="Email Address" required />
                                            </div>

                                            <div class="input-item">
                                                <label for="com-name_2" class="sr-only">Company Name</label>
                                                <input type="text" id="com-name_2" placeholder="Company Name" />
                                            </div>

                                            <div class="input-item">
                                                <label for="country_2" class="sr-only required">Country</label>
                                                <select name="country" id="country_2">
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="India">India</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="England">England</option>
                                                    <option value="London">London</option>
                                                    <option value="London">London</option>
                                                    <option value="Chaina">Chaina</option>
                                                </select>
                                            </div>

                                            <div class="input-item">
                                                <label for="street-address_2" class="sr-only required">Street address</label>
                                                <input type="text" id="street-address_2" placeholder="Street address Line 1" required />
                                            </div>

                                            <div class="input-item">
                                                <input type="text" placeholder="Street address Line 2 (Optional)" />
                                            </div>

                                            <div class="input-item">
                                                <label for="town_2" class="sr-only required">Town / City</label>
                                                <input type="text" id="town_2" placeholder="Town / City" required />
                                            </div>

                                            <div class="input-item">
                                                <label for="state_2" class="sr-only">State / Divition</label>
                                                <input type="text" id="state_2" placeholder="State / Divition" />
                                            </div>

                                            <div class="input-item">
                                                <label for="postcode_2" class="sr-only required">Postcode / ZIP</label>
                                                <input type="text" id="postcode_2" placeholder="Postcode / ZIP" required />
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="input-item">
                                        <label for="ordernote" class="sr-only">Order Note</label>
                                        <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div> --}}
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
                                            @foreach ($dataproduct as $item)
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
                                            <input type="hidden" name="total" value="{{$total}}">
                                            <tr class="cart-subtotal">
                                                <th>Thành tiền</th>
                                                <td>{{$total}} VNĐ</td>
                                            </tr>
                                            {{-- @if ($total > 500000)
                                                <tr class="cart-subtotal">
                                                    <th>Thành tiền</th>
                                                    <td>{{$total}} VNĐ</td>
                                                </tr>
                                            @else
                                                <tr class="cart-subtotal">
                                                    <th>Phí Vận </th>
                                                    <td>15000 VNĐ</td>
                                                </tr>
                                                <tr class="cart-subtotal">
                                                    <th>Thành tiền</th>
                                                    <td>{{$total + 15000}} VNĐ</td>
                                                </tr>
                                            @endif --}}
                                            <tr class="shipping">
                                                <th>Phương thức thanh toán</th>
                                                <td>
                                                    <ul class="shipping-method">
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="flat_shipping" name="pay_method" class="custom-control-input" value="0" checked />
                                                                <label class="custom-control-label" for="flat_shipping">COD</label>
                                                            </div>
                                                        </li>
                                                        {{-- <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="free_shipping" name="shipping_method" class="custom-control-input" />
                                                                <label class="custom-control-label" for="free_shipping">Free
                                                                    Shipping</label>
                                                            </div>
                                                        </li> --}}
                                                        <li>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="cod_shipping" name="pay_method" value="1" class="custom-control-input" />
                                                                <label class="custom-control-label" for="cod_shipping">Trực tuyến</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            {{-- <tr class="final-total">
                                                <th>Total</th>
                                                <td><span class="total-amount">$289.93</span></td>
                                            </tr> --}}
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="order-details-footer">
                                    {{-- <p>Your personal data will be used to process your order, support your experience throughout
                                        this website, and for other purposes described in our
                                        <a href="#" class="text-warning">privacy policy</a>.</p>
                                    <div class="custom-control custom-checkbox mt-10">
                                        <input type="checkbox" id="privacy" class="custom-control-input" required />
                                        <label for="privacy" class="custom-control-label">I have read and agree to the website
                                            terms
                                            and conditions</label>
                                    </div> --}}

                                    <button type="submit" class="btn btn-bordered mt-40">Đặt hàng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#order_form').on('submit',function(event){
            event.preventDefault(); 
            $('#error_name').html('');
            $('#error_email').html('');
            $('#error_address').html('');
            $('#error_phone').html('');
            var check = 0;
            if($('#name').val()==''){
                $('#error_name').html('Vui lòng nhập họ tên');
                check = 1;
            }
            if($('#email').val()==''){
                $('#error_email').html('Vui lòng nhập địa chỉ email');
                check = 1;
            }else{
                if(!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test($('#email').val())){
                    $('#error_email').html('Email không đúng định dạng');
                    check = 1;
                }
            }
            if($('#address').val()==''){
                $('#error_adress').html('Vui lòng nhập địa chỉ nhận hàng');
                check = 1;
            }
            if($('#phone').val()==''){
                $('#error_phone').html('Vui lòng nhập số điện thoại');
                check = 1;
            }else{
                if(!/((09|03|07|08|05)+([0-9]{8})\b)/g.test($('#phone').val())){
                    $('#error_phone').html('Số điện thoại không đúng');
                    check = 1;
                }
            }
            if(check==0){
                $.ajax({
                url: "{{route('order')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                    {  
                        if(data.success){
                            window.location.href = "thanks";
                        }
                        
                    }
                });
            }
        });
    });
</script>
@endsection