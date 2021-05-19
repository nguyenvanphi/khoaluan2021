@extends('frontend.layout.shared')
@section('content')
<div class="page-content-wrapper" style="margin-top: 50px">
    <div class="about-page-content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Chi tiết đơn hàng</strong>
                </div>
                @foreach ($order as $item)
                    <div class="card-body form-inline">
                        <div class="form-group col-xl-6" style="margin-bottom: 15px;">
                            <label >Mã đơn hàng: </label>
                            <input type="text" value="{{$item->id}}" disabled class="form-control" style="flex-grow: 2; margin-left: 15px;">
                        </div>
                        <div class="form-group col-xl-6" style="margin-bottom: 15px;">
                            <label >Người đặt hàng: </label>
                            <input type="text" value="{{$item->full_name}}" disabled class="form-control" style="flex-grow: 2; margin-left: 15px;">
                        </div>
                        <div class="form-group col-xl-6" style="margin-bottom: 15px;">
                            <label >Tổng tiền: </label>
                            <input type="text" value="{{$item->total}}" disabled class="form-control" style="flex-grow: 2; margin-left: 15px;">
                        </div>
                        <div class="form-group col-xl-6" style="margin-bottom: 15px;">
                            <label >Địa chỉ email: </label> 
                            <input type="text" value="{{$item->email}}" disabled class="form-control" style="flex-grow: 2; margin-left: 15px;">
                        </div>
                        <div class="form-group col-xl-6" style="margin-bottom: 15px;">
                            <label >Thanh toán: </label>
                            <input type="text" value="@php
                                    if($item->is_pay){
                                        echo 'Đã thanh toán';
                                    }else{
                                        echo 'Chưa thanh toán';
                                    } 
                                @endphp" disabled class="form-control" style="flex-grow: 2; margin-left: 15px;">
                        </div>
                        <div class="form-group col-xl-6" style="margin-bottom: 15px;">
                            <label >Địa chỉ nhận hàng: </label>
                            <input type="text" value="{{$item->address}}" disabled class="form-control" style="flex-grow: 2; margin-left: 15px;">
                        </div>
                        <div class="form-group col-xl-6" style="margin-bottom: 15px;">
                            <label >Trạng thái đơn hàng: </label>
                            <input type="text" value="{{$item->name}}" disabled class="form-control" style="flex-grow: 2; margin-left: 15px;">
                        </div>
                        <div class="form-group col-xl-6" style="margin-bottom: 15px;">
                            <label >Số điện thoại: </label>
                            <input type="text" value="{{$item->phone}}" disabled class="form-control" style="flex-grow: 2; margin-left: 15px;">
                        </div>
                    </div>
                @endforeach
                <div class="row" style="margin-left: 15px; margin-right: 15px; ">
                    <style>
                        p {
                            padding: 15px;
                            background-color: #f6f6f6;
                        }
                        p a {
                            color: #1b1b1c; 
                            font-weight: 600;
                        }
                        p a:hover{
                            color: #eeb644 !important;
                            transition: 0.4s;
                        }
                    </style>
                    @foreach ($products as $item)
                        <div class="col-sm-6 col-lg-3" style="margin-bottom: 20px">
                            <a href="{{URL::to('/singleproduct'.'/'.$item->id)}}">
                                <img style="max-height: 240px; width: 100%;" class="thumb-primary" src="{{ URL::to('/') }}/public/storage/products/@php
                                echo $item->images
                            @endphp" alt="Product" />
                            </a>
                            <p><a href="{{URL::to('/singleproduct'.'/'.$item->id)}}" >{{$item->name_product}} ( {{$item->name_attr}}:{{$item->value}} ) x{{$item->qty}}</a> </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Content Wrapper ==-->

<!--== Start Call to action Wrapper ==-->
<div class="call-to-action-area sm-top">
    
</div>
<!--== End Call to action Wrapper ==-->
@endsection