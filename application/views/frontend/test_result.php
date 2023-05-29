
    <!-- Content -->
    <div class="page-content">
		<!-- Section Banner -->
		<?php include'pages/headSearch/headerImg.php'; ?>
            <div class="container">
                <div class="dez-bnr-inr-entry align-m text-white">
					<div class=" job-search-form">
						<h2 class="text-center">Enter your CNIC number to find test result</h2>
						<h3>Find your test result</h3>
						<form method="post" action="<?= base_url('Job/show_cnic_result_card'); ?>">
							<div class="input-group">
								<input type="text" name="result_cnic" class="form-control" placeholder="i.e 11xxx-xxxxxxx-x" data-inputmask="&quot;mask&quot;: &quot;99999-9999999-9&quot;" data-mask="" >
								<input type="hidden" name="prjid" value="<?= $prjid; ?>">
								<div class="input-group-prepend">
									<button type="submit" class="site-button">Search</button>
								</div>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div>
		<!-- Section Banner END -->
		<!-- Our Latest Blog -->
	<!-- 	<div class="section-full content-inner-2 overlay-white-middle">
			<div class="container">
				<div class="section-head text-black text-center">
					<h2 class="text-uppercase m-b0">Rollno Slip</h2>
					<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Name</th>
								<th>Father Name</th>
								<th>CNIC</th>
								<th>Applied Post</th>
								<th>Rollno</th>
								<th>Test Center</th>
								<th>Test Date/Time</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Alex</td>
								<td>John</td>
								<td>11111-1111111-1</td>
								<td>ASI</td>
								<td>00123</td>
								<td>New Town, Town City</td>
								<td><?// date('d M Y h:i a'); ?> </td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div> -->
		<!-- Our Latest Blog -->
	</div>
	<!-- Content End -->
