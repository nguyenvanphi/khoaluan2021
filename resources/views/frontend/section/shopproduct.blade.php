<!--== Start Page Content Wrapper ==-->
<div class="page-content-wrapper sp-y">
    <div class="shop-page-action-bar mb-30">
        <div class="container container-wide">
            <div class="action-bar-inner">
                <div class="row align-items-center">
                    {{-- <div class="col-sm-2">
                        <div class="shop-layout-switcher mb-15 mb-sm-0">
                            <ul class="layout-switcher nav">
                                <li data-layout="grid" class="active"><i class="fa fa-th"></i></li>
                                <li data-layout="list"><i class="fa fa-th-list"></i></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="col-sm-6">
                        <style>
                            .form-control:focus{
                                border-color: unset;
                                box-shadow: unset;
                            }
                        </style>
                        <form class="search-form" style="max-width: 300px; height: 40px;">
                            <input class="form-control mr-sm-2" type="text" placeholder="Tìm kiếm sản phẩm" aria-label="Search" style="border-radius: unset;">
                            <button class="search-trigger" style="position: absolute;top: 7px;left: 50%;"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="sort-by-wrapper">
                            <label for="sort" class="sr-only">Sắp xếp</label>
                            <select name="sort" id="sort">
                                <option value="sbp">Sắp xếp theo tên A-Z</option>
                                <option value="sbn">Sắp xếp theo tên Z-A</option>
                                <option value="sbt">Sắp xếp theo giá tăng dần</option>
                                <option value="sbr">Sắp xếp theo giá giảm dần</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    @include('frontend.component.product')

    <div class="shop-page-action-bar mt-30">
        <div class="container container-wide">
            <div class="action-bar-inner">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <nav class="pagination-wrap mb-10 mb-sm-0">
                            <ul class="pagination">
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#"><i class="ion-ios-arrow-thin-right"></i></a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="col-sm-6 text-center text-sm-right">
                        <p>Showing 1–8 of 20 results</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Content Wrapper ==-->