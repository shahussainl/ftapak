 <?php
// echo "<pre>";
// print_r($allNews);
// die();
?> 
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <?php include'headSearch/headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Latest Updates</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>NewsFeed</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <!-- Blog large img -->
                          <?php
                            if($allNews)
                            {
                             foreach ($allNews as  $row) 
                             {
                             	
                          ?>
						   <div class="blog-post blog-lg blog-style-1">
							<div class="dez-post-media dez-img-effect zoom-slow radius-sm">
							 <a href="<?php echo base_url('Pages/newsFeedDetail/'.$row['n_u_id']);?>">
								<img src="<?php echo base_url('uploads/'.$row['img']);?>" alt=""></a> </div>
							<div class="dez-info">
								 <div class="dez-post-meta">
									<ul class="d-flex align-items-center">
										<li class="post-date"><i class="fa fa-calendar"></i>
											<?php echo date('d M Y',strtotime($row['n_u_date'])); ?>
										</li>
										<li class="post-author"><i class="fa fa-user"></i>By <a href="<?php echo base_url('Pages/newsFeedDetail/'.$row['n_u_id']);?>">
											<?php echo $row['user_fullname']; ?></a> </li>
										<!-- <li class="post-comment"><i class="fa fa-comments-o"></i><a href="#">5k</a> </li> -->
									</ul>
								</div>
								<div class="dez-post-title">
									<h4 class="post-title font-24"><a href="<?php echo base_url('Pages/newsFeedDetail/'.$row['n_u_id']);?>"><?php echo $row['n_u_title']; ?></a></h4>
								</div>
								<div class="dez-post-text">
									<p><?php echo $row['n_u_short_desc']; ?></p>
								</div>
								<div class="dez-post-readmore blog-share"> 
									<a href="<?php echo base_url('Pages/newsFeedDetail/'.$row['n_u_id']);?>" title="READ MORE" rel="bookmark" class="site-button-link"><span class="fw6">READ MORE</span></a>
								</div>
							</div>
						   </div>
						 <?php
                            }
						  }
						 ?>
						<!-- Blog large img END -->
                        <div class="pagination-bx clearfix text-center">
							<?= $this->pagination->create_links(); ?>
						</div>
                        <!-- Pagination END -->
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-lg-4 col-md-5 col-sm-12 sticky-top">
                        <aside  class="side-bar">
                            <div class="widget">
                                <h6 class="widget-title style-1">Search</h6>
                                <div class="search-bx style-1">
                                    <form role="search" method="post">
                                        <div class="input-group">
                                            <input name="text" class="form-control" placeholder="Enter your keywords..." type="text">
                                            <span class="input-group-btn">
												<button type="submit" class="fa fa-search text-primary"></button>
                                            </span> 
										</div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget recent-posts-entry">
                                <h6 class="widget-title style-1">Recent Posts</h6>
                                <div class="widget-post-bx">
                                	<?php
                                       foreach ($recentNews as $key => $row) 
                                       {
                                    ?>

                                    <div class="widget-post clearfix">
                                        <div class="dez-post-media">
                                         <img src="<?php echo base_url('uploads/'.$row['img']);?>" width="200" height="143" alt=""> </div>
                                        <div class="dez-post-info">
                                            <div class="dez-post-header">
                                                <h6 class="post-title"><a href="<?php echo base_url('Pages/newsFeedDetail/'.$row['n_u_id']);?>"><?php echo $row['n_u_title'];?></a></h6>
                                            </div>
											<div class="dez-post-meta">
												<ul class="d-flex align-items-center">
													<li class="post-date"><i class="fa fa-calendar"></i>
														<?php echo date('d M Y',strtotime($row['n_u_date'])); ?></li>
													<li class="post-comment"><a href="#"><i class="fa fa-comments-o"></i>5k</a> </li>
												</ul>
											</div>
                                        </div>
                                    </div>
                                    <?php
                                       }
                                	?> 
                                   
                                </div>
                            </div>
							
						
					<!-- 		
							<div class="widget widget-newslatter">
                                <h6 class="widget-title style-1">Newsletter</h6>
                                <div class="news-box">
									<p>Enter your e-mail and subscribe to our newsletter.</p>
                                    <form class="dzSubscribe" action="script/mailchamp.php" method="post">
										<div class="dzSubscribeMsg"></div>
                                        <div class="input-group">
                                            <input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email"/>
											<button name="submit" value="Submit" type="submit" class="site-button btn-block">Subscribe Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div> -->
                        </aside>
                    </div>
                    <!-- Side bar END -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content END-->
	<!-- Modal Box -->
	<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="modal-body row m-a0 clearfix">
					<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" 
					style="background-image: url(<?php echo base_url('front_asset/images/background/bg3.jpg');?>);  background-position:center; background-size:cover;">
						<div class="form-info text-white align-self-center">
							<h3 class="m-b15">Login To You Now</h3>
							<p class="m-b15">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry.</p>
							<ul class="list-inline m-a0">
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#" class="m-r10 text-white"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 p-a0">
						<div class="lead-form browse-job text-left">
							<form>
								<h3 class="m-t0">Personal Details</h3>
								<div class="form-group">
									<input value="" class="form-control" placeholder="Name"/>
								</div>	
								<div class="form-group">
									<input value="" class="form-control" placeholder="Mobile Number"/>
								</div>
								<div class="clearfix">
									<button type="button" class="btn-primary site-button btn-block">Submit </button>
								</div>
							</form>
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	<!-- Modal Box End -->
