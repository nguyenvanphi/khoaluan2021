@extends('frontend.layout.shared')
@section('content')


    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper" style="margin-top: 50px">
        <div class="about-page-content">
            <div class="container" style="display: flex; justify-content: center;">
                <div class="card" style="width: 75%">
                    <div class="card-header">
                        <strong class="card-title">Thông tin cá nhân</strong>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <form style="width: 80%" id="form_profile" action="" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-fields">
                                <div class="form-group" style="text-align: center">
                                    @if (Auth::user()->avatar==null)
                                        <img style="border-radius: 50%" src="{{asset('public/frontend/images/default-avatar.png')}}" alt="">
                                    @else
                                        <img style="border-radius: 50%" src="{{ URL::to('/') }}/public/storage/avatar/@php
                                        echo Auth::user()->avatar
                                    @endphp" alt="" class="user-avatar-header">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="custom-file ">
                                        <input type="file" name="image" class="custom-file-input" id="validatedCustomFile">
                                        <label class="custom-file-label" for="validatedCustomFile">Chọn ảnh đại diện</label>
                                        {{-- <div class="invalid-feedback">Example invalid custom file feedback</div> --}}
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Họ Tên: </label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->user_name}}" placeholder="Nhập họ tên" required>
                                    <p class="text-warning" id="error_name" style="margin-top: 10px"></p>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="email" name="email" id="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Nhập địa chỉ email" required>
                                    <p class="text-warning" id="error_email" style="margin-top: 10px"></p>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Số điện thoại: </label>
                                    <input type="text" name="phone" value="{{Auth::user()->phone}}" id="phone" class="form-control" placeholder="Nhập số điện thoại" required>
                                    <p class="text-warning" id="error_phone" style="margin-top: 10px"></p>
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ: </label>
                                    <input type="text" name="address" id="address" value="{{Auth::user()->address}}" class="form-control" placeholder="Nhập địa chỉ" required>
                                    <p class="text-warning" id="error_address" style="margin-top: 10px"></p>
                                </div>
                            </div>
                            <div class="form-action form-group" style="margin: auto; width: 77%; margin-bottom: 5%">
                                <input type="submit" value="Cập nhật" class="btn btn-info form-control" id="send_form">
                            </div>
                        </form>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->

    <!--== Start Call to action Wrapper ==-->
    <div class="call-to-action-area sm-top">
        
    </div>
    <!--== End Call to action Wrapper ==-->

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#form_profile').on('submit',function(event){
            event.preventDefault(); 
            $('#error_name').html('');
            $('#error_email').html('');
            $('#error_address').html('');
            $('#error_phone').html('');
            var check = 0;
            if($('#name').val()==''){
                $('#error_name').html('Họ tên không được để trống');
                check = 1;
            }
            if($('#email').val()==''){
                $('#error_email').html('Địa chỉ email không được để trống');
                check = 1;
            }else{
                if(!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test($('#email').val())){
                    $('#error_email').html('Email không đúng định dạng');
                    check = 1;
                }
            }
            if($('#address').val()==''){
                $('#error_adress').html('Địa chỉ không được để trống');
                check = 1;
            }
            if($('#phone').val()==''){
                $('#error_phone').html('Số điện thoại không được để trống');
                check = 1;
            }else{
                if(!/((09|03|07|08|05)+([0-9]{8})\b)/g.test($('#phone').val())){
                    $('#error_phone').html('Số điện thoại không đúng');
                    check = 1;
                }
            }
            if(check==0){
                $.ajax({
                url: "{{route('profile')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                    {  

                    }
                });
            }
        });
    });
</script>
@endsection