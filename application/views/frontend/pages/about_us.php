
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
							<li>About Us</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
		<div class="content-block">
            <div class="section-full content-inner overlay-white-middle">
				<div class="container">
					<?php
						 if(!empty($getAboutUs))
						  {
						  	 foreach($getAboutUs as $abt)
						  	 {
					?>

					<div class="row align-items-center m-b50">
						<div class="col-md-8 col-sm-8 col-lg-8 m-b20">
							<h2 class="m-b5"><?php echo $abt->abt_title;?></h2>
							<!-- <h3 class="fw4"><?php //echo $abt->abt_title;?></h3> -->
							<p class="m-b15" style="text-align: justify;"><?php echo substr($abt->abt_desc,0,400).'...'; ?></p>
							<a href="<?php echo base_url('Pages/aboutDetail/'.$abt->abt_id);?>" class="site-button">Read More</a>
						</div>
						<div class="col-sm-4 col-lg-4 col-md-4">
							<img  src="<?php echo base_url('uploads/'.$abt->abt_file);?>" alt=""/>
						</div>
					</div>
				<?php
						  	 }
						  }
					?>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
							<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
								<div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell text-primary"><i class="ti-eye"></i></a> </div>
								<div class="icon-content">
									<h5 class="dlab-tilte text-uppercase">Our Vission</h5>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
							<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
								<div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell text-primary"><i class="ti-image"></i></a> </div>
								<div class="icon-content">
									<h5 class="dlab-tilte text-uppercase">Our Mission</h5>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-12 m-b30">
							<div class="icon-bx-wraper p-a30 center bg-gray radius-sm">
								<div class="icon-md text-primary m-b20"> <a href="#" class="icon-cell text-primary"><i class="ti-cup"></i></a> </div>
								<div class="icon-content">
									<h5 class="dlab-tilte text-uppercase">Commitment</h5>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Why Chose Us -->
			
        </div>
		<!-- contact area END -->
    </div>
    <!-- Content END-->
