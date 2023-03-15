
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
									<h6 class="text-uppercase"><?php echo $title;?> 
									<!-- <a href="javascript:void(0);" class="float-right font-12 text-primary">View All</a></h6> -->
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
						
					
				
					
					</div>
				</div>
			</div>
            <!-- Browse Jobs END -->
		</div>
	
    </div>
    <!-- Content END-->

	