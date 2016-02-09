@inject('article' ,'App\Models\Article')

<?php 

$article 			= $article->published('now');

$article 			= $article->orderby('published_at', 'desc');

$articles			= $article->with(['user'])->take(3)->get();
?>

@extends('onegate.layout')
@section('content')
<!--
==================================================
Slider Section Start
================================================== -->
	<section id="hero-area" >
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="block wow fadeInUp" data-wow-delay=".3s">
					
						<!-- Slider -->
						<section class="cd-intro">
							<h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >
								<span>HELLO, WE ARE ONE GATE</span><br>
								<span class="cd-words-wrapper">
									<b class="is-visible">ARTICLES BARN</b>
									<b>DEVELOPER</b>
									<b>STRATEGIST</b>
								</span>
							</h1>
						</section> <!-- cd-intro -->
						<!-- /.slider -->
						<h2 class="wow fadeInUp animated" data-wow-delay=".6s" >
							Ona Gate for all articles. This site showcases some of our articles.
						</h2>
						<a class="btn-lines dark light wow fadeInUp animated smooth-scroll btn btn-default btn-green" data-wow-delay=".9s" href="#blogs" data-section="#blogs" >View Articles</a>
						
					</div>
				</div>
			</div>
		</div>
	</section><!--/#main-slider-->
	<!--
	==================================================
	Slider Section Start
	================================================== -->
	<section id="about">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
						<h2>
						ABOUT US
						</h2>
						<p>
							Hello, we're portal/blog web from Indonesia. We provides pure and natural articles about daily life that questioning by people. And we are here to help you in daily life!
						</p>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, adipisci voluptatum repudiandae, natus impedit repellat aut officia illum at assumenda iusto reiciendis placeat. Temporibus, vero.
						</p>
					</div>
					
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
						<img src="images/about/about.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</section> <!-- /#about -->
	<!--
	==================================================
	Portfolio Section Start
	================================================== -->
	<section id="blogs" class="works">
		<div class="container">
			<div class="section-heading">
				<h1 class="title wow fadeInDown" data-wow-delay=".3s">Latest Articles</h1>
				<p class="wow fadeInDown" data-wow-delay=".5s">
					Aliquam lobortis. Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Nulla sit amet est. Aenean posuere <br> tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus.
				</p>
			</div>
			<div class="row">
				@foreach($articles as $key => $value)
				<div class="col-sm-4 col-xs-12">
					<figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
						<div class="img-wrapper">
							<img src="{{$value['thumbnail']}}" class="img-responsive" alt="this is a title" >
							<div class="overlay">
								<div class="buttons">
									<a rel="gallery" class="fancybox" href="{{$value['thumbnail']}}">Image</a>
									<a target="_blank" href="{{route('onegate.blogs.show', $value['slug'])}}">Read More</a>
								</div>
							</div>
						</div>
						<figcaption>
						<h4>
						<a href="{{route('onegate.blogs.show', $value['slug'])}}">
							{{$value['title']}}
						</a>
						</h4>
						<p>
							{!!$value['summary']!!}
						</p>
						</figcaption>
					</figure>
				</div>
				@endforeach
			</div>
		</div>
	</section> <!-- #works -->
	<!--
	==================================================
	Portfolio Section Start
	================================================== -->
<!-- 	<section id="feature">
		<div class="container">
			<div class="section-heading">
				<h1 class="title wow fadeInDown" data-wow-delay=".3s">Offer From Me</h1>
				<p class="wow fadeInDown" data-wow-delay=".5s">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed,<br> quasi dolores numquam dolor vero ex, tempora commodi repellendus quod laborum.
				</p>
			</div>
			<div class="row">
				<div class="col-md-4 col-lg-4 col-xs-12">
					<div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
						<div class="media-left">
							<div class="icon">
								<i class="ion-ios-flask-outline"></i>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">Media heading</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xs-12">
					<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
						<div class="media-left">
							<div class="icon">
								<i class="ion-ios-lightbulb-outline"></i>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">Well documented.</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xs-12">
					<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
						<div class="media-left">
							<div class="icon">
								<i class="ion-ios-lightbulb-outline"></i>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">Well documented.</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xs-12">
					<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1200ms">
						<div class="media-left">
							<div class="icon">
								<i class="ion-ios-americanfootball-outline"></i>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">Free updates</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xs-12">
					<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1500ms">
						<div class="media-left">
							<div class="icon">
								<i class="ion-ios-keypad-outline"></i>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">Solid Support</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-lg-4 col-xs-12">
					<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1800ms">
						<div class="media-left">
							<div class="icon">
								<i class="ion-ios-barcode-outline"></i>
							</div>
						</div>
						<div class="media-body">
							<h4 class="media-heading">Simple Installation</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --> <!-- /#feature -->
@stop