
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
					
						<div class="col-lg-6 m-b30">
							<div class="job-bx bg-white">
								<div class="job-bx-title clearfix">
									<h6 class="text-uppercase">Governaments   Jobs 
									<!-- <a href="<?php //echo base_url('Pages/viewFunction'.'/gov'); ?>" class="float-right font-12 text-primary">View All</a> -->
								</h6>
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
									<!-- <a href="<?php //echo base_url('Pages/viewFunction'.'/semi'); ?>" class="float-right font-12 text-primary">View All</a> -->
								</h6>
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
									<!-- <a href="<?php// echo base_url('Pages/viewFunction'.'/pri'); ?>" class="float-right font-12 text-primary">View All</a>-->
								</h6>
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
									<!-- <a href="<?php// echo base_url('Pages/viewFunction'.'/other'); ?>" class="float-right font-12 text-primary">View All</a> -->
								</h6>
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
					
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
		
    </div>
    <!-- Content END-->
	