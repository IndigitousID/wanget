@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row" style="color:white;">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-12">
		@if(!is_null($id))
			{!! Form::open(['url' => route('cms.tags.update', ['id' => $id] ), 'method' => 'PATCH']) !!}
		@else
			{!! Form::open(['url' => route('cms.tags.store'), 'method' => 'POST', 'id' => 'register-form', 'class' => 'form']) !!}
		@endif
				<legend>New Tag</legend>
		
				<div class="body">
			
					<!-- kelompok kategory -->
					<label for="cluster_id">Tag's Group</label>
					<br/>
						{!! Form::text('cluster_id', $tag['cluster_id'], [
								'class'         => 'select-tag input-huge', 
								'tabindex'      => '1', 
								'id'            => 'find_Tag',
								'placeholder'   => 'Empty',
								'style'         => 'width:100%'
						]) !!}

					<label for="name">Tag</label>
						{!! Form::text('name', $tag['name'], [
								'class'         => 'input-huge', 
								'required'      => 'required', 
								'tabindex'      => '2',
								'placeholder'   => 'Tag'
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

@section('active-Tag')
	active
@stop

@section('script')
	<script type="text/javascript">
		<!-- preload select2 Tag -->
		var preload_data_Tag = [];
		@if($tag['cluster_id'] != 0)
			var id                      = {{$tag['tag']['id']}};
			var text                    = '{{$tag['tag']['name']}}';
			preload_data_Tag.push({ id: id, text: text});
		@endif
		<!-- end of preload select2 Tag -->
	</script>

	<!-- end of preload select2 tag -->	
	@include('cms.plugins.select2', ['section' => 'tag'])
@stop