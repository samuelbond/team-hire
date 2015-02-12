<!-- Foot Starts -->

<div class="foot">
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <!-- Foot Item -->
                <div class="foot-item">
                    <!-- Heading -->
                    <h5 class="bold"><i class="fa fa-user"></i>&nbsp;&nbsp;Team Hire</h5>
                    <p>Welcome to the Team Hire Blog, we share our thoughts, opinions and experience on various Information Technology topics</p>
                    <div class="brand-bg">
                        <!-- Social Media Icons -->
                        <a href="#" class="facebook"><i class="fa fa-facebook circle-3"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter circle-3"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus circle-3"></i></a>
                        <a href="#" class="linkedin"><i class="fa fa-linkedin circle-3"></i></a>
                        <a href="#" class="pinterest"><i class="fa fa-pinterest circle-3"></i></a>
                    </div>
                    <div class="subscribe-box">
                        <h5 class="bold">Subscribe :</h5>
                        <!-- Form -->
                        <form role="form" method="post" action="subscribe">
                            <!-- Input Group -->
                            <div class="input-group">
                                <input type="email" name="subscribe" class="form-control" placeholder="Enter Email Id">
											<span class="input-group-btn">
												<button class="btn btn-color" type="submit">Subscribe</button>
											</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <!-- Foot Item -->
                <div class="foot-item">
                    <!-- Heading -->
                    <h5 class="bold"><i class="fa fa-building-o"></i>&nbsp;&nbsp;Contact Us</h5>
                    <!-- Foot Item Content -->
                    <div class="foot-item-content address">
                        <!-- Heading -->
                        <h6 class="bold"><i class="fa fa-home"></i>&nbsp;&nbsp;Team Hire - Plati Tech Limited</h6>
                        <!-- Paragraph -->

                        <p class="add">
                            BEC, 50 Cambridge Road<br />
                            Barking, London<br />
                            United Kingdom</p>

                        <p class="tel"> <i class="fa fa-phone"></i> Tel : + (07) - 818 210052<br />
                            <i class="fa fa-envelope"></i>  Mail : <a href="#">info@teamhire.co.uk</a><br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Foot Ends -->

<!-- Footer Starts -->

<footer>
    <!-- Container -->
    <div class="container">
        <!-- Footer Content -->
        <!-- Paragraph -->
        <p class="pull-left">Copyright &copy; 2014 - <a href="http://www.teamhire.co.uk">Team Hire</a></p>
        <ul class="list-inline pull-right">
            <!-- List -->

        </ul>
        <!-- Clearfix -->
        <div class="clearfix"></div>
    </div>
</footer>

<!-- Footer Ends -->

</div>

<!-- Outer Ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-angle-up bg-color"></i></a></span>


<!-- Javascript files -->
<!-- jQuery -->
<script src="view/js/jquery.js"></script>
<!-- Bootstrap JS -->
<script src="view/js/bootstrap.min.js"></script>
<!-- Placeholders JS -->
<script src="view/js/placeholders.js"></script>
<!-- Magnific Popup -->
<script src="view/js/jquery.magnific-popup.min.js"></script>
<!-- Owl carousel -->
<script src="view/js/owl.carousel.min.js"></script>
<!-- Respond JS for IE8 -->
<script src="view/js/respond.min.js"></script>
<!-- HTML5 Support for IE -->
<script src="view/js/html5shiv.js"></script>
<!-- Main JS -->
<script src="view/js/main.js"></script>
<!-- Javascript for this page -->
<!-- Revolution slider -->
<script src="view/js/jquery.themepunch.tools.min.js"></script>
<script src="view/js/jquery.themepunch.revolution.min.js"></script>
<!-- Waypoints -->
<script src="view/js/waypoints.min.js"></script>
<!-- jQuery CountTo -->
<script src="view/js/jquery.countTo.js"></script>

<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        // Way Points With Count To()
        $('.number-count').waypoint(function(down){
            if(!$(this).hasClass('stop-counter'))
            {
                $(this).countTo();
                $(this).addClass('stop-counter');
            }
        }, {
            offset: '90%'
        });
    });
</script>

<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery('.r-slider .banner').revolution({
            delay:7000,
            startheight:400,
            startwidth:1000,
            startWithSlide:0,

            fullScreenAlignForce:"off",
            autoHeight:"off",

            shuffle:"off",

            onHoverStop:"on",

            thumbWidth:100,
            thumbHeight:50,
            thumbAmount:3,

            hideThumbsOnMobile:"on",
            hideNavDelayOnMobile:1500,
            hideBulletsOnMobile:"off",
            hideArrowsOnMobile:"off",
            hideThumbsUnderResoluition:0,

            hideThumbs:10,
            hideTimerBar:"on",

            keyboardNavigation:"on",

            navigationType:"bullet",
            navigationArrows:"solo",
            navigationStyle:"round",

            navigationHAlign:"center",
            navigationVAlign:"bottom",

            soloArrowLeftHalign:"left",
            soloArrowLeftValign:"center",
            soloArrowLeftHOffset:20,
            soloArrowLeftVOffset:0,

            soloArrowRightHalign:"right",
            soloArrowRightValign:"center",
            soloArrowRightHOffset:20,
            soloArrowRightVOffset:0,


            touchenabled:"on",
            swipe_velocity:"0.7",
            swipe_max_touches:"1",
            swipe_min_touches:"1",
            drag_block_vertical:"false",

            stopAtSlide:-1,
            stopAfterLoops:-1,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            hideSliderAtLimit:0,

            dottedOverlay:"none",

            spinned:"spinner4",

            fullWidth:"off",
            forceFullWidth:"off",
            fullScreen:"off",
            fullScreenOffsetContainer:"#topheader-to-offset",

        });
    });
</script>
<!-- Custom JS. Type your JS code in custom.js file -->
<script src="view/js/custom.js"></script>



<!--
Style switcher. This is just for demo purpose only.
If you don't want remove the below line.
Some of the features of style switcher won't work on offline. THey only work when you upload it to server
-->
<!-- <script src="style-switcher/style-switcher.js"></script> -->

</body>
</html>