
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
									<h6 class="font-weight-700 pull-left text-uppercase">Browse Jobs by Designation</h6>
								</div>
						
								<div class="site-filters clearfix m-b30">
									<ul class="filters" data-toggle="buttons">
										<li data-filter="data-up" class="btn active">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>Top 100</span></a> 
										</li>
										<li data-filter="data-a" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>A</span></a> 
										</li>
										<li data-filter="data-b" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>B</span></a> 
										</li>
										<li data-filter="data-c" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>C</span></a> 
										</li>
										<li data-filter="data-d" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>D</span></a> 
										</li>
										<li data-filter="data-e" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>E</span></a> 
										</li>
										<li data-filter="data-f" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>F</span></a> 
										</li>
										<li data-filter="data-g" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>G</span></a> 
										</li>
										<li data-filter="data-h" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>H</span></a> 
										</li>
										<li data-filter="data-i" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>I</span></a> 
										</li>
										<li data-filter="data-j" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>J</span></a> 
										</li>
										<li data-filter="data-k" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>K</span></a> 
										</li>
										<li data-filter="data-l" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>L</span></a> 
										</li>
										<li data-filter="data-m" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>M</span></a> 
										</li>
										<li data-filter="data-n" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>N</span></a> 
										</li>
										<li data-filter="data-o" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>O</span></a> 
										</li>
										<li data-filter="data-p" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>P</span></a> 
										</li>
										<li data-filter="data-q" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>Q</span></a> 
										</li>
										<li data-filter="data-r" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>R</span></a> 
										</li>
										<li data-filter="data-s" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>S</span></a> 
										</li>
										<li data-filter="data-t" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>T</span></a> 
										</li>
										<li data-filter="data-u" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>U</span></a> 
										</li>
										<li data-filter="data-v" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>V</span></a> 
										</li>
										<li data-filter="data-w" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>W</span></a> 
										</li>
										<li data-filter="data-x" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>X</span></a> 
										</li>
										<li data-filter="data-y" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>Y</span></a> 
										</li>
										<li data-filter="data-z" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>Z</span></a> 
										</li>
										<li data-filter="data-down" class="btn">
											<input type="radio">
											<a href="#" class="site-button-secondry radius-sm"><span>0-99</span></a> 
										</li>
									</ul>
								</div>

								<div class="row">
								<?php
								   foreach ($getAllDesignation as $key => $row) 
								   {
								 ?>
								 
									<div class="col-lg-3 col-sm-6">
										<ul class="category-list">
											<li><a href="<?php echo base_url('Pages/job_Detail/'.$row['prj_id']);?>">
												<?php echo $row['prj_name']; ?></a></li>
										
										</ul>
									</div> 
								  
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

	