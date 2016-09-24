@extends('home')
@section('content')
	<style>
		.thumbnail{
			width:25%;
			height:auto;
		}
		footer{
			display: none;
		}
		.float-right{
			float:right;
		}
		@media (max-width:768px){
			.hide-sm{
				display:none;
			}
		}
	</style>
	<div class="col-sm-12 col-xs-0">
		Showing 1-{{count($items)}} out of {{count($items)}}
	</div>
	<div class="col-sm-3 hide-sm">
		<div class="col-sm-12">Filter Results <span class="float-right">Clear All</span></div>
		<div class="col-sm-12">Category<span class="float-right">+</span>
		@foreach($categories as $category=>$array)
			<div class="col-sm-12">
				<input class="col-sm-1" type="checkbox">
				<span class="col-sm-10">{{$category}} ({{count($array)}})</span>
			</div>
		@endforeach
		</div>
		<div class="col-sm-12">Price<span class="float-right">+</span>
			@foreach($prices as $price=>$count)
				<div class="col-sm-12">
				<input class="col-sm-1" type="checkbox">
				<span class="col-sm-10">{{$price}} ({{$count}})</span>
			</div>

			@endforeach
		</div>
		<div class="col-sm-12">Keyword<span class="float-right">+</span>
			@foreach($keywords as $key=>$keyword)
			@if($key < 10)
			<div class="col-sm-12">
				<input class="col-sm-1" type="checkbox">
				<span class="col-sm-10 text-capitalize">{{$keyword}}</span>
			</div>
			@endif
			@if($key==11)
			<div class="col-sm-12">
				See All
			</div>
			@endif
			@if($key>=11)
			<div class="hide col-sm-12">{{$keyword}}</div>
			@endif
		@endforeach
</div>
	</div>
	<div class="col-xs-12 col-sm-9">
		<div class="col-sm-12 form-group">
		Sort by 
		<select class="form-control">
			<option value="high-to-low">Price (High to Low)</option>
			<option value="low-to-high">Price (Low to High)</option>
			<option value="a-to-z">Name (A to Z)</option>
			<option value="z-to-a">Name (Z to A)</option>
			<option value="rating">Rating (High to Low)</option>
		</select>
	</div>

	@foreach($items as $item)
		<div class="col-xs-6 col-sm-4 col-md-4">
			<img class="thumbnail" src="{{$item->img_path}}">
			<p>{{$item->item_price}}</p>
			<p>{{$item->item_name}}</p>
			@if($item->average_rating()==0)
			<p>No ratings to display</p>
			@else
				@for($i=0;$i<$item->average_rating();$i++)
					<span class="glyphicon glyphicon-star"></span>
				@endfor
				@for($i=$item->average_rating();$i < 5; $i++)
					<span class="glyphicon gplyphicon-star-empty"></span>
				@endfor
				({{count($item->ratings())}})
			@endif
		</div>
	@endforeach
	</div>
@stop