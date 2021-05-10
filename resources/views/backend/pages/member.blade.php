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
                            <li class="active">Thành viên</li>
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
                                <strong class="card-title">Danh sách thành viên</strong>
                                <button type="button" style="float: right" class="btn btn-success adduserbt" data-toggle="modal" data-target="#adduser"><i class="fa fa-plus"></i> Thêm mới</button>
                            </div>
                            <div class="card-body">
                                <table id="data-member" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th  width="3%">ID</th>
                                            <th >Name</th>
                                            <th >Email</th>
                                            <th >Phone</th>
                                            <th >Address</th>
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
        <div class="modal" tabindex="-1" role="dialog" id="deleteuser">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xoá thành viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <p>Bạn có chắc muốn xoá thành viên này không ?</p>
                          <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" id="delete_bt" class="btn btn-danger">Xác nhận</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="edituser" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Chỉnh sửa thành viên</h4>
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
                                <label for="name" class="col-form-label" >Tên thành viên:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên thành viên">
                                <p class="help is-danger text-danger" id="error_name"></p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label" >Email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
                                <p class="help is-danger text-danger" id="error_email"></p>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label" >Phone:</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại">
                                <p class="help is-danger text-danger" id="error_phone"></p>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-form-label" >Address:</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ">
                                <p class="help is-danger text-danger" id="error_adress"></p>
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
        <div class="modal fade" id="adduser" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm mới thành viên</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success" id="success" style="display: none"> </div>
                        <div class="alert alert-danger" id="error" style="display: none"> </div>
                        <form  id="add_form" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name" class="col-form-label" >Tên thành viên:</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Nhập tên thành viên">
                                <p class="help is-danger text-danger" id="error_name"></p>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label" >Email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Nhập email">
                                <p class="help is-danger text-danger" id="error_email"></p>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label" >Phone:</label>
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Nhập số điện thoại">
                                <p class="help is-danger text-danger" id="error_phone"></p>
                            </div>
                            <div class="form-group">
                                <label for="address" class="col-form-label" >Address:</label>
                                <input type="text" class="form-control" name="address" id="address" placeholder="Nhập địa chỉ">
                                <p class="help is-danger text-danger" id="error_adress"></p>
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
@endsection

@section('script')
<script>
    $(document).ready(function(){
        jQuery('#data-member').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
            url: "{{ route('member-data.index') }}",
            },
            columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'user_name',
                name: 'user_name'
            },
            {
                data: 'email',
                name: 'email',
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'address',
                name: 'address'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });
        var cp_id;
        $(document).on('click', '.deletecuser', function(){
            cp_id = $(this).attr('id');
            jQuery('#deleteuser').modal('show');
        });
        $('#delete_bt').click(function(){
            $.ajax({
                url:"/shopthegmen/member/"+cp_id+"/destroy",
                success:function(data)
                    {
                        jQuery('#deleteuser').modal('hide');
                        if(data.success){
                            toastr.success(data.success);
                        }
                        jQuery('#data-member').DataTable().ajax.reload();
                    }
                })
        });
        $(document).on('click', '.buttonedit', function(event){
            event.preventDefault();
            $('#edituser #error_id').html('');
            $('#edituser #error_name').html('');
            $('#edituser #error_email').html('');
            $('#edituser #error_phone').html('');
            $('#edituser #error_address').html('');
            $('#edituser #success').html('');
            $('#edituser #success').css('display','none');
            $('#edituser #error').html('');
            $('#edituser #error').css('display','none');
            cp_id = $(this).attr("id");
            $.ajax({
                url: "/shopthegmen/member/"+cp_id+"/edit",
                dataType:"json",
                success:function(data)
                {  
                    $('#edituser #id').val(data.result['id']);
                    $('#edituser #name').val(data.result['user_name']);
                    $('#edituser #email').val(data.result['email']);
                    $('#edituser #phone').val(data.result['phone']);
                    $('#edituser #address').val(data.result['address']);
                    jQuery('#edituser').modal('show');
                }
            });
        })
        $('#edit_form').on('submit',function(event){
            event.preventDefault();  
            $('#edituser #error_id').html('');
            $('#edituser #error_name').html('');
            $('#edituser #error_email').html('');
            $('#edituser #error_phone').html('');
            $('#edituser #error_address').html('');
            $('#edituser #success').html('');
            $('#edituser #success').css('display','none');
            $('#edituser #error').html('');
            $('#edituser #error').css('display','none');
            $.ajax({
                url: "{{route('updatemember')}}",
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
                        if(data.errors['phone']!=''){
                            $('#edituser #error_phone').html(data.errors['phone']);
                        }
                        if(data.errors['email']!=''){
                            $('#edituser #error_email').html(data.errors['email']);
                        }
                        if(data.errors['name']!=''){
                            $('#edituser #error_name').html(data.errors['name']);
                        }
                        if(data.errors['id']!=''){
                            $('#edituser #error_id').html(data.errors['id']);
                        }
                        if(data.errors['address']!=''){
                            $('#edituser #error_address').html(data.errors['address']);
                        }
                    }
                    if(data.success)
                    {
                        $('#edituser #success').css('display','block');
                        $('#edituser #success').html(data.success);
                    }
                    if(data.error)
                    {
                        $('#edituser #error').css('display','block');
                        $('#edituser #error').html(data.error);
                    }
                    jQuery('#data-member').DataTable().ajax.reload();
                }
            });
        });
        $('.adduserbt').on('click',function(event){
            event.preventDefault();
            $('#adduser #error_name').html('');
            $('#adduser #error_email').html('');
            $('#adduser #error_phone').html('');
            $('#adduser #error_address').html('');
            $('#adduser #success').html('');
            $('#adduser #success').css('display','none');
            $('#adduser #error').html('');
            $('#adduser #error').css('display','none');
            $('#adduser #name').val('');
            $('#adduser #email').val('');
            $('#adduser #phone').val('');
            $('#adduser #address').val('');
        });
        $('#add_form').on('submit',function(event){
            event.preventDefault();
            $('#adduser #error_name').html('');
            $('#adduser #error_email').html('');
            $('#adduser #error_phone').html('');
            $('#adduser #error_address').html('');
            $('#adduser #success').html('');
            $('#adduser #success').css('display','none');
            $('#adduser #error').html('');
            $('#adduser #error').css('display','none');
            $.ajax({
                url: "{{route('addmember')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                {  
                    if(data.errors){
                        if(data.errors['phone']!=''){
                            $('#adduser #error_phone').html(data.errors['phone']);
                        }
                        if(data.errors['email']!=''){
                            $('#adduser #error_email').html(data.errors['email']);
                        }
                        if(data.errors['name']!=''){
                            $('#adduser #error_name').html(data.errors['name']);
                        }
                        if(data.errors['address']!=''){
                            $('#adduser #error_address').html(data.errors['address']);
                        }
                    }
                    if(data.success)
                    {
                        $('#adduser #success').css('display','block');
                        $('#adduser #success').html(data.success);
                    }
                    if(data.error)
                    {
                        $('#adduser #error').css('display','block');
                        $('#adduser #error').html(data.error);
                    }
                    jQuery('#data-member').DataTable().ajax.reload();
                }
            });
        });
    });
</script>

@endsection
