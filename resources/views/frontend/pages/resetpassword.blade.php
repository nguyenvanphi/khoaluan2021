@extends('frontend.layout.shared')
@section('content')


    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper" style="margin-top: 50px">
        <div class="about-page-content">
            <div class="container" style="display: flex; justify-content: center;">
                <div class="card" style="width: 75%">
                    <div class="card-header">
                        <strong class="card-title">Đổi mật khẩu</strong>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <form style="width: 80%" id="form_resetpassword" action="" method="POST">
                            {{ csrf_field() }}
                            <div class="form-fields">
                                <div class="form-group">
                                    <label for="password">Mật khẩu hiện tại: </label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu hiện tại" >
                                    <p class="text-warning" id="error_password" style="margin-top: 10px"></p>
                                </div>
                                <div class="form-group">
                                    <label for="newpassword">Mật khẩu mới: </label>
                                    <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="Nhập mật khẩu mới" >
                                    <p class="text-warning" id="error_newpassword" style="margin-top: 10px"></p>
                                </div>
                                <div class="form-group">
                                    <label for="newpassword2">Xác nhận mật khẩu: </label>
                                    <input type="password" name="newpassword2" id="newpassword2" class="form-control" placeholder="Xác nhận mật khẩu" >
                                    <p class="text-warning" id="error_newpassword2" style="margin-top: 10px"></p>
                                </div>
                            </div>
                            <div class="form-action form-group" style="margin: auto; width: 77%; margin-bottom: 5%">
                                <input type="submit" value="Đổi mật khẩu" class="btn btn-info form-control" id="send_form">
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
        toastr.options = {
            timeOut          : 650, //default timeout,
        };
        $('#form_resetpassword').on('submit',function(event){
            event.preventDefault(); 
            $('#error_password').html('');
            $('#error_newpassword').html('');
            $('#error_newpassword2').html('');
            var check = 0;
            if($('#password').val()==''){
                $('#error_password').html('Mật khẩu hiện tại không được để trống');
                check = 1;
            }else{
                if($('#password').val().length<6){
                    $('#error_password').html('Mật khẩu ít nhất 6 kí tự');
                    check = 1;
                }
            }
            if($('#newpassword').val()==''){
                $('#error_newpassword').html('Mật khẩu mới không được để trống');
                check = 1;
            }else{
                if($('#newpassword').val().length<6){
                    $('#error_newpassword').html('Mật khẩu ít nhất 6 kí tự');
                    check = 1;
                }
            }
            if($('#newpassword2').val()==''){
                $('#error_newpassword2').html('Mật khẩu xác nhận không được để trống');
                check = 1;
            }
            if($('#newpassword').val()!=''&&$('#newpassword2').val()!=''){
                if($('#newpassword').val()!=$('#newpassword2').val()){
                    $('#error_newpassword2').html('Mật khẩu xác nhận không đúng');
                    check = 1;
                }
            }
            if(check==0){
                $.ajax({
                url: "{{route('resetpassword')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                    {  
                        if(data.success==1){
                            $('#error_password').html('Mật khẩu hiện tại không đúng');
                        }
                        if(data.success==2){
                            $('#error_newpassword').html('Mật khẩu mới trùng với mật khẩu hiện tại');
                        }
                        if(data.success==3){
                            toastr.success("Đổi mật khẩu thành công !");
                            $('#form_resetpassword')[0].reset();
                        }
                    }
                });
            }
        });
    });
</script>
@endsection