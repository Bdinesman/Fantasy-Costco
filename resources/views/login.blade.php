<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="col-md-8 offset-md-2 bg-primary">
			<h1>Log In</h1>
			<form method="POST" action="{{action('HomeController@authenticate')}}">
			{!! csrf_field()!!}
			<div class="input-group">
				<div class="form-group">
					<label for="username/email">Username or Email</label>
					<input type="text" class="form-control" name="username/email" id="username/email">
				</div>
			<div class="input-group">
				<div class="form-group">
					<label for="password">Password</label>
					<input type="text" class="form-control" name="password" id="password">
				</div>
			</div>
			</div>
				<button class="btn btn-warning" type="submit">Log In</button>
			<form>
		</div>
	</div>
</body>
</html>