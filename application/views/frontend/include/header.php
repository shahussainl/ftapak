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
                    <div class="extra-nav" style="display:none;"> 
                        <div class="extra-cell">
                            <!-- <a href="register-2.html" class="site-button"><i class="fa fa-user"></i> Sign Up</a> -->
							<!-- <a href="javascript:void(0)" title="SIGN IN" rel="SIGN IN"  class="site-button"><i class="fa fa-lock"></i> login </a> -->
                        </div>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">
							<li class="<?php if($ci=='Job' && $mtd=='index'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Job/index');?>">Home <i class=""></i></a>
							</li>

							<!-- <li class="<?php if($ci=='Pages' && $mtd=='all_jobs' || $mtd=='company_jobs' || $mtd=='designation_jobs' || $mtd=='category_jobs' || $mtd=='skill_jobs' || $mtd=='job_Detail'){echo 'active';} ?>">
								<a href="<?php echo base_url('Pages/all_jobs');?>">Jobs <i class=""></i></a>
							</li> -->

							<li class="<?php if($ci=='Job' && ($this->uri->segment(3)=='candidate' || $mtd=='check_eligibility' )){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Job/list/candidate');?>">List of Candidate <i class=""></i></a>
							</li>

							<li class="<?php if($ci=='Job' && ($this->uri->segment(3)=='rollno' || $mtd=='check_rollno_slip' )){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Job/list/rollno');?>">Roll No <i class=""></i></a>
							</li>
						    <li class="<?php if($ci=='Job' && ($this->uri->segment(3)=='result'  || $mtd=='check_result' )){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Job/list/result');?>">Results <i class=""></i></a>
							</li>
						
							<!-- <li class="<?php if($ci=='Pages' && $mtd=='newsFeed'|| $mtd=='newsFeedDetail'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Pages/newsFeed');?>">NewsFeed <i class=""></i></a>
							</li>
							<li class="<?php if($ci=='Pages' && $mtd=='administration' || $mtd=='stopMsgViewDetail'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Pages/administration');?>">Administration <i class=""></i></a>
							</li> -->
							<li class="<?php if($ci=='Pages' && $mtd=='contactUs'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Pages/contactUs');?>">Contact Us <i class=""></i></a>
							</li>
							<li class="<?php if($ci=='Pages' && $mtd=='about_usView' || $mtd=='aboutDetail'){ echo 'active'; } ?>">
								<a href="<?php echo base_url('Pages/about_usView');?>">About Us <i class=""></i></a>
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