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
            <h2><a href="cmsmanager">Go Back to Cms Manager</a> <span></span></h2>

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
                        <h4><i class="fa fa-user color"></i>&nbsp; Edit Menu&nbsp;</h4>
                        <hr />
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
                        <div class="shopping-account">

                            <br />
                            <div class="block-heading-two">
                                <h3><span>Update Menu</span></h3>
                            </div>

                            <form method="post" action="editmenu" enctype="multipart/form-data">
                                <div class="rptable table-responsive">

                                    <input type="hidden" name="menu_id" value="<?php echo $menus[0]['id']; ?>" />
                                    <div class="form-group">
                                        <label for="exampleInputName">Menu Title</label>
                                        <input type="text" name="menu_title" class="form-control" id="exampleInputName" value="<?php echo $menus[0]['title']; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputProfile">Menu Link</label>
                                        <input type="text" class="form-control" name="menu_link" id="exampleInputProfile" value="<?php echo $menus[0]['link']; ?>" />
                                    </div>
                                    <div class="form-group">

                                    <div class="form-group">
                                        <label for="exampleInputPassword">Menu Order</label>
                                        <input type="text" name="menu_order" class="form-control" id="exampleInputPassword" value="<?php echo $menus[0]['order']; ?>" />
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">Update Menu</button>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <br />


    </div>
</div>

<!-- Main content ends -->
