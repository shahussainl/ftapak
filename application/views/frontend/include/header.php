<?php
	$ci  = $this->uri->segment(1);
	$mtd = $this->uri->segment(2);
?>
<body id="bg">
<div id="loading-area"></div>
<div class="page-wraper">
	<!-- header -->
    <header class="site-header mo-left header fullwidth">
		<!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
						<a href="<?= base_url(); ?>"><img src="images/logo.png" class="logo" alt=""></a>
					</div>
                    <!-- nav toggle button -->
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
                    <!-- extra nav -->
                <!--     <div class="extra-nav">
                        <div class="extra-cell">
                            <a href="register-2.html" class="site-button"><i class="fa fa-user"></i> Sign Up</a>
							<a href="#" title="READ MORE" rel="bookmark" data-toggle="modal" data-target="#car-details" class="site-button"><i class="fa fa-lock"></i> login </a>
                        </div>
                    </div> -->
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">
							<li class="<?php if($ci=='Job' && $mtd=='index'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Job/index');?>">Home <i class=""></i></a>
							</li>
						    <li class="<?php if($ci=='Pages' && $mtd=='about_usView' || $mtd=='aboutDetail'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Pages/about_usView');?>">About Us <i class=""></i></a>
							</li>
							<li class="<?php if($ci=='Pages' && $mtd=='all_jobs' || $mtd=='company_jobs' || $mtd=='designation_jobs' || $mtd=='category_jobs' || $mtd=='skill_jobs' || $mtd=='job_Detail'){echo 'active';} ?>">
								<a href="<?php echo base_url('Pages/all_jobs');?>">Jobs <i class=""></i></a>
							</li>
						    <!-- <li class="<?php //if($ci=='Pages' && $mtd=='all_jobs' || $mtd=='company_jobs' || $mtd=='designation_jobs' || $mtd=='category_jobs' || $mtd=='skill_jobs'){echo 'active';} ?>">
								<a href="javascript:void(0);" >Jobs <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
							    	
									<li><a href="<?php // echo base_url('Pages/all_jobs');?>" class="dez-page">all jobs <span class="new-page">New</span></a></li>
									<li><a href="<?php // echo base_url('Pages/company_jobs');?>" class="dez-page">company jobs <span class="new-page">New</span></a></li>
									<li><a href="<?php // echo base_url('Pages/designation_jobs');?>" class="dez-page">designations jobs <span class="new-page">New</span></a></li>
									<li><a href="<?php // echo base_url('Pages/category_jobs');?>" class="dez-page">category jobs <span class="new-page">New</span></a></li>
									<li><a href="<?php // echo base_url('Pages/location_jobs');?>" class="dez-page">location jobs <span class="new-page">New</span></a></li>
									<li><a href="<?php // echo base_url('Pages/skill_jobs');?>" class="dez-page">skill jobs <span class="new-page">New</span></a></li>
									<li><a href="<?php // echo base_url('Pages/all_jobs');?>" class="dez-page">browse filter list <span class="new-page">New</span></a></li>	
								</ul>
							</li> -->
						    <li class="<?php if($ci=='Job' && $mtd=='test_result'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Job/test_result');?>">Result <i class=""></i></a>
							</li>
							<li class="<?php if($ci=='Job' && $mtd=='check_rollno_slip'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Job/check_rollno_slip');?>">Roll No <i class=""></i></a>
							</li>
							<li class="<?php if($ci=='Pages' && $mtd=='newsFeed'|| $mtd=='newsFeedDetail'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Pages/newsFeed');?>">NewsFeed <i class=""></i></a>
							</li>
							<li class="<?php if($ci=='Pages' && $mtd=='administration' || $mtd=='stopMsgViewDetail'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Pages/administration');?>">Administration <i class=""></i></a>
							</li>
							<li class="<?php if($ci=='Pages' && $mtd=='contactUs'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Pages/contactUs');?>">Contact Us <i class=""></i></a>
							</li>
						
						</ul>			
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->
    <!-- Content -->