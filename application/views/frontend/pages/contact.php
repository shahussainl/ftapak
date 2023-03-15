  <?php 
  		$res = $this->API_m->singleRecord('settings',['company_id'=>'2']);
  ?>
    <!-- Content -->
    <div class="page-content bg-white">
		<!-- inner page banner -->
      <?php include'headSearch/headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Contact Us</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Contact Us</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <div class="container-fluid">
        		<div class="row">
					<div class="col-lg-12 col-md-12 d-lg-flex m-b30">
						<?php if(!empty($res->map_embed_code))
                                      { echo $res->map_embed_code;}?>
						
					</div>
				</div>
        	</div>
		<!-- contact area -->
        <div class="section-full content-inner bg-white contact-style-1">
        	
			<div class="container">
				
                <div class="row">
					<!-- right part start -->
					<div class="col-lg-6 col-md-6 d-lg-flex d-md-flex">
                        <div class="p-a30 border m-b30 contact-area border-1 align-self-stretch radius-sm">
							<h4 class="m-b10"><?php if(!empty($cPrimary->con_title)){echo $cPrimary->con_title; } ?></h4>
							<p>If you have any questions simply use the following contact details.</p>
                            <ul class="no-margin">
                                <li class="icon-bx-wraper left m-b30">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-location-pin"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">Address:</h6>
                                        <p><?php if(!empty($cPrimary->con_address)){echo $cPrimary->con_address; } ?></p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left  m-b30">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-email"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">Email:</h6>
                                        <p><?php if(!empty($cPrimary->con_email)){echo $cPrimary->con_email; } ?></p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left">
                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-mobile"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">PHONE</h6>
                                        <p><?php if(!empty($cPrimary->con_mob)){echo $cPrimary->con_mob; } ?></p>
                                    </div>
                                </li>
                            </ul>
							<div class="m-t20">
								<ul class="dez-social-icon dez-social-icon-lg">
									<li><a href="<?php if(!empty($res->fb_link)) { echo $res->fb_link; } ?>" class="fa fa-facebook bg-primary"></a></li>
									<li><a href="<?php if(!empty($res->twitter_link)) { echo $res->twitter_link; } ?>" class="fa fa-twitter bg-primary"></a></li>
									<li><a href="<?php if(!empty($res->linkedin_link)) { echo $res->linkedin_link; } ?>" class="fa fa-linkedin bg-primary"></a></li>
									<li><a href="<?php if(!empty($res->pinterest_link)) { echo $res->pinterest_link; } ?>" class="fa fa-pinterest-p bg-primary"></a></li>
									<li><a href="<?php if(!empty($res->google_link)) { echo $res->google_link; } ?>" class="fa fa-google-plus bg-primary"></a></li>
								</ul>
							</div>
                        </div>
                    </div>
                    <!-- right part END -->
                    <!-- Left part start -->
					<div class="col-lg-6 col-md-6">
                        <div class="p-a30 m-b30 radius-sm bg-gray clearfix">
							<h4>Send Message Us</h4>
							<div class="dzFormMsg"></div>
							<form method="post" class="dzForm" action="<?= base_url('Pages/SendMessage'); ?>">
							<!-- <input type="hidden" value="Contact" name="dzToDo"> -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="name" type="text" required class="form-control" placeholder="Your Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group"> 
											    <input name="email" type="email" class="form-control" required  placeholder="Your Email Address" >
                                            </div>
                                        </div>
                                    </div>
                                     <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <textarea name="message" rows="4" class="form-control" required placeholder="Your Message..."></textarea>
                                            </div>
                                        </div>
                                    </div>
									<!-- <div class="col-lg-12">
										<div class="recaptcha-bx">
											<div class="input-group">
												<div class="g-recaptcha" data-sitekey="Put reCaptcha Site Key" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
												<input class="form-control d-none" style="display:none;" data-recaptcha="true" data-error="Please complete the Captcha">
											</div>
										</div>
									</div> -->
                                    <div class="col-lg-12">
                                        <button name="submit" type="submit" value="Submit" class="site-button "> <span>Submit</span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Left part END -->
					
                </div>
                <div class="row">
                	<!-- Secondary part start -->
                	 <?php
                	 	if($cSecondary)
                	 	 {
                	 	 	foreach($cSecondary as $conScond)
                	 	 	{
                	 ?>
						<div class="col-lg-4 col-md-6 d-lg-flex d-md-flex">
	                        <div class="p-a30 border m-b30 contact-area border-1 align-self-stretch radius-sm">
								<h4 class="m-b10"><?= $conScond->con_title; ?></h4>
								<p>If you have any questions simply use the following contact details.</p>
	                            <ul class="no-margin">
	                                <li class="icon-bx-wraper left m-b30">
	                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-location-pin"></i></a> </div>
	                                    <div class="icon-content">
	                                        <h6 class="text-uppercase m-tb0 dez-tilte">Address:</h6>
	                                        <p><?= $conScond->con_address; ?></p>
	                                    </div>
	                                </li>
	                                <li class="icon-bx-wraper left  m-b30">
	                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-email"></i></a> </div>
	                                    <div class="icon-content">
	                                        <h6 class="text-uppercase m-tb0 dez-tilte">Email:</h6>
	                                        <p><?= $conScond->con_email; ?></p>
	                                    </div>
	                                </li>
	                                <li class="icon-bx-wraper left">
	                                    <div class="icon-bx-xs border-1"> <a href="#" class="icon-cell"><i class="ti-mobile"></i></a> </div>
	                                    <div class="icon-content">
	                                        <h6 class="text-uppercase m-tb0 dez-tilte">PHONE</h6>
	                                        <p><?= $conScond->con_mob; ?></p>
	                                    </div>
	                                </li>
	                            </ul>
								<div class="m-t20">
									<ul class="dez-social-icon dez-social-icon-lg">
										<li><a href="<?php if(!empty($res->fb_link)) { echo $res->fb_link; } ?>" class="fa fa-facebook bg-primary"></a></li>
										<li><a href="<?php if(!empty($res->twitter_link)) { echo $res->twitter_link; } ?>" class="fa fa-twitter bg-primary"></a></li>
										<li><a href="<?php if(!empty($res->linkedin_link)) { echo $res->linkedin_link; } ?>" class="fa fa-linkedin bg-primary"></a></li>
										<li><a href="<?php if(!empty($res->pinterest_link)) { echo $res->pinterest_link; } ?>" class="fa fa-pinterest-p bg-primary"></a></li>
										<li><a href="<?php if(!empty($res->google_link)) { echo $res->google_link; } ?>" class="fa fa-google-plus bg-primary"></a></li>
									</ul>
								</div>
	                        </div>
	                    </div>
                	 <?php
                	 	 	}
                	 	 }
                	 ?>
                    <!-- Secondary part END -->
                </div>
            </div>
        </div>
        <!-- contact area  END -->
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
 