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
                    <div class="col-lg-9">
                        <form id="form_update_cart">
                            <div class="shopping-cart-list-area" id="datacart">
                                {{-- @if (count($cart)==0)
                                    <h3>Không có sản phầm nào trong giỏ hàng !</h3>
                                @else --}}
                                    {{-- <div class="shopping-cart-table table-responsive">
                                        <table id="" class="table table-bordered text-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Tổng tiền</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($cart as $item)
                                                    <tr>
                                                        <td class="product-list">
                                                            <div class="cart-product-item d-flex align-items-center">
                                                                <div class="remove-icon">
                                                                    <button data-toggle="modal" data-target="#deleteproduct"><i class="fa fa-trash-o"></i></button>
                                                                </div>
                                                                <a href="{{URL::to('/singleproduct'.'/'.$item['product']->id)}}" class="product-thumb">
                                                                    <img src="{{ URL::to('/') }}/public/storage/products/@php
                                                                    echo $item['product']->images
                                                                @endphp" alt="Product" style="width: 100%; max-height: 100px;" />
                                                                </a>
                                                                <a href="{{URL::to('/singleproduct'.'/'.$item['product']->id)}}" class="product-name">{{$item['product']->name}} (
                                                                    @php
                                                                        foreach($item['attribute'] as $attr){
                                                                        echo $attr['attribute'].':'.$attr['attributevalue'].' ';
                                                                        }
                                                                    @endphp
                                                                )</a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="price">@php
                                                                if($item['product']->sale==null){
                                                                    echo $item['product']->price;
                                                                }else{
                                                                    echo $item['product']->sale;
                                                                }
                                                            @endphp VNĐ</span>
                                                        </td>
                                                        <td>
                                                            <div class="pro-qty">
                                                                <input type="text" class="quantity" title="Quantity" value="{{$item['qty']}}" />
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="price">@php
                                                                if($item['product']->sale==null){
                                                                    echo $item['product']->price*$item['qty'];
                                                                }else{
                                                                    echo $item['product']->sale*$item['qty'];
                                                                }
                                                            @endphp VNĐ</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> --}}

                                    {{-- <div class="cart-coupon-update-area d-sm-flex justify-content-between align-items-center"> --}}
                                        {{-- <div class="coupon-form-wrap">
                                            <form action="#" method="post">
                                                <label for="coupon" class="sr-only">Coupon Code</label>
                                                <input type="text" id="coupon" placeholder="Coupon Code" />
                                                <button class="btn-apply">Apply Button</button>
                                            </form>
                                        </div> --}}

                                        {{-- <div class="cart-update-buttons mt-15 mt-sm-0">
                                            <button class="btn-clear-cart" data-toggle="modal" data-target="#deletecart">Xoá giỏ hàng</button>
                                            <button class="btn-update-cart">Cập nhật giỏ hàng</button>
                                        </div>
                                    </div> --}}
                                {{-- @endif --}}
                            </div>
                        </form>
                    </div>
                    
                    <div class="col-lg-3">
                        <!-- Cart Calculate Area -->
                        <div class="cart-calculate-area mt-sm-40 mt-md-60"  style="text-align: center">
                            <h5 class="cal-title">Tổng tiền giỏ hàng</h5>

                            <div class="cart-cal-table table-responsive" id="datatotal">
                                {{-- <table class="table table-borderless">
                                    <tr class="cart-sub-total"> --}}
                                        {{-- <th>Thành tiền</th> --}}
                                        {{-- @if (count($cart)==0)
                                            0 VNĐ
                                        @else
                                            <td>@php
                                                $total = 0;
                                                foreach($cart as $item){
                                                    if($item['product']->sale==null){
                                                        $total = $total + $item['product']->price*$item['qty'];
                                                    }else{
                                                        $total = $total + $item['product']->sale*$item['qty'];
                                                    }
                                                }
                                                echo $total;
                                            @endphp VNĐ</td>
                                        @endif
                                    </tr> --}}
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
                                {{-- </table> --}}
                            </div>
                            <div class="proceed-checkout-btn" id="btn_order">
                                {{-- style="pointer-events: none;" --}}
                                {{-- <a href="{{URL::to('/order')}}" class="btn btn-brand d-block">Đặt hàng</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deletecart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" id="deletecart_form">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá giỏ hàng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Bạn có chắc muốn xoá giỏ hàng ?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                    <button type="submit" class="btn btn-primary">Xoá</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xoá sản phẩm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    Bạn có chắc muốn xoá sản phẩm khỏi giỏ hàng ?
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                    <button class="btn btn-primary" id="btn_deleteproductcart" >Xoá</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        toastr.options = {
            timeOut          : 650, //default timeout,
        };
        load_cart();
        $('#deletecart_form').on('submit',function(event){
            event.preventDefault();  
            $.ajax({
            url: "{{route('deletecart')}}",
            method: 'GET',
            dataType:"json",
            success:function(data)
                {  
                    if(data.success)
                    {
                        jQuery('#deletecart').modal('hide');
                        $('#cart-total').html('0');
                        load_cart();
                        toastr.success("Xoá giỏ hàng thành công !");
                    }
                }
            });
        });
        var cp_id;
        var attribute_id;
        $(document).on('click', '.deleteproductcart', function(){
            cp_id = $(this).attr('id');
            attribute_id = $(this).attr('par');
            jQuery('#deleteproduct').modal('show');
        });
        $('#btn_deleteproductcart').on('click',function(){
            $.ajax({
            url: "/shopthegmen/deleteproductcart/"+cp_id+"/"+attribute_id,
            method: 'GET',
            dataType:"json",
            success:function(data)
                {  
                    if(data.success)
                    {
                        jQuery('#deleteproduct').modal('hide');
                        load_cart();
                        toastr.success("Xoá sản phẩm thành công !");
                    }
                }
            });
        });
        // $('.qty-btn').on('click', function(e) { 
        //     e.preventDefault();
        //     alert('test');
        //     $('#updatecart').prop('disabled', false);
        // });
        $('#form_update_cart').on('submit',function(event){
            // $('#bt-addcart').addClass('disabled');
            event.preventDefault();
            $.ajax({
            url: "{{route('updatecart')}}",
            method:"POST",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType:"json",
            success:function(data)
                {  
                    // if(data.success)
                    // {
                    //     $('#cart-total').html(data.number);
                        load_cart()
                        toastr.success("Cập nhật giỏ hàng thành công !");
                    //     $('#bt-addcart').removeClass('disabled');
                    // }
                }
            });
        });

    });

    function load_cart(){
        $.ajax({
            url: "/shopthegmen/loadcart",
            dataType:"json",
            success:function(data)
                {  
                    var total = 0;
                    var number = 0;
                    $.each(data, function (key, item) {
                        $.each(item, function(key2, item2){
                            number = number + Number(item2['qty']);
                            if(item2['product']['sale']!=null){
                                total = total + Number(item2['product']['sale'])*Number(item2['qty'])
                            }else{
                                total = total + Number(item2['product']['price'])*Number(item2['qty'])
                            }
                        })
                    });
                    var html = '';
                    if(number<=0){
                        html += '<h3>Không có sản phẩm nào trong giỏ hàng !</h3>'
                    }else{
                        html += '<div class="shopping-cart-table table-responsive">'
                        html +=  '<table id="data_cart" class="table table-bordered text-center mb-0">'
                        html +=  '<thead>'
                        html +=  '<tr>'
                        html +=   '<th>Sản phẩm</th>'
                        html += '<th>Giá</th>'
                        html +=   '<th>Số lượng</th>'
                        html +=   '<th>Tổng tiền</th>'
                        html +=  '</tr>'
                        html += '</thead>'
                        html +=   '<tbody>'
                        $.each(data, function (key, item) {
                            $.each(item, function(key2, item2){
                                html += '<tr>'
                                html += '<td class="product-list">'
                                html += '<div class="cart-product-item d-flex align-items-center">'
                                html +='<div class="remove-icon">'
                                html += '<input type="hidden" name="id'
                                html += key2
                                html += '" value="'
                                html += item2['product']['id']
                                html +='">'
                                html +='<button type="button" class="deleteproductcart" id="'
                                html += item2['product']['id']
                                html +='" '
                                html += 'par="'
                                $.each(item2['attribute'], function(key3, item3){
                                   html += item3['attributevalue_id']
                                });
                                html += ' "'
                                html +=' ><i class="fa fa-trash-o"></i></button>'
                                html +='</div>'
                                var link = '{{URL::to("/singleproduct/")}}'
                                link += '/'
                                link += item2['product']['id']
                                html += '<a href="'
                                html += link
                                html +='" class="product-thumb">'
                                html += '<img src="{{ URL::to("/") }}/public/storage/products/'
                                html += item2['product']['images']
                                html +='" alt="Product" style="width: 100%; max-height: 100px;" />'
                                html += '</a>'
                                html +='<a href="'
                                html += link
                                html+='" class="product-name">'
                                html += item2['product']['name']
                                html += ' ( '
                                $.each(item2['attribute'], function(key3, item3){
                                    html += item3['attribute']
                                    html += ':'
                                    html += item3['attributevalue']
                                    html += ' '
                                    html += '<input type="hidden" name="attribute'
                                    html += key2
                                    html += '" value="'
                                    html += item3['attributevalue_id']
                                    html +='">' 
                                });
                                html += ')'
                                html += '</a>'
                                html += '</div>'
                                html += '</td>'
                                html += '<td><span class="price">'
                                if(item2['product']['sale']!=null){
                                    html += Number(item2['product']['sale'])
                                }else{
                                    html +=  Number(item2['product']['price'])
                                } 
                                html += ' VNĐ</span></td>'
                                html += '<td>'
                                html += '<div class="pro-qty">'
                                html += '<input type="text" class="quantity" title="Quantity" name="qty'
                                html += key2
                                html += '" value="'
                                html += Number(item2['qty'])
                                html += '" />'
                                html +='</div>'
                                html += '</td>'
                                html += '<td><span class="price">'
                                if(item2['product']['sale']!=null){
                                    html += Number(item2['product']['sale'])*Number(item2['qty'])
                                }else{
                                    html +=  Number(item2['product']['price'])*Number(item2['qty'])
                                }
                                html += ' VNĐ</span></td>'
                                html += '</tr>'
                            })
                        });
                        html +=   '</tbody>'
                        html +=  '</table>'
                        html += '</div>'
                        html += '<div class="cart-coupon-update-area d-sm-flex justify-content-between align-items-center">'
                        html +='<div class="cart-update-buttons mt-15 mt-sm-0">'
                        html +='<button type="button" class="btn-clear-cart" data-toggle="modal" data-target="#deletecart">Xoá giỏ hàng </button>'
                        html +='<button type="submit" class="btn-update-cart" id="updatecart" > Cập nhật giỏ hàng</button>'
                        html +='</div>'
                        html +='</div>'
                        // disabled="true"
                    }

                    var html2 = '';
                    html2 += '<table class="table table-borderless" >';
                        html2 += '<tr class="cart-sub-total">';   
                        if(number>0){
                            html2 += total;
                            html2 += ' VNĐ'
                        }else{
                            html2 += '0 VNĐ'
                        }
                        html2 += '</tr>'
                    html2 += '</table>';
                    var html3 = '';
                    if(number>0){
                        html3 += '<a href="{{URL::to("/order")}}" class="btn btn-brand d-block">Đặt hàng</a>'
                    }
                    $('#datacart').html(html);
                    $('#datatotal').html(html2);
                    $('#btn_order').html(html3);
                    $('#cart-total').html(number);
                    inputqty();
                }
            });
    }
    function inputqty(){
        var proQty = $(".pro-qty");
        proQty.append('<a href="#" class="inc qty-btn">+</a>');
        proQty.append('<a href="#" class= "dec qty-btn">-</a>');
        $('.qty-btn').on('click', function(e) {
            e.preventDefault();
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 1;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    }

</script>
@endsection