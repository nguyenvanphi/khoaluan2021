@extends('frontend.layout.shared')
@section('content')

    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img" data-bg="{{('public/frontend/images/bg/about.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        {{-- <div class="page-header-content-inner">
                            <h1>Giới thiệu</h1>

                            <ul class="breadcrumb">
                                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                                <li class="current"><a href="#">Giới thiệu</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area ==-->

    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper sm-top">
        <div class="about-page-content">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-1 order-md-0">
                        <div class="about-content">
                            <h2 class="h3 mb-sm-20">The GMen</h2>
                            <p>Thời trang Gmen – Nơi niềm tin về thời trang cho nam giới được gìn giữ, đồ đẹp chất lượng, quần áo giá rẻ nhất thị trường, cam kết bán hàng đẹp và chất như quảng cáo.</p>
                        </div>
                    </div>

                    <div class="col-lg-6 order-0">
                        <div class="about-thumb mb-sm-30">
                            <img src="{{('public/frontend/images/thoi-trang-nam_s11559.jpg')}}" alt="About" />
                        </div>
                    </div>
                </div>

                <div class="row align-items-center sm-top">
                    <div class="col-lg-6">
                        <div class="about-thumb video-play mb-sm-30">
                            <img src="{{('public/frontend/images/thoitrangnam.jpg')}}" alt="About" />
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="about-content">
                            <h2 class="h3">Nhiệm vụ của chúng tôi !</h2>
                            <p>Xây dựng thương hiệu thời trang nam là con đường là sứ mệnh mà chúng tôi đang đi. Liên tục cập nhật xu hướng thời trang nam mới nhất từ thế giới, hàng Việt Nam Xuất Khẩu, hàng công ty sản xuất ra….</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->

    <!--== Start Call to action Wrapper ==-->
    <div class="call-to-action-area sm-top">
        <div class="call-to-action-content-area home-2 bg-img" data-bg="{{('public/frontend/images/bg/bg-1.jpg')}}">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="call-to-action-txt">
                            <h2>TẤT CẢ CÁC SẢN PHẨM <br> BẠN CÓ THỂ TÌM HIỂU TẠI ĐÂY</h2>
                                <a href="{{URL::to('/shop')}}" class="btn btn-brand">Mua Ngay</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Call to action Wrapper ==-->

@endsection