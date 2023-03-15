
    <div class="page-content bg-white">
        <!-- inner page banner -->
       <?php include'headSearch/headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Administration</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<!-- <li><a href="#">Home</a></li>
							<li>Blog  Left Images</li> -->
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                      
                    
                     	<?php
                            foreach($getStopMsg as $row)
                            {
                        ?>
                	<div class="col-xl-6 col-lg-6 col-md-6 m-b10">

                		<img src="<?php echo base_url('uploads/'.$row['staff_img']); ?>" alt="" style="height: 100px; width: 200px;float:left; padding:5px;">
                		<b class="font-24 text-dark" style="float:left; padding: 5px;"><?php echo $row['stf_name']; ?>
                			
                		</b>
									<p style="text-align: justify;  color:black; padding-top: 25px;margin-top: 30px;">
										<?php echo substr($row['stf_desc'],1,300).".."; ?></p>
										<a href="<?php echo base_url('Pages/stopMsgViewDetail/'.$row['stf_id']);?>">Read More</a>
                   </div> 	
                        <?php    	
                            }
                    	?>
                
                     

                    <!-- Left part END -->
                    <!-- Side bar start -->
                  <!--   <div class="col-xl-6 col-lg-4 col-md-5 sticky-top">
                       
                    </div> -->
                    <!-- Side bar END -->
                </div>
            </div>
        </div>
    </div>
    <!-- Content END-->

	<!-- Footer -->
  