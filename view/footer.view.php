<!-- Foot Starts -->

<div class="foot">
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <!-- Foot Item -->
                <div class="foot-item">
                    <!-- Heading -->
                    <h5 class="bold"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo ((isset($site_footer) && is_array($site_footer) && isset($site_footer[0]['title'])) ? $site_footer[0]['title'] : ""); ?></h5>
                    <?php echo ((isset($site_footer) && is_array($site_footer) && isset($site_footer[0]['content'])) ? substr($site_footer[0]['content'], 0, 192)."..." : ""); ?>
                    <div class="brand-bg">
                        <!-- Social Media Icons -->
                        <a href="<?php echo ((isset($facebook)) ? $facebook : ""); ?>" class="facebook"><i class="fa fa-facebook circle-3"></i></a>
                        <a href="<?php echo ((isset($twitter)) ? $twitter : ""); ?>" class="twitter"><i class="fa fa-twitter circle-3"></i></a>
                        <a href="<?php echo ((isset($googlePlus)) ? $googlePlus : ""); ?>" class="google-plus"><i class="fa fa-google-plus circle-3"></i></a>
                        <a href="<?php echo ((isset($linkedIn)) ? $linkedIn : ""); ?>" class="linkedin"><i class="fa fa-linkedin circle-3"></i></a>
                    </div>
                    <div class="subscribe-box">

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

                        <p class="tel"> <i class="fa fa-phone"></i> Tel : +44 (844)-(804)-(0326)<br />
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
            fullScreenOffsetContainer:"#topheader-to-offset"

        });
    });
</script>

<!-- Javascript for this page -->
<!-- jQuery UI -->
<script src="view/js/jquery-ui-1.10.4.custom.min.js"></script>
<!-- jQuery UI touch punch -->
<script src="view/js/jquery-ui-touch-punch.min.js"></script>

