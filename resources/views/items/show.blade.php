@extends('home')
@section('content')
<style>
	footer{
		display:none;
	}
	body{
		font-size:2rem;
	}
	.glyphicon-plus{
		font-weight: lighter;
	}
	.mobile{
		display:none;
	}
	img{
		width:inherit;
		height: inherit;
	}
	@media (max-width:730px){
		.mobile{
			display:block;
		}
	}
</style>
<div class="col-sm-12">
	<h1>{{$item->item_name}}</h1>
</div>
<div class="col-sm-12">
	No ratings to display
</div>
	@foreach($keywords as $index=>$keyword)
		@if($index < 3)
			<div class="col-sm-4 col-md-3">{{$keyword}}</div>
		@endif
	@endforeach
<div class="col-sm-12 col-md-6">
	<img src="{{$item->img_path}}">
</div>
<div class="col-sm-12 col-md-6">
	<div class="col-sm-6">
		Your Price
	</div>
	<div class="col-sm-6">
		{{$item->item_price}} Gold
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<p>Free shipping</p>
	<p>Shipping & Handling: 0 Gold</p>
	<p>Description:</p>
	<ul>
	<li><p>{{$item->item_description}}</p></li>
	</ul>
</div>
<div class="col-sm-12 col-md-6">
	<div class="col-sm-4 col-md-4">
		<label for="quantity" style="">Qty
		<input type="text" style="float:none" id="quantity" class="col-sm-2"></label>
	</div>
	<div class="col-sm-8 col-md-8">
		<button type="button" class="btn btn-primary col-sm-8 col-md-12">Add to Cart</button>
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<p>The estimated delivery time will be appriximately 999999-999999999 days from the time of order</p>
</div>
<div class="col-sm-12 col-md-12">
	<h3 class="col-sm-10 col-md-11">Reviews</h3><span class="pull-sm-right">+</span>
</div>
<div class="col-sm-12">
	<h3 class="col-sm-10 col-md-11">Shipping & Returns</h3><span class="pull-sm-right">+</span>
</div>
<div class="col-sm-12">
	<h3 class="col-sm-10 col-md-11">Warranty & Services</h3><span class="text-sm-right pull-md-right">+</span>
</div>
@stop