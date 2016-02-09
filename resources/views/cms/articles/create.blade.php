@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row" style="color:white;">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-12">
		@if(!is_null($id))
			{!! Form::open(['url' => route('cms.articles.update', ['id' => $id] ), 'method' => 'PATCH']) !!}
		@else
			{!! Form::open(['url' => route('cms.articles.store'), 'method' => 'POST', 'id' => 'register-form', 'class' => 'form']) !!}
		@endif
				<legend>New Article</legend>
		
				<div class="body">
			
					<!-- title -->
					<label for="title">Title</label>
						{!! Form::text('title', $article['title'], [
									'class'         => 'input-huge', 
									'tabindex'      => '1', 
									'placeholder'   => 'entry title'
						]) !!}

					<label for="published_at">Published date</label>
						{!! Form::text('published_at', $article['published_at'], [
									'class'         => 'input-huge', 
									'tabindex'      => '2', 
									'placeholder'   => 'mm-dd-yyyy'
						]) !!}

					<label for="summary">Summary</label>
						{!! Form::textarea('summary', $article['summary'], [
									'class'         => 'summernote input-huge', 
									'placeholder'   => 'summary goes here',
									'rows'          => '1',
									'tabindex'      => '3',
									'style'         => 'resize:none;',
						]) !!}

					<label for="content">Content</label>
						{!! Form::textarea('content', $article['content'], [
									'class'         => 'summernote input-huge', 
									'placeholder'   => 'content goes here',
									'rows'          => '1',
									'tabindex'      => '3',
									'style'         => 'resize:none;',
						]) !!}

					<label for="category">Categories</label>
						{!! Form::text('category', null, [
									'class'         => 'select-category input-huge', 
									'tabindex'      => '4',
									'id'            => 'find_category',
									'style'         => 'width:100%'
						]) !!}
					<br/>
					<label for="tag">Tags</label>
					{!! Form::text('tag', null, [
									'class'         => 'select-tag input-huge', 
									'tabindex'      => '5',
									'id'            => 'find_tag',
									'style'         => 'width:100%'
					]) !!}
					<br/>

					<label for="thumbnail">Thumbnail</label>
						{!! Form::text('thumbnail', $article['thumbnail'], [
									'class'         => 'input-huge', 
									'tabindex'      => '6', 
									'placeholder'   => 'entry thumbnail'
						]) !!}
				</div>
				<div class="clearfix">&nbsp;</div>
				<div class="footer text-right">
					<button type="submit" class="btn btn-success">Save</button>
				</div>
			{!!Form::close()!!}
		</div>
	</div><!-- /row -->
	<div class="clearfix">&nbsp;</div>
@stop

@section('active-article')
	active
@stop

@section('script')
	<script type="text/javascript">
		<!-- preload select2 category -->
		var preload_data_category = [];
		@foreach($article['categories'] as $category)
			var id                      = {{$category['id']}};
			var text                    = '{{$category['name']}}';
			preload_data_category.push({ id: id, text: text});
		@endforeach
		<!-- end of preload select2 category -->

		<!-- preload select2 tag -->
		var preload_data_tag = [];
		@foreach($article['tags'] as $tag)
			var id                      = {{$tag['id']}};
			var text                    = '{{$tag['slug']}}';
			preload_data_tag.push({ id: id, text: text});    
		@endforeach
	</script>

	<!-- end of preload select2 tag -->	
	@include('cms.plugins.select2', ['section' => 'category'])
	@include('cms.plugins.select2', ['section' => 'tag'])

	@include('cms.plugins.summernote')
	@include('cms.plugins.inputmask')
@stop