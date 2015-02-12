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
    <base href="http://localhost/team-hire/"/>
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
    <!-- Revolution Slider -->
    <link href="view/css/settings.css" rel="stylesheet">

    <!-- Base style -->
    <link href="view/css/styles/style.css" rel="stylesheet">
    <!-- Skin CSS -->
    <link href="view/css/styles/skin-lblue.css" rel="stylesheet" id="color_theme">

    <!-- Custom CSS. Type your CSS code in custom.css file -->
    <link href="view/css/custom.css" rel="stylesheet">

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

        <!-- Contact starts -->
        <div class="tb-contact pull-left">
            <!-- Email -->
            <i class="fa fa-envelope color"></i> &nbsp; <a href="mailto:contact@domain.com"><b>info@teamhire.co.uk</b></a>
            &nbsp;&nbsp;
            <!-- Phone -->
            <i class="fa fa-phone color"></i> &nbsp; <b>+44 (78)-(1821)-0052</b>
        </div>
        <!-- Contact ends -->


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



        <!-- Social media starts -->
        <div class="tb-social pull-right">
            <div class="brand-bg text-right">
                <!-- Brand Icons -->
                <a href="#" class="facebook"><i class="fa fa-facebook square-2 rounded-1"></i></a>
                <a href="#" class="twitter"><i class="fa fa-twitter square-2 rounded-1"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus square-2 rounded-1"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin square-2 rounded-1"></i></a>
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
            <div class="col-md-3 pull-left">
                <!-- Logo section -->
                <div class="logo">
                   <a href="index"><img src="view/img/teamhirlogo.png"></a>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Navigation starts.  -->
                <div class="navy">
                    <ul>
                        <!-- Main menu -->
                        <li><a href="#">Home</a></li>

                        <li><a href="#">About Us</a></li>

                        <li><a href="#">Our Services</a></li>

                        <li><a href="#">Our Team</a></li>

                        <li><a href="#">Our Technologies</a></li>

                        <li><a href="#">How It Works</a>
                            <ul>
                                <li><a href="sitemap.html">Development Process</a></li>
                                <li><a href="index.html">Project Management</a></li>
                                <li><a href="index-bootstrap-carousel.html">Maintenance and Change Strategy</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Our Blog</a></li>

                        <li><a href="contact-us-one.html">Contact Us</a></li>
                    </ul>
                </div>
                <!-- Navigation ends -->
            </div>

            <div class="col-md-1">

                <!-- Search section ends -->
                <div class="clearfix"></div>

            </div>

        </div>
    </div>
</div>

<!-- Header two ends -->