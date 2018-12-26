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
            @if(!\Illuminate\Support\Facades\Auth::user())
			    <li><a href="admin">Đăng Nhập</a></li>
            @else
                <li class="dropdown">
                    <span style="color: white;">Welcome: {{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                    <div class="dropdown-content">

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Đăng xuất
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @endif
        </ul>

		<div class="navLeft">
			<div class="col-md-4">
				<div class="clearfix backgroundWhite DadmarginLeft">
					<div class="barTitle2">Hàng Sữa</div>
					<div><a href="">Sữa Tươi</a></div>
					<div><a href="">Sữa Bột</a></div>
					<div><a href="">Sữa Trẻ Em</a></div>
					<div><a href="">Sữa Người Già</a></div>
					<div><a href="">Sữa Cho Người Gầy</a></div>
					<div><a href="">Sữa Cho Người Béo</a></div>
					<div><a href="">Sữa Nan</a></div>
					<div><a href="">Sữa Dulux</a></div>
					<div><a href="">Sữa Grow</a></div>
					<div><a href="">Sữa Vinamilk</a></div>
				</div>
				<br>
				<div class="clearfix backgroundWhite DadmarginLeft">
					<div class="barTitle2">Hàng Bỉm</div>
					<div><a href="">Bỉm Huggi</a></div>
					<div><a href="">Bỉm Boby</a></div>
					<div><a href="">Bỉm Trẻ Em</a></div>
					<div><a href="">Bỉm Cho người Già</a></div>
				</div>
			</div>

			<div style="" class="col-md-8">
				<div class="clearfix backgroundWhite">
					<div class="barTitle">Giao Hàng Tận Nhà</div>
					<div class="contentTitle">GIAO SỮA BỈM TẬN NHÀ - DỊCH VỤ MIỄN PHÍ</div>
					<b>Thuận tiện hơn bao giờ hết! Tiết kiệm thời gian mua sắm - Giành khoản thời gian ấy cho gia đình và công việc khác quan trọng hơn! Dịch vụ giao hàng nhiệt tình và chuyên nghiệp! </b>
					<div class="col-md-6"><img src="{{asset('img/Chung_nhan.png')}}" class="images"></div>
					<div class="col-md-6 textRed">Check  giá  sản phẩm trên web THEGIOISUABIM.COM& GỌI 096.2112.636 - Sản phẩm tới tay bạn nhanh nhất<<< Thông tin về chúng tôi tại Bộ Công Thương
					<p>HOTLINE: 09.621.126.36</p>
					</div>
				</div>

				<div class="clearfix backgroundWhite">
					<div class="barTitle">Sữa
					</div>
					<div class="col-md-6"><a href="{{route('client.milk')}}"><img src="{{asset('img/sua.jpg')}}" class="images"></a></div>
					<div>sữa bột grow plus đỏ 900g nutifoodHàng công ty chính hãng.date mớiSỬ DỤNG CHO TRẺ 1-10 TUỔI.Với công thức Weight Pro+ giàu dinh dưỡng, đầy đủ hàm lượng đạm, béo cần thiết giúp trẻ tăng cân, tăng chiều cao tốt; sự hiện diện MCT - chất béo chuyển hóa nhanh giúp trẻ dễ tiêu hóa, dễ hấp thu; việc bổ sung Lysin, Kẽm, FOS/Inulin, Vitamin nhóm B giúp trẻ thèm ăn, ăn ngon hơn; đồng thời tăng cường khả năng bảo vệ cơ thể, phòng tránh bệnh tật với Selen, Vitamin A-C-E; GrowPLUS+ còn giúp phát triển trí não thông qua việc bổ sung DHA, AA, Taurin, Cholin, trẻ sẽ thông minh, lanh lợi hơn, giúp bắt kịp đà phát triển về chiều cao và cân nặng, mà còn phát triển toàn diện cả về thể trạng và trí thông minh.</div>
					<div><a href="{{route('client.milk')}}">Xem Thêm Nhiều Sữa >></a></div>
				</div>

				<div class="clearfix backgroundWhite" style="padding-bottom: 30px">
					<div class="barTitle" style="">Bỉm
					</div>
					<div class="col-md-6"><a href="{{route('client.diapers')}}"><img src="{{asset('img/bim.jpg')}}" class="images"></a></div>
					<div>Tã-bỉm quần cho bé gái Moonyman được làm từ chất liệu vải mới siêu mềm mại cùng thun hông nguyên vòng co giãn theo từng chuyển động của bé, cho bé cảm giác thoải mái, dễ chịu.
					• ​Bề mặt tã siêu mềm mịn, thân thiện với làn da nhạy cảm của bé
					• Có chỉ thị ướt giúp mẹ biết được thời điểm cần thay tã (khi tã đầy, dải băng chỉ thị sẽ chuyển hoàn toàn sang màu xanh đậm, đó là thời điểm cần thay tã)
					• Có dải băng dính cuốn miếng tã sau sử dụng, giúp mẹ vứt bỏ miếng tã sau sử dụng một cách sạch sẽ và tiện lợi
					• Thiết kế ngộ nghĩnh với hình gấu Pooh xinh xắn đầy màu sắc</div>
					<div><a href="">Xem Thêm Nhiều Bỉm >></a></div>
				</div>
            </div>
		</div>
	</div>

	<footer id="main-footer" class="clearfix">
		<div class="widget">
			<h3>Liên Hệ</h3>
			<ul>
				<div><span class="square-icon"><i class="fa fa-map-marker"></i></span>Address : Số Nhà 1 , Tổ 1 , Phường Lê Hồng Phong , Thành Phố Phủ Lý , Tỉnh Hà Nam</div>
				<div><span class="square-icon"><i class="fa fa-phone"></i></span>Number Phone: 0968.797.169 <br>
				<p>0123.456.789</p></div>
				<div><span class="square-icon"><i class="fa fa-envelope-o"></i></span>Email: nvanhoa2112@gmail.com</div>
			</ul>
		</div>
	</footer>
</body>
</html>