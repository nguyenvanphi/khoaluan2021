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
                                <tr>
                                    <td>1</td>
                                    <td>2021-04-23 22:46:29</td>
                                    <td>450000 </td>
                                    <td>Chưa thanh toán</td>
                                    <td><span style="border-radius: 15px; background-color: #00c0ef;color: #fff;padding: 5px;border-radius: .25em;">Đang vận chuyển</span></td>
                                    
                                    <td>
                                        
                                        <button style="border: unset;font-weight: unset;font-size: 17px;" type="button" class="btn btn-info">Chi tiết</button>
                                    </td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2021-04-23 22:46:29</td>
                                    <td>450000 </td>
                                    <td>Đã thanh toán</td>
                                    <td><span style="border-radius: 15px; background-color: #f39c12;color: #fff;padding: 5px;border-radius: .25em;">Đang chờ</span></td>
                                    
                                    <td>
                                        
                                        <button style="border: unset;font-weight: unset;font-size: 17px;" type="button" class="btn btn-info">Chi tiết</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2021-04-23 22:46:29</td>
                                    <td>450000 </td>
                                    <td>Đã thanh toán</td>
                                    <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Hoàn thành</span></td>
                                    
                                    <td>
                                        
                                        <button style="border: unset;font-weight: unset;font-size: 17px;" type="button" class="btn btn-info">Chi tiết</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>2021-04-23 22:46:29</td>
                                    <td>450000 </td>
                                    <td>Đã thanh toán</td>
                                    <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Hoàn thành</span></td>
                                    
                                    <td>
                                        
                                        <button style="border: unset;font-weight: unset;font-size: 17px;" type="button" class="btn btn-info">Chi tiết</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>2021-04-23 22:46:29</td>
                                    <td>450000 </td>
                                    <td>Đã thanh toán</td>
                                    <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Hoàn thành</span></td>
                                    
                                    <td>
                                        
                                        <button style="border: unset;font-weight: unset;font-size: 17px;" type="button" class="btn btn-info">Chi tiết</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
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