@extends('frontend.layout.shared')
@section('content')

    <!--== Start Page Header Area ==-->
    <div class="page-header-wrap bg-img" data-bg="{{asset('public/frontend/images/bg/shop.jpg')}}">
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
                                            <figure class="pro-thumb-item" data-mfp-src="{{ URL::to('/') }}/public/storage/products/@php
                                            echo $product->images
                                        @endphp">
                                                <img src="{{ URL::to('/') }}/public/storage/products/@php
                                                echo $product->images
                                            @endphp" alt="Product Details" style="max-height:468px; width: 100%"/>
                                            </figure>
                                            @if (count($imagesproduct)!=0)
                                                @foreach ($imagesproduct as $item)
                                                    <figure class="pro-thumb-item" data-mfp-src="{{ URL::to('/') }}/public/storage/products/@php
                                                    echo $item->images
                                                @endphp">
                                                        <img src="{{ URL::to('/') }}/public/storage/products/@php
                                                        echo $item->images
                                                    @endphp" alt="Product Details" style="max-height:468px; width: 100%"/>
                                                    </figure>
                                                @endforeach
                                            @endif
                                        </div>

                                        <a href="#thumb-gallery" class="btn-large-view btn-gallery-popup">View Larger <i class="fa fa-search-plus"></i></a>
                                    </div>

                                    <div class="product-details-thumbnail-nav">
                                        <figure class="pro-thumb-item">
                                            <img src="{{ URL::to('/') }}/public/storage/products/@php
                                            echo $product->images
                                            @endphp" style="width:100%;max-height:108px;" alt="Product Details" />
                                        </figure>
                                        @if (count($imagesproduct)!=0)
                                            @foreach ($imagesproduct as $item)
                                                <figure class="pro-thumb-item">
                                                    <img src="{{ URL::to('/') }}/public/storage/products/@php
                                                    echo $item->images
                                                @endphp" style="width:100%;max-height:108px;" alt="Product Details" />
                                                </figure>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Thumbnail Area -->

                            <!-- Start Product Info Area -->
                            <div class="col-md-7">
                                <div class="product-details-info-content-wrap">
                                    <div class="prod-details-info-content">
                                        <h2>{{$product->name}}</h2>
                                        <h5 class="price"><strong>Giá:</strong>
                                            @if ($product->sale!=null)
                                            <span class="price-amount"> @php
                                                    echo $product->sale
                                                @endphp VNĐ<br><del> @php
                                                    echo $product->price
                                                @endphp VNĐ</del></span>
                                            @else
                                            <span class="price-amount">@php
                                                    echo $product->price
                                                @endphp VNĐ</span>
                                            @endif
                                        </h5>
                                        @php
                                            $product->description = str_replace( '<p>', '', $product->description );
                                            $product->description = explode('</p>', $product->description);
                                        @endphp
                                        @foreach ($product->description as $description)
                                                <p>@php echo nl2br($description) @endphp</p>
                                        @endforeach
                                        <form action="" method="POST" id="add-cart">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            <div class="product-config">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        @foreach ($attribute_name as $item)
                                                            <tr>
                                                                <th class="config-label" style="text-align: center">{{$item['name']}}</th>
                                                                <td class="config-option">
                                                                    <div class="config-color">
                                                                        @foreach ($attributevalues as $item2)
                                                                            @if ($item2->attribute_id==$item['id'])
                                                                                <input type="radio"
                                                                                name="{{$item['name']}}" checked value="{{$item2->id}}" style="margin-left: 15px;">
                                                                                <label for="size1" style="font-size: large;">{{$item2->value}}</label>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
    
                                            <div class="product-action">
                                                <div class="action-top d-sm-flex">
                                                    <div class="pro-qty mr-3 mb-4 mb-sm-0">
                                                        <label for="quantity" class="sr-only">Quantity</label>
                                                        <input type="text" name="qty" id="quantity" title="Quantity" value="1" min="1"/>
                                                    </div>
                                                    <button type="submit" id="bt-addcart" class="btn btn-bordered">Thêm vào giỏ hàng</button>
                                                </div>
                                                <br>
                                                <p class="text-warning" id="error_quantity"></p>
                                            </div>
                                        </form>

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
                                                            <img src="{{asset('public/frontend/images/extra/author-1.jpg')}}" alt="author" />
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
                                                            <img src="{{asset('public/frontend/images/extra/author-2.jpg')}}" alt="author" />
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
                                                            <img src="{{asset('public/frontend/images/extra/author-1.jpg')}}" alt="author" />
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
                                                            <img src="{{asset('public/frontend/images/extra/author-2.jpg')}}" alt="author" />
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
@section('script')
<script>
    $(document).ready(function(){
        toastr.options = {
            timeOut          : 500, //default timeout,
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#add-cart').on('submit',function(event){
            event.preventDefault();  
            $('#error_quantity').html('');
            if($('#quantity').val()<=0){
                $('#error_quantity').html('Vui lòng chọn số lượng')
            }else{
                $('#bt-addcart').addClass('disabled');
                $.ajax({
                url: "{{route('addcart')}}",
                method:"POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType:"json",
                success:function(data)
                    {  
                        if(data.success)
                        {
                            $('#cart-total').html(data.number);
                            toastr.success("Thêm sản phẩm vào giỏ hàng thành công !");
                            $('#bt-addcart').removeClass('disabled');
                        }
                    }
                });
            }
        });

    });

</script>
@endsection