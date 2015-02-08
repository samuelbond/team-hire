<?php
/**
 * @var \component\blog\BlogEntry $blog
 */
?>

<script src="view/ckeditor/ckeditor.js"></script>

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
                        <h4><i class="fa fa-wrench color"></i>&nbsp; <?php echo $pageTitle; ?>&nbsp;</h4>
                        <hr />
                        <?php

                        if(isset($error))
                        {
                            echo '<div class="row">
                <div class="col-md-6 col-md-push-3">
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
                <div class="col-md-6 col-md-push-3">
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
                <div class="col-md-6 col-md-push-3">
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
                                <h3><span>Update Blog Entry</span></h3>
                            </div>

                            <form method="post" action="editblog" enctype="multipart/form-data">
                                <div class="rptable table-responsive">
                                    <div class="form-group">
                                        <input type="hidden" name="blog_entry" value="<?php echo $blog->getId(); ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Blog Entry Title</label>
                                        <input type="text" name="edit_title" class="form-control" id="exampleInputEmail1" value="<?php echo $blog->getEntryTitle(); ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="blogentry">Blog Entry</label>
                                        <textarea class="form-control" name="edit_entry" id="blogentry" ><?php echo $blog->getEntry(); ?></textarea>
                                    </div>

                                </div>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-4 col-md-pull-9 col-sm-pull-8">

                    <!-- Shopping Sidebar -->
                    <div class="sidebar">

                        <!-- Heading -->
                        <h2>Navigation</h2>
                        <!-- Sidebar Menu -->
                        <ul class="account-nav">
                            <li><a href="profile">My Profile</a></li>
                            <li><a href="manageprofile">Manage Profile</a></li>
                            <li><a href="manageusers">Manage Users</a></li>
                            <li><a href="myblog">My Blog</a></li>
                            <li><a href="publishblog">Publish Alerts</a></li>
                            <li><a href="publishcomment">Blog Comments</a></li>
                        </ul>

                    </div>
                </div>

            </div>

        </div>
        <br />


    </div>
</div>
</div>
<!-- Main content ends -->





<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'blogentry', {
        extraPlugins: 'codesnippet',
        codeSnippet_theme: 'monokai_sublime'
    });
</script>
