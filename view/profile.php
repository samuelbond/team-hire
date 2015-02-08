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
						<h2>Profile <span></span></h2>

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
									<h4><i class="fa fa-user color"></i>&nbsp; My Profile&nbsp;</h4>
									<hr />
									<div class="shopping-account">
										<div class="row">
											<div class="col-md-3 col-sm-4 col-xs-4">
												<!-- Image -->
												<img src="<?php echo $profile->getProfilePicture(); ?>" class="img-responsive img-thumbnail" alt="profile picture" />
											</div>
											<div class="col-md-9 col-sm-8 col-xs-8">
												<!-- Your Name / Heading -->
												<h4><?php echo $profile->getFullName(); ?></h4>
												<div class="address">
													<!-- Address -->
													<p><?php echo $profile->getProfile(); ?></p>
													<!-- Email Address -->
													<span><i class="fa fa-envelope color"></i>&nbsp; <?php echo $profile->getEmail(); ?></span>
												</div>
											</div>
										</div>
										<br />
                                        <div class="block-heading-two">
                                            <h3><span>Recent Blog Entries</span></h3>
                                        </div>
										<!-- Recent Purchase Table -->
										<div class="rptable table-responsive">
											<table class="table table-bordered">
												<!-- Table Header -->
												<thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Date Created</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <!-- Table Body -->
                                                <tbody>

                                                <?php

                                                foreach($myblog as $blog)
                                                {
                                                    echo '
                                            <tr>
                                                <td>'.$blog['title'].'</td>
                                                <td>'.$blog['category'].'</td>
                                                <td>'.(($blog['status'] == 0) ? "Not Published" : (($blog['status'] == 2) ? "Deleted" : "Published")).'</td>
                                                <td>'.$blog['date_created'].'</td>
                                                <td>
                                                <a href="editblog?edit='.$blog['id'].'" data-toggle="tooltip" title="Edit"><span class="fa fa-edit color"></span></a>
                                                <br />
                                                <a href="myblog?publish='.$blog['id'].'" data-toggle="tooltip" title="Publish"><span class="fa fa-print color"></span></a>
                                                <br />
                                                <a href="#" data-toggle="tooltip" title="Delete"><span class="fa fa-remove color"></span></a>
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
                                                        echo '<li><a href="profile?page='.$k.'">'.$k.'</a></li>';
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
