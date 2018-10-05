@extends('admin.dashboad')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <title>User</title>
@endsection
@section('content')
    <div id="page-wrapper">
        <div class="box-body">
            <label for="">Tên Sản Phẩm: </label>
            <div>{{ $products->name }}</div>
            <hr>

            <label for="">Giá: </label>
            <div>{{ $products->price }}</div>
            <hr>

            <label for="">Mô Tả Sản Phẩm: </label>
            <div>{{ $products->description }}</div>
            <hr>

            <label for="">Nội Dung Sản Phẩm: </label>
            <div>{{ $products->content }}</div>
            <hr>

            <label for="">Ảnh Sản Phẩm: </label>
            <div><img style="max-width: 250px" src="{{asset('image/' . $products->image)}}"
                      alt=""></div>
            <hr>

            <label for="">Slug: </label>
            <div>{{ $products->slug }}</div>
            <hr>
        </div>
    </div>
@endsection
@section('footer')
@endsection
