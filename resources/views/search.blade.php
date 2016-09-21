@extends('home')
@section('content')
<style>
	.entry{
		border-bottom:3px solid black;
	}
	footer{
		display:none;
	}
	.item{
		border-bottom:1px solid black;
	}
	.img_thumbnail{
		height:190px;
		width:auto;
		padding:15px;
	}
	.item:last-child{
		border-bottom: none;
	}
	.float-right{
		float:right;
	}
</style>
<div class="col-md-12">
	Results for "{{$search}}"
</div>
<div class="mobile col-sm-12 form-group" style="border-bottom:1px solid grey;border-top: 1px solid grey;padding-top: 20px;padding-bottom: 20px">
		<label style="padding-right:0px" class="col-sm-1" for="selectMobile">Sort by:</label>
	<div class="col-sm-10" style="padding-left:0px">
		<select id="selectMobile" class="form-control">
			<option value="high-to-low">Price (High to Low)</option>
			<option value="low-to-high">Price (Low to High)</option>
			<option value="a-z">Alphabetical (A to Z)</option>
			<option value="Z-a">Alphabetical (Z to A)</option>
		</select>
	</div>
	</div>
</div>
<div class="col-md-12">
	<div class="col-md-2">
	</div>
	<div class="col-md-10 item results">
	@foreach($items as $key=>$item)
		<div class="col-md-3 col-sm-6 item">
			<img class="img_thumbnail" src="{{$item->img_path}}">
			<p>{{$item->item_price}} Gold</p>
			<p>{{$item->item_name}}</p>
			<p>Item Not Yet Rated</p>
		</div>
	@endforeach
	</div>
</div>
{!! $items->render()!!}
</div>
@stop