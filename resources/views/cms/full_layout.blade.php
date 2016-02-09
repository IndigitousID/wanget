<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>ONEGATE - Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Carlos Alvarez - Alvarez.is">

		{!! HTML::style('cms/bootstrap/css/bootstrap.min.css') !!}
		{!! HTML::style('cms/css/login.css') !!}

		{!! HTML::script('cms/js/jquery.js') !!}    
		{!! HTML::script('cms/bootstrap/js/bootstrap.min.js') !!}

		<style type="text/css">
			body 
			{
				padding-top: 30px;
			}

			pbfooter 
			{
				position:relative;
			}
		</style>

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
   
		<!-- Google Fonts call. Font Used Open Sans & Raleway -->
		<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
		<style>

			.pbfooter {
				position:relative;
			}

		</style>
	</head>

	<body style="background:url('images/bg.jpg') no-repeat center center; height:700px;">
		<div class="container">
			@yield('content')
		</div>

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		{!! HTML::script('cms/js/bootstrap.min.js') !!}
  
	</body>
</html>