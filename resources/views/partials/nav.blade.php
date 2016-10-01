<nav class="header">
	<form method="GET" action="{{action('HomeController@search')}}">
	<div class="col-lg-12" >
			<a href="/"><img src="/img/Fantasy-Costco-by-Ryanphantom.png" id="logo" class="non-desktop"></a>
			<div class="icon-menu small">
				<div class="location-div">
					<span class="glyphicon glyphicon-map-marker nav-icon"></span>
					<p style="margin-top:0px">Locations</p>
				</div>
				<div class="account-div">
					<a href="{{action('UsersController@index')}}"><span class="glyphicon glyphicon-user nav-icon"></span></span>
					<p style="margin-top:0px">Account</p>
					</a>
				</div>
				<div class="cart-div">
					<a href="{{action('HomeController@viewCart')}}"><span class="glyphicon glyphicon-shopping-cart nav-icon"></span>
					<p>Cart</p></a>
				</div>
			</div>
			<div class="links-bar medium">
				<div style="float:right">
					<a>Customer Service</a>
					<a>Register</a>
					<a>About</a>
					@if(isset($user))
					<a href="{{action('HomeController@logout')}}">Logout</a>
					@endif
				</div>
			</div>
		</div>
		<div class="col-xs-12 search-nav">
			<a href="/"><img src="/img/Fantasy-Costco-by-Ryanphantom.png" id="logo" class="large"></a>
			<div class="col-xs-2 bg-primary shop-button"><span class="glyphicon glyphicon-menu-hamburger"></span>Shop
			</div>
			<div class="col-xs-10 col-md-10 search-bar">
				<input type="text" class="form-control" placeholder="Search Fantasy Costco" id="search-bar">
				<span class="glyphicon glyphicon-search"></span>
			</div>
			<div class="medium icon-menu">
				<div class="medium location-div">
					<span class="glyphicon glyphicon-map-marker nav-icon"></span>
					<p style="margin-top:0px">Locations</p>
				</div>
				<div class="account-div medium">
					<a href="{{action('UsersController@index')}}"><span class="glyphicon glyphicon-user nav-icon"></span></span>
					<p style="margin-top:0px">My Account</p></a>
				</div>
				<div class="cart-div">
					<a href="{{action('HomeController@viewCart')}}"><span class="glyphicon glyphicon-shopping-cart nav-icon"></span>
					<p>Cart</p>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 departments-div blue large">
		<div>
			<a style="color:white">Equipment</a>
			<a style="color:white">Consumables</a>
			<a style="color:white">Weapons</a>
			<a style="color:white">Misc</a>
		</div>
	</div>
	</form>
</nav>