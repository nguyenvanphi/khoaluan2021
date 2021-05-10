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
                    <li class="active">Thêm mới sản phẩm</li>
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
                        <strong class="card-title">Thêm mới sản phẩm</strong>
                    </div>
                    <form id="addproduct" action="{{url('/addproduct')}}" method="POST" enctype="multipart/form-data" style="margin-top: 15px">
                        {{ csrf_field() }}
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Tên sản phẩm:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên sản phẩm">
                                    <span class="help is-danger text-danger" id="error_name"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category_product" class="col-sm-3 col-form-label">Danh mục:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="category_product" name="category_product">
                                        @if (isset($categoryproducts)  && count($categoryproducts)>0)
                                            @foreach ($categoryproducts as $key => $categoryproduct)
                                                <option value="{{$categoryproduct->id}}">{{$categoryproduct->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="help is-danger text-danger" id="error_cp"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">Giá:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="price" id="price" placeholder="Nhập giá sản phẩm">
                                    <span class="help is-danger text-danger" id="error_price"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="sale" class="col-sm-3 col-form-label">Giảm giá:</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="sale" id="sale" placeholder="Nhập giảm giá sản phẩm">
                                    <span class="help is-danger text-danger" id="error_sale"></span>
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
                                <label for="del" class="col-sm-3 col-form-label">Tình trạng:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="del" name="del">
                                        <option value="0">Còn hàng</option>
                                        <option value="1">Hết hàng</option>
                                    </select>
                                    <span class="help is-danger text-danger" id="error_del"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hot" class="col-sm-3 col-form-label">Sản phẩm HOT:</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="hot" name="hot">
                                        <option value="0">Không</option>
                                        <option value="1">Có</option>
                                    </select>
                                    <span class="help is-danger text-danger" id="error_hot"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="content" class="col-sm-3 col-form-label">Mô tả:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                                    <span class="help is-danger text-danger" id="error_content"></span>
                                </div>
                            </div>
                            <div class="form-action form-group col-sm-9 offset-sm-3">
                                <input type="submit" value="Thêm mới" class="btn btn-success form-control" id="send_form">
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
@endsection

@section('script')
<script>
	@if(Session::has('message'))
		// var type="{{Session::get('alert-type','info')}}"
        var type="{{Session::get('alert-type')}}"
		switch(type){
			case 'info':
		         toastr.info("{{ Session::get('message') }}");
		         break;
	        case 'success':
	            toastr.success("{{ Session::get('message') }}");
	            break;
         	case 'warning':
	            toastr.warning("{{ Session::get('message') }}");
	            break;
	        case 'error':
		        toastr.error("{{ Session::get('message') }}");
		        break;
		}
	@endif

</script>
<script>
    CKEDITOR.replace( 'content');
    $(document).ready(function(){
        $('#addproduct').on('submit',function(even){
            event.preventDefault(); 
            $('#addproduct #error_name').html('');
            $('#addproduct #error_cp').html('');
            $('#addproduct #error_price').html('');
            $('#addproduct #error_sale').html('');
            $('#addproduct #error_image').html('');
            $('#addproduct #error_hot').html('');
            $('#addproduct #error_del').html('');
            $('#addproduct #error_content').html('');
            $.ajax({
                url: "{{route('addproduct')}}",
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
                            $('#addproduct #error_name').html(data.errors['name']);
                        }
                        if(data.errors['category_product']!=''){
                            $('#addproduct #error_cp').html(data.errors['category_product']);
                        }
                        if(data.errors['price']!=''){
                            $('#addproduct #error_price').html(data.errors['price']);
                        }
                        if(data.errors['sale']!=''){
                            $('#addproduct #error_sale').html(data.errors['sale']);
                        }
                        if(data.errors['image']!=''){
                            $('#addproduct #error_image').html(data.errors['image']);
                        }
                        if(data.errors['hot']!=''){
                            $('#addproduct #error_hot').html(data.errors['hot']);
                        }
                        if(data.errors['del']!=''){
                            $('#addproduct #error_del').html(data.errors['del']);
                        }
                        if(data.errors['content']!=''){
                            $('#addproduct #error_content').html(data.errors['content']);
                        }
                    }
                    if(data.success){
                        toastr.success(data.success);
                    }
                }
            });
        })
    });
</script>
@endsection