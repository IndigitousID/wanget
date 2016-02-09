@inject('tag' ,'App\Models\Tag')
<?php 
if(!is_null($filters) && is_array($filters))
{
	foreach ($filters as $key => $value) 
	{
		$tag = call_user_func([$tag, $key], $value);
	}
}
$tag 			= $tag;

if(Input::has('sort'))
{
	$tag 				= $tag->sort(Input::get('sort'));
}
else
{
	$tag 				= $tag->orderby('path', 'asc');
}

$tags					= $tag->with(['articles'])->paginate();
?>
@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row" style="color:white;">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-12">
			<h4><strong>TAGS</strong> <a href="{{route('cms.tags.create')}}"><small style="color:red;">New</small></a></h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center col-md-1"></th>
						<th class="text-center col-md-9">Tag</th>
						<th class="text-center col-md-2">Kontrol</th>
					</tr>
				</thead>
				<tbody>
					@if (count($tags) == 0)
						<tr>
							<td colspan="3" class="text-center">
								Empty
							</td>
						</tr>
					@else
						@foreach ($tags as $key => $value)
							<tr>
								<td class="text-center col-md-1">
									@if ($value['cluster_id'] == 0)
										<i class="fa fa-circle" style="font-size:5px; margin-left:5px;"></i>
									@endif
								</td>
								<td class="col-md-9">
									<p class="text-capitalize">
										@for ($i = 0; $i < substr_count($value['path'],','); $i++)
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										@endfor
										{{$value['name']}}
									</p>
								</td>
								<td class="text-center col-md-2">
									{!! Form::open(['url' => route('cms.tags.destroy', ['id' => $value['id']] ), 'method' => 'DELETE', 'class' => 'form-inline']) !!}
										<button type="submit" class="btn btn-xs btn-danger">Delete</button>
										<a href="{{route('cms.tags.edit', $value['id'])}}" class="btn btn-xs btn-info"> Edit </a>
									{!!Form::close()!!}
								</td>    
							</tr>
						@endforeach 
					@endif
				</tbody>
			</table> 
			{!! $tags->appends(Input::all())->render() !!}
		</div>
	</div><!-- /row -->
@stop

@section('active-Tag')
	active
@stop