@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 bg-info">
			<h1>Account Info</h1>
			<div class="col-md-3">
				<img src="..." class="img-rounded pull-xs-left" alt="...">
			</div>
			<div class="col-md-9">
				<h3>{{$user->username}}</h3>
				<p>{{$user->first_name . ' ' .$user->last_name}}</p>
				<p>Gold: {{$user->gold}}<span class="glyphicons glyphicons-coins"></span></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 bg-info">
			<h1>Contact Info</h1>
			<div class="col-md-6 bg-info">
				<div class="col-md-6">
				<p>{{$user->first_name . $user->last_name}}</p>
				<p>{{$user->address_line_1}}</p>
				@if(!empty($user->address_line_2))
				<p>{{$user->address_line_2}}</p>
				@endif
				<p>{{$user->state . ',' . $user->zip_code}}</p>
			</div>
		</div>
		<div class="col-md-6 bg-info">
			<p>{{$user->email}}</p>
			<p>{{$user->phone_number}}</p>
		</div>
	</div>
</div>
@stop