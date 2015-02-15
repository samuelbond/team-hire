
<!-- Main content starts -->

<div class="main-block">

<!-- Revolution slider full width starts -->
<div class="r-slider">
<div class="bannercontainer">
<div class="banner">

<ul>


<!-- Slide #1 starts -->
<li data-transition="zoomin" data-slotamount="5" >
    <img src="view/img/rev-slider/59_comp.jpg"   alt=""  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

    <div class="tp-caption b-big-bold black lft fadeout"
         data-x="center" data-hoffset="0"
         data-y="60" data-voffset="0"
         data-speed="500"
         data-start="700"
         style="z-index: 2;">HIRE EXPERT SOFTWARE DEVELOPMENT TEAM
    </div>

</li>
<!-- Slide #1 ends -->

<!-- Slide #2 starts -->

<li data-transition="fadefromright">
    <img src="view/img/rev-slider/60_comp.jpg" class="bg-color" alt=""/>

    <!-- Layer 1 -->
    <div class="tp-caption b-big-bold black lfb fadeout"
         data-x="center" data-hoffset="0"
         data-y="20" data-voffset="0"
         data-speed="500"
         data-start="700"
         data-splitin="chars"
         data-splitout="chars"
         data-elementdelay="0.1"
         data-endelementdelay="0.1"
         data-endspeed="300"
         style="z-index: 2;">WE CAN HELP YOU FINISH THAT PROJECT
    </div>


</li>

<!-- Slide #2 ends -->


</ul>

</div>
</div>
</div>
<!-- Revolution slider full width ends -->

<div class="container">

<br />
<div class="text-center">
   <?php echo $intro[0]['content']; ?>
</div>

<div class="divider-1"></div>

<!-- Image Box #3 Starts -->

<div class="img-box-3 text-center">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <!-- Image Box #3 Item -->
            <div class="img-box-3-item">
                <div class="img-box-3-icon bg-red">
                    <a href="#"><img src="view/img/flat-icons/6.png" alt="" class="img-responsive" /></a>
                </div>
                <h4><a href="#"><?php echo $circlesItems[0]['title']; ?></a></h4>
                <div class="bor bg-red"></div>
                <?php echo $circlesItems[0]['content']; ?>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <!-- Image Box #3 Item -->
            <div class="img-box-3-item">
                <div class="img-box-3-icon bg-lblue">
                    <a href="#"><img src="view/img/flat-icons/18.png" alt="" class="img-responsive" /></a>
                </div>
                <h4><a href="#"><?php echo $circlesItems[1]['title']; ?></a></h4>
                <div class="bor bg-lblue"></div>
                <?php echo $circlesItems[1]['content']; ?>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <!-- Image Box #3 Item -->
            <div class="img-box-3-item">
                <div class="img-box-3-icon bg-green">
                    <a href="#"><img src="view/img/flat-icons/17.png" alt="" class="img-responsive" /></a>
                </div>
                <h4><a href="#"><?php echo $circlesItems[2]['title']; ?></a></h4>
                <div class="bor bg-green"></div>
                <?php echo $circlesItems[2]['content']; ?>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <!-- Image Box #3 Item -->
            <div class="img-box-3-item">
                <div class="img-box-3-icon bg-blue">
                    <a href="#"><img src="view/img/flat-icons/20.png" alt="" class="img-responsive" /></a>
                </div>
                <h4><a href="#"><?php echo $circlesItems[3]['title']; ?></a></h4>
                <div class="bor bg-blue"></div>
                <?php echo $circlesItems[3]['content']; ?>
            </div>
        </div>
    </div>
</div>

<!-- Image Box #3 Ends -->

<div class="divider-1"></div>

<div class="block-heading-two">
    <h3><span><?php echo ((isset($homePageContent[0]['title'])) ? $homePageContent[0]['title'] : ""); ?></span></h3>
</div>

