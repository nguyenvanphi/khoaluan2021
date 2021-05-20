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
                    <li><a href="{{url('/products')}}">Danh sách sản phẩm</a></li>
                    <li class="active">Chỉnh sửa sản phẩm</li>
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
                        <strong class="card-title">Ảnh chi tiết sản phẩm</strong>
                    </div>
                    
                    <form id="editimages" action="" method="POST" enctype="multipart/form-data" style="margin-top: 15px">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_product" value="{{$data->id}}">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="images" class="col-sm-3 col-form-label">Ảnh chi tiết:</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="images" id="images" style="padding: 1%;">
                                    <span class="help is-danger text-danger" id="error_images"></span>
                                </div>
                            </div>
                            <div class="form-action form-group col-sm-9 offset-sm-3">
                                <input type="submit" value="Thêm ảnh" class="btn btn-info form-control" id="send_form_image">
                            </div>
                        </div>
                    </form>
                    <div class="card-body" id="data-images">
                    </div>
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
                        <strong class="card-title">Chỉnh sửa thông tin sản phẩm</strong>
                    </div>
                    <form id="editproduct" action="" method="POST" enctype="multipart/form-data" style="margin-top: 15px">
                        {{ csrf_field() }}
                        <input type="hidden" id="id_product" name="id" value="{{$data->id}}">
                        <input type="hidden" name="image_last" value="{{$data->images}}">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9" id="img_product">
                                    <img src="{{ URL::to('/') }}/public/storage/products/@php
                                        echo $data->images
                                    @endphp" alt="" style="max-height: 150px">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="image" class="col-sm-3 col-form-label">Ảnh sản phẩm:</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" name="image" id="image" style="padding: 1%;">
                                    <span class="help is-danger text-danger" id="error_image"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9" id="imgs_product">
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Tên sản phẩm:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name" value="{{$data->name}}" placeholder="Nhập tên sản phẩm">
                                    <span class="help is-danger text-danger" id="error_name"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">Giá:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="price" id="price" value="{{$data->price}}" placeholder="Nhập giá sản phẩm">
                                    <span class="help is-danger text-danger" id="error_price"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sale" class="col-sm-3 col-form-label">Giảm giá:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="sale" id="sale" value="{{$data->sale}}" placeholder="Nhập giảm giá sản phẩm">
                                    <span class="help is-danger text-danger" id="error_sale"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="qty" class="col-sm-3 col-form-label">Số lượng:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="qty" id="qty" value="{{$data->qty}}" placeholder="Nhập số lượng sản phẩm có">
                                    <span class="help is-danger text-danger" id="error_qty"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                @php
                                    $size = array();
                                    foreach($attribute as $item){
                                        $size[] = $item->value;
                                    }
                                @endphp
                                <label for="size" class="col-sm-3 col-form-label">Size:</label>
                                <div class="col-sm-9" style="margin-top: 7px">
                                    <input type="checkbox" name="size[]" id="size1" value="S" @php
                                        if(in_array("S",$size)){
                                            echo 'checked';
                                        }
                                    @endphp>
                                    <label for="size1"> S </label>
                                    <input type="checkbox" name="size[]" id="size2" value="M" style="margin-left: 15px"@php
                                    if(in_array("M",$size)){
                                        echo 'checked';
                                    }
                                @endphp>
                                    <label for="size2"> M </label>
                                    <input type="checkbox" name="size[]" id="size3" value="L" style="margin-left: 15px"@php
                                    if(in_array("L",$size)){
                                        echo 'checked';
                                    }
                                @endphp>
                                    <label for="size3"> L </label>
                                    <input type="checkbox" name="size[]" id="size4" value="XL" style="margin-left: 15px"@php
                                    if(in_array("XL",$size)){
                                        echo 'checked';
                                    }
                                @endphp>
                                    <label for="size4"> XL </label>
                                    <br><span class="help is-danger text-danger" id="error_size"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_product" class="col-sm-3 col-form-label">Danh mục:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="category_product" name="category_product">
                                        @if (isset($categoryproducts)  && count($categoryproducts)>0)
                                            @foreach ($categoryproducts as $key => $categoryproduct)
                                                <option value="{{$categoryproduct->id}}" 
                                                    @php
                                                        if($categoryproduct->id==$data->category_product_id){
                                                            echo 'selected';
                                                        }
                                                    @endphp    
                                                >{{$categoryproduct->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="help is-danger text-danger" id="error_cp"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hot" class="col-sm-3 col-form-label">Sản phẩm HOT:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="hot" name="hot">
                                        <option value="0" @php
                                            if($data->is_hot == 0){
                                                echo 'selected';
                                            }
                                        @endphp>Không</option>
                                        <option value="1" @php
                                        if($data->is_hot == 1){
                                            echo 'selected';
                                        }
                                    @endphp>Có</option>
                                    </select>
                                    <span class="help is-danger text-danger" id="error_hot"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="del" class="col-sm-3 col-form-label">Bán ra:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="del" name="del">
                                        <option value="0" @php
                                        if($data->is_hot == 0){
                                            echo 'selected';
                                        }
                                    @endphp>Có</option>
                                        <option value="1" @php
                                        if($data->is_hot == 1){
                                            echo 'selected';
                                        }
                                    @endphp>Không</option>
                                    </select>
                                    <span class="help is-danger text-danger" id="error_del"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-3 col-form-label">Mô tả:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{$data->description}}</textarea>
                                    <span class="help is-danger text-danger" id="error_content"></span>
                                </div>
                            </div>
                            <div class="form-action form-group col-sm-9 offset-sm-3">
                                <input type="submit" value="Cập nhật" class="btn btn-info form-control" id="send_form">
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            @for($i = 1; $i<=4; $i++)
                                <div class="form-group">
                                    <label for="images">Ảnh chi tiết sản phẩm {{$i}}:</label>
                                    <input type="file" name="images{{$i}}" id="images{{$i}}" class="form-control" style="padding: 1%;">
                                </div>
                            @endfor
                        </div> --}}
                      </form>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<div class="modal fade" id="deleteimages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xoá ảnh chi tiết sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Bạn có chắc muốn xoá sản ảnh này ?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                <button class="btn btn-danger" id="btn_deleteimages" >Xoá</button>
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
        load_image();
        var id_product;
        var name_image;
        $(document).on('click', '.deleteimages', function(){
            name_image = $(this).attr('id');
            jQuery('#deleteimages').modal('show');
        });
        $('#btn_deleteimages').on('click',function(){
            $.ajax({
            url: "/shopthegmen/deleteimagesproduct/"+name_image,
            method: 'GET',
            dataType:"json",
            success:function(data)
                {  
                    if(data.success)
                    {
                        jQuery('#deleteimages').modal('hide');
                        load_image();
                        toastr.success("Xoá ảnh thành công !");
                    }
                }
            });
        });
        $('#editproduct').on('submit',function(even){
            event.preventDefault(); 
            $('#editproduct #error_name').html('');
            $('#editproduct #error_price').html('');
            $('#editproduct #error_sale').html('');
            $('#editproduct #error_qty').html('');
            $('#editproduct #error_size').html('');
            $('#editproduct #error_image').html('');
            $('#editproduct #error_cp').html('');
            $('#editproduct #error_hot').html('');
            $('#editproduct #error_del').html('');
            $('#editproduct #error_content').html('');
            $.ajax({
                url: "{{route('editproduct')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                {  
                    if(data.errors){
                        if(data.errors['name']!=''){
                            $('#editproduct #error_name').html(data.errors['name']);
                        }
                        if(data.errors['price']!=''){
                            $('#editproduct #error_price').html(data.errors['price']);
                        }
                        if(data.errors['sale']!=''){
                            $('#editproduct #error_sale').html(data.errors['sale']);
                        }
                        if(data.errors['qty']!=''){
                            $('#editproduct #error_qty').html(data.errors['qty']);
                        }
                        if(data.errors['size']!=''){
                            $('#editproduct #error_size').html(data.errors['size']);
                        }
                        if(data.errors['image']!=''){
                            $('#editproduct #error_image').html(data.errors['image']);
                        }
                        if(data.errors['category_product']!=''){
                            $('#editproduct #error_cp').html(data.errors['category_product']);
                        }
                        if(data.errors['hot']!=''){
                            $('#editproduct #error_hot').html(data.errors['hot']);
                        }
                        if(data.errors['del']!=''){
                            $('#editproduct #error_del').html(data.errors['del']);
                        }
                        if(data.errors['content']!=''){
                            $('#editproduct #error_content').html(data.errors['content']);
                        }
                    }
                    if(data.success){
                        if(data.img){
                            var img = '';
                            img += '<img src="{{ URL::to("/") }}/public/storage/products/'
                            img += data.img
                            img +='" alt="" style="max-height: 150px" />'
                            $('#img_product').html(img);
                        }
                        toastr.success(data.success);
                    }
                }
            });
        })
        $('#editimages').on('submit',function(even){
            event.preventDefault(); 
            $('#error_images').html('');
            $.ajax({
                url: "{{route('editimages')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                {  
                    if(data.errors){
                        if(data.errors['images']!=''){
                            $('#error_images').html(data.errors['images']);
                        }
                    }
                    if(data.success){
                        load_image();
                        jQuery('#editimages')[0].reset();
                        toastr.success(data.success);
                    }
                }
            });
        })
    });
    function load_image(){
        id_product = $('#id_product').val();
        $.ajax({
            url: "/shopthegmen/loadimages/"+id_product,
            dataType:"json",
            success:function(data){
                var html = '';
                if(data.number>0){
                    html+= '<table  class="table table-striped table-bordered" style="text-align:center">'
                    html+= '<thead>'
                    html+= '<tr>'
                    html+= '<th  width="3%">STT</th>'
                    html+= '<th >Name</th>'
                    html+= '<th >Images</th>'
                    html+= '<th width="17%"></th>'
                    html+= '</tr>'
                    html+= '</thead>'
                    html +=   '<tbody>'
                    $.each(data.images_details, function (key, item) {
                        html += '<tr>'
                            html += '<td>'
                                html += key+1
                            html += '</td>'
                            html += '<td>'
                                html += item['images']
                            html += '</td>'
                            html += '<td>'
                                html += '<img src="{{ URL::to("/") }}/public/storage/products/'
                                html += item['images']
                                html +='" alt="" style="max-height: 150px;" />'
                            html += '</td>'
                            html += '<td>'
                                html += '<button type="button" class="btn btn-danger deleteimages" id="'
                                html += item['images']
                                html +='" data-toggle="modal"><i class="fa fa-trash "></i> Xoá</button>'
                            html += '</td>'
                        html += '</tr>'
                    })
                    html +=   '</tbody>'
                    html+= '</table>'
                    $('#data-images').html(html);
                }else{
                    $('#data-images').html('');
                }
                
            }
        });
    }
</script>
@endsection