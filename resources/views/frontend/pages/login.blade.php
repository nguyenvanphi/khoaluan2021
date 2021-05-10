@extends('frontend.layout.shared')
@section('content')
<div class="page-content-wrapper mtop">
    <div class="login-page-content">
        <div class="container d-flex justify-content-center">
            <div class="login col-md-6" style="padding-bottom: 100px">
                <form action="{{route('login')}}" method="POST" style="margin-bottom: 40px; border: 1px solid #d3d3d3">
                    {{ csrf_field() }}
                    <div class="form-fields" style="padding: 20px 25px">
                        <h5 style="border-bottom: 1px solid #d3d3d3; padding: 0 0 10px">ĐĂNG NHẬP</h5>
                        @if (isset(session('error')['messeger']))
                            <div class="alert alert-danger" role="alert">
                                    {{ session('error')['messeger'] }}
                            </div>
                        @endif
                        <label for="phone">Số điện thoại:</label>
                        <div style="margin-bottom: 15px">
                            <input type="number" name="phone" id="phone" style="width: 100%; background: #f0f0f0; border-radius: 0; border: 0; height: 36px; padding: 0 0 0 10px"> 
                            @if (isset(session('error')['phone']))
                                <p class="text-danger">{{ session('error')['phone'] }}</p>
                            @endif 
                        </div>
                        
                        <label for="password">Mật khẩu:</label>
                        <div>
                            <input type="password"  name="password" id="password" style="width: 100%; background: #f0f0f0; border-radius: 0; border: 0; height: 36px; padding: 0 0 0 10px">
                        </div>
                            @if (isset(session('error')['password']))
                                <p class="text-danger">{{ session('error')['password'] }}</p>
                            @endif 
                    </div>
                    <div class="form-action" style="background: #e0e0e0; padding: 20px 10px 16px; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <span><a href="{{URL::to('/forgetpassword')}}" style="color: #303030">Quên mật khẩu ?</a></span>
                            <br>
                            <span>Bạn chưa có tài khoản ?
                                <a href="{{URL::to('/register')}}"><strong style="color: #eeb644">Đăng ký</strong></a>
                            </span>
                        </div>
                        <div>
                            <input type="submit" value="Đăng nhập" style="padding: 5px 10px; border: 0; color: white; background: #eeb644">
                        </div>
                    </div>
                </form>
                <h6 class="text-center">Hoặc đăng nhập với</h6>
                <div class="btn-social text-center">
                    <button class="btn btn-facebook" ><i class="fa fa-facebook"></i> Facebook</button>
                    <button class="btn btn-google" ><i class="fa fa-glide-g"></i> Google</button>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection