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
                    <li>Liên hệ</li>
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
                        <strong class="card-title">Chi tiết liên hệ</strong>
                    </div>
                    <form id="editcontact" action="" method="POST" style="margin-top: 15px">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="col-md-8">
                            <div class="form-group row">
                                <label for="name" class="col-sm-3 col-form-label">Tên người liên hệ:</label>
                                <div class="col-sm-9"> 
                                    <input type="text" disabled class="form-control" name="name" id="name" value="{{$data->name}}">
                                    <span class="help is-danger text-danger" id="error_name"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email liên hệ:</label>
                                <div class="col-sm-9">
                                    <input type="email" disabled class="form-control" name="email" id="email" value="{{$data->email}}">
                                    <span class="help is-danger text-danger" id="error_email"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="title" class="col-sm-3 col-form-label">Tiêu đề:</label>
                                <div class="col-sm-9">
                                    <input type="text" disabled class="form-control" name="title" id="title" value="{{$data->title}}">
                                    <span class="help is-danger text-danger" id="error_title"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="created_at" class="col-sm-3 col-form-label">Thời gian liên hệ:</label>
                                <div class="col-sm-9">
                                    <input type="text" disabled class="form-control" name="created_at" id="created_at" value="{{$data->created_at}}">
                                    <span class="help is-danger text-danger" id="error_created_at"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="message" class="col-sm-3 col-form-label">Lời nhắn:</label>
                                <div class="col-sm-9">
                                    <textarea disabled class="form-control" name="message" id="message" cols="30" rows="10" >{{$data->message}}</textarea>
                                    <span class="help is-danger text-danger" id="error_message"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Tình trạng liên hệ:</label>
                                <div class="col-sm-9">
                                    @if ($data->status==0)
                                        <select class="form-control" id="status" name="status">
                                            <option value="0" selected>Đang chờ</option>
                                            <option value="1" >Đã phản hồi</option>
                                        </select>
                                    @else
                                        <select class="form-control" id="status" name="status">
                                            <option value="0">Đang chờ</option>
                                            <option value="1" selected>Đã phản hồi</option>
                                        </select> 
                                    @endif
                                    
                                    <span class="help is-danger text-danger" id="error_status"></span>
                                </div>
                            </div>
                            <div class="form-action form-group col-sm-9 offset-sm-3">
                                <input type="submit" value="Cập nhật" class="btn btn-info form-control" id="send_form">
                            </div>
                        </div>
                      </form>
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
        $('#editcontact').on('submit',function(event){
            event.preventDefault(); 
            $('#editcontact #error_status').html('')
            $.ajax({
                url: "{{route('updatecontact')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                {  
                    if(data.success==1){
                        $('#editcontact #error_status').html('Trang thái chưa được cập nhật');
                    }
                    if(data.success==2){
                        toastr.success('Liên hệ đã được cập nhật');
                    }
                }
            });
        });
    });
</script>

@endsection