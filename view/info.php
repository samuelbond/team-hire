<?php
/**
 * @var \component\usermanager\User $profile
 */
?>
<!-- Main content starts -->

<div class="main-block">

    <!-- Page heading two starts -->

    <div class="page-heading-two">
        <div class="container">
            <h2><?php echo $pageTitle; ?> <span></span></h2>

            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Page heading two ends -->

    <div class="container">

        <!-- Actual content -->
        <div class="ecommerce">

            <div class="row">
                <div class="col-md-9 col-sm-8 col-md-push-3 col-sm-push-4">
                    <!-- Shopping items content -->
                    <div class="shopping-content">
                        <!-- Block Title -->
                        <h4><i class="fa fa-lock color"></i>&nbsp; <?php if(isset($headTitle))echo $headTitle;else echo "Opps Something Happened"; ?>&nbsp;</h4>
                        <hr />
                        <?php

                        if(isset($error))
                        {
                            echo '
                            <div class="row">
                                <div class="col-md-9">
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
                <div class="col-md-9">
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
                <div class="col-md-9 col-md-push-3">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Heads up!</strong> '.$message.'.
                    </div>
                </div>
                </div>';
                        }

                        ?>

                    </div>
                </div>


            </div>

        </div>
        <br />
        <br />

    </div>
</div>
</div>


<!-- Main content ends -->


