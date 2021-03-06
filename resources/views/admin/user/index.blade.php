@extends('admin.dashboad')
@section('head')

    <title>User</title>
    @endsection
    @section('content')
        <a href="#create_modal" data-toggle="modal"><button type="button" class="btn btn-default btn-info" ><i class="fa fa-cart-plus"></i> Thêm Mới Người Dùng</button></a>
        <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr>
                    <th>
                    <a href="{{ route('users.index') }}/?sort=id&order={{ $order }}">#
                        <i class="fa fa-sort"></i></a></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                    <tr id="tr-">
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            <a href="javascript:;" onclick="edit({{ $user->id }})" ><button type="button" class="btn btn-warning">Edit</button></a>
                            <button type="submit" data-id="{{ $user->id }}" class="btn btn-default btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->appends(Request::except('page'))->links() }}

        <div class="modal fade" id="create_modal">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">Thêm mới nguời dùng</h4>
                 </div>
                 <div class="modal-body">
                     <form action="" method="POST"  role="form" enctype="multipart/form-data" id="formCreate">
                         <h2 style="width: 80%;">Thêm Mới Người Dùng</h2>
                         <hr>
                         <div>
                             <i class="fa fa-table fa-fw"></i><a href="{{ url('dashboard') }}">Dashboard</a> -> <a href="{{ route('users.index') }}">User</a> -> <b>Thêm mới</b>
                         </div>
                         <hr>
                         <div class="form-group">
                             <label for="">Tên</label>
                             <input type="text" class="form-control" id="Createname" placeholder="Tên Người Dùng" required>
                         </div>
                         @if ($errors->has('name'))
                             <p style="color: red">{{ $errors->first('name') }}</p>
                         @endif

                         <div class="form-group">
                             <label for="">Email</label>
                             <input type="text" class="form-control" id="Createemail" placeholder="Email">
                         </div>

                         @if($errors->has('email'))
                             <p style="color: red">{{ $errors->first('email') }}</p>
                         @endif

                         <div class="form-group">
                             <label for="">Password</label>
                             <input type="password" class="form-control" id="Createpassword" placeholder="password">
                         </div>
                         @if($errors->has('password'))
                             <p style="color: red">{{ $errors->first('password') }}</p>
                         @endif

                         <div class="form-group">
                             <label for="">Phone</label>
                             <input type="number" class="form-control" min="1" id="Createphone" placeholder="Số Điện Thoại">
                         </div>
                         @if ($errors->has('phone'))
                             <p style="color: red">{{ $errors->first('phone') }}</p>
                         @endif

                         <div class="form-group">
                             <label for="">Địa Chỉ</label>
                             <input type="text" class="form-control" id="Createaddress" placeholder="Địa Chỉ">
                         </div>
                         @if ($errors->has('address'))
                             <p style="color: red">{{ $errors->first('address') }}</p>
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
                     <h4 class="modal-title">Cập nhật nguời dùng</h4>
                 </div>
                 <div class="modal-body">
                     <form action="" method="POST" role="form" enctype="multipart/form-data">
                         <h2 style="width: 50%;">Cập Nhật Người Dùng</h2>
                         <hr>
                         <div>
                             <i class="fa fa-table fa-fw"></i><a href="{{ url('dashboard') }}">Dashboard</a> -> <a href="{{ route('users.index') }}">User</a> -> <b>Cập Nhật</b>
                         </div>
                         <hr>
                         <input class="hidden" id="uId" type="text">
                         <div class="form-group">
                             <label for="">Tên</label>
                             <input type="text" class="form-control" id="uName" placeholder="Tên Người Dùng">
                         </div>

                         <div class="form-group">
                             <label for="">Email</label>
                             <input type="text" class="form-control" id="uEmail" placeholder="Email">
                         </div>

                         {{--<div class="form-group">--}}
                             {{--<label for="">Password</label>--}}
                             {{--<input type="password" class="form-control" id="uPassword" placeholder="password">--}}
                         {{--</div>--}}

                         <div class="form-group">
                             <label for="">Địa Chỉ</label>
                             <input type="text" class="form-control" id="uAddress" placeholder="Địa Chỉ">
                         </div>

                         <div class="form-group">
                             <label for="">Phone</label>
                             <input type="number" min="1" class="form-control" id="uPhone" placeholder="Phone">
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
    {{--<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>--}}

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('click' , '.btnCreate', function(event) {
            event.preventDefault();

            var name = $('#Createname').val();
            var email = $('#Createemail').val();
            var address = $('#Createaddress').val();
            var phone = $('#Createphone').val();
            var password = $('#Createpassword').val();
            $.ajax({
                url: '{{ route('users.store') }}',
                type: 'POST',
                dataType: 'json',
                data:{
                    name:name,
                    email:email,
                    password:password,
                    address:address,
                    phone:phone,
                },
                success: function(res){
                    console.log(data);
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
                url: '{{ route('users.edit') }}',
                type: 'POST',
                dataType: 'json',
                data: {id:id},
                success:function(res){
                    var datas = res.data;
                    $('#uId').val(datas.id);
                    $('#uName').val(datas.name);
                    $('#uEmail').val(datas.email);
                    // $('#uPassword').val(datas.password);
                    $('#uAddress').val(datas.address);
                    $('#uPhone').val(datas.phone);
                }
            });
        }

        $(document).on('click', '.save', function(event) {
            event.preventDefault();
            var name = $('#uName').val();
            var email = $('#uEmail').val();
            var password = $('#uPassword').val();
            var address = $('#uAddress').val();
            var id = $('#uId').val();
            var phone = $('#uPhone').val();
            $.ajax({
                url: '{{ route('users.update') }}',
                type: 'POST',
                dataType: 'json',
                data:{
                    id:id,
                    name:name,
                    email:email,
                    address:address,
                    password:password,
                    phone:phone,
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
                        url: 'user/'+id,
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