@extends('backend.layout.admin')
@section('content')

        <div class="breadcrumbs">
            {{-- <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            {{-- <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li> --}}
                            <li class="active">Đơn hàng</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Danh sách đơn hàng</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Payment status</th>
                                            <th width="16%">Order status</th>
                                            <th>Created on</th>
                                            <th>Total (VND)</th>
                                            <th width="18%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>rbesantie1@netlog.com</td>
                                            <td>Chưa thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #00c0ef;color: #fff;padding: 5px;border-radius: .25em;">Đang vận chuyển</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>wonele2@sogou.com</td>
                                            <td>Đã thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #f39c12;color: #fff;padding: 5px;border-radius: .25em;">Đang chờ</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>gmatterdace3@oakley.com</td>
                                            <td>Chưa thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #00c0ef;color: #fff;padding: 5px;border-radius: .25em;">Đang vận chuyển</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>bvan5@barnesandnoble.com</td>
                                            <td>Chưa thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #00c0ef;color: #fff;padding: 5px;border-radius: .25em;">Đang vận chuyển</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>jgristock4@ucoz.com</td>
                                            <td>Đã thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Hoàn thành</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>gpeachment6@icio.us</td>
                                            <td>Đã thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Hoàn thành</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>fmeneghi7@slashdot.org</td>
                                            <td>Chưa thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #f39c12;color: #fff;padding: 5px;border-radius: .25em;">Đang chờ</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>gclute8@google.it</td>
                                            <td>Chưa thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #00c0ef;color: #fff;padding: 5px;border-radius: .25em;">Đang vận chuyển</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>fdmitrovic9@cnbc.com</td>
                                            <td>Đã thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Hoàn thành</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>wonele2@sogou.com</td>
                                            <td>Đã thanh toán</td>
                                            <td><span style="background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Hoàn thành</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>wonele2@sogou.com</td>
                                            <td>Chưa thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Hoàn thành</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td>450000 </td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection

