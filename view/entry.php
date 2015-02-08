<?php
/**
 * @var \component\blog\BlogEntry $entry
 */

/**
 * @var \component\usermanager\User $author
 */
$author = $reader->getUserDetail($entry->getEntryAuthor());
?>
<!-- Main content starts -->

<div class="main-block">

<!-- Page heading two starts -->

<div class="page-heading-two">
    <div class="container">
        <h2><a href="index"><i class="fa fa-home"></i></a> &nbsp;  /  <a><?php echo $entry->getEntryTitle(); ?></a></h2>
        <div class="clearfix"></div>
    </div>
</div>

<!-- Page heading two ends -->

<div class="container">

<!-- blog two -->
<div class="blog-two">
<div class="row">
<!-- Mainbar column -->
<div class="col-md-8">

    <!-- Blog item starts -->
    <div class="blog-two-item">
        <!-- blog two Content -->
        <div class="blog-two-content">
            <!-- Heading -->
            <h3><?php echo $entry->getEntryTitle(); ?></h3>
            <!-- Blog meta -->
            <div class="blog-meta">
                <!-- Date -->
                <i class="fa fa-calendar"></i> &nbsp; <?php echo $entry->getEntryDate(); ?> &nbsp;
                <!-- Author -->
                <i class="fa fa-user"></i> &nbsp; <?php echo $author->getFullName(); ?>&nbsp;
                <!-- Comments -->
               <i class="fa fa-comments"></i> &nbsp; <?php echo $totalComments; ?> Comments
            </div>

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
            <!-- Image -->
            <img src="<?php echo $entry->getEntryCover(); ?>" alt="" class="img-responsive img-thumbnail">


            <p></p>
            <!-- Paragraph -->
            <?php echo $entry->getEntry(); ?>
        </div>
    </div>
    <!-- Blog item ends -->

    <!-- Social media sharing section -->
    <div class="well">
        <span class="bold">There is Love in Sharing: </span>  &nbsp; &nbsp;
									<span class="brand-bg">
										<a href="#" class="facebook"><i class="fa fa-facebook square-2 rounded-1"></i></a>
										<a href="#" class="twitter"><i class="fa fa-twitter square-2 rounded-1"></i></a>
										<a href="#" class="google-plus"><i class="fa fa-google-plus square-2 rounded-1"></i></a>
										<a href="#" class="linkedin"><i class="fa fa-linkedin square-2 rounded-1"></i></a>
										<a href="#" class="pinterest"><i class="fa fa-pinterest square-2 rounded-1"></i></a>
									</span>
    </div>

    <!-- Author section -->
    <div class="blog-author well">
        <!-- Author image -->
        <div class="blog-author-img">
            <a href="#"><img src="<?php echo $author->getProfilePicture(); ?>" alt="" class="img-responsive img-thumbnail" /></a>
        </div>
        <!-- Author details -->
        <div class="blog-author-content">
            <h5><a href="#"><?php echo $author->getFullName(); ?></a></h5>
            <?php echo $author->getProfile(); ?>
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- Comments section -->
    <div class="blog-comments">
        <h4><i class="fa fa-comments color"></i>&nbsp; <?php echo $totalComments; ?></h4>
        <hr />

        <!-- Blog comment item -->


        <?php

        foreach($comments as $comment)
        {
            echo '
        <div class="blog-comment-item">
            <div class="comment-author-image">
                <a href="#"><img src="view/profile-pictures/default.png" alt="" class="img-responsive img-thumbnail" /></a>
            </div>
            <div class="comment-details">
                <!-- Name -->
                <h5>'.$comment['commenter'].' <small>'.$comment['date_created'].'</small></h5>
                <!-- Paragraph -->
                '.$comment['comment'].'
            </div>
        </div>';
        }

        ?>

        <div class="shopping-pagination">
            <ul class="pagination">
                <?php
                for($k = 1; $k < $totalPages; $k++)
                {
                    if($currentPage === $k)
                    {
                        echo '<li class="active"><a href="#">'.$k.' <span class="sr-only">(current)</span></a></li>';
                    }
                    else
                    {
                        echo '<li><a href="blog/entry/'.$entry->getEntryId().'?page='.$k.'">'.$k.'</a></li>';
                    }

                }
                ?>

            </ul>
        </div>

    </div>

    <br />

    <!-- Comment Form -->
    <div class="well">
        <!-- Heading -->
        <h4><i class="fa fa-comments color"></i>&nbsp; Post Comment</h4><!-- Form -->
        <hr />
        <form class="form" role="form" method="post" action="blog">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="fname" class="form-control" placeholder="Enter Name" required="required">
                    </div>
                </div>
                <input type="hidden" name="entry_id" value="<?php echo $entry->getId(); ?>" />
                <input type="hidden" name="blog_id" value="<?php echo $entry->getEntryId(); ?>" />
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required="required">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea class="form-control" name="comment" rows="7" placeholder="Enter Message" required="required"></textarea>
            </div>
            <!-- Button -->
            <button type="submit" class="btn btn-color">Submit</button>&nbsp;
            <button type="button" class="btn btn-white">Reset</button>
        </form>
    </div>


</div>

<!-- Sidebar column -->
<div class="col-md-4">
    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Search Widget -->
        <div class="s-widget">
            <!-- Heading -->
            <h5><i class="fa fa-search color"></i>&nbsp; Search</h5>
            <!-- Widgets Content -->
            <div class="widget-content search">
                <form role="form">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Type Something" id="searchTerm2">
													<span class="input-group-btn">
														<button class="btn btn-color" type="button" onclick="sendSearch2()">Search</button>
													</span>
                    </div>
                </form>
            </div>
        </div>

        <!-- Categories Widget -->
        <div class="s-widget">
            <!-- Heading -->
            <h5><i class="fa fa-folder color"></i>&nbsp; Categories</h5>
            <!-- Widgets Content -->
            <div class="widget-content categories">
                <ul class="list-6">
                    <?php

                    foreach($categories as $category)
                    {
                        echo '<li><a href="blog/category/'.$category['id'].'">'.$category['category'].'</a></li>';
                    }
                    ?>

                </ul>
            </div>
        </div>


        <!-- Tag Widget -->
        <div class="s-widget">
            <!--
            <h5><i class="fa fa-tags color"></i>&nbsp; Tags</h5>
            <div class="widget-content">
                <a href="#" class="label label-color">web</a>
                <a href="#" class="label label-color">wordpress</a>
                <a href="#" class="label label-color">php</a>
                <a href="#" class="label label-color">jquery</a>
                <a href="#" class="label label-color">java</a>
                <a href="#" class="label label-color">photoshop</a>
                <a href="#" class="label label-color">windows</a>
                <a href="#" class="label label-color">android</a>
                <a href="#" class="label label-color">ios</a>
                <a href="#" class="label label-color">chrome</a>
                <a href="#" class="label label-color">development</a>
                <a href="#" class="label label-color">plugin</a>
                <a href="#" class="label label-color">personal</a>
                <a href="#" class="label label-color">general</a>
            </div>
            -->
        </div>

    </div>
</div>
</div>
</div>

</div>
</div>

<!-- Main content ends -->
