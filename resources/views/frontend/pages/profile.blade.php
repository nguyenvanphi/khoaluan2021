@extends('frontend.layout.shared')
@section('content')


    <!--== Start Page Content Wrapper ==-->
    <div class="page-content-wrapper" style="margin-top: 50px">
        <div class="about-page-content">
            <div class="container" style="display: flex; justify-content: center;">
                <div class="card" style="width: 75%">
                    <div class="card-header">
                        <strong class="card-title">Thông tin cá nhân</strong>
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <form style="width: 80%" id="addcategory" action="{{url('/addcategoryproduct')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-fields">
                                <div class="form-group" style="text-align: center">
                                    <img style="border-radius: 50%" src="{{('public/frontend/images/admin.jpg')}}" alt="">
                                </div>
                                <div class="form-group">
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input" id="validatedCustomFile" required>
                                        <label class="custom-file-label" for="validatedCustomFile">Chọn ảnh đại diện</label>
                                        {{-- <div class="invalid-feedback">Example invalid custom file feedback</div> --}}
                                    </div>
                                </div>
                                
                                {{-- <div class="form-group">
                                    <label for="images">Ảnh danh mục:</label>
                                    <input type="file" name="images" id="images" class="form-control" style="padding: 0.4%;" placeholder="Chọn ảnh đại diện">
                                    @if ($errors->has('images'))
                                        <p class="help is-danger text-danger">{{ $errors->first('images') }}</p>
                                    @endif
                                </div> --}}
                                <div class="form-group">
                                    <label for="name">Họ Tên: </label>
                                    <input type="text" name="name" id="name" class="form-control" value="Walton Onele" placeholder="Nhập tên danh mục">
                                    @if ($errors->has('name'))
                                        <p class="help is-danger text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Email: </label>
                                    <input type="text" name="name" id="name" value="wonele2@sogou.com" class="form-control" placeholder="Nhập tên danh mục">
                                    @if ($errors->has('name'))
                                        <p class="help is-danger text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Số điện thoại: </label>
                                    <input type="text" name="name" value="5934342548" id="name" class="form-control" placeholder="Nhập tên danh mục">
                                    @if ($errors->has('name'))
                                        <p class="help is-danger text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">Địa chỉ: </label>
                                    <input type="text" name="name" id="name" value="4-900 - Masonry Restoration and Cleaning" class="form-control" placeholder="Nhập tên danh mục">
                                    @if ($errors->has('name'))
                                        <p class="help is-danger text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-action form-group">
                                <input type="submit" value="Cập nhật" class="btn btn-info form-control" id="send_form">
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