@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row" style="color:white;">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-12">
		@if(!is_null($id))
			{!! Form::open(['url' => route('cms.categories.update', ['id' => $id] ), 'method' => 'PATCH']) !!}
		@else
			{!! Form::open(['url' => route('cms.categories.store'), 'method' => 'POST', 'id' => 'register-form', 'class' => 'form']) !!}
		@endif
				<legend>New category</legend>
		
				<div class="body">
			
					<!-- kelompok kategory -->
					<label for="cluster_id">Category's Group</label>
					<br/>
						{!! Form::text('cluster_id', $category['cluster_id'], [
								'class'         => 'select-category input-huge', 
								'tabindex'      => '1', 
								'id'            => 'find_category',
								'placeholder'   => 'Empty',
								'style'         => 'width:100%'
						]) !!}
					<br/>
					<br/>

					<label for="name">Category</label>
						{!! Form::text('name', $category['name'], [
								'class'         => 'input-huge', 
								'required'      => 'required', 
								'tabindex'      => '2',
								'placeholder'   => 'Category'
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

@section('active-category')
	active
@stop

@section('script')
	<script type="text/javascript">
		<!-- preload select2 category -->
		var preload_data_category = [];
		@if($category['cluster_id'] != 0)
			var id                      = {{$category['category']['id']}};
			var text                    = '{{$category['category']['name']}}';
			preload_data_category.push({ id: id, text: text});
		@endif
		<!-- end of preload select2 category -->
	</script>

	<!-- end of preload select2 tag -->	
	@include('cms.plugins.select2', ['section' => 'category'])
@stop