@extends('admin.dashboad')
@section('head')

    <title>User</title>
@endsection
@section('content')
    <a href="#create_modal" data-toggle="modal"><button type="button" class="btn btn-default btn-info" ><i class="fa fa-cart-plus"></i> Thêm Mới Người Dùng</button></a>
    <table class="table table-striped table-bordered table-hover" id="example">
        <thead>
        <tr>
            <th>###</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($brands as $brand)
            <tr id="tr-">
                <td>{{$brand->id}}</td>
                <td>{{$brand->name}}</td>
                <td>{{$brand->slug}}</td>
                <td>
                    <a href="javascript:;" onclick="edit({{ $brand->id }})" ><button type="button" class="btn btn-warning">Edit</button></a>
                    <button type="submit" data-id="{{ $brand->id }}" class="btn btn-default btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="modal fade" id="create_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Thêm mới Brand</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST"  role="form" enctype="multipart/form-data" id="formCreate">
                        <h2 style="width: 80%;">Thêm Mới Brand</h2>
                        <hr>
                        <div>
                            <i class="fa fa-table fa-fw"></i><a href="{{ url('dashboard') }}">Dashboard</a> -> <a href="{{ route('brand.index') }}">Brand</a> -> <b>Thêm mới</b>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="createName">
                        </div>
                        @if ($errors->has('name'))
                            <p style="color: red">{{ $errors->first('name') }}</p>
                        @endif

                        <input type="hidden" id="user_id" name="user_id" value="0">

                        <button type="submit" data-dismiss="modal" class="btn btnCreate btn-primary">Tạo</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Cập nhật Category</h4>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" role="form" enctype="multipart/form-data">
                        <h2 style="width: 50%;">Cập Nhật Category</h2>
                        <hr>
                        <div>
                            <i class="fa fa-table fa-fw"></i><a href="{{ url('dashboard') }}">Dashboard</a> -> <a href="{{ route('category.index') }}">Category</a> -> <b>Cập Nhật</b>
                        </div>
                        <hr>
                        <input class="hidden" id="uId" type="text">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="uName">
                        </div>

                        <button type="submit" class="btn save btn-primary">Lưu</button>
                    </form>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready( function () {
            $('#example').DataTable();
        });

        $(document).on('click','.btnCreate',function (event) {
            event.preventDefault();
            var name = $('#createName').val();
            $.ajax({
                url: '{{ route('brand.store') }}',
                type: 'POST',
                dataType: 'json',
                data:{
                    name:name,
                },
                success:function (res) {
                    var data = res.data;
                    toastr.success('Thêm mới thành công !');
                    $('#create_modal').modal('hide');
                    setTimeout(function(){
                        window.location.reload();
                    },1000);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastr.error('Chưa được thêm mới', '',{timeOut: 1000});
                }
            });

        });


        function edit(id){
            $('#edit_modal').modal('show');
            $.ajax({
                url: '{{ route('brand.edit') }}',
                type: 'POST',
                dataType: 'json',
                data: {id:id},
                success:function(res){
                    var datas = res.data;
                    $('#uId').val(datas.id);
                    $('#uName').val(datas.name);
                }
            });
        }

        $(document).on('click', '.save', function(event) {
            event.preventDefault();
            var name = $('#uName').val();
            var id = $('#uId').val();

            $.ajax({
                url: '{{ route('brand.update') }}',
                type: 'POST',
                dataType: 'json',
                data:{
                    id:id,
                    name:name,
                },
                success: function(res){
                    var data = res.data;
                    toastr.success('update thành công !');
                    $('#edit_modal').modal('hide');
                    setTimeout(function(){
                        window.location.reload();
                    },1000);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastr.error('Chưa được update', '',{timeOut: 1000});
                }
            });
        });


        $('.btn-danger').on('click',function(e){
            e.preventDefault();
            var	id = $(this).data('id');
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    // closeOnConfirm: true,
                    // closeOnCancel: true
                },
                function(){
                    $.ajax({
                        url: 'brand/'+id,
                        type: 'delete',
                        data: {id: 'id'},
                        success:function(data){
                            toastr.success('Xóa Thành Công','',{timeOut: 1000});
                            $('#tr-'+id).remove();
                            setTimeout(function(){
                                window.location.reload();
                            },1000);
                        }
                    });
                });
        });




    </script>

@endsection