@extends('frontend.layout.shared')
@section('content')

    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img" data-bg="{{('public/frontend/images/bg/shop.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content">
                        {{-- <div class="page-header-content-inner">
                            <h1>Product Details</h1>

                            <ul class="breadcrumb">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop.html">Shop</a></li>
                                <li class="current"><a href="#">Product Details</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Header Area ==-->

    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper sp-y">
        <div class="product-details-page-content">
            <div class="container container-wide">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- Start Product Thumbnail Area -->
                            <div class="col-md-5">
                                <div class="product-thumb-area">
                                    <div class="product-details-thumbnail">
                                        <div class="product-thumbnail-slider" id="thumb-gallery">
                                            <figure class="pro-thumb-item" data-mfp-src="{{('public/frontend/images/thegmen/1617940531014ervav4.jpg')}}">
                                                <img src="{{('public/frontend/images/thegmen/1617940531014ervav4.jpg')}}" alt="Product Details" />
                                            </figure>
                                            <figure class="pro-thumb-item" data-mfp-src="{{('public/frontend/images/product/product-details-2.png')}}">
                                                <img src="{{('public/frontend/images/product/product-details-2.png')}}" alt="Product Details" />
                                            </figure>
                                            <figure class="pro-thumb-item" data-mfp-src="{{('public/frontend/images/product/product-details-3.png')}}">
                                                <img src="{{('public/frontend/images/product/product-details-3.png')}}" alt="Product Details" />
                                            </figure>
                                            <figure class="pro-thumb-item" data-mfp-src="{{('public/frontend/images/product/product-details-4.png')}}">
                                                <img src="{{('public/frontend/images/product/product-details-4.png')}}" alt="Product Details" />
                                            </figure>
                                            <figure class="pro-thumb-item" data-mfp-src="{{('public/frontend/images/product/product-details-5.png')}}">
                                                <img src="{{('public/frontend/images/product/product-details-5.png')}}" alt="Product Details" />
                                            </figure>
                                        </div>

                                        <a href="#thumb-gallery" class="btn-large-view btn-gallery-popup">View Larger <i class="fa fa-search-plus"></i></a>
                                    </div>

                                    <div class="product-details-thumbnail-nav">
                                        <figure class="pro-thumb-item">
                                            <img src="{{('public/frontend/images/thegmen/1617940531014ervav4.jpg')}}" alt="Product Details" />
                                        </figure>
                                        <figure class="pro-thumb-item">
                                            <img src="{{('public/frontend/images/productdetail/1617940521349e2jawc.jpg')}}" style="width:100%;max-height:108px;" alt="Product Details" />
                                        </figure>
                                        <figure class="pro-thumb-item">
                                            <img src="{{('public/frontend/images/productdetail/16179405889717d1tmq.jpg')}}" alt="Product Details" />
                                        </figure>
                                        <figure class="pro-thumb-item">
                                            <img src="{{('public/frontend/images/productdetail/16179406024915ty919.jpg')}}" alt="Product Details" />
                                        </figure>
                                        <figure class="pro-thumb-item">
                                            <img src="{{('public/frontend/images/productdetail/product-5.png')}}" alt="Product Details" />
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Thumbnail Area -->

                            <!-- Start Product Info Area -->
                            <div class="col-md-7">
                                <div class="product-details-info-content-wrap">
                                    <div class="prod-details-info-content">
                                        <h2>PIMA POLO SHIRT - COFFEE</h2>
                                        <h5 class="price"><strong>Giá:</strong> <span class="price-amount">320000 VNĐ</span>
                                        </h5>
                                        <p>Chất liệu: Cotton Supima</p>
                                        <p>- Chất vải siêu mịn, siêu nhẹ, siêu thoáng mát, chống nhăn tốt và không gây bết dính da.</p>
                                        <p>- Thiết kế viền phối trẻ trung, năng động, buổi đi chơi của bạn sẽ trọn vẹn.</p>
                                        <div class="product-config">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th class="config-label">Size</th>
                                                        <td class="config-option">
                                                            <div class="config-color">
                                                                <input type="radio" id="size1"
                                                                name="size" value="S">
                                                                <label for="size1" style="font-size: large;">S</label>
                                                                <input type="radio" id="size2"
                                                                name="size" value="M" style="margin-left: 15px;">
                                                                <label for="size2" style="font-size: large;">M</label>
                                                                <input type="radio" id="size3"
                                                                name="size" value="L" style="margin-left: 15px;">
                                                                <label for="size3" style="font-size: large;">L</label>
                                                                <input type="radio" id="size4"
                                                                name="size" value="X" style="margin-left: 15px;">
                                                                <label for="size4" style="font-size: large;">X</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="product-action">
                                            <div class="action-top d-sm-flex">
                                                <div class="pro-qty mr-3 mb-4 mb-sm-0">
                                                    <label for="quantity" class="sr-only">Quantity</label>
                                                    <input type="text" id="quantity" title="Quantity" value="1" />
                                                </div>
                                                <button class="btn btn-bordered">Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Info Area -->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="product-description-review">
                                    <!-- Product Description Tab Menu -->
                                    <ul class="nav nav-tabs desc-review-tab-menu" id="desc-review-tab" role="tablist">
                                        <li>
                                            <a id="desc-tab" data-toggle="tab" href="#descriptionContent" role="tab">Đánh giá</a>
                                        </li>
                                        {{-- <li>
                                            <a class="active" id="profile-tab" data-toggle="tab" href="#reviewContent" role="tab">Review (3)</a>
                                        </li> --}}
                                    </ul>

                                    <!-- Product Description Tab Content -->
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="descriptionContent">
                                            <div class="product-rating-wrap">
                                                {{-- <div class="average-rating">
                                                    <h4>4.8 <span>(Overall)</span></h4>
                                                    <span>Based on 2 Comments</span>
                                                </div> --}}

                                                <div class="display-ratings">
                                                    <div class="rating-item">
                                                        <div class="rating-author-pic">
                                                            <img src="{{('public/frontend/images/extra/author-1.jpg')}}" alt="author" />
                                                        </div>

                                                        <div class="rating-author-txt">
                                                            {{-- <div class="rating-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div> --}}

                                                            <div class="rating-meta">
                                                                <h3>Cristopher Lee</h3>
                                                                <span class="time">- 07, Jun</span>
                                                            </div>

                                                            <p>Wonderful collection of WooThemes classics! A must buy for
                                                                all
                                                                Woo fans.</p>
                                                        </div>
                                                    </div>

                                                    <div class="rating-item">
                                                        <div class="rating-author-pic">
                                                            <img src="{{('public/frontend/images/extra/author-2.jpg')}}" alt="author" />
                                                        </div>

                                                        <div class="rating-author-txt">
                                                            {{-- <div class="rating-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-empty"></i>
                                                            </div> --}}

                                                            <div class="rating-meta">
                                                                <h3>Raju Ahammad</h3>
                                                                <span class="time">- 02, Jun</span>
                                                            </div>

                                                            <p>Voluptatem quia voluptas sit aspernat uptatem sequi Neque
                                                                porro.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <div class="rating-form-wrapper">
                                                    <h3>Add your Reviews</h3>
                                                    <form action="#" method="post">
                                                        <div class="rating-form row">
                                                            <div class="col-12">
                                                                <h5>Your Rating:</h5>
                                                                <div class="rating-star fix mb-20">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-input-item mt-30 mt-md-0">
                                                                    <label for="name" class="sr-only">Name</label>
                                                                    <input type="text" id="name" placeholder="Name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-input-item mt-30 mt-md-0">
                                                                    <label for="email" class="sr-only">Email</label>
                                                                    <input type="email" id="email" placeholder="Email" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-input-item mt-30 mb-40">
                                                                    <label for="your-review" class="sr-only">review</label>
                                                                    <textarea rows="4" name="review" id="your-review" placeholder="Write a review"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-22">
                                                                <button class="btn btn-brand">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div> --}}
                                            </div>
                                            {{-- <div class="description-content">
                                                <p>Created from either wood or recycled materials, it can be moulded
                                                    into just about any shape and hardens to provide a hard shell. Additives
                                                    can
                                                    make it water resistant and it can be produced in a rainbow of colours.
                                                    Other materials being looked at include paper clay, paper glue, paper
                                                    cotton
                                                    and even washable paper.</p>

                                                <p>Additives can make it water resistant and it can be produced in a rainbow
                                                    of
                                                    colours. Other materials being looked at include paper clay Lorem ipsum
                                                    dolor
                                                    sit amet, consectetur adipisicing elit. Eaque, facere!</p>
                                                <p>Pursue pleasure rationally encounter consequences that are extremely
                                                    painful. Nor again is there anyone who loves or pursues or desires to
                                                    obtain pain of itself, because it is pain, but because occasionally
                                                    circes occur in and pain can procure him some great ple cum soluta nobis
                                                    est eligendi optio cumque nihil impedit quo minus id qu maxime placeat
                                                    facere possimus, omnis voluptas assumenda est, omnis dolor
                                                    repellendus</p>
                                            </div> --}}
                                        </div>

                                        <div class="tab-pane fade" id="reviewContent">
                                            <div class="product-rating-wrap">
                                                <div class="average-rating">
                                                    <h4>4.8 <span>(Overall)</span></h4>
                                                    <span>Based on 2 Comments</span>
                                                </div>

                                                <div class="display-ratings">
                                                    <div class="rating-item">
                                                        <div class="rating-author-pic">
                                                            <img src="{{('public/frontend/images/extra/author-1.jpg')}}" alt="author" />
                                                        </div>

                                                        <div class="rating-author-txt">
                                                            <div class="rating-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>

                                                            <div class="rating-meta">
                                                                <h3>Cristopher Lee</h3>
                                                                <span class="time">- 07, Jun</span>
                                                            </div>

                                                            <p>Wonderful collection of WooThemes classics! A must buy for
                                                                all
                                                                Woo fans.</p>
                                                        </div>
                                                    </div>

                                                    <div class="rating-item">
                                                        <div class="rating-author-pic">
                                                            <img src="{{('public/frontend/images/extra/author-2.jpg')}}" alt="author" />
                                                        </div>

                                                        <div class="rating-author-txt">
                                                            <div class="rating-star">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-half-empty"></i>
                                                            </div>

                                                            <div class="rating-meta">
                                                                <h3>Raju Ahammad</h3>
                                                                <span class="time">- 02, Jun</span>
                                                            </div>

                                                            <p>Voluptatem quia voluptas sit aspernat uptatem sequi Neque
                                                                porro.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="rating-form-wrapper">
                                                    <h3>Add your Reviews</h3>
                                                    <form action="#" method="post">
                                                        <div class="rating-form row">
                                                            <div class="col-12">
                                                                <h5>Your Rating:</h5>
                                                                <div class="rating-star fix mb-20">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-input-item mt-30 mt-md-0">
                                                                    <label for="name" class="sr-only">Name</label>
                                                                    <input type="text" id="name" placeholder="Name" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-input-item mt-30 mt-md-0">
                                                                    <label for="email" class="sr-only">Email</label>
                                                                    <input type="email" id="email" placeholder="Email" />
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-input-item mt-30 mb-40">
                                                                    <label for="your-review" class="sr-only">review</label>
                                                                    <textarea rows="4" name="review" id="your-review" placeholder="Write a review"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 mt-22">
                                                                <button class="btn btn-brand">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Page Content Wrapper ==-->

@endsection