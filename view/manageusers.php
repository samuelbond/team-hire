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
                                <h3><span>All Users</span></h3>
                                <small style="color:red;">Activate, Block and Delete User Accounts</small>
                            </div>

                            <div class="rptable table-responsive">
                                <table class="table table-bordered">
                                    <!-- Table Header -->
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <!-- Table Body -->
                                    <tbody>

                                    <?php
                                        foreach($allUsers as $users)
                                        {
                                            echo '
                                             <tr>
                                        <td><a href="#">'.$users['fullname'].'</a></td>
                                        <td>'.$users['email'].'</td>
                                        <td>'.(($users['status'] == 0) ? "Not Activated" : (($users['status'] == 2) ? "Account Blocked" : (($users['status'] == 3) ? "Account Deleted" : "Activated"))).'</td>
                                        <td>'.$users['date_created'].'</td>
                                        <td>
                                            <a href="#" onclick=\'postData("activate", '.$users['userid'].')\' data-toggle="tooltip" title="Activate User"><span style="color:green;" class="fa fa-check"></span></a>
                                            <br />
                                            <a href="#" onclick=\'postData("deactivate", '.$users['userid'].')\' data-toggle="tooltip" title="Deactivate User"><span style="color:orange;" class="fa fa-remove"></span></a>
                                            <br />
                                            <a href="#" onclick=\'postData("delete", '.$users['userid'].')\' data-toggle="tooltip" title="Delete User"><span style="color:#ff0000;" class="fa fa-minus"></span></a>
                                        </td>
                                    </tr>
                                            ';
                                        }
                                    ?>

                                    </tbody>
                                </table>
                            </div>



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
                            <li><a href="mycalender">My Calender</a> </li>
                            <li><a href="manageusers">Manage Users</a></li>
                            <li><a href="cmsmanager">New CMS Entry</a></li>
                            <li><a href="cmspage">CMS Page</a></li>
                            <li><a href="cmspageblock">CMS Page Blocks</a></li>
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


