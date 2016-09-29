<!DOCTYPE html>
<html>
<head>
    <title>Fantasy Costco:WHERE ALL YOUR DREAMS COME TRUE</title>
 <link rel="stylesheet" type="text/css" href="/css/main.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<audio id="theme">
    <source src="/audio/Fantasy Costco Theme.mp3" type="audio/mpeg">
</audio>
</head>
<body>
    <nav class="header">
        <div class="col-lg-12" >
            <a href="/"><img src="/img/Fantasy-Costco-by-Ryanphantom.png" id="logo" class="non-desktop"></a>
            <div class="icon-menu small">
                <div class="location-div">
                    <span class="glyphicon glyphicon-map-marker nav-icon"></span>
                    <p style="margin-top:0px">Locations</p>
                </div>
                <div class="account-div">
                    <a href="{{action('UsersController@index')}}">
                    <span class="glyphicon glyphicon-user nav-icon"></span></span>
                    <p style="margin-top:0px">Account</p></a>
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
                    <p>Cart</p></a>
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
    </nav>
@if(isset($message))
<h1>{{$message}}</h1>
@endif
@yield('content')
<footer>
    <div class="footerContainer">
        <div class="flex">
            <div class="col-9">
                <p class="tinyPrint">Search, cart, account, and list icons designed by <a href="http://www.freepik.com" target="_blank">Freepik</a> and distributed by <a href="http://www.flaticon.com" target="_blank">Flaticon.</a></p>
                <p class="tinyPrint">This site may contain copyrighted material the use of which has not always been specifically authorized by the copyright owner. This website is a parody, designed solely for entertainment purposes, and does not generate an profit. This constitutes a 'fair use' of any such copyrighted material as provided for in section 107 of the US Copyright Law. In accordance with Title 17 U.S.C. Section 107, the material on this site is distributed without profit. If you wish to use copyrighted material from this site for purposes of your own that go beyond 'fair use', you must obtain permission from the copyright owner.</p>
            </div>
            <div class="col-3">
                <p class="footerHead">Site Produced By:</p>
                <div class="contributorLogoDiv">
                    <a href="http://foxglovestudios.net" target="_blank"><img class="contributorLogo" src="/img/foxgloveicon.png" alt="FOXGLOVE STUDIOS"></a>
                    <a href="http://objectant.co" target="_blank"><img class="contributorLogo" src="/img/Logo.jpg" alt="OBJECT ANT"></a>
                    <a href="http://randimariedesigns.com" target="_blank"><img class="contributorLogo" src="/img/R_logo2.png" alt="RANDI MAYS - DESIGNER/DEVELOPER"></a>
                </div>
            </div>
        </div>
    </div>
    @if(isset($javascript))
        <script>
            var theme = document.getElementById('theme');
            theme.play();
        </script>
    @endif
</body>
</html>