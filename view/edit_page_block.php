<?php
/**
 * @var \component\usermanager\User $profile
 */
?>

<script src="view/ckeditor/ckeditor.js"></script>

<!-- Main content starts -->

<div class="main-block">

    <!-- Page heading two starts -->

    <div class="page-heading-two">
        <div class="container">
            <h2><a href="cmspageblock">Go Back to Cms Page Blocks</a> <span></span></h2>

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
                        <h4><i class="fa fa-user color"></i>&nbsp; Edit&nbsp;</h4>
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
                                <h3><span>Update Page Block</span></h3>
                            </div>

                            <form method="post" action="editpageblock" enctype="multipart/form-data">
                                <div class="rptable table-responsive">

                                    <input type="hidden" name="page_block_id" value="<?php echo $page[0]['id']; ?>" />
                                    <div class="form-group">
                                        <label for="exampleInputName">Page Block Title</label>
                                        <input type="text" name="page_block_title" class="form-control" id="exampleInputName" value="<?php echo $page[0]['title']; ?>" >
                                    </div>

                                    <div class="rptable table-responsive">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Page Block Content</label>
                                            <textarea class="form-control" name="page_block_content" id="content"><?php echo $page[0]['content']; ?></textarea>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary">Update Page</button>
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

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'content', {
        extraPlugins: 'codesnippet',
        codeSnippet_theme: 'monokai_sublime'
    });
</script>