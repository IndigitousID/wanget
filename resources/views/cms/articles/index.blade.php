@inject('article' ,'App\Models\Article')
<?php 
if(!is_null($filters) && is_array($filters))
{
	foreach ($filters as $key => $value) 
	{
		$article = call_user_func([$article, $key], $value);
	}
}
$article 			= $article;

if(Input::has('sort'))
{
	$article 			= $article->sort(Input::get('sort'));
}
else
{
	$article 			= $article->orderby('published_at', 'desc');
}

$articles 				= $article->with(['user', 'comments', 'statuserviews'])->paginate();
?>
@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row" style="color:white;">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-12">
			<h4><strong>Articles</strong> <a href="{{route('cms.articles.create')}}"><small style="color:red;">New</small></a></h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="col-sm-2">Writer</th>
						<th class="col-sm-4">Title</th>
						<th class="col-sm-2">Published at</th>
						<th class="col-sm-1">Total Views</th>
						<th class="col-sm-1">Total Comments</th>
						<th class="col-sm-2">Kontrol</th>
					</tr>
				</thead>
				<tbody>
					@forelse($articles as $key => $value)
					<tr class="odd">
						<td>{{$value['user']['name']}}</td>
						<td>{{$value['title']}}</td>
						<td>@datetime_indo($value['published_at'])</td>
						<td class="center">@number(count($value['statuserviews']))</td>
						<td class="center">@number(count($value['comments']))</td>
						<td class="center">
							{!! Form::open(['url' => route('cms.articles.destroy', ['id' => $value['id']] ), 'method' => 'DELETE', 'class' => 'form-inline']) !!}
								<button type="submit" class="btn btn-xs btn-danger">Delete</button>
								<!-- <a href="{{route('cms.articles.show', $value['id'])}}" class="btn btn-xs btn-info"> Preview </a> -->
								<a href="{{route('cms.articles.edit', $value['id'])}}" class="btn btn-xs btn-info"> Edit </a>
							{!!Form::close()!!}
						</td>
					</tr>
					@empty
					<tr>
						<td colspan="6" class="text-center"> Empty </td>
					</tr>
					@endforelse
				</tbody>
			</table>
			{!! $articles->appends(Input::all())->render() !!}
		</div>
	</div><!-- /row -->
@stop

@section('active-article')
	active
@stop