<!DOCTYPE html>
<html class="no-js">
	<head>
		<!-- Basic Page Needs
		================================================== -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="icon" type="image/png" href="images/favicon.png">
		<title>OneGate</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
		<!-- Mobile Specific Metas
		================================================== -->
		<meta name="format-detection" content="telephone=no">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Template CSS Files
		================================================== -->
		<!-- Twitter Bootstrs CSS -->
		{!! HTML::style('onegate/css/bootstrap.min.css') !!}
		<!-- Ionicons Fonts Css -->
		{!! HTML::style('onegate/css/ionicons.min.css') !!}
		<!-- animate css -->
		{!! HTML::style('onegate/css/animate.css') !!}
		<!-- Hero area slider css-->
		{!! HTML::style('onegate/css/slider.css') !!}
		<!-- owl craousel css -->
		{!! HTML::style('onegate/css/owl.carousel.css') !!}
		{!! HTML::style('onegate/css/owl.theme.css') !!}
		{!! HTML::style('onegate/css/jquery.fancybox.css') !!}
		<!-- template main css file -->
		{!! HTML::style('onegate/css/main.css') !!}
		<!-- responsive css -->
		{!! HTML::style('onegate/css/responsive.css') !!}
		
		<!-- Template Javascript Files
		================================================== -->
		<!-- modernizr js -->
		{!! HTML::script('onegate/js/vendor/modernizr-2.6.2.min.js') !!}
		<!-- jquery -->
		{!! HTML::script('onegate///ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') !!}
		<!-- owl carouserl js -->
		{!! HTML::script('onegate/js/owl.carousel.min.js') !!}
		<!-- bootstrap js -->

		{!! HTML::script('onegate/js/bootstrap.min.js') !!}
		<!-- wow js -->
		{!! HTML::script('onegate/js/wow.min.js') !!}
		<!-- slider js -->
		{!! HTML::script('onegate/js/slider.js') !!}
		{!! HTML::script('onegate/js/jquery.fancybox.js') !!}
		<!-- template main js -->
		{!! HTML::script('onegate/js/main.js') !!}
	</head>
	<body>
		@include('onegate.components.topbar')
			@yield('content')
		@include('onegate.components.footer')
	</body>
</html>