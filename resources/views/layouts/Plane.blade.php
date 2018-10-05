


<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>VHSHOP</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- Latest compiled and minified CSS & JS -->

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
	
	<link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
	<link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
	<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
	<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/sweetalert.min.js') }}"></script>
	<script src="{{ asset('js/toastr.min.js') }}"></script>
	<script src="{{ asset('js/toastr.js') }}"></script>

	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script> 
	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
	<script>
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	</script>
</head>
<body>
	@php
		// session_start();
	@endphp
	@yield('body')
	{{-- <script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script> --}}
</body>
</html>