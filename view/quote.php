<!-- Main content starts -->

<div class="main-block">

    <!-- Page heading one ends -->

    <div class="container">
        <div class="contact-us-three">

            <div class="row">
                <div class="col-md-8">
                    <?php

                    if(isset($error))
                    {
                        echo '<div class="row">
                <div class="col-md-10 col-md-push-2">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Error!</strong> '.$error.'.
                    </div>
                </div>
                </div>';
                    }

                    if(isset($success))
                    {
                        echo '<div class="row">
                <div class="col-md-10 col-md-push-2">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> '.$success.'.
                    </div>
                </div>
                </div>';
                    }


                    if(isset($message))
                    {
                        echo '<div class="row">
                <div class="col-md-10 col-md-push-2">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Heads up!</strong> '.$message.'.
                    </div>
                </div>
                </div>';
                    }

                    ?>
                    <!-- Contact Form -->
                    <div class="contact-form">
                        <!-- Smart form starts -->
                        <div class="smart-forms">
                            <form method="post" action="contact" id="form-elements">

                                <h4>Tell us about your project</h4>

                                <div class="section">
                                    <label for="amount">Maximum budget for project:</label>
                                    <input type="text" name="proj_budget" id="amount" class="slider-input" required>
                                    <br /><br />
                                    <div class="slider-wrapper yellow-slider">
                                        <div id="slider2"></div>
                                    </div><!-- end .slider-wrapper -->
                                </div><!-- end section -->

                                <div class="section">
                                    <label for="bedrooms">Expected Deadline <small>[ in weeks ]</small></label>
                                    <input type="text" name="proj_deadline" id="bedrooms" class="slider-input" required>
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
                                        <textarea class="gui-textarea" id="textarea" name="proj_desc" placeholder="Everything starts with an idea" required="required"></textarea>
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
                                        <input type="text" name="proj_name" id="simple-text" class="gui-input" placeholder="John Doe" required>
                                    </label>
                                </div>

                                <!-- Simple text box -->
                                <div class="section">
                                    <!-- Label -->
                                    <label for="simple-text" class="field-label">Your Email</label>
                                    <label class="field">
                                        <!-- Input box -->
                                        <input type="email" name="proj_email" id="simple-text" class="gui-input" placeholder="youremail@domain.com" required>
                                    </label>
                                </div>

                                <!-- Simple text box -->
                                <div class="section">
                                    <!-- Label -->
                                    <label for="simple-text" class="field-label">Your Phone</label>
                                    <label class="field">
                                        <!-- Input box -->
                                        <input type="text" name="proj_phone" id="simple-text" class="gui-input" placeholder="07245845250" required>
                                    </label>
                                </div>

                                <div class="section">
                                    <button type="submit" class="btn btn-red">Submit</button>&nbsp;
                                </div>

                            </form>
                    </div>
                     </div>

                    <br />

                </div>
                <div class="col-md-4 col-sm-6">

                    <div class="well">
                        <h6><i class="fa fa-user"></i>&nbsp;&nbsp;Get a quote</h6>
                        <p>Are you ready to start your next project, tell us your ideas and let us pick it from there</p>
                        <div class="brand-bg">
                            <!-- Social Media Icons -->
                            <a href="<?php echo ((isset($facebook)) ? $facebook : ""); ?>" class="facebook"><i class="fa fa-facebook circle-3"></i></a>
                            <a href="<?php echo ((isset($twitter)) ? $twitter : ""); ?>" class="twitter"><i class="fa fa-twitter circle-3"></i></a>
                            <a href="<?php echo ((isset($googlePlus)) ? $googlePlus : ""); ?>" class="google-plus"><i class="fa fa-google-plus circle-3"></i></a>
                            <a href="<?php echo ((isset($linkedIn)) ? $linkedIn : ""); ?>" class="linkedin"><i class="fa fa-linkedin circle-3"></i></a>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>

<!-- Main content ends -->