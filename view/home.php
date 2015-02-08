
			<!-- Header two ends -->
			
			<!-- Main content starts -->
	
			<div class="main-block">
				
				<!-- Page heading one starts -->
				
					<div class="page-heading-one">
						<h2>Welcome to the Team Hire Blog</h2>
						<p class="bg-color">This is how we blog</p>
					</div>
					
				<!-- Page heading one ends -->
			
				<div class="container">
					<div class="blog-masonry">
					
						<!-- Grid Item - Image, Heading and Para -->


                        <?php
                        foreach($allBlog as $blog)
                        {
                            echo '<div class="item">
							<!-- Entry for each grid -->
							<div class="grid-entry">
								<!-- Grid Image Container -->
								<div class="grid-img">
									<!-- Image -->
									<img src="'.$blog['cover'].'" class="img-responsive" alt="" />
									<!-- Grid Image Hover Effect -->
									<span class="grid-img-hover"></span>
									<a href="'.$blog['cover'].'" class="lightbox">
										<i class="fa fa-search hover-icon"></i>
									</a>
								</div>
								<!-- Grid entry information -->
								<div class="entry-info">
									<!-- Heading -->
									<h4><a href="blog/entry/'.$blog['entry_id'].'">'.$blog['title'].'</a></h4>
									<div class="bor"></div>
									<!-- Paragraph -->
									'.substr($blog['entry'], 0, 51).'...
									<a href="blog/entry/'.$blog['entry_id'].'" class="read-more">Read More <i class="fa fa-angle-double-right"></i></a>
								</div>
							</div>
						</div>
                        ';
                        }


                        ?>


						
						<div class="clearfix"></div>
					</div>
					
					<hr />
                    <!-- Pagination -->
                        <ul class="pagination">
                            <?php
                            if($totalPages > 0)
                            for($k = 0; $k <= $totalPages; $k++)
                            {
                                if($currentPage == ($k+1))
                                {
                                    echo '<li class="active"><a href="#">'.($k+1).' <span class="sr-only">(current)</span></a></li>';
                                }
                                else
                                {
                                    echo '<li><a href="index?page='.($k+1).'">'.($k+1).'</a></li>';
                                }

                            }
                            ?>

                        </ul>
                    <!-- Pagination end-->
					
				</div>
			</div>
			
			<!-- Main content ends -->
			
