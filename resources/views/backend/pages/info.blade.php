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
                            <li class="active">Thông tin Website</li>
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
                                <strong class="card-title">Cập nhật thông tin</strong>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <form id="info_form" action="" method="POST" style="width: 50%;">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="{{$info->id}}">
                                    <div class="form-fields">
                                        <div class="form-group row">
                                            <label for="web_name" class="col-sm-3 col-form-label">Tên đơn vị:</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="web_name" id="web_name" value="{{$info->web_name}}">
                                                <span class="help is-danger text-danger" id="error_web_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Đại diện:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="name" id="name" value="{{$info->name}}">
                                                <span class="help is-danger text-danger" id="error_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-3 col-form-label">Email:</label>
                                            <div class="col-sm-9">
                                                <input  type="email" class="form-control" name="email" id="email" value="{{$info->email}}">
                                                <span class="help is-danger text-danger" id="error_email"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-3 col-form-label">Số điện thoại:</label>
                                            <div class="col-sm-9">
                                                <input  type="number" class="form-control" name="phone" id="phone" value="{{$info->phone}}">
                                                <span class="help is-danger text-danger" id="error_phone"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-3 col-form-label">Địa chỉ:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="address" id="address" value="{{$info->address}}">
                                                <span class="help is-danger text-danger" id="error_address"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="link_fb" class="col-sm-3 col-form-label">Facebook:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="link_fb" id="link_fb" value="{{$info->link_fb}}">
                                                <span class="help is-danger text-danger" id="error_link_fb"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="link_ytb" class="col-sm-3 col-form-label">Youtube:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="link_ytb" id="link_ytb" value="{{$info->link_ytb}}">
                                                <span class="help is-danger text-danger" id="error_link_ytb"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="link_in" class="col-sm-3 col-form-label">Instargram:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="link_in" id="link_in" value="{{$info->link_in}}">
                                                <span class="help is-danger text-danger" id="error_link_in"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-action form-group">
                                            <input type="submit" value="Cập nhật" class="btn btn-info form-control" id="send_form">
                                        </div>
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
    $(document).ready(function(){
        toastr.options = {
            timeOut          : 650, //default timeout,
        };
        $('#info_form').on('submit',function(event){
            event.preventDefault();  
            $('#info_form #error_web_name').html('');
            $('#info_form #error_name').html('');
            $('#info_form #error_email').html('');
            $('#info_form #error_phone').html('');
            $('#info_form #error_address').html('');
            $('#info_form #error_link_fb').html('');
            $('#info_form #error_link_ytb').html('');
            $('#info_form #error_link_in').html('');
            $.ajax({
                url: "{{route('updateinfo')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                {  
                    if(data.errors){
                        if(data.errors['web_name']!=''){
                            $('#info_form #error_web_name').html(data.errors['web_name']);
                        }
                        if(data.errors['name']!=''){
                            $('#info_form #error_name').html(data.errors['name']);
                        }
                        if(data.errors['email']!=''){
                            $('#info_form #error_email').html(data.errors['email']);
                        }
                        if(data.errors['phone']!=''){
                            $('#info_form #error_phone').html(data.errors['phone']);
                        }
                        if(data.errors['address']!=''){
                            $('#info_form #error_address').html(data.errors['address']);
                        }
                        if(data.errors['link_fb']!=''){
                            $('#info_form #error_link_fb').html(data.errors['link_fb']);
                        }
                        if(data.errors['link_ytb']!=''){
                            $('#info_form #error_link_ytb').html(data.errors['link_ytb']);
                        }
                        if(data.errors['link_in']!=''){
                            $('#info_form #error_link_in').html(data.errors['link_in']);
                        }
                    }
                    if(data.success)
                    {
                        toastr.success("Cập nhật thông tin thành công !");
                    }
                }
            });
        });
    });
</script>

@endsection
