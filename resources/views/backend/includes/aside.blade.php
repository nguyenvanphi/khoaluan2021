<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{URL::to('/dashboard')}}"><img src="{{asset('public/backend/images/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{URL::to('/dashboard')}}"><img src="{{asset('public/backend/images/logo2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="{{URL::to('/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Tổng quan </a>
                </li>
                <li class="">
                    <a href="{{URL::to('/member')}}"> <i class="menu-icon fa fa-users"></i>Thành viên </a>
                </li> 
                <li class=" menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-dropbox"></i>Sản phẩm </a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-product-hunt"></i><a href="{{URL::to('/products')}}">Danh sách sản phẩm</a></li>
                        <li><i class="menu-icon fa fa-bookmark"></i><a href="{{URL::to('/categoryproduct')}}">Loại sản phẩm</a></li>
                    </ul>
                </li>
                <li class=" ">
                    <a href="{{URL::to('/ordersadmin')}}"> <i class="menu-icon fa fa-first-order"></i>Đơn hàng </a>
                </li>
                <li class=" ">
                    <a href="{{URL::to('/contacts')}}"> <i class="menu-icon fa fa-address-book"></i>Liên hệ </a>
                </li>
                <li class=" ">
                    <a href="{{URL::to('/info')}}"> <i class="menu-icon fa fa-info-circle"></i>Thông tin </a>
                </li>
                {{-- <h3 class="menu-title">Icons</h3><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                    </ul>
                </li>
                <li>
                    <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                </li> --}}
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>