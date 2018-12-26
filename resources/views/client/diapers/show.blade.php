<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-3.3.7/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/client_index.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <title></title>
</head>
<body>
<div class="clearfix containers">
    <div><img src="{{asset('img/banner-head.jpg')}}" height="300px" class="clearfix images"></div>
    <div class="clearfix">
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">search</button>
        </form>
    </div>

    <ul class="content clearfix" style="">
        <li><a href="{{ route('client.index') }}">Trang Chủ</a></li>
        <li><a href="http://www.comfort.com.vn/bai-bao/the-loai/1094100/cham-soc-be-yeu">Mẹo chăm sóc trẻ</a></li>

        <li class="dropdown">
            <span style="color: white;">Dannh Mục</span>
            <div class="dropdown-content">
                <div><a href="{{ route('client.diapers') }}">Bỉm</a></div>
                <hr>
                <div><a href="{{ route('client.milk') }}">Sữa</a></div>
                <hr>

                <div><a href="#">Khác</a></div>
            </div>
        </li>

        <li><a href="https://eva.vn/ba-bau/10-bi-quyet-vang-lay-lai-voc-dang-sau-sinh-c85a252486.html">Bí quyết giữ dáng sau sinh</a></li>
        <li><a href="#main-footer">Liên Hệ</a></li>
        <li><a href="#">Đăng Nhập</a></li>
    </ul>

    <div style="padding-left: 10px;padding-right: 10px">
        <div class="clearfix backgroundWhite" style="padding-left: 100px ; padding-top: 20px; padding-bottom: 20px">
            <div class="clearfix">{{$diaper->name}}</div>
            <div class="row clearfix">
                <div class="col-md-4">
                    <img style="max-width: 250px" src="{{asset('storage/' . $diaper->image)}}" alt="">
                </div>
                <div class="col-md-6">
                    <div>{{ $diaper->price }}$</div>
                    <div>{!! $diaper->content !!}</div>
                    <div>{!! $diaper->description !!}</div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <a href="{{ route('client.diaper') }}" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 10px">{{ trans('<< Back') }}</a>

</div>

<footer id="main-footer" class="clearfix">
    <div class="widget">
        <h3>Liên Hệ</h3>
        <ul>
            <li><span class="square-icon"><i class="fa fa-map-marker"></i></span>Address : Số Nhà 1 , Tổ 1 , Phường Lê Hồng Phong , Thành Phố Phủ Lý , Tỉnh Hà Nam</li>
            <li><span class="square-icon"><i class="fa fa-phone"></i></span>Number Phone: 0968.797.169 <br>
                <p>0123.456.789</p></li>
            <li><span class="square-icon"><i class="fa fa-envelope-o"></i></span>Email: nvanhoa2112@gmail.com</li>
        </ul>
    </div>
</footer>
</body>
</html>


