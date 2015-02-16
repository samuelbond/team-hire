<!-- Main content starts -->

<div class="main-block">

    <!-- Page heading two starts -->

    <div class="page-heading-two">
        <div class="container">
            <h2><?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[0]['content'])) ? $our_services[0]['content'] : "") ?></h2>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Page heading two ends -->

    <div class="container">

        <!-- Top shadow block -->
        <div class="box-shadow-outer">
            <div class="box-shadow-block box-shadow-2">
                <h5><?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[1]['title'])) ? $our_services[1]['title'] : "") ?></h5>
                <?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[1]['content'])) ? $our_services[1]['content'] : "") ?>
            </div>
        </div>

        <!-- Icob boxes -->
        <div class="icon-box-3">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box Three Item -->
                    <div class="icon-box-3-item bg-red">
                        <!-- Heading -->
                        <i class="fa fa-cog"></i>
                        <!-- Heading -->
                        <h4><a><?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[2]['title'])) ? $our_services[2]['title'] : "") ?></a></h4>
                        <!-- Paragraph -->
                        <?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[5]['content'])) ? $our_services[5]['content'] : "") ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box Three Item -->
                    <div class="icon-box-3-item bg-lblue">
                        <i class="fa fa-user"></i>
                        <h4><a><?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[3]['title'])) ? $our_services[3]['title'] : "") ?></a></h4>
                        <?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[5]['content'])) ? $our_services[5]['content'] : "") ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box Three Item -->
                    <div class="icon-box-3-item bg-green">
                        <i class="fa fa-desktop"></i>
                        <h4><a><?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[4]['title'])) ? $our_services[4]['title'] : "") ?></a></h4>
                        <?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[5]['content'])) ? $our_services[5]['content'] : "") ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- Icon Box Three Item -->
                    <div class="icon-box-3-item bg-purple">
                        <i class="fa fa-leaf"></i>
                        <h4><a><?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[5]['title'])) ? $our_services[5]['title'] : "") ?></a></h4>
                        <?php echo ((isset($our_services) && is_array($our_services) && isset($our_services[5]['content'])) ? $our_services[5]['content'] : "") ?>
                    </div>
                </div>
            </div>
        </div>

        <hr />
        <br />

        <div class="row">
            <div class="col-md-7">
                <!-- Nav tabs -->
                <div class="nav-tabs-two">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                    <?php
                        $i_m = 0;
                        if(isset($main_services) && is_array($main_services))
                        {
                            foreach($main_services as $service_m)
                            {
                                $class = (($i_m === 0) ? 'class="active"' : '');
                                $i_m = $i_m+1;
                                echo '<li '.$class.' ><a href="#service-'.$i_m.'" data-toggle="tab">'.$service_m['title'].'</a></li>';
                            }
                        }

                    ?>


                    </ul>
                    <!-- Tab content -->
                    <div class="tab-content">

                        <?php
                            $k_m = 0;
                            if(isset($main_services) && is_array($main_services))
                            {
                                foreach($main_services as $service_m)
                                {
                                    $class = (($k_m === 0) ? 'in active' : '');
                                    $k_m = $k_m+1;
                                    echo '<div class="tab-pane fade '.$class.'" id="service-'.$k_m.'">
                                        '.$service_m['content'].'
                                    </div>
                                    ';
                                }
                            }
                        ?>
                    </div>
                </div>
                <br />
            </div>
            <div class="col-md-5">
                <h5><?php echo ((isset($service_why) && is_array($service_why) && isset($service_why[0]['title'])) ? $service_why[0]['title'] : "") ?></h5>
                <?php echo ((isset($service_why) && is_array($service_why) && isset($service_why[0]['content'])) ? $service_why[0]['content'] : "") ?>
            </div>
        </div>

        <br />

    </div>
</div>

<!-- Main content ends -->