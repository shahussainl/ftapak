<?php
 // echo "<pre>";
 // print_r($data);
 // exit();
// $rec->ap_app_id
// $rec->rl_prj_id
// $rec->rs_app_id
// $rec->rs_prj_id
// $rec->user_id
?>
<style type="text/css">
	table thead th {
    color: #fff !important;
}
</style>
    <!-- Content -->
    <div class="page-content">
		<!-- Section Banner -->
		<!--<div class="dez-bnr-inr dez-bnr-inr-md overlay-black-dark" style="background-image:url(images/main-slider/slide1.jpg);">
            <div class="container">
                <div class="dez-bnr-inr-entry align-m text-white">
					<div class=" job-search-form">
						<h2 class="text-center">Enter your CNIC number to find test result</h2>
						<h3>Find your test result</h3>
						<form method="post" action="<?// base_url('Job/show_cnic_result_card'); ?>">
							<div class="input-group">
								<input type="text" name="result_cnic" class="form-control" placeholder="i.e 11xxx-xxxxxxx-x" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" >
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
					<h2 class="text-uppercase m-b0 ">Result Card</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
					<table class="table table-striped">
						<thead class="bg-dark">
							<tr>
								<th>Serial</th>
								<th>Name</th>
								<th>Mobile</th>
								<th>CNIC</th>
								<th>Applied Post</th>
								<th>Rollno</th>
								<th>Obt Marks</th>
								<th>Total Marks</th>
								<th>%</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sn = 1;
								foreach($data as $rec)
								{
							?>
							
				<tr onclick="window.location.href='<?= base_url('Job/result_print_view/'.$rec->user_id.'/'.$rec->rs_prj_id.'/'.$rec->user_cnic); ?>';">
								<td><?= $sn;                    ?></td>
								<td><?= $rec->user_fullname;    ?></td>
								<td><?= $rec->user_contact;     ?></td>
								<td><?= $rec->user_cnic;        ?></td>
								<td><?= $rec->prj_name;         ?></td>
								<td><?= $rec->roll_no;          ?></td>
								<td><?php if($rec->obt_marks!=''){ echo $rec->obt_marks; }else{ echo 'Pending'; }        ?></td>
								<td><?php if($rec->obt_marks!=''){ echo $rec->prj_total_marks; }else{ echo 'Pending'; }  ?></td>
								<td><?php if($rec->percentage!=''){ echo $rec->percentage; }else{ echo 'Pending'; }      ?></td>
							
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
				<div class="section-head text-black text-center"><br><br>
					<h2 class="text-uppercase m-b0">No Record Found!</h2>
					<p></p>
				</div>
				<?php
					}
				?>
			</div>
		</div>
		<!-- Our Latest Blog -->
	</div>
	<!-- Content End -->