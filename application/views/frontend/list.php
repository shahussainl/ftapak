
<style type="text/css">
	table thead th {
    color: #fff !important;
}
</style>
    <!-- Content -->
    <div class="page-content">
		<div class="section-full content-inner-2 overlay-white-middle">
			<div class="container" style="border:1px solid blue;">
				<?php 
						if(!empty($list))
						{
                      $pagedirect = '';
                    if($liststr=='rollno'){$pagedirect = 'check_rollno_slip';} else if ($liststr=='candidate'){ $pagedirect = 'check_eligibility';}else{ $pagedirect = 'check_result';}
				?>
				<div class="section-head text-black text-center">
					<h2 class="text-uppercase m-b0 "><?= ucfirst($liststr); ?> List</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
					<table class="table table-striped">
						<thead class="bg-dark">
							<tr>
								<th>Serial</th>
								<th>Name</th>
								<th>Announce On</th>
								<th>Expires On</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sn = 1;
								foreach($list as $rec)
								{
							?>
							<!-- onclick="window.location.href='<= base_url('Job/result_print_view/'.$rec->user_id.'/'.$rec->rs_prj_id.'/'.$rec->user_cnic); ?>';" -->
							<tr>
								<td><?= $sn;                  ?></td>
								<td><?= $rec->prj_name;       ?></td>
								<td><?= date('d F Y',strtotime($rec->prj_start_date)); ?></td>
								<td><?= date('d F Y',strtotime($rec->prj_end_date));   ?></td>
								<td><a href="<?= base_url('Job/'.$pagedirect.'/'.$rec->prj_id); ?>">check</a></td>
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