<?php
// echo "<pre>";
// print_r($data);
// exit();
?>

<style type="text/css">
	table thead th {
    color: #fff !important;
}
.modal-backdrop{
	z-index: 0 !important;
}
</style>
    <!-- Content -->
    <div class="page-content">
		<!-- Section Banner -->
		<!-- <div class="dez-bnr-inr dez-bnr-inr-md overlay-black-dark" style="background-image:url(images/main-slider/slide1.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry align-m text-white">
					<div class=" job-search-form">
						<h2 class="text-center">Enter your CNIC number to find test rollno</h2>
						<h3>Find your test rollno</h3>
						<form method="post" action="<?// base_url('Job/show_cnic_rollno_slip'); ?>">
							<div class="input-group">
								<input type="text" name="cnic_rollno_slip" class="form-control" placeholder="i.e 11xxx-xxxxxxx-x" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" >
								<div class="input-group-prepend">
									<button type="submit" class="site-button">Search</button>
								</div>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div> -->
		<!-- Section Banner END -->
		<!-- Our Latest Blog -->
		<div class="section-full content-inner-2 overlay-white-middle">
			<div class="container" style="border:1px solid blue;">
					<?php 
						if(!empty($data))
						{
				?>
				<div class="section-head text-black text-center">
					<h2 class="text-uppercase m-b0 ">Rollno Slip</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
					<table class="table table-striped">
						<thead class="bg-dark" style="color:white !important;">
							<tr>
								<th>Serial</th>
								<th>Name</th>
								<th>CNIC</th>
								<th>Mobile</th>
								<th>Applied Post</th>
								<th>Rollno</th>
								<th>Test Center</th>
								<th>Test Date/Time</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sn = 1;
								foreach($data as $rec)
								{
							?>
							<tr onclick="window.location.href='<?= base_url('Job/rollno_print_view/'.$rec->user_id.'/'.$rec->prj_id.'/'.$rec->user_cnic); ?>';">
								<td><?= $sn;				                                                 ?></td>
								<td><?= $rec->user_fullname;                                                 ?></td>
								<td><?= $rec->user_cnic;                                                     ?></td>
								<td><?= $rec->user_contact;                                                  ?></td>
								<td><?= $rec->prj_name;                                                      ?></td>
								<td><?php if($rec->roll_no!=''){ echo $rec->roll_no;}else {echo 'Pending';}  ?></td>
								<td><?php if($rec->name!=''){ echo $rec->name;}else {echo 'Pending';}        ?></td>
								<td><?php if($rec->test_date_time!=''){ echo date('d M Y h:i a',strtotime($rec->test_date_time)); }else {echo 'Pending';}    													  ?></td>
								<td><?php if($rec->address!=''){ echo $rec->address;}else {echo 'Pending';}  ?></td>
							</tr>
	
							<?php		
								$sn++;
								}
							?>
						</tbody>
					</table>
				</div>
				<?php
					}
					else
					{
				?>
				<div class="section-head text-black text-center">
					<h2 class="text-uppercase m-b0">Rollno Slip</h2>
					<p>No Record Found!</p>
				</div>
				<?php
					}
				?>
<!-- testing dummy table -->

<!-- testing dummy table end -->
				
			</div>
		</div>
		<!-- Our Latest Blog -->
	</div>
	<!-- Content End -->
<!-- Modal -->
<div class="modal fade modal-bx-info editor" id="itskills" tabindex="-1" role="dialog" aria-labelledby="ItskillsModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="ItskillsModalLongTitle">Rollno Slip</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body" id="printMe">
<div class="job-bx bg-white m-b30" >
	<h5 class="m-b10">Accomplishments</h5>
	<div class="list-row">
		<div class="list-line">
			<div class="d-flex">
				<h6 class="font-14 m-b5">Online Profile</h6>
				<a href="javascript:void(0);" data-toggle="modal" data-target="#accomplishments" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> Edit</a>
			</div>
			<p class="m-b0">Add link to Online profiles (e.g. Linkedin, Facebook etc.).</p>
		</div>

		
		
	</div>
</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="site-button" data-dismiss="modal">Cancel</button>
				<button type="button" class="site-button" onclick="printDiv('printMe')">Print</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal End -->	