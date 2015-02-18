<!-- Main content starts -->

<div class="main-block">

    <!-- Page heading one ends -->

    <div class="container">
        <div class="contact-us-three">

            <div class="row">
                <div class="col-md-8">

                    <!-- Contact Form -->
                    <div class="contact-form">
                        <h5>Get a quote <small>Tell us about your project</small></h5>
                        <!-- Form -->
                        <form class="form" role="form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="c_fullname" type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="c_email" type="email" class="form-control" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="phone" type="text" class="form-control" placeholder="Enter Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="project_message" class="form-control" id="comments" rows="8" placeholder="Enter Message"></textarea>
                            </div>
                            <!-- Button -->
                            <button type="submit" class="btn btn-red">Submit</button>&nbsp;
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
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