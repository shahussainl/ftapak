 <?php
 	$uri = $this->uri->segment(2);
 ?>
  <?php include'headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry">
					<div class="job-search-form">
						<!-- <form method="post" action="<?php //echo base_url('Pages/serchData');?>">
							<div class="input-group"> -->
							<!-- 	<input type="text" name="search1" class="form-control" placeholder="Job Title, Keywords Or Company Name">
								<input type="text" name="search2" class="form-control" placeholder="City, Province Or Region">
								<div class="input-group-prepend">
									<button class="site-button" >Search</button>
								</div> -->
						<!-- 	</div>
						</form> -->
					</div>
					<div class="category-jobs-info">
						<div class="nav">
							<ul>
		<li class="<?php if($uri=='all_jobs'){ echo 'active'; } ?>">
			<a href="<?php echo base_url('Pages/all_jobs');?>">All Jobs
			</a>
		</li>
		<li class="<?php if($uri=='company_jobs'){ echo 'active'; } ?>" >
			<a href="<?php  echo base_url('Pages/company_jobs');?>">Jobs by Company
			</a>
		</li>
		<li class="<?php if($uri=='getAllCategory'){ echo 'active'; } ?>" >
			<a href="<?php echo base_url('Pages/getAllCategory'); ?>">Jobs by Category
			</a>
		</li>
		<li class="<?php if($uri=='viewFunction'){ echo 'active'; } ?>" >
			<a href="<?php echo base_url('Pages/viewFunction'.'/alllocation'); ?>">Jobs by Location
			</a>
		</li>
		<li class="<?php if($uri=='designation_jobs'){ echo 'active'; } ?>" >
			<a href="<?php  echo base_url('Pages/designation_jobs');?>">Jobs by Designation
			</a>
		</li>
		<!-- <li class="<?php// if($uri=='skill_jobs'){ echo 'active'; } ?>" ><a href="<?php//  echo base_url('Pages/skill_jobs');?>">Jobs by Skill</a></li> -->
							</ul>
						</div>
					</div>
                </div>
            </div>
        </div>