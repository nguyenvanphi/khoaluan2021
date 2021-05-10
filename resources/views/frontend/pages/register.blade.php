@extends('frontend.layout.shared')
@section('content')
<div class="page-content-wrapper mtop">
    <div class="register-page-content">
        <div class="container d-flex justify-content-center">
            <div class="login col-md-6" style="padding-bottom: 100px">
                <form action="" method="POST" style="margin-bottom: 40px; border: 1px solid #d3d3d3">
                    <div class="form-fields" style="padding: 20px 25px">
                        {{-- {{ __('REGISTER') }} : có thể dịch sang các ngôn ngử khác --}}
                        <h5 style="border-bottom: 1px solid #d3d3d3; padding: 0 0 10px">ĐĂNG KÝ</h5>
                        <label for="username">Họ tên:</label>
                        <div style="margin-bottom: 15px">
                            <input type="text" id="username" style="width: 100%; background: #f0f0f0; border-radius: 0; border: 0; height: 36px; padding: 0 0 0 10px"> 
                        </div>
                        <label for="email">Email:</label>
                        <div style="margin-bottom: 15px">
                            <input type="email" id="email" style="width: 100%; background: #f0f0f0; border-radius: 0; border: 0; height: 36px; padding: 0 0 0 10px"> 
                        </div>
                        <label for="phone">Số điện thoại:</label>
                        <div style="margin-bottom: 15px">
                            <input type="number" id="phone" style="width: 100%; background: #f0f0f0; border-radius: 0; border: 0; height: 36px; padding: 0 0 0 10px"> 
                        </div>
                        <label for="address">Địa chỉ:</label>
                        <div style="margin-bottom: 15px">
                            <input type="text" id="address" style="width: 100%; background: #f0f0f0; border-radius: 0; border: 0; height: 36px; padding: 0 0 0 10px"> 
                        </div>
                        <label for="password">Mật khẩu:</label>
                        <div style="margin-bottom: 15px">
                            <input type="password" id="username" style="width: 100%; background: #f0f0f0; border-radius: 0; border: 0; height: 36px; padding: 0 0 0 10px">
                        </div>
                        <label for="password2">Xác nhận mật khẩu:</label>
                        <div>
                            <input type="password" id="password2" style="width: 100%; background: #f0f0f0; border-radius: 0; border: 0; height: 36px; padding: 0 0 0 10px">
                        </div>
                    </div>
                    <div class="form-action" style="background: #e0e0e0; padding: 20px 10px 16px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <span>Bạn đã có tài khoản ?
                                <a href="{{URL::to('/login')}}"><strong style="color: #eeb644">Đăng nhập</strong></a>
                            </span>
                        </div>
                        <div>
                            <input type="submit" value="Đăng ký" style="padding: 5px 10px; border: 0; color: white; background: #eeb644">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection