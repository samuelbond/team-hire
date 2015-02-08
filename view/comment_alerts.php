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
                                <h3><span>All Publish Request</span></h3>
                            </div>

                            <div class="rptable table-responsive">
                                <table class="table table-bordered">
                                    <!-- Table Header -->
                                    <thead>
                                    <tr>
                                        <th>Blog Entry Title</th>
                                        <th>Category</th>
                                        <th>Commenter Name</th>
                                        <th>Commenter Email</th>
                                        <th>Comment Status</th>
                                        <th>Date Created</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <!-- Table Body -->
                                    <tbody>

                                    <?php

                                    foreach($alerts as $alert)
                                    {
                                        echo '
                                            <tr>
                                                <td><a href="publishcomment?read_comment='.$alert['id'].'" target="_blank">'.$alert['title'].'</a></td>
                                                <td>'.$alert['category'].'</td>
                                                <td>'.$alert['commenter'].'</td>
                                                <td>'.$alert['commenter_email'].'</td>
                                                <td>'.(($alert['status'] == 0) ? "Not Published" : (($alert['status'] == 2) ? "Deleted" : "Published")).'</td>
                                                <td>'.$alert['date_created'].'</td>
                                                <td>
                                                <a href="publishcomment?publish='.$alert['id'].'" data-toggle="tooltip" title="Publish"><span class="fa fa-print color"></span></a>
                                                <br />
                                                <a href="publishcomment?remove='.$alert['id'].'" data-toggle="tooltip" title="Delete"><span class="fa fa-remove color"></span></a>
                                                </td>
                                            </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            <div class="shopping-pagination">
                                <ul class="pagination">
                                    <?php
                                    for($k = 1; $k < $totalPages; $k++)
                                    {
                                        if($currentPage === $k)
                                        {
                                            echo '<li class="active">
                                                        <a href="#">'.$k.' <span class="sr-only">(current)</span></a></li>';
                                        }
                                        else
                                        {
                                            echo '<li><a href="myblog?page='.$k.'">'.$k.'</a></li>';
                                        }

                                    }
                                    ?>

                                </ul>
                            </div>
                            <!-- Pagination end-->

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

