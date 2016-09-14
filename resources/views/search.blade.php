@extends('home')
@section('content')
{{$string[0]}}
<style>
	.entry{
		border-top:1px solid grey;
	}
</style>
<div class="container">
@foreach($items as $item)
	<div class="row entry">
		<div class="col-md-2">
			<img style="width:100px" src="{{$item->img_path}}">
		</div>
		<div class="col-md-10">
			<p>{{$item->item_name}}</p>
			<p>{{$item->item_price}}</p>
			<p>{{$item->item_description}}</p>
		</div>
	</div>
@endforeach
</div>
@stop