<!-- Main content starts -->

<div class="main-block">

<!-- Page heading two starts -->

<div class="page-heading-two">
    <div class="container">
        <h2><?php echo ((isset($about_us) && is_array($about_us) && isset($about_us[1]['content'])) ? $about_us[1]['content'] : "") ?></h2>

        <div class="clearfix"></div>
    </div>
</div>

<!-- Page heading two ends -->

<div class="container">

<div class="about-us-two">

<div class="block-heading-two">
    <h3><span>About Us</span></h3>
</div>

<div class="row">
    <div class="col-md-5 col-sm-8">

        <!-- Carousel -->
        <!-- Bootstrap carousel usage
            Bootstrap carousel should have id. Below i am using "bs-carousel-X". Where "X" denotes number". If a page has more than 1 carousel, then add the new carousel with the id "bs-carousel-1", "bs-carousel-2". You also need to update the id in, "carousel indicators" section and "carousel control" section.

            Carousel comes with 3 main data attributes which you can customize. They are...
            data-interval - Time delay between item cycle. Default value "5000".
            data-pause - Pause on hover. Default value "pause".
            data-wrap - Continues cycle or stop at the end. Default value "true".
        -->

        <!-- Outer layer -->
        <div id="bs-carousel-1" class="carousel slide" data-ride="carousel" data-interval="5000" data-pause="hover" data-wrap="true">
            <!-- Bootstrap indicators. If you don't need indicators, remove the below section -->
            <ol class="carousel-indicators">
                <li data-target="#bs-carousel-1" data-slide-to="0" class="active"></li>
            </ol>
            <!-- Slides. You can also add captions -->
            <div class="carousel-inner">
                <!-- Item, First item should have extra class "active" -->
                <div class="item active">
                    <!-- Image -->
                    <img src="view/img/aboutus/about1.png" alt="">
                </div>
            </div>
            <!-- Carousel controls (arrows). If you don't need controls, remove the below section -->
            <a class="left carousel-control" href="#bs-carousel-1" role="button" data-slide="prev">
                <span class="fa fa-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#bs-carousel-1" role="button" data-slide="next">
                <span class="fa fa-chevron-right"></span>
            </a>
        </div>

    </div>
    <div class="col-md-7 col-sm-12">
        <?php echo ((isset($about_us) && is_array($about_us) && isset($about_us[0]['content'])) ? $about_us[0]['content'] : "") ?>
    </div>
</div>

<div class="block-heading-two">
    <h3><span>Your Team</span></h3>
</div>

<!-- Team starts -->
<div class="team-six">


            <!-- Team #2 member -->

            <?php

                if(isset($our_team_members) && is_array($our_team_members))
                {
                    $m = 1;
                    foreach($our_team_members as $team_member)
                    {
                        if($m === 1 || $m === 5 || $m === 9 || $m === 13)
                        {
                            echo '<div class="row">';
                        }
                        if($team_member['status'] == 1)
                        {
                            if(strpos(trim($team_member['fullname']), " ") !== false)
                            {
                                list($first, $last) = explode(" ", $team_member['fullname']);
                                $name = $first.' '.substr($last, 0,1);
                            }
                            else
                            {
                                $name = $team_member['fullname'];
                            }
                            echo '

            <div class="col-md-3 col-sm-6">
									<!-- Team Member -->
									<div class="team-member">
										<!-- Image -->
										<img class="img-responsive" src="'.$team_member['picture'].'" alt="" />
										<!-- Name -->
										<h4>'.$name.'</h4>
										<span class="deg">'.$team_member['job_title'].'</span>
										<!-- Team Links -->
										<div class="team-links">
											<a href="#"><i class="fa fa-envelope"></i></a>
										</div>
									</div>
								</div>
            ';
                        }

                        if($m === 4 || $m === 8 || $m === 12 || $m === 16)
                        {
                            echo '</div>';
                        }

                        $m++;
                    }
                }

            ?>

</div>
<!-- Team ends -->

<hr />
<br />

<!-- Client Three Starts

<h4 class="text-center">Our Clients</h4>

<div class="client-three">
    <div id="owl-carousel" class="owl-carousel" data-items="5" data-auto-play="2500" data-pagination="false" data-single-item="false">
        <div class="c3-item">
            <a href="#"><img src="view/img/clients/c2-1.png" alt=""  class="img-responsive" /></a>
        </div>
        <div class="c3-item">
            <a href="#"><img src="view/img/clients/c2-2.png" alt="" class="img-responsive" /></a>
        </div>
        <div class="c3-item">
            <a href="#"><img src="view/img/clients/c2-3.png" alt="" class="img-responsive" /></a>
        </div>
        <div class="c3-item">
            <a href="#"><img src="view/img/clients/c2-4.png" alt="" class="img-responsive" /></a>
        </div>
        <div class="c3-item">
            <a href="#"><img src="view/img/clients/c2-5.png" alt=""  class="img-responsive" /></a>
        </div>
        <div class="c3-item">
            <a href="#"><img src="view/img/clients/c2-6.png" alt="" class="img-responsive" /></a>
        </div>
        <div class="c3-item">
            <a href="#"><img src="view/img/clients/c2-2.png" alt="" class="img-responsive" /></a>
        </div>
        <div class="c3-item">
            <a href="#"><img src="view/img/clients/c2-3.png" alt="" class="img-responsive" /></a>
        </div>
    </div>
</div>

<!-- client Three Ends -->

<br />


</div>

</div>
</div>

<!-- Main content ends -->