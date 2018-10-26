@extends('admin.dashboad')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <title>User</title>
@endsection
@section('content')
    <a href="{{route('products.create')}}"><button type="button" class="btn btn-default btn-info" ><i class="fa fa-cart-plus"></i> Thêm Mới Người Dùng</button></a>
    <table class="table table-striped table-bordered table-hover" id="example">
        <thead>
            <tr>
                <th>###</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Content</th>
                <th>Description</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $product)
                <tr id="tr-">
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td> <img style="max-width: 250px" src="{{asset('storage/' . $product->image)}}"
                              alt=""></td>
                    <td>{{ str_limit( $product->content ,$word = 70 , $end = "..." )}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->slug}}</td>
                    <td>
                        <a href="{{route('products.show',$product->id)}}"><button type="submit" class="btn btn-info">Show</button></a>
                        <a href="{{route('products.edit',$product->id)}}"><button type="button" class="btn btn-warning">Edit</button></a>
                        <button type="submit" data-id="{{ $product->id }}" class="btn btn-default btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
                    url: 'product/'+id,
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