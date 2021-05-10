@extends('frontend.layout.shared')
@section('content')
<div class="page-content-wrapper mtop">
    <div class="login-page-content">
        <div class="container d-flex justify-content-center">
            <div class="login col-md-6" style="padding-bottom: 100px">
                <form action="" method="POST" style="margin-bottom: 40px; border: 1px solid #d3d3d3">
                    <div class="form-fields" style="padding: 20px 25px">
                        <h5 style="border-bottom: 1px solid #d3d3d3; padding: 0 0 10px">QUÊN MẬT KHẨU ?</h5>
                        <label for="email">Vui lòng cung cấp email đăng nhập để lấy lại mật khẩu.</label>
                        <div style="margin-bottom: 15px">
                            <input type="email" id="email" style="width: 100%; background: #f0f0f0; border-radius: 0; border: 0; height: 36px; padding: 0 0 0 10px"> 
                        </div>
                        <div class="form-action">
                            <div>
                                <input type="submit" value="Gửi" style="padding: 5px 10px; border: 0; color: white; background: #eeb644; width: 100%">
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection