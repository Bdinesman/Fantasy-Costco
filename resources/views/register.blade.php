@extends('home')
@section('content')
<div class="container">
	<h1 class="col-md-9 col-md-offset-1 " style="background-color:grey">Register</h1>
	<div class="col-md-9 col-md-offset-1 blue">
		<form method="POST" action="{{action('UsersController@store')}}">
		{!!csrf_field()!!}
		<div class-"input-group">
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email" id="email">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" name="username" id="username">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="password">Password</label>
				<input type="text" class="form-control" name="password" id="password">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="first_name">First Name</label>
				<input type="text" class="form-control" name="first_name" id="first_name">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="last_name">Last Name</label>
				<input type="text" class="form-control" name="last_name" id="last_name">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="phone_number">Phone Number</label>
				<input type="text" class="form-control" name="phone_number" id="phone_number">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="address_line_1">Address</label>
				<input type="text" class="form-control" name="address_line_1" id="address_line_1">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="address_line_2">Apartment/Suite</label>
				<input type="text" class="form-control" name="address_line_2" id="address_line_2">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" class="form-control" name="city" id="city">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="zip_code">Zip Code</label>
				<input type="text" class="form-control" name="zip_code" id="zip_code">
			</div>
		</div>
		<div class-"input-group">
			<div class="form-group">
				<label for="state">State</label>
				<input type="text" class="form-control" name="state" id="state">
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-danger col-md-4 col-md-offset-3">Register</button>
		</form>
	</div>
</div>
@stop