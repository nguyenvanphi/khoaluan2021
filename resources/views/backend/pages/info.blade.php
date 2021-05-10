@extends('backend.layout.admin')
@section('content')

        <div class="breadcrumbs">
            {{-- <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div> --}}
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            {{-- <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li> --}}
                            <li class="active">Thông tin Website</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Cập nhật thông tin</strong>
                            </div>
                            <div class="card-body d-flex justify-content-center">
                                <form id="addcategory" action="{{url('/addcategoryproduct')}}" method="POST" enctype="multipart/form-data" style="width: 50%;">
                                    {{ csrf_field() }}
                                    <div class="form-fields">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Tên đơn vị:</label>
                                            <div class="col-sm-9">
                                                <input disabled type="text" class="form-control" name="name" id="name" value="The Gmen">
                                                <span class="help is-danger text-danger" id="error_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Đại diện:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="name" id="name" value="Nguyễn Văn Phi">
                                                <span class="help is-danger text-danger" id="error_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Email:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="name" id="name" value="gmenshop@gmail.com">
                                                <span class="help is-danger text-danger" id="error_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Số điện thoại:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="name" id="name" value="0395745039">
                                                <span class="help is-danger text-danger" id="error_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Địa chỉ:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="name" id="name" value="95 Mai Thúc Loan, Thành phố Huế">
                                                <span class="help is-danger text-danger" id="error_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Facebook:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="name" id="name" value="https://www.facebook.com/Thegmenstore/">
                                                <span class="help is-danger text-danger" id="error_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Youtube:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="name" id="name" value="https://www.youtube.com/channel/UC08RVXMZgiLs3IaV5wj-yIg">
                                                <span class="help is-danger text-danger" id="error_name"></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-3 col-form-label">Instargram:</label>
                                            <div class="col-sm-9">
                                                <input  type="text" class="form-control" name="name" id="name" value="https://www.instagram.com/the_gmen_store/">
                                                <span class="help is-danger text-danger" id="error_name"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-action form-group">
                                            <input type="submit" value="Cập nhật" class="btn btn-success form-control" id="send_form">
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
@endsection

