@inject('article' ,'App\Models\Article')
@inject('category' ,'App\Models\Category')
@inject('tag' ,'App\Models\Tag')

<?php 
if(!is_null($filters) && is_array($filters))
{
	foreach ($filters as $key => $value) 
	{
		$article = call_user_func([$article, $key], $value);
	}
}
$article 			= $article->published('now');

if(Input::has('sort'))
{
	$article 			= $article->sort(Input::get('sort'));
}
else
{
	$article 			= $article->orderby('published_at', 'desc');
}

$articles 				= $article->with(['user'])->paginate(5);

$categories				= $category->get();
$tags 					= $tag->get();
?>

@extends('onegate.layout')
@section('content')
	<section class="global-page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<h2>Blog</h2>
						<ol class="breadcrumb">
							<li>
								<a href="{{route('onegate.home.index')}}">
									<i class="ion-ios-home"></i>
									Home
								</a>
							</li>
							<li class="active">Blog</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#Page header-->
	<section id="blog-full-width">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					@foreach($articles as $key => $article)
						<article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
							<div class="blog-post-image">
								<a href="{{route('onegate.blogs.show', $article['slug'])}}"><img class="img-responsive" src="{{$article['thumbnail']}}" alt="" /></a>
							</div>
							<div class="blog-content">
								<h2 class="blogpost-title">
								<a href="post-fullwidth.html">{{$article['title']}}</a>
								</h2>
								<div class="blog-meta">
									<span>{{$article['published_at']->format('M d, Y')}}</span>
									<span>by <a href="{{route('onegate.blogs.index', ['author' => $article['user']['name']])}}">{{$article['user']['name']}}</a></span>
									@foreach($article['tags'] as $tag)
										<span><a href="{{route('onegate.blogs.index', ['tag' => $tag['slug']])}}">{{$tag['name']}}</a></span>
									@endforeach
								</div>
								<p>{!!$article['summary']!!}
								</p>
								<a href="{{route('onegate.blogs.show', $article['slug'])}}" class="btn btn-default btn-details">Continue Reading</a>
							</div>
						</article>
					@endforeach
					<div class="row">
						<div class="col-md-12 text-left">
							<!-- {!! $articles->appends(Input::all())->render() !!} -->
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="sidebar">
						<div class="search widget">
							<form action="{{route('onegate.blogs.index')}}" method="get" class="searchform" role="search">
								<div class="input-group">
									<input type="text" name="q" class="form-control" placeholder="Search for...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="ion-search"></i> </button>
									</span>
								</div><!-- /input-group -->
							</form>
						</div>
						<div class="categories widget">
							<h3 class="widget-head">Categories</h3>
							<ul>
								@foreach($categories as $category)
									<li>
										<a href="{{route('onegate.blogs.index', ['category' => $category['slug']])}}">{{$category['name']}}</a> <span class="badge">@number(count($category['articles']))</span>
									</li>
								@endforeach
							</ul>
						</div>
							
						<div class="categories widget">
							<h3 class="widget-head">Tags</h3>
							<ul>
								@foreach($tags as $tag)
									<li>
										<a href="{{route('onegate.blogs.index', ['tag' => $tag['slug']])}}">{{$tag['name']}}</a> <span class="badge">@number(count($tag['articles']))</span>
									</li>
								@endforeach
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</section>
@stop

@section('active-blog')
	active
@stop