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
                            <li class="active">Liên hệ</li>
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
                                <strong class="card-title">Danh sách liên hệ</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created on</th>
                                            <th>Contact status</th>
                                            <th width="18%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Erny Colten</td>
                                            <td>rbesantie1@netlog.com</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Đã phản hồi</span></td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Rod Besantie</td>
                                            <td>wonele2@sogou.com</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="border-radius: 15px; background-color: #f39c12;color: #fff;padding: 5px;border-radius: .25em;">Đang chờ</span></td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Walton Onele</td>
                                            <td>gmatterdace3@oakley.com</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Đã phản hồi</span></td>
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            
                                            <td>Granger Matterdace</td>
                                            <td>bvan5@barnesandnoble.com</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Đã phản hồi</span></td>
                                            
                                            
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Jeniffer Gristock</td>
                                            <td>jgristock4@ucoz.com</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Đã phản hồi</span></td>
                                            
                                            
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Barthel Van der Veldt</td>
                                            <td>gpeachment6@icio.us</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Đã phản hồi</span></td>
                                            
                                            
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>Gilli Peachment</td>
                                            <td>fmeneghi7@slashdot.org</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="border-radius: 15px; background-color: #f39c12;color: #fff;padding: 5px;border-radius: .25em;">Đang chờ</span></td>
                                            
                                            
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Frederigo Meneghi</td>
                                            <td>gclute8@google.it</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Đã phản hồi</span></td>
                                            
                                            
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td>Guillemette Clute</td>
                                            <td>fdmitrovic9@cnbc.com</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Đã phản hồi</span></td>
                                            
                                            
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td>Florance Dmitrovic</td>
                                            <td>wonele2@sogou.com</td>
                                            <td>2021-04-23 22:46:29</td>
                                            <td><span style="background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Đã phản hồi</span></td>
                                            
                                            
                                            <td>
                                                <button type="button" class="btn btn-danger deleteproduct" id="" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>
                                                <a href="" class="btn btn-info buttonedit" id=""><i class="fa fa-eye"></i> Xem</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11</td>
                                            <td>wonele2@sogou.com</td>
                                            <td>Chưa thanh toán</td>
                                            <td><span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Đã phản hồi</span></td>
                                            <td>2021-04-23 22:46:29</td>
                                            
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

