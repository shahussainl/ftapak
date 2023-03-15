<?php
// echo'<pre>';
// print_r($jobsDetail);
// echo "<pre>";
// print_r($jobFiles);
// exit();
?>
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <?php include'headSearch/headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Job Detail</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Job Detail</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Job Detail -->
			<div class="section-full content-inner-1">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="sticky-top">
								<div class="row">
									<div class="col-lg-12 col-md-6">
										<div class="m-b30">
											<img src="images/blog/grid/pic1.jpg" alt="">
										</div>
									</div>
									<div class="col-lg-12 col-md-6">
										<div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
											<h4 class="text-black font-weight-700 p-t10 m-b15">Job Detail</h4>
											<ul>
												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Address</strong><span class="text-black-light"> <?php echo $jobsDetail['org_address']; ?></span></li>
												<li><i class="ti-money"></i><strong class="font-weight-700 text-black">Salary</strong> $800 Monthy</li>
												<li><i class="ti-shield"></i><strong class="font-weight-700 text-black">Experience</strong>6 Year Experience</li>
											</ul>
										</div>
									</div>
								</div>
                            </div>
						</div>
						<div class="col-lg-8">
							<div class="job-info-box">
								<h3 class="m-t0 m-b10 font-weight-700 title-head">
									<a href="javascript:void(0);" class="text-secondry m-r30"><?php echo $jobsDetail['prj_name'];?></a>
								</h3>
								<ul class="job-info">
									<li><strong>Organization :  </strong><?php echo $jobsDetail['org_name'];?></li>
									<li><strong>Deadline :  </strong><?php echo date('d M Y',strtotime( $jobsDetail['prj_end_date']));?></li>
									<li><i class="ti-location-pin text-black m-r5"></i><?php echo $jobsDetail['org_address'];?></li>
								</ul>
								<br><br>
								<h5 class="font-weight-600">Job Description</h5>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<p><?php echo $jobsDetail['prj_desc'];?></p>
								<?php
									foreach($jobFiles as $files)
									{
								?>
								<a href="<?= base_url('uploads/'.$files->prj_file); ?>" target="_blank" class="site-button">Click Download</a>
								<?php		
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Job Detail -->
			<!-- Our Jobs -->
			<div class="section-full content-inner">
				<div class="container">
					<div class="row">
					<!-- 	<div class="col-xl-3 col-lg-6 col-md-6">
							<div class="m-b30 blog-grid">
                                <div class="dez-post-media dez-img-effect "> <a href="blog-details.html"><img src="images/blog/grid/pic1.jpg" alt=""></a> </div>
                                <div class="dez-info p-a20 border-1">
                                    <div class="dez-post-title ">
                                        <h5 class="post-title"><a href="blog-details.html">Title of blog post</a></h5>
                                    </div>
                                    <div class="dez-post-meta ">
                                        <ul>
                                            <li class="post-date"> <i class="ti-location-pin"></i> London </li>
                                            <li class="post-author"><i class="ti-user"></i>By <a href="#">Jone</a> </li>
                                        </ul>
                                    </div>
                                    <div class="dez-post-text">
                                         <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.</p>
                                    </div>
                                   <div class="dez-post-readmore"> 
										<a href="blog-details.html" title="READ MORE" rel="bookmark" class="site-button-link"><span class="fw6">READ MORE</span></a>
									</div>
                                </div>
                            </div>
						</div> -->
						
					</div>
				</div>
			</div>
			<!-- Our Jobs END -->
		</div>
    </div>
    <!-- Content END-->

