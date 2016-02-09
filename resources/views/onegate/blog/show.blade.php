@extends('onegate.layout')
@section('content')
	<!--
	==================================================
	Global Page Section Start
	================================================== -->
	<section class="global-page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2>{{ucwords($article['title'])}}</h2>
						<div class="portfolio-meta">
							<span>{{$article['published_at']->format('M d, Y')}}</span>
							<span> Categories: @foreach($article['categories'] as $category)<a href="{{route('onegate.blogs.index', ['category' => $category['slug']])}}">{{$category['name']}}</a>,@endforeach</span>
							<span> Tags: @foreach($article['tags'] as $tag)<a href="{{route('onegate.blogs.index', ['tag' => $tag['slug']])}}">{{$tag['name']}}</a>,@endforeach</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#Page header-->
	<section class="single-post">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="post-img">
						<img class="img-responsive" alt="" src="{{$article['thumbnail']}}">
					</div>
					<div class="post-content">
						{!! $article['content'] !!}
					</div>
					<ul class="social-share">
						<h4>Share this article</h4>
						<li>
							<a href="#" class="Facebook">
								<i class="ion-social-facebook"></i>
							</a>
						</li>
						<li>
							<a href="#" class="Twitter">
								<i class="ion-social-twitter"></i>
							</a>
						</li>
						<li>
							<a href="#" class="Linkedin">
								<i class="ion-social-linkedin"></i>
							</a>
						</li>
						<li>
							<a href="#" class="Google Plus">
								<i class="ion-social-googleplus"></i>
							</a>
						</li>
						
					</ul>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="comments">
						@foreach($article['comments'] as $comment)
						<div class="media">
							<a href="" class="pull-left">
								<img alt="" src="images/avater-2.jpg" class="media-object">
							</a>
							<div class="media-body">
								<h4 class="media-heading">
									{{$comment['user']['name']}}
								</h4>
								<p class="text-muted">
									{{$comment['created_at']->format('M d, Y')}}
								</p>
								<p>
									{!!$comment['content']!!}
								</p>
								<!-- <a href="">Reply</a> -->
							</div>
						</div>
						@endforeach
					</div>
					<div class="post-comment">
						<h3>Leave a Reply</h3>
						<form role="form" class="form-horizontal" method="post" action="{{route('onegate.comments.store', $article['slug'])}}">
							<div class="form-group">
								<div class="col-lg-6">
									<input type="text" name="name" class="col-lg-12 form-control" placeholder="Name">
								</div>
								<div class="col-lg-6">
									<input type="text" name="email" class="col-lg-12 form-control" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<textarea name="message" class=" form-control" rows="8" placeholder="Message"></textarea>
								</div>
							</div>
							<p>
							</p>
							<p>
								<button class="btn btn-send" type="submit">Comment</button>
							</p>
							
							<p></p>
						</form>
					</div>
					
				</div>
			</div>
		</div>
	</section>

@stop

@section('active-blog')
	active
@stop