<script type="text/javascript">
$(function(){

    $("#slider").slider({
        range: "min",
        min: 10,
        max: 100,
        value: 80
    });

    $("#slider1").slider({
        range: true,
        values: [17, 83]
    });

    $( "#slider2" ).slider({
        range: "min",
        value: 1000,
        min: 300,
        max: 100000,
        slide: function(event, ui) {
            $("#amount").val("£" + ui.value);
        }
    });

    $("#amount").val(
        "£" + $("#slider2").slider("value")
    );

    $("#slider3").slider({
        range: "max",
        min: 1,
        max: 52,
        value: 2,
        slide: function(event, ui) {
            $("#bedrooms").val(ui.value);
        }
    });

    $("#bedrooms").val(
        $("#slider3").slider("value")
    );

    var select = $("#guests");
    var guestnumber = $("#slider4").slider({
        min: 1,
        max: 10,
        range: "min",
        value: select[0].selectedIndex + 1,
        slide: function(event, ui) {
            select[0].selectedIndex = ui.value - 1;
        }
    });

    $("#guests").change(function() {
        guestnumber.slider("value", this.selectedIndex + 1);
    });

    $("#slider5").slider({
        value:100,
        min: 0,
        max: 500,
        step: 50,
        range: "min",
        slide: function(event, ui) {
            $("#donation").val(ui.value);
        }
    });

    $("#donation").val($("#slider5").slider("value"));
    $("#donation").blur(function() {
        $("#slider5").slider("value", $(this).val());
    });

    $("#slider6").slider({
        orientation: "vertical",
        range: "min",
        min: 0,
        max: 100,
        value: 60,
        slide: function(event, ui) {
            $("#volume").val(ui.value);
        }
    });

    $("#volume").val(
        $("#slider6").slider("value")
    );

    $("#slider7").slider({
        orientation: "vertical",
        range: true,
        values: [27, 67],
        slide: function(event, ui) {
            $("#sales").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });

    $("#sales").val( "$" + $("#slider7").slider("values", 0) + " - $" + $("#slider7").slider("values", 1));

    $("#eq > .sliderv-wrapper").each(function() {
        var value = parseInt($(this).text(), 10);
        $(this).empty().slider({
            value: value,
            range: "min",
            animate: true,
            orientation: "vertical"
        });
    });

    $("#eq2 > .sliderv-wrapper").each(function() {
        var value = parseInt($(this).text(), 10);
        $(this).empty().slider({
            value: value,
            range: "min",
            animate: true,
            orientation: "vertical"
        });
    });


    $('#slider8').slider({
        range: true,
        values: [500, 1500],
        min: 10,
        max: 2000,
        step: 10,
        slide: function(event, ui) {
            $("#budget").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });

    $("#budget").val("$" + $("#slider8").slider("values", 0) + " - $" + $("#slider8").slider("values", 1));

    var initialYear = 1980;
    var yearTooltip = function(event, ui) {
        var curYear = ui.value || initialYear
        var yeartip = '<span class="slider-tip">' + curYear + '</span>';
        $(this).find('.ui-slider-handle').html(yeartip);
    }

    $("#slider10").slider({
        value: initialYear,
        range: "min",
        min: 1950,
        max: 2020,
        step: 1,
        create: yearTooltip,
        slide: yearTooltip
    });

    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [100, 380],
        slide: function(event, ui) {
            $("#amounts").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
    });

    $("#amounts").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

    $("#slider11").slider({
        min: 100,
        max: 1000,
        step: 10,
        values: [300, 700],
        range: true,
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $(".sliderValue[data-index=" + i + "]").val(ui.values[i]);
            }
        }
    });

    $(".sliderValue").change(function() {
        var $this = $(this);
        $("#slider11").slider("values", $this.data("index"), $this.val());
    });


    var valtooltip = function(sliderObj, ui){
        val1            = '<span class="slider-tip">'+ sliderObj.slider("values", 0) +'</span>';
        val2            = '<span class="slider-tip">'+ sliderObj.slider("values", 1) +'</span>';
        sliderObj.find('.ui-slider-handle:first').html(val1);
        sliderObj.find('.ui-slider-handle:last').html(val2);
    };

    $( "#slider-range2" ).slider({
        range: true,
        min: 0,
        max: 500,
        values: [180, 400],
        create:function(event,ui){
            valtooltip($(this),ui);
        },
        slide: function( event, ui ) {
            valtooltip($(this),ui);
            $( "#amountx" ).val("$" + ui.values[0] + " - $" + ui.values[1]);
        },
        stop:function(event,ui){
            valtooltip($(this),ui);
        }
    });

    $( "#amountx" ).val("$" + $("#slider-range2").slider("values", 0) + " - $" + $("#slider-range2").slider("values", 1));

    var initialSpark = 60;
    var sparkTooltip = function(event, ui) {
        var curSpark = ui.value  || initialSpark
        var sparktip = '<span class="slider-tip">' + curSpark + '</span>';
        $(this).find('.ui-slider-handle').html(sparktip);
    }

    $("#slider9").slider({
        orientation: "vertical",
        range: "min",
        min: 1,
        max: 100,
        step: 1,
        value: initialSpark,
        create: sparkTooltip,
        slide: sparkTooltip
    });

});

</script>
<!-- Custom JS. Type your JS code in custom.js file -->
<script src="view/js/custom.js"></script>

<form id="form" method="POST" style="display:none">
</form>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
    function postData(attrName,attrValue){
        var input  = $('<input/>',{type:'hidden',name:attrName,value:attrValue});
        $('#form').append(input).submit();
    }

    function sendSearch()
    {
        var term = document.getElementById("searchTerm1").value;
        window.location.href = 'blog/search/'+term;
    }

    function sendSearch2()
    {
        var term = document.getElementById("searchTerm2").value;
        window.location.href = 'blog/search/'+term;
    }

    function contactAuthor(entryId)
    {
        var elem = document.getElementById("entryId");
        elem.value = entryId;
    }
</script>

<!--
Style switcher. This is just for demo purpose only.
If you don't want remove the below line.
Some of the features of style switcher won't work on offline. THey only work when you upload it to server
-->
<!-- <script src="style-switcher/style-switcher.js"></script> -->

</body>
</html>