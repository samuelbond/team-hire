
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
                        <a href="#" data-toggle="modal" data-target="#modal1" class="white bg-red"> <i class="fa fa-lightbulb-o"></i></a>
                        <!-- Arrow Image -->
                        <img src="view/img/our-process/arrow.png" alt="" class="img-responsive hidden-sm hidden-xs" />
                        <!-- Heading -->
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[2]['title'])) ? $how_it_works[2]['title'] : ""); ?></h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-process-item">
                        <a href="#" data-toggle="modal" data-target="#modal2" class="white bg-lblue"> <i class="fa fa-envelope"></i></a>
                        <img src="view/img/our-process/arrow.png" alt="" class="img-responsive hidden-sm hidden-xs" />
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[3]['title'])) ? $how_it_works[3]['title'] : ""); ?></h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-process-item">
                        <a href="#" data-toggle="modal" data-target="#modal3" class="white bg-yellow"> <i class="fa fa-desktop"></i></a>
                        <img src="view/img/our-process/arrow.png" alt="" class="img-responsive hidden-sm hidden-xs" />
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[4]['title'])) ? $how_it_works[4]['title'] : ""); ?></h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-process-item">
                        <a href="#" data-toggle="modal" data-target="#modal4" class="white bg-green"> <i class="fa fa-code"></i></a>
                        <img src="view/img/our-process/arrow.png" alt="" class="img-responsive hidden-sm hidden-xs" />
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[5]['title'])) ? $how_it_works[5]['title'] : ""); ?></h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="our-process-item">
                        <a href="#" data-toggle="modal" data-target="#modal5" class="white bg-purple"> <i class="fa fa-check-square-o"></i>
                        </a>
                        <img src="view/img/our-process/arrow.png" alt="" class="img-responsive hidden-sm hidden-xs" />
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[6]['title'])) ? $how_it_works[6]['title'] : ""); ?></h4>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="our-process-item">
                        <a href="#" data-toggle="modal" data-target="#modal6" class="white bg-orange"> <i class="fa fa-cog"></i></a>
                        <h4><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[7]['title'])) ? $how_it_works[7]['title'] : ""); ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Process ends -->


    </div>
</div>

<!-- Main content ends -->


<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[2]['title'])) ? $how_it_works[2]['title'] : ""); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[2]['content'])) ? $how_it_works[2]['content'] : ""); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[3]['title'])) ? $how_it_works[3]['title'] : ""); ?></h4>
            </div>
            <div class="modal-body">
                <!-- Smart form starts -->
                <div class="smart-forms">
                <form method="post" action="/" id="form-elements">

                    <h4>Tell us about your project</h4>

                    <div class="section">
                        <label for="amount">Maximum budget for project:</label>
                        <input type="text" name="proj_budget" id="amount" class="slider-input">
                        <br /><br />
                        <div class="slider-wrapper yellow-slider">
                            <div id="slider2"></div>
                        </div><!-- end .slider-wrapper -->
                    </div><!-- end section -->

                    <div class="section">
                        <label for="bedrooms">Expected Deadline <small>[ in weeks ]</small></label>
                        <input type="text" name="proj_deadline" id="bedrooms" class="slider-input">
                        <br /><br />
                        <div class="slider-wrapper blue-slider">
                            <div id="slider3"></div>
                        </div><!-- end .slider-wrapper -->
                    </div><!-- end section -->

                    <!-- Textarea -->
                    <div class="section">
                        <!-- Label -->
                        <label for="textarea" class="field-label">Describe your project</label>
                        <label class="field prepend-icon">
                            <textarea class="gui-textarea" id="textarea" name="proj_desc" placeholder="Everything starts with an idea"></textarea>
                            <label class="field-icon"><i class="fa fa-lock"></i></label>
                            <!-- Small hint block -->
											<span class="input-hint">
												Tell us about your idea for your project
											</span>
                        </label>
                    </div>

                    <!-- Simple text box -->
                    <div class="section">
                        <!-- Label -->
                        <label for="simple-text" class="field-label">Your Name or Company Name</label>
                        <label class="field">
                            <!-- Input box -->
                            <input type="text" name="proj_name" id="simple-text" class="gui-input" placeholder="John Doe">
                        </label>
                    </div>

                    <!-- Simple text box -->
                    <div class="section">
                        <!-- Label -->
                        <label for="simple-text" class="field-label">Your Email</label>
                        <label class="field">
                            <!-- Input box -->
                            <input type="email" name="proj_email" id="simple-text" class="gui-input" placeholder="youremail@domain.com">
                        </label>
                    </div>

                    <!-- Simple text box -->
                    <div class="section">
                        <!-- Label -->
                        <label for="simple-text" class="field-label">Your Phone</label>
                        <label class="field">
                            <!-- Input box -->
                            <input type="text" name="proj_phone" id="simple-text" class="gui-input" placeholder="07245845250">
                        </label>
                    </div>

                    <div class="section">
                        <button type="submit" class="btn btn-red">Submit</button>&nbsp;
                    </div>

                    </form>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[4]['title'])) ? $how_it_works[4]['title'] : ""); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[4]['content'])) ? $how_it_works[4]['content'] : ""); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[5]['title'])) ? $how_it_works[5]['title'] : ""); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[5]['content'])) ? $how_it_works[5]['content'] : ""); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[6]['title'])) ? $how_it_works[6]['title'] : ""); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[6]['content'])) ? $how_it_works[6]['content'] : ""); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[7]['title'])) ? $how_it_works[7]['title'] : ""); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo ((isset($how_it_works) && is_array($how_it_works) && isset($how_it_works[7]['content'])) ? $how_it_works[7]['content'] : ""); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

