@extends('cms.full_layout')
@section('content')
	<div class="row">
		<div class="col-lg-offset-4 col-lg-4" style="margin-top:100px">
			@include('cms.components.alert')
			<div class="block-unit" style="text-align:center; padding:8px 8px 8px 8px;">
				<!-- <img src="images/face80x80.jpg" alt="" class="img-circle"> -->
				<br>
				<br>
				<form class="cmxform" method="post" action="{{route('cms.login.post')}}">
					<fieldset>
						<p>
							<input id="email" name="email" type="text" placeholder="Email">
							<input id="password" name="password" type="password" placeholder="Password">
						</p>
							<input class="submit btn-success btn btn-large" type="submit" value="Login">
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@stop
