
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
									<a href="<?php echo base_url('Pages/viewFunction'.'/alllocation'); ?>" class="float-right font-12 text-primary">View All</a></h6>
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
						<div class="col-lg-6 m-b30">
							<div class="job-bx bg-white">
								<div class="job-bx-title clearfix">
									<h6 class="text-uppercase">Governaments   Jobs 
									<a href="<?php echo base_url('Pages/viewFunction'.'/gov'); ?>" class="float-right font-12 text-primary">View All</a></h6>
								</div>
								<div class="row">
								 <?php
								   if(!empty($governamentJob))
								   {
                                     foreach ($governamentJob as $key => $rowGov) 
                                     {
                                  ?>
                                      <div class="col-lg-6 col-sm-6">
										<ul class="category-list">
											<li><a href="<?php echo base_url('Pages/job_Detail/'.$rowGov['prj_id']);?>">
												<?php echo $rowGov['prj_name']; ?></a></li>
										</ul>
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
						<div class="col-lg-6 m-b30">
							<div class="job-bx bg-white">
								<div class="job-bx-title clearfix">
									<h6 class="text-uppercase">Semi Governaments   Jobs 
									<a href="<?php echo base_url('Pages/viewFunction'.'/semi'); ?>" class="float-right font-12 text-primary">View All</a></h6>
								</div>
								<div class="row">
                                 <?php
                                   if(!empty($semi_governamentJob))
                                   {
                                     foreach ($semi_governamentJob as $key => $rowSemi) 
                                     {
                                  ?>
                                      <div class="col-lg-6 col-sm-6">
										<ul class="category-list">
											<li><a href="<?php echo base_url('Pages/job_Detail/'.$rowSemi['prj_id']);?>">
												<?php echo $rowSemi['prj_name']; ?></a></li>
										</ul>
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
					
						<div class="col-lg-6 m-b30">
							<div class="job-bx bg-white">
								<div class="job-bx-title clearfix">
									<h6 class="text-uppercase">Private   Jobs 
									<a href="<?php echo base_url('Pages/viewFunction'.'/pri'); ?>" class="float-right font-12 text-primary">View All</a></h6>
								</div>
								<div class="row">
								<?php
								 if(!empty($privateJob))
								 {

								
									foreach ($privateJob as $key => $rowPri) 
									{
									?>
                                      <div class="col-lg-6 col-sm-6">
										<ul class="category-list">
											<li><a href="<?php echo base_url('Pages/job_Detail/'.$rowPri['prj_id']);?>">
												<?php echo $rowPri['prj_name'];?></a></li>
											
										</ul>
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
						<div class="col-lg-6 m-b30">
							<div class="job-bx bg-white">
								<div class="job-bx-title clearfix">
									<h6 class="text-uppercase">Other   Jobs 
									<a href="<?php echo base_url('Pages/viewFunction'.'/other'); ?>" class="float-right font-12 text-primary">View All</a></h6>
								</div>
								<div class="row">
							    <?php		
							     if(!empty($otherJob))
							     {	 
								    foreach ($otherJob as $key => $rowOther) 
								    {
								 ?>
								      <div class="col-lg-6 col-sm-6">
										<ul class="category-list">
											<li><a href="<?php echo base_url('Pages/job_Detail/'.$rowOther['prj_id']);?>">
												<?php echo $rowOther['prj_name'];?></a></li>
										</ul>
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
						<div class="col-lg-12 m-b30">
							<div class="job-bx clearfix bg-white">
								<div class="job-bx-title clearfix">
									<h6 class="text-uppercase">Browse Jobs by Organization Logo
									<a href="<?php echo base_url('Pages/viewFunction'.'/logo'); ?>" class="float-right font-12 text-primary">View All</a></h6>
								</div>
								<ul class="company-logo-wg clearfix">
									<?php
									  foreach ($allJobByLogo as $key => $rowImg) 
									  {
									?>
									  <li class="brand-logo">
										<a href="<?php echo base_url('Pages/cityViceSerch/'.$rowImg['org_id'].'/logo');?>">
											<img src="<?php echo base_url('uploads/'.$rowImg['org_logo']);?>" alt="">
										</a>
									  </li>
									<?php  	
									  }
									?>
								
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
		<div class="modal fade lead-form-modal" id="car-details" tabindex="-1" role="dialog" >
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="modal-body row m-a0 clearfix">
						<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">
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
					<div class="col-lg-6 col-md-6 overlay-primary-dark d-flex p-a0" style="background-image: url(images/background/bg3.jpg);  background-position:center; background-size:cover;">
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
	