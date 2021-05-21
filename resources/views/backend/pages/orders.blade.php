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
                                {{-- <a href="{{url('/addorder')}}" style="float: right" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a> --}}
                            </div>
                            <div class="card-body">
                                <table id="data_orders" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Customer</th>
                                            <th>Payment status</th>
                                            <th width="20.5%">Order status</th>
                                            <th>Created on</th>
                                            <th>Total (VND)</th>
                                            <th width="17.5%">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="modal" tabindex="-1" role="dialog" id="deletorder">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xoá đơn hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <p>Bạn có chắc muốn xoá đơn hàng này không ?</p>
                          <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" id="delete_bt" class="btn btn-danger">Xác nhận</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        jQuery('#data_orders').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
            url: "{{ route('ordersadmin') }}",
            },
            columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'is_pay',
                name: 'is_pay',
                render: function(data, type, full, meta){
                    if(data==1){
                        return "Đã thanh toán";
                    }else{
                        return "Chưa thanh toán";
                    }
                },
                orderable: false

            },
            {
                data: 'status_order_id',
                name: 'status_order_id',
                render: function(data, type, full, meta){
                    if(data==1){
                        return '<span style="border-radius: 15px; background-color: #f39c12;color: #fff;padding: 5px;border-radius: .25em;">Đang chờ</span>';
                    }
                    if(data==2){
                        return '<span style="border-radius: 15px; background-color: #00c0ef;color: #fff;padding: 5px;border-radius: .25em;">Đang vận chuyển</span>';
                    }
                    if(data==3){
                        return '<span style="border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;">Hoàn thành</span>';
                    }
                    if(data==4){
                        return '<span style="border-radius: 15px; background-color: #343a40;color: #fff;padding: 5px;border-radius: .25em;">Đã huỷ</span>';
                    }
                    if(data==5){
                        return '<span style="border-radius: 15px; background-color: #6c757d;color: #fff;padding: 5px;border-radius: .25em;">Giao không thành công</span>';
                    }
                },
                orderable: false
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'total', 
                name: 'total'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });
        var cp_id;
        $(document).on('click', '.deleteorder', function(){
            cp_id = $(this).attr('id');
            jQuery('#deletorder').modal('show');
        });
        $('#delete_bt').click(function(){
            $.ajax({
                url:"/shopthegmen/orders/"+cp_id+"/destroy",
                success:function(data)
                    {
                        jQuery('#deletorder').modal('hide');
                        if(data.success){
                            toastr.success(data.success);
                        }
                        jQuery('#data_orders').DataTable().ajax.reload();
                    }
                })
        });
    });
</script>
@endsection
