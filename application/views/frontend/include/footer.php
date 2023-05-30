	<?php
             $idd=['company_id'=>'2'];
             $tableName="settings";
             $sittingData=$this->cms_m->dynamicGetUpdate($idd,$tableName);
             // echo "<pre>";
             // print_r($sittingData);
             // exit();
    ?>
    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-top"  style="display:none;">
            <div class="container">
                <div class="row">
					
					<div class="col-xl-5 col-lg-5 col-md-8 col-sm-8 col-12">
                        <div class="widget border-0">
                        <i class="fa fa-map-marker"></i>
                        <?php 
                            if(!empty($sittingData['company_address']))
                            {
                                echo $sittingData['company_address']; 
                            } 
                            ?>
                            <!-- <h5 class="m-b30 text-white">Frequently Asked Questions</h5>
                            <ul class="list-2 list-line">
                                <li><a href="javascript:void(0);">Privacy & Seurty</a></li>
                                <li><a href="javascript:void(0);">Terms of Serice</a></li>
							                	<li><a href="javascript:void(0);">Support</a></li>
                                <li><a href="javascript:void(0);">How It Works</a></li>
                                <li><a href="javascript:void(0);">Underwriting</a></li>
                                <li><a href="javascript:void(0);">Contact Us</a></li>
								                <li><a href="javascript:void(0);">Lending Licnses</a></li>
								                <li><a href="javascript:void(0);">Support</a></li>
                            </ul> -->
                        </div>
                    </div>
					<div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-12">
                        <div class="widget border-0">
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:<?= $sittingData['company_email']; ?>">
                        <?php 
                                     if(!empty($sittingData['company_email']))
                                      {
                                          echo $sittingData['company_email']; 
                                       } 
                                     ?>
                       
                        </a>
                     
                    
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-12 col-sm-12">
                        <div class="widget">
                            <img src="<?php if(!empty($sittingData['company_logo'])){ echo base_url('/uploads/'.$sittingData['company_logo']); } ?>" width="180" class="m-b15" alt=""/>
			
							<ul class="list-inline m-a0">
								<li><a href="<?php if(!empty($sittingData['fb_link'])) {echo $sittingData['fb_link']; }?>" class="site-button white facebook circle "><i class="fa fa-facebook"></i></a></li>
								<li><a href="<?php if(!empty($sittingData['linkedin_link'])){echo $sittingData['linkedin_link']; } ?>" class="site-button white linkedin circle"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="<?php if(!empty($sittingData['instagram_link'])) {  echo $sittingData['instagram_link'];    }?>" class="site-button white instagram circle "><i class="fa fa-instagram"></i></a></li>
								<li><a href=" <?php if(!empty($sittingData['instagram_link'])){ echo $sittingData['twitter_link']; }?>" class="site-button white instagram circle"><i class="fa fa-twitter"></i></a></li>
							</ul>
                        </div>
                    </div>
				</div>
            </div>
        </div>
        <!-- footer bottom part -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 text-center">
                        <?php if(!empty($sittingData['company_address'])) {echo str_replace('<br>',' ',$sittingData['company_address']); } ?>
                    </div>
                    <div class="col-lg-4 text-center">
						<span> © Copyright by 
						<a href="<?= base_url(); ?>"><b><?php if(!empty($sittingData['company_name'])){ echo $sittingData['company_name']; } ?></b> </a> All rights reserved.</span> 
					</div>
                    <div class="col-lg-4 text-center">
                        <a href="<?php if(!empty($sittingData['fb_link'])) {echo $sittingData['fb_link']; }?>" class="site-button white facebook circle "><i class="fa fa-facebook"></i></a>
                        <a href="<?php if(!empty($sittingData['linkedin_link'])){echo $sittingData['linkedin_link']; } ?>" class="site-button white linkedin circle"><i class="fa fa-linkedin"></i></a>
                        <a href="<?php if(!empty($sittingData['instagram_link'])) {  echo $sittingData['instagram_link'];    }?>" class="site-button white instagram circle "><i class="fa fa-instagram"></i></a>
                        <a href=" <?php if(!empty($sittingData['instagram_link'])){ echo $sittingData['twitter_link']; }?>" class="site-button white instagram circle"><i class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up" ></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="<?php echo base_url('front_asset/js/jquery.min.js');?>"></script><!-- JQUERY.MIN JS -->
