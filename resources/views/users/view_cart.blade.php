@extends('home')
@section('content')
<div class="container">
	@if(Session::has('alert'))
		<div class="col-md-12 alert alert-{{Session::get('alert')}}">{{Session::get('message')}}</div>
	@endif
	<form method="POST" action="{{action('HomeController@checkout')}}">
	{!! csrf_field() !!}
	@foreach($carts as $key=>$cart)
	<div class="col-md-12 col-sm-12" style="border-top:1px solid black">
		<div class="col-md-8 col-sm-8 col-xs-8">
			@foreach($cart->items as $item)
				<h3 class="col-md-6 col-sm-6 col-xs-6">{{$item->item_name}}</h3>
				<input type="hidden" name="cart[{{$key}}][item_id]" value="{{$item->id}}">
				<input type="hidden" name="cart[{{$key}}][quantity]" value="{{(int)$cart->quantity}}">
				<img class="col-md-7 col-sm-7 col-xs-7" src="{{$item->img_path}}">
			@endforeach
		</div>
		<div class="col-md-4 col-sm-4 col-xs-4">
			<div class="col-md-6 col-sm-6 col-xs-6">
				Quantity:{{$cart->quantity}}
				<button type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></button></span>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				@foreach($cart->items as $item)
				Cost:{{$item->item_price * $cart->quantity}}
				@endforeach
				<button type="button" class="btn btn-sm btn-danger">Remove from Cart</button>
			</div>
		</div>
	</div>
	@endforeach
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="col-md-6 col-sm-6 col-xs-6">
			Total
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			{{$total}}
		</div>
		<button type="submit" class="col-md-8 col-sm-8 col-xs-8 btn btn-warning">Checkout</button>
	</div>
	</form>
</div>
@stop