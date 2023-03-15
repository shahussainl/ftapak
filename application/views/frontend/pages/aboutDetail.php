
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
   <?php include'headSearch/headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">About Us</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>About Details</li>
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
					
					
						<div class="dez-post-media dez-img-effect zoom-slow radius-sm"> <a href="">
								<img src="<?php echo base_url('uploads/'.$getAboutDetail['abt_file']);?>" alt=""></a> <br>
						</div>
					
					<div class="row align-items-center m-b50">
						<div class="col-md-12 col-sm-12 col-lg-12 m-b20">
							<h2 class="m-b5"><?php echo $getAboutDetail['abt_title'];?></h2>
							<!-- <h3 class="fw4"><?php //echo $getAboutDetail['abt_title'];?></h3> -->
							<p class="m-b5" style="text-align: justify;"><?php echo $getAboutDetail['abt_desc']; ?></p>
							<!-- <a href="javascript:void(0);" class="site-button">Read More</a> -->
						</div>
					
					</div>

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
                                                <h6 class="post-title"><a href=""><?php echo $row['n_u_title'];?></a></h6>
                                            </div>
											<div class="dez-post-meta">
												<ul class="d-flex align-items-center">
													<li class="post-date"><i class="fa fa-calendar"></i>
														<?php echo date('d M Y',strtotime($row['n_u_date'])); ?></li>
													<!-- <li class="post-comment"><a href="#"><i class="fa fa-comments-o"></i>5k</a> </li> -->
												</ul>
											</div>
                                        </div>
                                    </div>
                                    <?php
                                       }
                                	?> 
                                </div>
                            </div>
							
						
							
					
                        </aside>
                    </div>
                    <!-- Side bar END -->

					
				</div>
			</div>
			<!-- Why Chose Us -->
			
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->

	