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
                    <li><a href="{{url('/categoryproduct')}}">Danh mục sản phẩm</a></li>
                    <li class="active">Thêm mới danh mục sản phẩm</li>
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
                        <strong class="card-title">Thêm mới Danh mục sản phẩm</strong>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <form id="addcategory" action="{{url('/addcategoryproduct')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-fields">
                                <div class="form-group">
                                    <label for="images">Ảnh danh mục:</label>
                                    <input type="file" name="images" id="images" class="form-control" style="padding: 1%;">
                                    @if ($errors->has('images'))
                                        <p class="help is-danger text-danger">{{ $errors->first('images') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Tên danh mục sản phẩm: </label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên danh mục">
                                    @if ($errors->has('name'))
                                        <p class="help is-danger text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-action form-group">
                                <input type="submit" value="Thêm mới" class="btn btn-success form-control" id="send_form">
                            </div>
                        </form>
                    </div>
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
@endsection