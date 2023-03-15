
    <div class="page-content bg-white">
        <!-- inner page banner -->
       <?php include'headSearch/headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Administration</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Details</li>
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
                    
                    
                	<div class="col-sm-4 col-xl-4 col-lg-4 col-md-4 m-b10">

                		<a href="<?php echo base_url('uploads/'.$getStopMsg['staff_img']); ?>" target="_blank"><img src="<?php echo base_url('uploads/'.$getStopMsg['staff_img']); ?>" alt="" style="float:left; padding:5px; width: 350px; height: 325px;" > </a>
                	</div>
                	<div class="col-sm-8 col-xl-8 col-lg-8 col-md-8 m-b10">
                		   <h1 class="font-24 text-dark" style="float:left; padding-left: 25px; padding-top: 30px;">
                			 <u><?php echo $getStopMsg['stf_name']; ?></u>	

                		   </h1><br><br><br>
						   <span style="text-align: justify;  color:black; ">
						   	<?php echo $getStopMsg['stf_desc']; ?>	
						   </span>

                   </div> 	
                   
                
                     

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
  