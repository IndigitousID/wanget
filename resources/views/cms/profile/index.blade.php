@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row" style="color:white;">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-12">
			{!! Form::open(['url' => route('cms.profile.store'), 'method' => 'POST', 'class' => 'form']) !!}
				<legend>Change Profile</legend>
		
				<div class="body">
			
					<label for="email">Email</label>
						{!! Form::text('email', Auth::user()->email, [
								'class'         => 'input-huge', 
								'required'      => 'required', 
								'tabindex'      => '1',
								'placeholder'   => 'Email'
						]) !!}

					<label for="name">(pen) Name</label>
						{!! Form::text('name', Auth::user()->name, [
								'class'         => 'input-huge', 
								'required'      => 'required', 
								'tabindex'      => '2',
								'placeholder'   => '(pen) Name'
						]) !!}

					<label for="avatar">Avatar</label>
						{!! Form::text('avatar', Auth::user()->avatar, [
								'class'         => 'input-huge', 
								'required'      => 'required', 
								'tabindex'      => '3',
								'placeholder'   => 'avatar'
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

@section('active-dashboard')
	active
@stop