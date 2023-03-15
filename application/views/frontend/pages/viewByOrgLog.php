
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
							<div class="job-bx clearfix bg-white">
								<div class="job-bx-title clearfix">
									<h6 class="text-uppercase">Browse Jobs by Organization Logo
									<!-- <a href="javascript:void(0);" class="float-right font-12 text-primary">View All</a></h6> -->
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

    </div>
    <!-- Content END-->

	