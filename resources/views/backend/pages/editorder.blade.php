@extends('backend.layout.admin')
@section('content')
<style>
    .table td, .table th{
        vertical-align: unset;
    }
</style>
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
                    <li>Đơn hàng</li>
                    <li>Chi tiết đơn hàng</li>
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
                        <strong class="card-title">Thêm sản phẩm</strong>
                    </div>
                    
                    <form id="addproduct" action="" method="POST" style="margin-top: 15px">
                        {{ csrf_field() }}
                        {{-- {{$data->id}} --}}
                        <input type="hidden" name="id_order" id="id_order" value="{{$id_order}}">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="product" class="col-sm-3 col-form-label">Chọn sản phẩm:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="product" name="product">
                                        <option value="">--Chọn sản phẩm muốn thêm--</option>
                                        @foreach ($data_product as $product)
                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="help is-danger text-danger" id="error_product"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="size" class="col-sm-3 col-form-label">Chọn Size:</label>
                                <div class="col-sm-9" style="margin-top: 7px">
                                    <input type="radio" name="size" id="size1" value="S" >
                                    <label for="size1"> S </label>
                                    <input type="radio" name="size" id="size2" value="M" style="margin-left: 15px">
                                    <label for="size2"> M </label>
                                    <input type="radio" name="size" id="size3" value="L" style="margin-left: 15px">
                                    <label for="size3"> L </label>
                                    <input type="radio" name="size" id="size4" value="XL" style="margin-left: 15px">
                                    <label for="size4"> XL </label>
                                    <br><span class="help is-danger text-danger" id="error_size"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qty_product" class="col-sm-3 col-form-label">Số lượng:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="qty_product" id="qty_product" value="" placeholder="Nhập số lượng">
                                    <span class="help is-danger text-danger" id="error_qty_product"></span>
                                </div>
                            </div>
                            <div class="form-action form-group col-sm-9 offset-sm-3">
                                <input type="submit" value="Thêm sản phẩm" class="btn btn-info form-control" id="send_form_product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Chỉnh sửa thông tin đơn hàng</strong>
                    </div>
                    
                    <form action="" id="form_order">

                    </form>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal fade" id="deleteproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xoá sản phẩm giỏ hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Bạn có chắc muốn xoá sản phẩm này không ?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                <button class="btn btn-danger" id="btn_deleteproduct" >Xoá</button>
                </div>
            </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        toastr.options = {
            timeOut          : 650, //default timeout,
        };
        load_data_order();
        var id_product;
        $(document).on('click', '.deleteproduct', function(){
            id_product = $(this).attr('id');
            jQuery('#deleteproduct').modal('show');
        });
        $('#btn_deleteproduct').on('click',function(){
            $.ajax({
            url: "/shopthegmen/deleteproductorder/"+id_product,
            method: 'GET',
            dataType:"json",
            success:function(data)
                {  
                    if(data.success)
                    {
                        jQuery('#deleteproduct').modal('hide');
                        load_data_order();
                        toastr.success("Xoá sản phẩm thành công !");
                    }
                }
            });
        });
        $('#addproduct').on('submit',function(even){
            event.preventDefault(); 
            $('#addproduct #error_product').html('');
            $('#addproduct #error_size').html('');
            $('#addproduct #error_qty_product').html('');
            $.ajax({
                url: "{{route('addproductorder')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                {  
                    if(data.errors){
                        if(data.errors['product']!=''){
                            $('#error_product').html(data.errors['product']);
                        }
                        if(data.errors['size']!=''){
                            $('#error_size').html(data.errors['size']);
                        }
                        if(data.errors['qty_product']!=''){
                            $('#error_qty_product').html(data.errors['qty_product']);
                        }
                    }
                    if(data.success){
                        load_data_order();
                        jQuery('#addproduct')[0].reset();
                        toastr.success(data.success);
                    }
                }
            });
        });
        $('#form_order').on('submit',function(event){
            event.preventDefault(); 
            $('#name_orderdetails').html('');
            $('#email_orderdetails').html('');
            $('#pay_orderdetails').html('');
            $('#address_orderdetails').html('');
            $('#status_orderdetails').html('');
            $('#phone_orderdetails').html('');
            $.ajax({
                url: "{{route('updateorderdetails')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                {  
                    if(data.errors){
                        if(data.errors['name_orderdetails']!=''){
                            $('#name_orderdetails').html(data.errors['name_orderdetails']);
                        }
                        if(data.errors['email_orderdetails']!=''){
                            $('#email_orderdetails').html(data.errors['email_orderdetails']);
                        }
                        if(data.errors['pay_orderdetails']!=''){
                            $('#pay_orderdetails').html(data.errors['pay_orderdetails']);
                        }
                        if(data.errors['address_orderdetails']!=''){
                            $('#address_orderdetails').html(data.errors['address_orderdetails']);
                        }
                        if(data.errors['status_orderdetails']!=''){
                            $('#status_orderdetails').html(data.errors['status_orderdetails']);
                        }
                        if(data.errors['phone_orderdetails']!=''){
                            $('#phone_orderdetails').html(data.errors['phone_orderdetails']);
                        }
                    }
                    if(data.success){
                        load_data_order();
                        toastr.success(data.success);
                    }
                }
            });
        });
    });
    function load_data_order(){
        var id_order = $('#id_order').val();
        $.ajax({
            url: "/shopthegmen/loadorder/"+id_order,
            dataType:"json",
            success:function(data){
                var html = '';
                html += '{{ csrf_field() }}';
                html += '<div class="card-body form-inline">'
                $.each(data.data_order, function (key,item) {
                    html+= '<input type="hidden" name="id_orderdetails" value="'
                    html+= item['id']
                    html+='">'
                    html+='<div class="form-group col-xl-6" style="margin-bottom: 15px;"><label class="col-xl-5">Mã đơn hàng: </label><input disabled type="text" value="'
                    html+= item['id']
                    html+='"class="form-control col-xl-7" ></div><div class="form-group col-xl-6" style="margin-bottom: 15px;"><label class="col-xl-5">Người đặt hàng: </label><input type="text" name="name_orderdetails" value="'
                    html+= item['full_name']
                    html+='"  class="form-control col-xl-7" ><span class="help is-danger text-danger col-xl-9 offset-xl-2" id="name_orderdetails"></span></div><div class="form-group col-xl-6" style="margin-bottom: 15px;"><label class="col-xl-5">Tổng tiền: </label><input name="total_orderdetails" disabled type="text" value="'
                    html+= item['total']
                    html+='"  class="form-control col-xl-7" ></div><div class="form-group col-xl-6" style="margin-bottom: 15px;"><label class="col-xl-5">Địa chỉ email: </label> <input name="email_orderdetails" type="text" value="'
                    html+= item['email']
                    html+='"  class="form-control col-xl-7" ><span class="help is-danger text-danger col-xl-9 offset-xl-2" id="email_orderdetails"></span></div><div class="form-group col-xl-6" style="margin-bottom: 15px;"><label class="col-xl-5">Thanh toán: </label>'
                    html+='<select class="form-control col-xl-7" id="is_pay" name="pay_orderdetails" width="100%"><option value="1" '
                    if(item['is_pay']==1){
                        html+= 'selected '
                    }
                    html+='>Đã thanh toán</option><option value="0" '
                    if(item['is_pay']==0){
                        html+= 'selected '
                    }
                    html+='>Chưa thanh toán</option></select>'
                    html+='<span class="help is-danger text-danger col-xl-9 offset-xl-2" id="pay_orderdetails"></span></div><div class="form-group col-xl-6" style="margin-bottom: 15px;"><label class="col-xl-5">Địa chỉ nhận hàng: </label><input type="text" name="address_orderdetails" value="'
                    html+= item['address']
                    html+='"  class="form-control col-xl-7" ><span class="help is-danger text-danger col-xl-9 offset-xl-2" id="address_orderdetails"></span></div><div class="form-group col-xl-6" style="margin-bottom: 15px;"><label class="col-xl-5">Trạng thái đơn hàng: </label>'
                    html+='<select class="form-control col-xl-7" id="status_order" name="status_orderdetails" width="100%"><option value="1" '
                    if(item['status_order_id']==1){
                        html+='selected'
                    }
                    html+='>Đang chờ</option><option value="2" '
                    if(item['status_order_id']==2){
                        html+= 'selected '
                    }
                    html+='>Đang vận chuyển</option><option value="3" '
                    if(item['status_order_id']==3){
                        html+= 'selected '
                    }
                    html+='>Hoàn thành</option><option value="4" '
                    if(item['status_order_id']==4){
                        html+= 'selected '
                    }
                    html+='>Đã huỷ</option><option value="5" '
                    if(item['status_order_id']==5){
                        html+= 'selected '
                    }
                    html+='>Giao không thành công</option></select>'
                    html+='<span class="help is-danger text-danger col-xl-9 offset-xl-2" id="status_orderdetails"></span></div><div class="form-group col-xl-6" style="margin-bottom: 15px;"><label class="col-xl-5">Số điện thoại: </label><input name="phone_orderdetails" type="number" value="'
                    html+= item['phone']
                    html+='"  class="form-control col-xl-7" ><span class="help is-danger text-danger col-xl-9 offset-xl-2" id="phone_orderdetails"></span></div>'
                 })
                html += '</div>'
                html+='<div class="card-body" id="dataorder">'
                html+='<table class="table table-striped table-bordered">'
                html+='<thead>'
                html+='<tr>'
                html+='<th width="5%">STT</th>'
                html+='<th>Sản phẩm</th>'
                html+='<th width="20%">Giá</th>'
                html+='<th width="10%">Số lượng</th>'
                html+='<th width="10%"></th>'
                html+='</tr>'
                html+='</thead>'
                html+='<tbody>'
                $.each(data.data_order_details,function (key,item) {
                    html+='<tr>'
                        html+='<td>'
                        html+=key+1
                        html+='</td>'
                        html+='<td>'
                        html += '<img src="{{ URL::to("/") }}/public/storage/products/'
                        html += item['images']
                        html +='" alt="" style="max-height: 120px; width: 120px;" /> '
                        html+=item['name']
                        html+=' ( Size:'
                        html+=item['value']
                        html+= ' )'
                        html+='</td>'
                        html+='<td>'
                        if(item['sale']!=null){
                            html+= item['sale']
                            html+= ' VND'
                        }else{
                            html+= item['price']
                            html+= ' VND'
                        }
                        html+='</td>'
                        html+='<td>'
                        html+='<input type="number" min="1" class="form-control" name="qty'
                        html+=key
                        html+='" id="qty'
                        html+=key
                        html+='" value="'
                        html+=item['qty']
                        html+='" placeholder="Nhập số lượng">'
                        html+='</td>'
                        html+='<td>'
                        html+='<button type="button" class="btn btn-danger deleteproduct" id="'
                        html+=item['id']
                        html+='" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>'
                        html+='</td>'
                    html+='</tr>'
                })
                html+='</tbody>'
                html+='</table>'
                html+='</div>'
                html+='<div class="form-action form-group col-sm-6 offset-sm-3">'
                html+='<input type="submit" value="Cập nhật đơn hàng" class="btn btn-info form-control" id="send_form_order">'
                html+='</div>'
                $('#form_order').html(html);
            }
        });
    }
</script>
@endsection