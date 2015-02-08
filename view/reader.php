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
						<h2>View Blog Entry </h2>
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
										<h3><a href="blog-single.html"><?php echo $entry->getEntryTitle(); ?></a></h3>
										<!-- Blog meta -->
										<div class="blog-meta">
											<!-- Date -->
											<a href="#"><i class="fa fa-calendar"></i> &nbsp; <?php echo $entry->getEntryDate(); ?></a> &nbsp;
											<!-- Author -->
											<a href="#"><i class="fa fa-user"></i> &nbsp; <?php echo $author->getFullName(); ?></a> &nbsp;
											<!-- Comments -->
											<a href="#"><i class="fa fa-comments"></i> &nbsp; 6 Comments</a>
										</div>

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
                                                        echo '<li><a href="#">'.$category['category'].'</a></li>';
                                                    }
                                                ?>

											</ul>
										</div>
									</div>
									

								</div>
							</div>
						</div>
					</div>
									
				</div>
			</div>
			
			<!-- Main content ends -->
