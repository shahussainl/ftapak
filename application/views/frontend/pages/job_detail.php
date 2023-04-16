<?php
// echo'<pre>';
// print_r($jobsDetail);
// echo "<pre>";
// print_r($jobFiles);
// exit();
?>
<style>
.modal-backdrop {
	z-index: 999;
}
</style>
	<!-- modal -->
	<div class="modal fade" id="onlineApply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Apply for <?php echo $jobsDetail['prj_name'];?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- Online Form -->
				<!-- <tbody id="a"> -->
				<form action="<?php echo base_url('Pages/insertUpdateApplicants'); ?>" method="post" >
					<input type="hidden" class="tstDate" value="<?php if(!empty($jobsDetail['prj_end_date'])){ echo date('m/d/Y',strtotime($jobsDetail['prj_end_date'])); } ?>" name="test_date" onclick="edDate()">
					<input type="hidden" value="<?php if(!empty($jobsDetail['prj_end_date'])){ echo date('m/d/Y',strtotime($jobsDetail['prj_end_date'])); } ?>" class="eDate">
					<input type="hidden" value="<?php if(!empty($jobsDetail['prj_start_date'])){ echo date('m/d/Y',strtotime($jobsDetail['prj_start_date'])); } ?>" class="sDate">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">CNIC</label>
								<input type="text" name="user_cnic" id="uCnic" class="form-control cnicMsg uCnic" placeholder="xxxxx-xxxxxxx-x" onblur="findCnicRec(this);" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" value="" required>
								<input type="hidden" name="user_id" id="user_id" value="">
								<input type="hidden" name="prj_id"  value="<?php echo $jobsDetail['prj_id'];?>">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">CONTACT</label>
								<input type="text" name="user_contact" class="form-control user_contact" value="" placeholder="xxx-xxxxxxx" data-inputmask="&quot;mask&quot;: &quot;9999-9999999&quot;" data-mask="" required>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">NAME</label>
								<input type="text" name="user_name" class="form-control user_fullname" value="" placeholder="Enter Fullname" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Father Name</label>
								<input type="text" name="user_f_name" class="form-control user_f_name" placeholder="Enter Father name" value="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">EMAIL</label>
								<input type="email" name="user_email" class="form-control user_email" placeholder="example@email.com" value="" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">ADDRESS</label>
								<input type="text" name="address" class="form-control user_address" placeholder="village/town, city, province"  value="" required>
							</div>
						</div>
					</div>
				
