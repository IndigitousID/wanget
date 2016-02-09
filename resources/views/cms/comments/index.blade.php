@inject('comment' ,'App\Models\Comment')
<?php 
if(!is_null($filters) && is_array($filters))
{
	foreach ($filters as $key => $value) 
	{
		$comment = call_user_func([$comment, $key], $value);
	}
}
$comment 			= $comment;

if(Input::has('sort'))
{
	$comment 			= $comment->sort(Input::get('sort'));
}
else
{
	$comment 			= $comment->orderby('created_at', 'desc');
}

$comments				= $comment->with(['user'])->withTrashed()->paginate();
?>
@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row" style="color:white;">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-12">
			<h4><strong>COMMENTS</strong></h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center col-md-2">User</th>
						<th class="text-center col-md-9">Comment</th>
						<th class="text-center col-md-1">Kontrol</th>
					</tr>
				</thead>
				<tbody>
					@if (count($comments) == 0)
						<tr>
							<td colspan="3" class="text-center">
								Empty
							</td>
						</tr>
					@else
						@foreach ($comments as $key => $value)
							<tr>
								<td class="text-center col-md-2">
									{{$value['user']['name']}}
								</td>
								<td class="col-md-9">
									<p class="text-capitalize">
										{{$value['content']}}
									</p>
								</td>
								<td class="text-center col-md-1">
									@if(is_null($value['deleted_at']))
										{!! Form::open(['url' => route('cms.comments.destroy', ['id' => $value['id']] ), 'method' => 'DELETE', 'class' => 'form-inline']) !!}
											<button type="submit" class="btn btn-xs btn-danger">Delete</button>
										{!!Form::close()!!}
									@else
										<label class="label label-danger"><i>deleted</i></label>
									@endif
								</td>    
							</tr>
						@endforeach 
					@endif
				</tbody>
			</table> 
			{!! $comments->appends(Input::all())->render() !!}
		</div>
	</div><!-- /row -->
@stop

@section('active-comment')
	active
@stop