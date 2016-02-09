@inject('guest' ,'App\Models\Guest')
<?php 
if(!is_null($filters) && is_array($filters))
{
	foreach ($filters as $key => $value) 
	{
		$guest = call_user_func([$guest, $key], $value);
	}
}
$guest 			= $guest;

if(Input::has('sort'))
{
	$guest 			= $guest->sort(Input::get('sort'));
}
else
{
	$guest 			= $guest->orderby('created_at', 'desc');
}

$guests				= $guest->paginate();
?>
@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row" style="color:white;">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-12">
			<h4><strong>GUESTS</strong></h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center col-md-2">Name</th>
						<th class="text-center col-md-9">Email</th>
						<th class="text-center col-md-1">Kontrol</th>
					</tr>
				</thead>
				<tbody>
					@if (count($guests) == 0)
						<tr>
							<td colspan="3" class="text-center">
								Empty
							</td>
						</tr>
					@else
						@foreach ($guests as $key => $value)
							<tr>
								<td class="text-center col-md-2">
									{{$value['name']}}
								</td>
								<td class="col-md-9">
									<p class="text-capitalize">
										{{$value['email']}}
									</p>
								</td>
								<td class="text-center col-md-1">
									@if($value['is_active']))
										{!! Form::open(['url' => route('cms.guests.destroy', ['id' => $value['id']] ), 'method' => 'DELETE', 'class' => 'form-inline']) !!}
											<button type="submit" class="btn btn-xs btn-danger">Deactive</button>
										{!!Form::close()!!}
									@else
										<label class="label label-danger"><i>deactived</i></label>
									@endif
								</td>    
							</tr>
						@endforeach 
					@endif
				</tbody>
			</table> 
			{!! $guests->appends(Input::all())->render() !!}
		</div>
	</div><!-- /row -->
@stop

@section('active-guest')
	active
@stop