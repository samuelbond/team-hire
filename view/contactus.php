<!-- Main content starts -->

<div class="main-block">

    <div class="contact-us-one">
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
        <div class="contact-map">
            <!-- Map Link -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2481.569904576026!2d0.07809099999999998!3d51.53944799999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a66c43096c29%3A0xa7852b0789d44e12!2sBarking+Enterprise+Centre!5e0!3m2!1sen!2suk!4v1424275535732" ></iframe>
        </div>

        <br />

        <div class="container">

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <!-- Contact Item -->
                    <div class="text-center">
                        <!-- Contact No -->
                        <div class="contact-item">
                            <!-- Icon -->
                            <i class="fa fa-phone bg-lblue circle-3"></i>
                            <!-- Heading -->
                            <h5><?php echo ((isset($contact_us) && is_array($contact_us) && isset($contact_us[0]['title'])) ? $contact_us[0]['title'] : ""); ?></h5>
                            <!-- Paragraph -->
                            <?php echo ((isset($contact_us) && is_array($contact_us) && isset($contact_us[0]['content'])) ? $contact_us[0]['content'] : ""); ?>
                        </div>
                        <!-- Contact Mail -->

                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                    <!-- Contact Item -->
                    <div class="text-center">
                        <!-- Contact Address -->
                        <div class="contact-item">
                            <i class="fa fa-envelope bg-green circle-3"></i>
                            <h5><?php echo ((isset($contact_us) && is_array($contact_us) && isset($contact_us[1]['title'])) ? $contact_us[1]['title'] : ""); ?></h5>
                            <?php echo ((isset($contact_us) && is_array($contact_us) && isset($contact_us[1]['content'])) ? $contact_us[1]['content'] : ""); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-6">
                    <div class="contact-item">
                        <!-- Contact Form -->
                        <div class="contact-form">
                            <h5>Contact Form</h5>
                            <!-- Form -->
                            <form class="form" role="form" action="contact" method="post">
                                <!-- Form Group -->
                                <div class="form-group">
                                    <input name="fullname" type="text" class="form-control" id="name" placeholder="Enter Name" required="required">
                                </div>
                                <div class="form-group">
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Enter Email" required="required">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="comments" rows="7" placeholder="Enter Message" required="required"></textarea>
                                </div>
                                <!-- Button -->
                                <button type="submit" class="btn btn-red">Submit</button>&nbsp;
                                <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6">
                    <div class="contact-item">
                        <!-- Social -->
                        <div class="brand-bg">
                            <!-- Heading -->
                            <h5>Connect</h5>
                            <!-- Order List -->
                            <ul class="list-unstyled">
                                <!-- Social Media Icons -->
                                <li><a href="<?php echo ((isset($facebook)) ? $facebook : ""); ?>" class="facebook"><i class="fa fa-facebook circle-2"></i></a></li>
                                <li><a href="<?php echo ((isset($twitter)) ? $twitter : ""); ?>" class="twitter"><i class="fa fa-twitter circle-2"></i></a></li>
                                <li><a href="<?php echo ((isset($googlePlus)) ? $googlePlus : ""); ?>" class="google-plus"><i class="fa fa-google-plus circle-2"></i></a></li>
                                <li><a href="<?php echo ((isset($linkedIn)) ? $linkedIn : ""); ?>" class="linkedin"><i class="fa fa-linkedin circle-2"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Main content ends -->