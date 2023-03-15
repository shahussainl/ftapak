

    <div class="page-content">
	
		
		
		<!-- Our Job -->
		<div class="section-full bg-white content-inner-2">
			<div class="container">
				<div class="d-flex job-title-bx section-head">
					<div class="mr-auto">
						<!-- <h2 class="m-b5">Recent Jobs</h2>
						<h6 class="fw4 m-b0">20+ Recently Added Jobs</h6> -->
					</div>
					<div class="align-self-end">
						<a href="<?= base_url('Pages/all_jobs'); ?>" class="site-button button-sm">Browse All Jobs <i class="fa fa-long-arrow-right"></i></a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9">
						<ul class="post-job-bx browse-job">
                         <?php
                          if(!empty($getAllByCityName))
                          {

                          
                             foreach ($getAllByCityName as $key => $row) 
                             {
                         ?>
                           	<li>
								<div class="post-bx">
									<div class="d-flex m-b30">
										<div class="job-post-company">
											<span><img alt="" src="<?php echo base_url('uploads/'.$row['org_logo']);?>"/></span>
										</div>
										<div class="job-post-info">
											<h4><a href="<?php echo base_url('Pages/job_Detail/'.$row['prj_id']);?>">
												<?php echo $row['prj_name'];?></a></h4>
											<ul>
												<li><i class="fa fa-map-marker"></i><?php echo $row['city'];?></li>
												<!-- <li><i class="fa fa-bookmark-o"></i> Full Time</li> -->
												<li><i class="fa fa-clock-o"></i><?php echo date('d M Y',strtotime($row['prj_start_date'])); ?></li>
											</ul>
										</div>
									</div>
									<!-- <div class="d-flex">
										<div class="job-time mr-auto">
											 <a href="javascript:void(0);"><span>Full Time</span></a> 
										</div>
										<div class="salary-bx">
											<span>$1200 - $ 2500</span>
										</div>
									</div>
									<label class="like-btn">
										  <input type="checkbox">
										  <span class="checkmark"></span>
									</label> -->
								</div>
							</li>
                         <?php
                             }
                          }
                          else
                          {
                         ?>
                             <h3 style="text-indent: 200px;"> No Jobs Avaliable</h3>
                         <?php 	
                          }   
                         ?>

						</ul>
					<!-- 	<div class="m-t30">
							<div class="d-flex">
								<a class="site-button button-sm mr-auto" href="javascript:void(0);"><i class="ti-arrow-left"></i> Prev</a>
								<a class="site-button button-sm" href="javascript:void(0);">Next <i class="ti-arrow-right"></i></a>
							</div>
						</div> -->
					</div>
					<div class="col-lg-3">
						<div class="sticky-top">
							<div class="candidates-are-sys m-b30">
								<div class="candidates-bx">
									<div class="testimonial-pic radius">
										<img src="<?php echo base_url('front_asset/images/testimonials/pic3.jpg');?>" alt="" width="100" height="100"></div>
									<div class="testimonial-text">
										<p>I just got a job that I applied for via careerfy! I used the site all the time during my job hunt.</p>
									</div>
									<div class="testimonial-detail"> <strong class="testimonial-name">Richard Anderson</strong> <span class="testimonial-position">Nevada, USA</span> </div>
								</div>
							</div>
						<!-- 	<div class="quote-bx">
								<div class="quote-info">
									<h4>Make a Difference with Your Online Resume!</h4>
									<p>Your resume in minutes with JobBoard resume assistant is ready!</p>
									<a href="register.html" class="site-button">Create an Account</a>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Our Job END -->	
		
	</div>
	<!-- Content END-->
