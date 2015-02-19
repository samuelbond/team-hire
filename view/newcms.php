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
                                <h3><span>CMS Entries</span></h3>
                                <a data-toggle="modal" data-target="#cmsMenuType" ><span class="fa fa-plus color"></span> New CMS Menu Type</a>
                                <br />
                                <a data-toggle="modal" data-target="#cmsMenu" ><span class="fa fa-plus color"></span> New CMS Menu</a>
                                <br />
                                <a data-toggle="modal" data-target="#cmsPage" ><span class="fa fa-plus color"></span> New CMS Page</a>
                                <br />
                                <a href="#" data-toggle="modal" data-target="#cmsPageBlock"><span class="fa fa-plus color"></span> New CMS Page Block</a>
                            </div>

                            <div class="rptable table-responsive">
                                <table class="table table-bordered">
                                    <!-- Table Header -->
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Link</th>
                                        <th>Menu Type</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <!-- Table Body -->
                                    <tbody>

                                    <?php

                                        foreach($menus as $menu)
                                        {
                                            echo '
                                            <tr>
                                                <td>'.$menu['title'].'</td>
                                                <td>'.$menu['link'].'</td>
                                                <td>'.$menu['type'].'</td>
                                                <td>'.(($menu['status'] == 0) ? "Not Published" : (($menu['status'] == 2) ? "Deleted" : "Published")).'</td>
                                                <td>
                                                <a href="editmenu?edit_menu='.$menu['id'].'" data-toggle="tooltip" title="Edit"><span class="fa fa-edit color"></span></a>
                                                <br />
                                                <a href="editmenu?menu_publish='.$menu['id'].'&status=1" data-toggle="tooltip" title="Publish"><span class="fa fa-print color"></span></a>
                                                <br />
                                                <a href="editmenu?menu_publish='.$menu['id'].'&status=2" data-toggle="tooltip" title="Delete"><span class="fa fa-remove color"></span></a>
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
                                    /**
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
                                     *
                                     */
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


<!-- CMS Menu Type -->
<div class="modal fade" id="cmsMenuType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New CMS Menu Type</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="cmsmanager" >
                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Menu Type</label>
                            <input type="text" name="new_menu_type" class="form-control" id="exampleInputEmail1" placeholder="New Menu Type e.g home">
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create New Menu Type</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- CMS Menu -->
<div class="modal fade" id="cmsMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New CMS Menu</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="cmsmanager" >
                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Menu Title</label>
                            <input type="text" name="new_menu" class="form-control" id="exampleInputEmail1" placeholder="Menu title e.g Home">
                        </div>

                    </div>
                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Menu Order</label>
                            <input type="text" name="menu_order" class="form-control" id="exampleInputEmail1" placeholder="1">
                        </div>

                    </div>

                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Menu Link</label>
                            <input type="text" name="menu_link" class="form-control" id="exampleInputEmail1" placeholder="Menu Link e.g /home">
                        </div>

                    </div>

                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Menu Type</label>
                            <select name="m_type" class="form-control">
                                <?php foreach($menuTypes as $mType)
                                {
                                    echo '<option value="'.$mType['id'].'">'.$mType['title'].'</option>';
                                } ?>
                            </select>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create New Menu</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- CMS Page -->
<div class="modal fade" id="cmsPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New CMS Page</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="cmsmanager" >
                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Page Title</label>
                            <input type="text" name="new_page" class="form-control" id="exampleInputEmail1" placeholder="Menu title e.g Home">
                        </div>

                    </div>
                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Page Content</label>
                            <textarea class="form-control" name="new_page_content" id="content"></textarea>
                        </div>

                    </div>


                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Assign Page to Menu</label>
                            <select name="p_menu" class="form-control">
                                <?php foreach($menus as $m)
                                {
                                    echo '<option value="'.$m['id'].'">'.$m['title'].'</option>';
                                } ?>
                            </select>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create New Page</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- CMS Page Block -->
<div class="modal fade" id="cmsPageBlock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">New CMS Page Block</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="cmsmanager" >
                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Page Block Title</label>
                            <input type="text" name="new_page_block" class="form-control" id="exampleInputEmail1" placeholder="Menu title e.g Home">
                        </div>

                    </div>
                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Page Block Content</label>
                            <textarea class="form-control" name="new_page_block_content" id="content2"></textarea>
                        </div>

                    </div>


                    <div class="rptable table-responsive">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Assign Page Block to Page</label>
                            <select name="pb_page" class="form-control">
                                <?php foreach($pages as $p)
                                {
                                    echo '<option value="'.$p['id'].'">'.$p['title'].'</option>';
                                } ?>
                            </select>
                        </div>

                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create New Page Block</button>
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'content', {
        extraPlugins: 'codesnippet',
        codeSnippet_theme: 'monokai_sublime'
    });
</script>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'content2', {
        extraPlugins: 'codesnippet',
        codeSnippet_theme: 'monokai_sublime'
    });
</script>