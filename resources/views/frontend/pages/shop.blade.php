@extends('frontend.layout.shared')
@section('content')

    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img" data-bg="{{('public/frontend/images/bg/shop.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        {{-- <div class="page-header-content-inner">
                            <h1>Shop</h1>

                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="current"><a href="#">Shop</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area ==-->

    @include('frontend.section.shopproduct')

 @endsection