<!-- Online Form -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
			</div>
	</form>	
		</div>
		</div>
						<!-- ./modal -->
    <!-- Content -->
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <?php include'headSearch/headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Job Detail</h1>
					<!-- Breadcrumb row -->
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="#">Home</a></li>
							<li>Job Detail</li>
						</ul>
					</div>
					<!-- Breadcrumb row END -->
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- contact area -->
        <div class="content-block">
            <!-- Job Detail -->
			<div class="section-full content-inner-1">
				<div class="container">
					<div class="row">
						<div class="col-lg-4">
							<div class="sticky-top">
								<div class="row">
									<div class="col-lg-12 col-md-6">
										<div class="m-b30">
											<img src="images/blog/grid/pic1.jpg" alt="">
										</div>
									</div>
									<div class="col-lg-12 col-md-6">
										<div class="widget bg-white p-lr20 p-t20  widget_getintuch radius-sm">
											<h4 class="text-black font-weight-700 p-t10 m-b15">Job Detail</h4>
											<ul>
												<li><i class="ti-location-pin"></i><strong class="font-weight-700 text-black">Address</strong><span class="text-black-light"> <?php echo $jobsDetail['org_address']; ?></span></li>
												<li><i class="ti-money"></i><strong class="font-weight-700 text-black">Salary</strong> $800 Monthy</li>
												<li><i class="ti-shield"></i><strong class="font-weight-700 text-black">Experience</strong>6 Year Experience</li>
												<li><a href="<?= base_url('Customer'); ?>" class="site-button"  >Apply Online</a></li>
											</ul>
										</div>
									</div>
								</div>
                            </div>
						</div>
						<div class="col-lg-8">
							<div class="job-info-box">
								<h3 class="m-t0 m-b10 font-weight-700 title-head">
									<a href="javascript:void(0);" class="text-secondry m-r30"><?php echo $jobsDetail['prj_name'];?></a>
								</h3>
								<ul class="job-info">
									<li><strong>Organization :  </strong><?php echo $jobsDetail['org_name'];?></li>
									<li><strong>Deadline :  </strong><?php echo date('d M Y',strtotime( $jobsDetail['prj_end_date']));?></li>
									<li><i class="ti-location-pin text-black m-r5"></i><?php echo $jobsDetail['org_address'];?></li>
								</ul>
								<br><br>
								<h5 class="font-weight-600">Job Description</h5>
								<div class="dez-divider divider-2px bg-gray-dark mb-4 mt-0"></div>
								<p><?php echo $jobsDetail['prj_desc'];?></p>
								<?php
									foreach($jobFiles as $files)
									{
								?>
								<a href="<?= base_url('uploads/'.$files->prj_file); ?>" target="_blank" class="site-button">Click Download</a>
								<?php		
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
            <!-- Job Detail -->
			<!-- Our Jobs -->
			<div class="section-full content-inner">
				<div class="container">
					<div class="row">
					<!-- 	<div class="col-xl-3 col-lg-6 col-md-6">
							<div class="m-b30 blog-grid">
                                <div class="dez-post-media dez-img-effect "> <a href="blog-details.html"><img src="images/blog/grid/pic1.jpg" alt=""></a> </div>
                                <div class="dez-info p-a20 border-1">
                                    <div class="dez-post-title ">
                                        <h5 class="post-title"><a href="blog-details.html">Title of blog post</a></h5>
                                    </div>
                                    <div class="dez-post-meta ">
                                        <ul>
                                            <li class="post-date"> <i class="ti-location-pin"></i> London </li>
                                            <li class="post-author"><i class="ti-user"></i>By <a href="#">Jone</a> </li>
                                        </ul>
                                    </div>
                                    <div class="dez-post-text">
                                         <p>All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks.</p>
                                    </div>
                                   <div class="dez-post-readmore"> 
										<a href="blog-details.html" title="READ MORE" rel="bookmark" class="site-button-link"><span class="fw6">READ MORE</span></a>
									</div>
                                </div>
                            </div>
						</div> -->
					
					</div>
				</div>
			</div>
			<!-- Our Jobs END -->
		</div>
    </div>
    <!-- Content END-->

	<script>
  function findCnicRec(obj)
  {
    var cnic = $(obj).val();

    // alert(cnic);
   if(cnic!='')
   {
    // $.ajax({
	// 	type: 'post',
	// 	dataType: 'json',
	// 	async: false,
	// 	data: {
	// 		"user_cnic": cnic
	// 	},
	// 	url: '<= base_url('MainContent/getUserDetail'); ?>',
	// 	success: function (data)
	// 	{
	// 		// alert(data);

	// 		if (data == null) {

	// 			$('#errMsg').html('<span class="text-danger">Record not Found!</span>');
	// 			$(obj).closest('tr').find('.cnicMsg').css("border", "red solid 1px");
	// 			$(obj).closest('tr').find('.user_id').val('');
	// 			$(obj).closest('tr').find('.user_fullname').val('');
	// 			$(obj).closest('tr').find('.user_f_name').val('');
	// 			$(obj).closest('tr').find('.user_email').val('');
	// 			$(obj).closest('tr').find('#user_id').val('');
	// 			// $(obj).closest('tr').find('#kt_select2_4').val('').change();
	// 			$(obj).closest('tr').find('.user_contact').val('');
	// 			$(obj).closest('tr').find('.user_address').val('');
				
	// 		} else {

	// 			$('#errMsg').html('<span class="text-success">Record Found!</span>');
	// 			$(obj).closest('tr').find('.cnicMsg').css("border", "green solid 1px");
	// 			$(obj).closest('tr').find('.user_id').val('');
	// 			$(obj).closest('tr').find('.user_fullname').val(data.user_fullname);
	// 			$(obj).closest('tr').find('.user_f_name').val(data.user_father_name);
	// 			$(obj).closest('tr').find('.user_email').val(data.user_email);
	// 			// $(obj).closest('tr').find('#kt_select2_4').trigger('change');
	// 			$(obj).closest('tr').find('#user_id').val(data.user_id);
	// 			$(obj).closest('tr').find('.user_contact').val(data.user_contact);
	// 			$(obj).closest('tr').find('.user_address').val(data.user_address);
	// 			// $('#kt_select2_4').val(data.usercompnayid);
				
	// 		}
		
	// 	}
	// });
     } 
     else
     {
         $('#errMsg').html('<span class="text-danger">CNIC must not be empty!</span>');
         $(obj).closest('tr').find('.cnicMsg').css("border", "red solid 1px");
     }
  }onblur="findCnicRec(this);"
</script>
