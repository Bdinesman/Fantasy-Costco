@extends('layouts.master')
@section('content')
<div class="container">
	<h1 class="float-left">Sign In or Create a New Account</h1>
	<div class="col-xs-12">
		<form method="POST" action="{{action('HomeController@authenticate')}}">
		{!! csrf_field()!!}
		<div class="col-xs-11 col-xs-offset-1 col-sm-6 login float-left">
		@include('partials.alert')
			<h3 class="float-left">Registered Shoppers</h3>
			<h4 class="font-normal">Please provide your email address and password to access your account.</h4>
			<div class="form-group">
				<div class="form-group">
					<label for="username/email">USERNAME OR EMAIL: <span>*</span></label>
					<input type="text" class="form-control" name="username/email" id="username/email" value="{{old('username/email')}}">
				</div>
			</div>
			<div class="form-group">
					<label for="password">PASSWORD: <span>*</span></label>
					<input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
			</div>
		</div>
			<button type="submit" class="btn btn-primary">Sign In</button>
			</form>
		</div>
		<div class="col-xs-12 col-sm-6">
			<h3>Not Registered Yet With FantasyCostCo?</h3>
			<form METHOD="POST" action="">
			{!!csrf_field()!!}
			<div class="form-group">
				<div class="form-group">
					<label for="username/email">USERNAME: <span>*</span></label>
					<input type="text" class="form-control" name="username" id="username" value="{{old('username')}}">
				</div>
			</div>
			<div class="form-group">
				<div class="form-group">
					<label for="email">EMAIL ADDRESS: <span>*</span></label>
					<input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">
				</div>
			</div>
			<div class="form-group">
				<div class="form-group">
					<label for="password">PASSWORD: <span>*</span></label>
					<input type="password" class="form-control" name="email" id="email" value="{{old('password')}}">
				</div>
			</div>
			<div class="form-group">
				<div class="form-group">
					<label for="confirm-password">CONFIRM PASSWORD: <span>*</span></label>
					<input type="password" class="form-control" name="confirm-password" id="confirm-password">
				</div>
			</div>
			<button type="submit" class="btn btn-primary" id="register">Register</button>
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#username').change(function(){
			if($('#username').val()!=""){
				$.get('/checkIfAvailable',{username:$('#username').val()}).done(function(data){
					$('#username').next('.alert').remove();
					$('#username').after('<div class="alert alert-' + data['alert'] +'">' + data['message'] + '</div>');
				});
			}
			else{
				$('#username').next('.alert').remove();
			}
		});
	});
</script>
@stop