<script src="<?php echo base_url('front_asset/plugins/bootstrap/js/popper.min.js');?>"></script><!-- BOOTSTRAP.MIN JS -->
<script src="<?php echo base_url('front_asset/plugins/bootstrap/js/bootstrap.min.js');?>"></script><!-- BOOTSTRAP.MIN JS -->
<script src="<?php echo base_url('front_asset/plugins/bootstrap-select/bootstrap-select.min.js');?>"></script><!-- FORM JS -->
<script src="<?php echo base_url('front_asset/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js');?>"></script><!-- FORM JS -->
<script src="<?php echo base_url('front_asset/plugins/magnific-popup/magnific-popup.js');?>"></script><!-- MAGNIFIC POPUP JS -->
<script src="<?php echo base_url('front_asset/plugins/counter/waypoints-min.js');?>"></script><!-- WAYPOINTS JS -->
<script src="<?php echo base_url('front_asset/plugins/counter/counterup.min.js');?>"></script><!-- COUNTERUP JS -->
<script src="<?php echo base_url('front_asset/plugins/imagesloaded/imagesloaded.js');?>"></script><!-- IMAGESLOADED -->
<script src="<?php echo base_url('front_asset/plugins/masonry/masonry-3.1.4.js');?>"></script><!-- MASONRY -->
<script src="<?php echo base_url('front_asset/plugins/masonry/masonry.filter.js');?>"></script><!-- MASONRY -->
<script src="<?php echo base_url('front_asset/plugins/owl-carousel/owl.carousel.js');?>"></script><!-- OWL SLIDER -->
<script src="<?php echo base_url('front_asset/js/custom.js');?>"></script><!-- CUSTOM FUCTIONS  -->
<script src="<?php echo base_url('front_asset/js/dz.carousel.j');?>"></script><!-- SORTCODE FUCTIONS  -->
<script src="<?php echo base_url('front_asset/js/dz.ajax.js');?>"></script><!-- CONTACT JS  -->

 <!-------------------------  start insertion ----------------------------->

 <!-- ********************* input mask  ********************** -->
<script src="<?php echo base_url('back_asset/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
<script src="<?php echo base_url('back_asset/plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
<script src="<?php echo base_url('back_asset/plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>



 <!-------------------------  start code For subscribed insertion ----------------------------->

 <script type="text/javascript">

      $(function(){
          $('.myformSub').on('submit',function(e){
            e.preventDefault();
             //alert("working insert");
            var formData = $(this).serialize();
            $.ajax({
               url:'<?= base_url("Pages/subscribe") ?>',
               type:'POST',
               dataType:'HTML',
               data:formData,
               
               success:function(data)
               {
                // alert(data);
                  if(data==1)
                  {
                      $('.show_data').html("Alrady Subscribed");
                  }
                  else
                  {
                      $('.show_data').html("Subscribed");
                  }   
               }
            });
           return false;
          });
      });
 
 </script>

<!-------------------------  End insertion ------------------------------------>

<script>
    function printDiv(divName){
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
  </script>


 <script type="text/javascript"> 
      $(function(){
          $('.myfrminsert').on('submit',function(){
            // alert("working insert");
            var formData = $(this).serialize();
            $.ajax({
               url:'<?= base_url("Pages/commentFun") ?>',
              
               type:'POST',
               dataType:'JSON',
               data:formData,
               
               success:function(data)
               {
                  
                   $(".myCommentDiv").load(location.href + " .myCommentDiv");
                  //alert('yess');
               
               }
            });
           return false;
          });
      });
 
 </script>

<!-------------------------  End insertion ------------------------------------>

 <!-------------------------  start insertion from model----------------------------->

 <script type="text/javascript"> 
      $(function(){
          $('.modalInsert').on('submit',function(){
            // alert("working insert");
            var formData = $(this).serialize();
            $.ajax({
               url:'<?= base_url("Pages/addCommentReplay") ?>',
               type:'POST',
               dataType:'JSON',
               data:formData,
               
               success:function(data)
               {
                  
                  $(".myCommentDiv").load(location.href + " .myCommentDiv");
                  $(".modalInsert")[0].reset();
                  $("#replyModel").modal("hide");
               
               }
            });
           return false;
          });
      });
 
 </script>

<!-------------------------  End model insertion ------------------------------------>

<!-------------------------  start Show Data in Model using Jaquey ----------------------------->

  <script type="text/javascript">
      $(document).ready(function(){

        $('[data-mask]').inputmask();
        
         $(document).on('click','.btn_edit',function(){
           
             var id = $(this).attr('id');
          

             $('input[name="id"]').val(id);


             

         });
      });
 </script>

<!------------------------- End  Show Data in Model using Jaquey ----------------------------->
</body>
</html>