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
</head>
<body>
<style>
    header{
        display:none;
    }
    nav{
        background-color:rgb(239,239,239);
    }
    nav>div{
        padding-top: 10px;
        background-color:rgb(239,239,239);
    }
    .border-right{
        border-right: 1px solid navy;
    }
    .align-center{
        text-align: left;
    }
    .sm-icon{
        font-size: 1.8rem;
    }
    .no-padding-left{
    }
    .nav-option{
        min-width:50px;
    }
    .logo{
        min-width: 120px;
        min-height: 40px;
    }
    .md{
        display:none;
    }
    @media (min-width:675px){
        .search{
            width:50%;
        }
        .md{
            display:block;
        }
        .sm{
            display:none;
        }
    }
    @media (min-width:775px){
        .md{
            display:none;
        }
        .sm{
            display:none;
        }
        .lg{
            display:block;
        }
    }
</style>
<nav>
    <div class="col-xs-12" style="padding-right:0;padding-left:0px">
        <img class="col-xs-3 logo" src=/img/Fantasy-Costco-by-Ryanphantom.png>
        <div class="col-xs-offset-5 col-xs-4 sm" style="text-align:center;padding-right:0;min-width:163px">
            <div class="col-xs-4 border-right nav-option" style="padding-right:5px;padding-left:5px">
                <span class="glyphicon sm-icon glyphicon-map-marker"></span>
                <span class="align-center" style="font-size:1rem">Location</span>
            </div>
            <div class="col-xs-4 border-right nav-option" style="padding-right:5px;padding-left:5px">
                <span class="glyphicon sm-icon glyphicon-user"></span>
                <span style="font-size:1rem">Account</span>
            </div>
            <div class="col-xs-4 nav-option" >
                <span class="glyphicon sm-icon glyphicon-shopping-cart" ></span>
                <span style="font-size:1rem">Cart</span>
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="col-xs-2" style="padding-left:0px;padding-right:0px">
            <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-align-justify"></span> Shop</button>
        </div>
        <div class="col-xs-10 search" style="padding-right:0px;padding-left:0px;margin-left:0px">
            <input type="text" class="form-control"><span style="float:right;margin-right:5px;top:-2.7rem;font-size:2rem" class="glyphicon glyphicon-search"></span>
        </div>
        <div class="md col-xs-4" style="text-align:center;padding-right:0;min-width:163px">
            <div class="col-xs-4 border-right nav-option" style="padding-right:5px;padding-left:5px">
                <span class="glyphicon sm-icon glyphicon-map-marker"></span>
                <span class="align-center" style="font-size:1rem">Location</span>
            </div>
            <div class="col-xs-4 border-right nav-option" style="padding-right:5px;padding-left:5px">
                <span class="glyphicon sm-icon glyphicon-user"></span>
                <span style="font-size:1rem">Account</span>
            </div>
            <div class="col-xs-4 nav-option" >
                <span class="glyphicon sm-icon glyphicon-shopping-cart" ></span>
                <span style="font-size:1rem">Cart</span>
            </div>
        </div>
    </div>
    <div style="width:100%;background-color: red">
    <p>Test</p>
    </div>
</nav>
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
</body>
</html>