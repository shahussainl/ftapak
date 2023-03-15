
    <div class="page-content">
        <!-- inner page banner -->
       		<?php include'headSearch/job_headSearch.php' ?>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
			<!-- Browse Jobs -->
			<div class="section-full content-inner jobs-category-bx">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 m-b30">
							<div class="job-bx bg-white">
								<div class="job-bx-title clearfix">
									<h6 class="text-uppercase">Browse Jobs by Locations
									<!-- <a href="javascript:void(0);" class="float-right font-12 text-primary">View All</a></h6> -->
								</div>
								<div class="row">
								 <?php
                                   if(!empty($allJobName))
                                   {
									   foreach($allJobName as $key => $row) 
									   {
									?>  

									  <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
										<a href="<?php echo base_url('Pages/cityViceSerch/'.$row['city'].'/byCityName');?>">
											<div class="city-bx align-items-end  d-flex" 
											style="background-image:url(<?php echo base_url('front_asset/images/job-portal.jpg');?>)">
												<div class="city-info">
													<h5><?php echo $row['city'];?></h5>
												</div>
											</div>
										</a>
									  </div>

									<?php
									   }
									  }
									  else
									  {
									  ?>
									    <p style="text-indent: 200px;">No Jobs Avaliable</p>
									  <?php	
									  } 
									?>
								
								  
								</div>   
							</div>    
						</div>
					
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
		
    </div>
    <!-- Content END-->
	
	