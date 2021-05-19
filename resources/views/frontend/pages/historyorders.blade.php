@extends('frontend.layout.shared')
@section('content')


    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper" style="margin-top: 50px">
        <div class="about-page-content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Lịch sử mua hàng</strong>
                    </div>
                    <div class="card-body">
                        @if ($order&&count($order)>0)
                            <style>
                                .table td, .table th{
                                    vertical-align: unset;
                                }
                            </style>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền (VND)</th>
                                        <th>Thanh toán</th>
                                        <th width="16%">Trạng thái</th>
                                        
                                        <th width="18%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>{{$item->total}}</td>
                                            <td>@if ($item->is_pay)
                                                Đã thanh toán
                                            @else
                                                Chưa thanh toán
                                            @endif</td>
                                            <td>
                                                @if ($item->status_order_id==1)
                                                <span style="border-radius: 15px; background-color: #f39c12;color: #fff;padding: 5px;border-radius: .25em;">{{$item->name}}</span>
                                                @endif
                                                @if ($item->status_order_id==2)
                                                    <span style="border-radius: 15px; background-color: #00c0ef;color: #fff;padding: 5px;border-radius: .25em;">{{$item->name}}</span>
                                                @endif
                                                @if ($item->status_order_id==3)
                                                    <span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">{{$item->name}}</span>
                                                @endif
                                                @if ($item->status_order_id==4)
                                                    <span style="border-radius: 15px; background-color: #343a40;color: #fff;padding: 5px;border-radius: .25em;">{{$item->name}}</span>
                                                @endif
                                                @if ($item->status_order_id==5)
                                                    <span style="border-radius: 15px; background-color: #6c757d;color: #fff;padding: 5px;border-radius: .25em;">{{$item->name}}</span>
                                                @endif
                                            </td>   
                                            <td>
                                                <a href="{{URL::to('/detailsorder'.'/'.$item->id)}}" style="border: unset;font-weight: unset;font-size: 17px;" type="button" class="btn btn-info">Chi tiết</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="shop-page-action-bar mt-30">
                                <div class="container container-wide">
                                    <div class="action-bar-inner">
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <nav class="pagination-wrap mb-10 mb-sm-0">
                                                    @if ($order)
                                                        {!! $order->render() !!}
                                                    @endif
                                                </nav>
                                            </div>
                    
                                            <div class="col-sm-6 text-center text-sm-right">
                                                <p>Showing {{ $from }}–{{ $to }} of {{ $order->total() }} results</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <h6>Không có đơn hàng nào !</h6>
                        @endif
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