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
                            <li class="active">Loại sản phẩm</li>
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
                                <strong class="card-title">Loại sản phẩm</strong>
                                <a href="{{url('/addcategoryproduct')}}" style="float: right" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
                            </div>
                            <div class="card-body">
                                <table id="data-category-product" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="3%">ID</th>
                                            <th>Tên</th>
                                            <th>Ảnh</th>
                                            <th>Ngày tạo</th>
                                            <th width="17%"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal" tabindex="-1" role="dialog" id="deletecp">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Xoá danh mục sản phẩm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <p>Bạn có chắc muốn xoá danh mục sản phẩm này không ?</p>
                                  <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" id="delete_bt" class="btn btn-danger">Xác nhận</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editcp" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Chỉnh sửa danh mục</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success" id="success" style="display: none"> </div>
                                <div class="alert alert-danger" id="error" style="display: none"> </div>
                                <form  id="edit_form" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" id="id">
                                    <p class="help is-danger text-danger" id="error_id"></p>
                                    <div class="form-group">
                                        <label for="images" class="col-form-label">Ảnh danh mục:</label>
                                        <div style="margin-bottom: 10px; text-align: center" id="images"></div>
                                        <input type="file" class="form-control" name="images" style="padding: 1%;" multiple>
                                        <p class="help is-danger text-danger" id="error_images"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-form-label" >Tên danh mục:</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên danh mục">
                                        <p class="help is-danger text-danger" id="error_name"></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary closeform" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-info">Cập nhật</button>
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
<script>
    $(document).ready(function(){
        jQuery('#data-category-product').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
            url: "{{ route('categoryproduct-data.index') }}",
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
                    return "<img src={{ URL::to('/') }}/public/storage/categoryproduct/"+ data +" style='width: 80px' />";
                },
                orderable: false
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });
        var cp_id;
        $(document).on('click', '.deletecproduct', function(){
            cp_id = $(this).attr('id');
            jQuery('#deletecp').modal('show');
        });
        $('#delete_bt').click(function(){
        $.ajax({
            url:"/shopthegmen/categoryproduct/"+cp_id+"/destroy",
            success:function(data)
                {
                    jQuery('#deletecp').modal('hide');
                    if(data.success){
                        toastr.success(data.success);
                    }
                    jQuery('#data-category-product').DataTable().ajax.reload();
                }
            })
        });
        $(document).on('click', '.buttonedit', function(event){
            event.preventDefault();  
            $('#error_images').html('');
            $('#error_id').html('');
            $('#error_name').html('');
            $('#success').html('');
            $('#success').css('display','none');
            $('#error').html('');
            $('#error').css('display','none');
            cp_id = $(this).attr("id");
            $.ajax({
                url: "/shopthegmen/categoryproduct/"+cp_id+"/edit",
                dataType:"json",
                success:function(data)
                {  
                    $('#editcp #id').val(data.result['id']);
                    $('#editcp #name').val(data.result['name']);
                    $('#editcp #images').html("<img  width='50%' src={{ URL::to('/') }}/public/storage/categoryproduct/"+ data.result['images'] +"/>");
                    jQuery('#editcp').modal('show');
                }
            });
        })
        $('#edit_form').on('submit',function(event){
            event.preventDefault();  
            $('#error_images').html('');
            $('#error_id').html('');
            $('#error_name').html('');
            $('#success').html('');
            $('#success').css('display','none');
            $('#error').html('');
            $('#error').css('display','none');
            $.ajax({
                url: "{{route('updatecategoryproduct')}}",
                method:"POST",
                data:new FormData(this),
                // $('#edit_form').serialize()
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
                        if(data.errors['name']!=''){
                            $('#error_name').html(data.errors['name']);
                        }
                        if(data.errors['id']!=''){
                            $('#error_id').html(data.errors['id']);
                        }
                    }
                    if(data.success)
                    {
                        $('#success').css('display','block');
                        $('#success').html(data.success);
                        if(data.images){
                            $('#editcp #images').html("<img  width='50%' src={{ URL::to('/') }}/public/storage/categoryproduct/"+ data.images +"/>");
                        }
                    }
                    if(data.error)
                    {
                        $('#error').css('display','block');
                        $('#error').html(data.error);
                    }
                    jQuery('#data-category-product').DataTable().ajax.reload();
                }
            });
        });
    });
</script>
@endsection
