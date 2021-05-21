@extends('backend.layout.admin')
@section('content')

<div class="breadcrumbs">
    {{-- <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Danh mục sản phẩm</h1>
            </div>
        </div>
    </div> --}}
    <div class="col-sm-8">
        {{-- <div class="page-header float-right"> --}}
        <div class="page-header float-left">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    {{-- <li><a href="{{URL::to('/dashboard')}}">Tổng quan</a></li> --}}
                    <li>Sản phẩm</li>
                    <li class="active">Danh sách sản phẩm</li>
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
                                <strong class="card-title">Danh sách sản phẩm</strong>
                                <a href="{{url('/addproducts')}}" style="float: right" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
                            </div>
                            <div class="card-body">
                                <table id="data-products" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th  width="3%">ID</th>
                                            <th >Name</th>
                                            <th >Images</th>
                                            <th >Price (VND)</th>
                                            <th >Sale (VND)</th>
                                            <th >Quantity</th>
                                            <th >Category</th>
                                            <th width="17%"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="modal" tabindex="-1" role="dialog" id="deletproduct">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xoá sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <p>Bạn có chắc muốn xoá sản phẩm này không ?</p>
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
        jQuery('#data-products').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
            url: "{{ route('products-data.index') }}",
            },
            columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'images',
                name: 'images',
                render: function(data, type, full, meta){
                    return "<img src={{ URL::to('/') }}/public/storage/products/"+ data +" style='width: 80px' />";
                },
                orderable: false
            },
            {
                data: 'price',
                name: 'price'
            },
            {
                data: 'sale',
                name: 'sale'
            },
            {
                data: 'qty',
                name: 'qty'
            },
            {
                data: 'cp_name',
                name: 'cp_name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });
        var cp_id;
        $(document).on('click', '.deleteproduct', function(){
            cp_id = $(this).attr('id');
            jQuery('#deletproduct').modal('show');
        });
        $('#delete_bt').click(function(){
            $.ajax({
                url:"/shopthegmen/product/"+cp_id+"/destroy",
                success:function(data)
                    {
                        jQuery('#deletproduct').modal('hide');
                        if(data.success){
                            toastr.success(data.success);
                        }
                        jQuery('#data-products').DataTable().ajax.reload();
                    }
                })
        });
    });
</script>
@endsection