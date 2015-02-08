<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Title here -->
    <title><?php echo $pageTitle; ?></title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your,Keywords">
    <meta name="author" content="ResponsiveWebInc">
    <base href="http://localhost/blog/"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome CSS -->
    <link href="view/css/font-awesome.min.css" rel="stylesheet">
    <!-- Magnific Popup -->
    <link href="view/css/magnific-popup.css" rel="stylesheet">
    <!-- Owl carousel -->
    <link href="view/css/owl.carousel.css" rel="stylesheet">

    <!-- CSS for this page -->
    <!-- Ecommerce -->
    <link href="view/css/styles/ecommerce.css" rel="stylesheet">

    <!-- Base style -->
    <link href="view/css/styles/style.css" rel="stylesheet">
    <!-- Skin CSS -->
    <link href="view/css/styles/skin-lblue.css" rel="stylesheet" id="color_theme">

    <!-- Custom CSS. Type your CSS code in custom.css file -->
    <link href="view/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="view/styles/monokai_sublime.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="#">
</head>

<!-- Add class "boxed" along with body for boxed layout. -->
<!-- Add "pattern-x" (1 to 5) for background patterns. -->
<!-- Add "img-x" (1 to 5) for background images. -->
<body>

<!-- Outer Starts -->
<div class="outer">

<!-- Top bar starts -->
<div class="top-bar">
    <div class="container">
        <!-- Shopping kart ends -->

        <?php
            if(isset($showProfileBar))
            {
                echo '<div class="tb-language dropdown pull-right">
            <a href="#" data-target="#" data-toggle="dropdown"><i class="fa fa-lock"></i> Profile <i class="fa fa-angle-down color"></i></a>
            <!-- Dropdown menu with languages -->
            <ul class="dropdown-menu dropdown-mini" role="menu">
                <li><a href="profile">My Profile</a></li>
                <li><a href="signin?logout=true">Sign out</a></li>
            </ul>
        </div>';
            }
        ?>


        <!-- Langauge starts -->
        <div class="tb-language dropdown pull-right">
            <a href="#" data-target="#" data-toggle="dropdown"><i class="fa fa-globe"></i> English <i class="fa fa-angle-down color"></i></a>
            <!-- Dropdown menu with languages -->
            <ul class="dropdown-menu dropdown-mini" role="menu">
                <li><a >English</a></li>
            </ul>
        </div>
        <!-- Language ends -->

        <!-- Search section for responsive design -->
        <div class="tb-search pull-left">
            <a href="#" class="b-dropdown"><i class="fa fa-search square-2 rounded-1 bg-color white"></i></a>
            <div class="b-dropdown-block">
                <form role="form" method="get" action="blog/search">
                    <!-- Input Group -->
                    <div class="input-group">
                        <input type="text" class="form-control"  placeholder="Type Something">
									<span class="input-group-btn">
										<button class="btn btn-color" type="button" onclick="sendSearch()">Search</button>
									</span>
                    </div>
                </form>
            </div>
        </div>
        <!-- Search section ends -->

        <!-- Social media starts -->
        <div class="tb-social pull-right">
            <div class="brand-bg text-right">
                <!-- Brand Icons -->
                <a href="#" class="facebook"><i class="fa fa-facebook square-2 rounded-1"></i></a>
                <a href="#" class="twitter"><i class="fa fa-twitter square-2 rounded-1"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus square-2 rounded-1"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin square-2 rounded-1"></i></a>
                <a href="#" class="pinterest"><i class="fa fa-pinterest square-2 rounded-1"></i></a>
            </div>
        </div>
        <!-- Social media ends -->

        <div class="clearfix"></div>
    </div>
</div>

<!-- Top bar ends -->

<!-- Header two Starts -->
<div class="header-2">

<!-- Container -->
<div class="container">
<div class="row">
<div class="col-md-4">
    <!-- Logo section -->
    <div class="logo">
        <h1><a href="index"><i class="fa fa-laptop"></i> Team Hire Blog</a></h1>
    </div>
</div>
<div class="col-md-9">



</div>

<div class="col-md-1">

    <!-- Search section -->
    <div class="head-search pull-right">
        <a href="#" class="b-dropdown"><i class="fa fa-search square-2 rounded-1 bg-color white"></i></a>
        <div class="b-dropdown-block">
            <form role="form">
                <!-- Input Group -->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Type Something"  id="searchTerm1" value="">
											<span class="input-group-btn">
												<button class="btn btn-color" type="button" onclick="sendSearch()">Search</button>
											</span>
                </div>
            </form>
        </div>
    </div>
    <!-- Search section ends -->
    <div class="clearfix"></div>

</div>

</div>
</div>
</div>

<!-- Header two ends -->