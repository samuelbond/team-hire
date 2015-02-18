
<!-- Main content starts -->

<div class="main-block">

    <!-- Page heading two starts -->

    <div class="page-heading-two">
        <div class="container">
            <h2><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[0]['content'])) ? $how_it_works[0]['content'] : ""); ?></h2>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Page heading two ends -->

    <div class="container">

        <!-- Heading -->
        <div class="block-heading-six">
            <h4 class="bg-color"><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[1]['content'])) ? $how_it_works[1]['content'] : ""); ?></h4>
        </div>
        <br />
        <div class="our-process">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Our Process Item-->
                    <div class="our-process-item">
                        <!-- Icon -->
                        <a href="#" class="white bg-red"> <i class="fa fa-lightbulb-o"></i></a>
                        <!-- Arrow Image -->
                        <img src="img/our-process/arrow.png" alt="" class="img-responsive hidden-sm hidden-xs" />
                        <!-- Heading -->
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[2]['title'])) ? $how_it_works[2]['title'] : ""); ?></h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-process-item">
                        <a href="#" class="white bg-lblue"> <i class="fa fa-desktop"></i></a>
                        <img src="img/our-process/arrow.png" alt="" class="img-responsive hidden-sm hidden-xs" />
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[3]['title'])) ? $how_it_works[3]['title'] : ""); ?></h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-process-item">
                        <a href="#" class="white bg-green"> <i class="fa fa-code"></i></a>
                        <img src="img/our-process/arrow.png" alt="" class="img-responsive hidden-sm hidden-xs" />
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[4]['title'])) ? $how_it_works[4]['title'] : ""); ?></h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-process-item">
                        <a href="#" class="white bg-purple"> <i class="fa fa-check-square-o"></i>
                        </a>
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[5]['title'])) ? $how_it_works[5]['title'] : ""); ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Process ends -->

        <br />
        <hr />
        <br />

        <!-- Heading -->
        <div class="block-heading-six">
            <h4 class="bg-color">Here is what it all entails</h4>
        </div>
        <br />

        <!-- Our process one starts -->
        <div class="our-process-one">

            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Our process one item starts -->
                    <div class="op-one-item">
                        <h5 class="bg-red">Step 1</h5>
                        <?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[2]['content'])) ? $how_it_works[2]['content'] : ""); ?>
                    </div>
                    <!-- Our process one item ends -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Our process one item starts -->
                    <div class="op-one-item">
                        <h5 class="bg-lblue">Step 2</h5>
                        <?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[3]['content'])) ? $how_it_works[3]['content'] : ""); ?>
                    </div>
                    <!-- Our process one item ends -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Our process one item starts -->
                    <div class="op-one-item">
                        <h5 class="bg-green">Step 3</h5>
                        <?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[4]['content'])) ? $how_it_works[4]['content'] : ""); ?>
                    </div>
                    <!-- Our process one item ends -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Our process one item starts -->
                    <div class="op-one-item">
                        <h5 class="bg-purple">Step 4</h5>
                        <?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[5]['content'])) ? $how_it_works[5]['content'] : ""); ?>
                    </div>
                    <!-- Our process one item ends -->
                </div>
            </div>

        </div>
        <!-- Our process one ends -->

    </div>
</div>

<!-- Main content ends -->