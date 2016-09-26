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
	textarea{
		resize: none;
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
<meta name="csrf-token" content="{{ csrf_token() }}">
<form method="POST" action="{{action('HomeController@addToCart',$item->id)}}">
{!!csrf_field()!!}
<div class="col-sm-12">
	<h1>{{$item->item_name}}</h1>
</div>
<div class="col-md-12">
	<h3>Category: {{$item->category}}</h3>
</div>
<div class="col-sm-12">
	@if($average > 0)
		@for($i=0;$i< round($average);$i++)
		<span class="glyphicon glyphicon-star"></span>
		@endfor
		@for($i=round($average);$i < 5;$i++)
		<span class="glyphicon glyphicon-star-empty"></span>
		@endfor
		({{count($ratings)}})
		<div class="col-md-12">
			Avg. rating: {{round($average)}} out of 5 stars
		</div>
	@else
	No ratings to display
	@endif
</div>
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
		<input type="text" style="float:none" name="quantity" id="quantity" class="col-sm-2"></label>
	</div>
	<div class="col-sm-8 col-md-8">
		<button type="submit" name="item_id" value="{{$item->id}}"class="btn btn-primary col-sm-8 col-md-12">Add to Cart</button>
	</div>
</div>
<div class="col-sm-12 col-md-6">
	<p>The estimated delivery time will be appriximately 999999-999999999 days from the time of order</p>
</div>
</form>
<div class="col-md-12">
	<h3>Keywords</h3>
	@foreach($keywords as $index=>$keyword)
			<span class="label label-default">{{$keyword}}</span>
	@endforeach
</div>
<div class="col-sm-12 col-md-12">
	<h3 class="col-sm-10 col-md-11">Reviews ({{count($ratings)}})</h3><span class="pull-sm-right" id="expand-reviews">+</span>
	<input type="hidden" name="rating" id="rating">
	@if(!empty($ratings))
	@foreach($ratings as $rating)
		<div class="col-md-12 toggle-review">
			<div class="col-md-12 toggle-review">
			@for($i=0;$i<$rating->rating;$i++)
			<span class="glyphicon glyphicon-star"></span>
			@endfor
			@for($i=$rating->rating;$i < 5; $i++)
				<span class="glyphicon glyphicon-star-empty"></span>
			@endfor
			{{$rating->title}}
			</div>
			<div class="col-md-12">
			Written by {{$rating->author()}} on {{substr($rating->created_at,0,10)}}
			</div>
			<div class="col-md-12">
				{{$rating->review}}
			</div>
		</div>
	@endforeach
	@endif
	<div class="col-md-12 toggle-review">
		@if(isset($user))
		<h3 class="">Add a Review</h3>
		<div class="col-md-12 input-group toggle-review">
			<label class="col-md-1" for="title">Title</label>
			<div class="col-md-8">
			<input type="text" class="form-control col-md-8" id="title" name="title">
			</div>
		</div>
		Rate <span class="rating glyphicon glyphicon-star-empty" id="rating-1"></span><span class="rating glyphicon glyphicon-star-empty" id="rating-2"></span><span class="rating glyphicon glyphicon-star-empty" id="rating-3"></span><span class="rating glyphicon glyphicon-star-empty" id="rating-4"></span><span class="rating glyphicon glyphicon-star-empty" id="rating-5"></span>
	</div>
	<div class="col-md-12 toggle-review">
		<textarea class="form-control col-md-10" name="review" id="review"></textarea>
		<button type="button" class="btn btn-primary submit_review">Submit</button>
		<button type="button" class="btn btn-primary edit">Edit</button>
	</div>
	@else
	Please Login To leave a review
	</div>
	@endif
</div>
<div class="col-sm-12">
	<h3 class="col-sm-10 col-md-11">Shipping & Returns</h3><span class="pull-sm-right">+</span>
</div>
<div class="col-sm-12">
	<h3 class="col-sm-10 col-md-11">Warranty & Services</h3><span class="text-sm-right pull-md-right">+</span>
</div>
<script>
$(document).ready(function(){
	$('.toggle-review').hide();
		//Lights up stars when they are hoverd over
	var item_id={{$item->id}};
	$('.rating').hover(
		function(){
		if(!$(this).hasClass('locked')){
			ratingNumber=parseInt(this.id.substring(7,8));
			for(var i=1;i<=ratingNumber;i++){
				var target="#rating-" + i;
				$(target).addClass('glyphicon-star');
				$(target).removeClass('glyphicon-star-empty');
			}
		}
	}, function(){
		if(!$(this).hasClass('locked')){
			ratingNumber=parseInt(this.id.substring(7,8));
			for(var i=1;i<=ratingNumber;i++){
				var target="#rating-" + i;
				$(target).addClass('glyphicon-star-empty');
				$(target).removeClass('glyphicon-star');
			}
		}
	});
	//Lock stars in place
	$('.rating').click(function(){
		ratingNumber=parseInt(this.id.substring(7,8));
		$('#rating').val(ratingNumber);
		if($(this).hasClass('locked')){
			for(var i=1;i<=ratingNumber;i++){
				var target="#rating-" + i;
				$(target).removeClass('locked');
			}
			for(var i=ratingNumber+1;i<=5;i++){
				var target="#rating-" + i;
				$(target).removeClass('glyphicon-star');
				$(target).addClass('glyphicon-star-empty');
			}
		}else
		for(var i=1;i<=ratingNumber;i++){
			var target="#rating-" + i;
			$(target).addClass('glyphicon-star');
			$(target).removeClass('glyphicon-star-empty');
			$(target).addClass('locked');
		}
	});
	$('#expand-reviews').click(function(){
		$('.toggle-review').toggle();
	});
});
</script>
@if(isset($user))
<script>
	$(document).ready(function(){
			$('.submit_review').click(function(){
		$.ajax(
		{
			headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			type:"POST",
			url:"/rating/add",
			data:{
			rating:$('#rating').val(),
			review:$('#review').val(),
			item_id:item_id,
			user_id:{{$user->id}},
			title:$('#title').val()
			}
		}).done(function(data){
			$('.submit_review').after('<div class="col-md-12 alert ' + data['alert'] +'">' + data['message'] +'</div>');
			$('#review').prop('disabled','true');
		});
	});
});
</script>
@endif
@stop