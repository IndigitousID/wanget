<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ONEGATE - Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Carlos Alvarez - Alvarez.is">

		{!! HTML::style('cms/bootstrap/css/bootstrap.min.css') !!}

		{!! HTML::style('cms/css/main.css') !!}
		{!! HTML::style('cms/css/font-style.css') !!}
		{!! HTML::style('cms/css/flexslider.css') !!}

		{!! HTML::script('cms/js/jquery.js') !!}    
		{!! HTML::script('cms/bootstrap/js/bootstrap.min.js') !!}

		{!! HTML::script('cms/js/lineandbars.js') !!}
		
		<!-- NOTY JAVASCRIPT -->
		{!! HTML::script('cms/js/noty/jquery.noty.js') !!}
		{!! HTML::script('cms/js/noty/layouts/top.js') !!}
		{!! HTML::script('cms/js/noty/layouts/topLeft.js') !!}
		{!! HTML::script('cms/js/noty/layouts/topRight.js') !!}
		{!! HTML::script('cms/js/noty/layouts/topCenter.js') !!}
		
		<!-- You can add more layouts if you want -->
		{!! HTML::script('cms/js/noty/themes/default.js') !!}
		<!-- {!! HTML::script('cms/assets/js/dash-noty.js') !!} This is a Noty bubble when you init the theme-->
		{!! HTML::script('http://code.highcharts.com/highcharts.js') !!}
		{!! HTML::script('cms/js/jquery.flexslider.js') !!}

		{!! HTML::script('cms/js/admin.js') !!}
		  
		<style type="text/css">
		  body {
			padding-top: 60px;
		  }
		</style>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  {!! HTML::script('http://html5shim.googlecode.com/svn/trunk/html5.js') !!}
		<![endif]-->
	   

		<!-- Google Fonts call. Font Used Open Sans & Raleway -->
		<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">

		<script type="text/javascript">
			$(document).ready(function () {

				$("#btn-blog-next").click(function () {
					$('#blogCarousel').carousel('next')
				});
				$("#btn-blog-prev").click(function () {
					$('#blogCarousel').carousel('prev')
				});

				$("#btn-client-next").click(function () {
					$('#clientCarousel').carousel('next')
				});
				$("#btn-client-prev").click(function () {
					$('#clientCarousel').carousel('prev')
				});

			});

			$(window).load(function () {

				$('.flexslider').flexslider({
					animation: "slide",
					slideshow: true,
					start: function (slider) {
						$('body').removeClass('loading');
					}
				});
			});

		</script>
	</head>

	<body>
		@include('cms.components.topbar')
		<div class="container">
			@include('cms.components.alert')
			
			@yield('content')
			
			@include('cms.components.footer')
		<div>

		@yield('script')
	</body>
</html>