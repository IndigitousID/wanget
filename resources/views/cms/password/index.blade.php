@extends('cms.layout')
@section('content')
	<!-- FIRST ROW OF BLOCKS -->
	<div class="row" style="color:white;">
		<!-- USER PROFILE BLOCK -->
		<div class="col-sm-12">
			{!! Form::open(['url' => route('cms.password.store'), 'method' => 'POST', 'class' => 'form']) !!}
				<legend>Change Password</legend>
		
				<div class="body">
			
					<label for="old_password">Old Password</label>
						{!! Form::password('old_password', [
								'class'         => 'input-huge', 
								'required'      => 'required', 
								'tabindex'      => '1',
								'placeholder'   => 'Old Password'
						]) !!}

					<label for="password">New Password</label>
						{!! Form::password('password', [
								'class'         => 'input-huge', 
								'required'      => 'required', 
								'tabindex'      => '2',
								'placeholder'   => 'New Password'
						]) !!}

					<label for="password_confirmation">New Password Confirmation</label>
						{!! Form::password('password_confirmation', [
								'class'         => 'input-huge', 
								'required'      => 'required', 
								'tabindex'      => '3',
								'placeholder'   => 'New Password Confirmation'
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