<div class="row">
    <div class="col-md-4 col-sm-6">
        <?php echo ((isset($homePageContent[0]['content'])) ? $homePageContent[0]['content'] : ""); ?>
        <br />
    </div>

    <div class="col-md-4 col-sm-6">

        <h5><?php echo ((isset($homePageContent[1]['title'])) ? $homePageContent[1]['title'] : ""); ?></h5>

        <?php echo ((isset($homePageContent[1]['content'])) ? $homePageContent[1]['content'] : ""); ?>
    </div>

    <div class="col-md-4 col-sm-6">
        <h5><?php echo ((isset($homePageContent[2]['title'])) ? $homePageContent[2]['title'] : ""); ?></h5>

        <?php echo ((isset($homePageContent[2]['content'])) ? $homePageContent[2]['content'] : ""); ?>

    </div>

</div>

<br />

<div class="block-heading-two">
    <h3><span>Recent and Ongoing Projects</span></h3>
</div>

<div class="img-box-4 text-center">
    <div class="row">

        <?php
         if(isset($works) && is_array($works))
         {
             foreach($works as $work)
             {
                 echo ((isset($work['content'])) ? $work['content'] : "");
             }
         }
        ?>


    </div>
</div>



</div>

<br /><br />


<!--

<div class="quote-two">

    <div class="container">

        <div class="quote-two-content">
            <span>&#8220;</span>
            <div class="owl-carousel" data-items="1" data-auto-play="true" data-pagination="true" data-single-item="true">

                <div class="item">
                    <h3>At vero eos et accusamus et iusto odio dignissimos ducimus indignation qui blanditiis praesentium voluptatum.</h3>
                    - Helon Thomas
                </div>
                <div class="item">
                    <h3>Indignation qui blanditiis praesentium voluptatum at vero eos et accusamus et iusto odio dignissimos ducimus.</h3>
                    - Helon Peter
                </div>
                <div class="item">
                    <h3>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized.</h3>
                    - John Mark
                </div>
            </div>
        </div>
    </div>
</div>

<br />
-->
<div class="container">
<!--
    <div class="block-heading-two">
        <h3><span>Our Speciality</span></h3>
    </div>

    <div class="row">
        <div class="col-md-7 col-sm-6">
            <p class="para-big">Praesent orci eros, rhoncus et neque sit amet, lobortis auctor libero. Vivamus sed laoreet enim. Donec iaculis eros ac leo venenatis porta. Ut eget velit nec velit varius tincidunt. Etiam vel egestas dolor, ac interdum felis.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut euismod sapien. Donec eu feugiat enim, sed tempus arcu. Pellentesque magna nisi, consectetur eget interdum non, interdum a nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Praesent orci eros, rhoncus et neque sit amet, lobortis auctor libero. Vivamus sed laoreet enim. Donec iaculis eros ac leo venenatis porta. Cras tincidunt nisl id lobortis mollis. Ut pretium, quam ut rhoncus pharetra, dui lectus tincidunt risus, eu rhoncus odio tortor fermentum augue. Nulla rutrum bibendum nisl sagittis mollis. Duis adipiscing libero nisi, nec cursus risus dapibus ac.</p>
            <br />
        </div>
        <div class="col-md-5 col-sm-6 text-center">
            <a href="#"><img src="view/img/rev-slider/mockup1.png" alt="" class="img-responsive" /></a>
        </div>
    </div>

    <br />
    <hr />
    <br />

-->


    <br />

    <div class="block-heading-two text-center">
        <h3><span>Our Technologies</span></h3>
    </div>
    <!-- Client One Starts -->
    <br />

    <div class="client-one">
        <div class="owl-carousel" data-items="5" data-auto-play="true" data-pagination="false" data-single-item="false">
            <!-- Item -->
            <?php

                if(isset($technologies) && is_array($technologies))
                {
                    foreach($technologies as $tech)
                    {
                        echo ((isset($tech['content'])) ? $tech['content'] : "");
                    }
                }

            ?>

        </div>
    </div>

    <!-- Client One Ends -->


</div>
</div>

<!-- Main content ends -->