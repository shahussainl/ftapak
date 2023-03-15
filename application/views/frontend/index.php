

    <div class="page-content">
	
		
		
		<!-- Our Job -->
		<div class="section-full bg-white content-inner-2">
			<div class="container">
				<div class="d-flex job-title-bx section-head">
					<div class="mr-auto">
						<h2 class="m-b5">Recent Jobs</h2>
						<h6 class="fw4 m-b0">15+ Recently Added Jobs</h6>
					</div>
				<!-- 	<div class="align-self-end">
						<a href="browse-job.html" class="site-button button-sm">Browse All Jobs <i class="fa fa-long-arrow-right"></i></a>
					</div> -->
				</div>
				<div class="row">
					<div class="col-lg-9">
						<ul class="post-job-bx browse-job">

                         <?php
                         	if(!empty($getAllJob))
                         	{
                             foreach ($getAllJob  as $row) 
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
												<li><i class="fa fa-clock-o"></i><?php echo date('d M y',strtotime($row['prj_start_date'])).' - '.date('d M y',strtotime($row['prj_end_date'])); ?></li>
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
                         ?>

						</ul>
						<div class="m-t30">
							<div class="d-flex">
								
								
<?= $this->pagination->create_links(); ?>
								
							</div>
						</div>
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
							<div class="quote-bx">
								<div class="quote-info">
									<h4>Make a Difference with Your Online Resume!</h4>
									<p>Your resume in minutes with JobBoard resume assistant is ready!</p>
									<a href="#" class="site-button">Job</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Our Job END -->	
		<!-- Call To Action -->
		<!-- <div class="section-full p-tb70 overlay-black-dark text-white text-center bg-img-fix" 
		       style="background-image: url(<?php //echo base_url('front_asset/images/background/bg4.jpg')?>);">
			<div class="container">
				<div class="section-head text-center text-white">
					<h2 class="m-b5">Testimonials</h2>
					<h5 class="fw4">Few words from candidates</h5>
				</div>
				<div class="blog-carousel-center owl-carousel owl-none">
					<div class="item">
						<div class="testimonial-5">
							<div class="testimonial-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
							</div>
							<div class="testimonial-detail clearfix">
								<div class="testimonial-pic radius shadow">
									<img src="<?php //echo base_url('front_asset/images/testimonials/pic1.jpg');?>" width="100" height="100" alt="">
								</div>
								<strong class="testimonial-name">David Matin</strong> 
								<span class="testimonial-position">Student</span> 
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial-5">
							<div class="testimonial-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
							</div>
							<div class="testimonial-detail clearfix">
								<div class="testimonial-pic radius shadow">
									<img src="<?php //echo base_url('front_asset/images/testimonials/pic2.jpg');?>" width="100" height="100" alt="">
								</div>
								<strong class="testimonial-name">David Matin</strong> 
								<span class="testimonial-position">Student</span> 
							</div>
						</div>
					</div>
					<div class="item">
						<div class="testimonial-5">
							<div class="testimonial-text">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry.</p>
							</div>
							<div class="testimonial-detail clearfix">
								<div class="testimonial-pic radius shadow">
									<img src="<?php //echo base_url('front_asset/images/testimonials/pic3.jpg');?>" width="100" height="100" alt="">
								</div>
								<strong class="testimonial-name">David Matin</strong> 
								<span class="testimonial-position">Student</span> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- Call To Action END -->
		<!-- Our Latest Blog -->
		<!-- <div class="section-full content-inner-2 overlay-white-middle" 
		     style="background-image:url(<?php //echo base_url('front_asset/images/lines.png');?>); background-position:bottom; background-repeat:no-repeat; background-size: 100%;">
			<div class="container">
				<div class="section-head text-black text-center">
					<h2 class="m-b0">Membership Plans</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
				</div>
				
				<div class="section-content box-sort-in button-example m-t80">
					<div class="pricingtable-row">
						<div class="row max-w1000 m-auto">
							<div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
								<div class="pricingtable-wrapper style2 bg-white">
									<div class="pricingtable-inner">
										<div class="pricingtable-price"> 
											<h4 class="font-weight-300 m-t10 m-b0">Basic</h4>
											<div class="pricingtable-bx"><span>Free</span></div>
										</div>
										<p>Lorem ipsum dolor sit amet adipiscing elit sed do eiusmod tempors labore et dolore magna siad enim aliqua</p>
										<div class="m-t20"> 
											<a href="register.html" class="site-button radius-xl"><span class="p-lr30">Sign Up</span></a> 
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
								<div class="pricingtable-wrapper style2 bg-primary text-white active">
									<div class="pricingtable-inner">
										<div class="pricingtable-price"> 
											<h4 class="font-weight-300 m-t10 m-b0">Professional</h4>
											<div class="pricingtable-bx"> $ <span>29</span> /  Per Installation </div>
										</div>
										<p>Lorem ipsum dolor sit amet adipiscing elit sed do eiusmod tempors labore et dolore magna siad enim aliqua</p>
										<div class="m-t20"> 
											<a href="register.html" class="site-button white radius-xl"><span class="text-primary p-lr30">Sign Up</span></a> 
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4 p-lr0">
								<div class="pricingtable-wrapper style2 bg-white">
									<div class="pricingtable-inner">
										<div class="pricingtable-price"> 
											<h4 class="font-weight-300 m-t10 m-b0">Extended</h4>
											<div class="pricingtable-bx"> $  <span>29</span> /  Per Installation </div>
										</div>
										<p>Lorem ipsum dolor sit amet adipiscing elit sed do eiusmod tempors labore et dolore magna siad enim aliqua</p>
										<div class="m-t20"> 
											<a href="register.html" class="site-button radius-xl"><span class="p-lr30">Sign Up</span></a> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- Our Latest Blog -->
	</div>
	<!-- Content END-->
	
