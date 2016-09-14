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

<header>
    <div id="main-header-bar">
        <div id="logo-div">
            <a href="/"><img id="logo" src="/img/Fantasy-Costco-by-Ryanphantom.png"></a>
        </div>
        <div id="search-bar-div">
            <div id="search-bar-inner-div">
            <form method="GET" style="margin-top:0px">
                <input type="text" id="searchbar" name="search">
                <input type="image" src="/img/loupe.svg" id="search-icon">
            </form>
            </div>
        </div>
        <div id="medium-content-menu">
            <div class="iconDiv pin">
                <img class="icon" src="/img/location-pin.svg">
                <span class="iconText">Locations</span>
            </div>
            <div class="iconDiv user">
                <img class="icon" src="/img/user-silhouette.svg">
                <span class="iconText">Account</span>
            </div>
            <div class="iconDiv cart">
                <img class="icon" src="/img/commerce.svg">
                <span class="iconText">Cart</span>
            </div>
        </div>
    </div>
    <div id="search-div">
        <div class="leftMenu">
            <a href="/?category=Consumable" class="option">Consumables</a>
            <a href="/?category=Equipment" class="option">Equipment</a>
            <a href="/?category=Weapon" class="option">Weapons</a>
            <a href="/?category=Misc" class="option">Misc</a>
        </div>
        <div class="rightMenu">
            <?php if (isset($_SESSION["LOGGED_IN_ID"])) : ?>
                <a href="#" class="option">Welcome, <?=isset($_SESSION['IS_LOGGED_IN']) ? $_SESSION['IS_LOGGED_IN'] : "" ?></p>
                <a href="logout.php" class="option">Log Out</a>
            <?php endif; ?>
        </div>
    </div>
</header>
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