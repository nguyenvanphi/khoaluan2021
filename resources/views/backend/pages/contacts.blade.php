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
                            <li class="active">Liên hệ</li>
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
                                <strong class="card-title">Danh sách liên hệ</strong>
                            </div>
                            <div class="card-body">
                                <table id="data_contacts" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created on</th>
                                            <th>Contact status</th>
                                            <th width="18%">Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        <div class="modal" tabindex="-1" role="dialog" id="deletcontact">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xoá liên hệ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <p>Bạn có chắc muốn xoá liên hệ này không ?</p>
                          <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" id="delete_bt" class="btn btn-danger">Xác nhận</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        jQuery('#data_contacts').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
            url: "{{ route('contacts-data.index') }}",
            },
            columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'status',
                name: 'status',
                render: function(data, type, full, meta){
                    if(data == 0){
                        return "<span style='border-radius: 15px; background-color: #f39c12;color: #fff;padding: 5px;border-radius: .25em;'>Đang chờ</span>";
                    }else{
                        return "<span style='border-radius: 15px; background-color: #00a65a;color: #fff;padding: 5px;border-radius: .25em;'>Đã phản hồi</span>"
                    }
                },
                orderable: false
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });
        var cp_id;
        $(document).on('click', '.deletecontact', function(){
            cp_id = $(this).attr('id');
            jQuery('#deletcontact').modal('show');
        });
        $('#delete_bt').click(function(){
            $.ajax({
                url:"/shopthegmen/contact/"+cp_id+"/destroy",
                success:function(data)
                    {
                        jQuery('#deletcontact').modal('hide');
                        if(data.success){
                            toastr.success(data.success);
                        }
                        jQuery('#data_contacts').DataTable().ajax.reload();
                    }
                })
        });
    });
</script>

@endsection

