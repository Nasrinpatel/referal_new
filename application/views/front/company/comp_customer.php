<div class="page-content pb-3">
	
	<div class="">
		<div class="content" style="margin-bottom: 20% !important;">
			<h4>Manage Company</h4>
			<div class="divider divider-margins"></div>

			<div class="row mb-0">
				<div class="col-12">
					<a href="<?= base_url('front/Company') ?>" style="float: right;" class="btn btn-primary btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s">Back</a>
				</div>
			</div>

			<div class="divider divider-margins"></div>

			<div class="">
				<div class="content">
					<div class="clearfix mb-3"></div>
						<table id="compCusTbl" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
							<thead>
								<tr class="bg-blue-dark">
									<th>Referral Name</th>
									<th>Referral Email</th>
									<th>Referral Contact Number</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$count=0;
								foreach($getCompCus as $cc)
								{
									$count++;
									?>
									<tr>
										<td><?= $cc->customer_name ?></td>
										<td><?= $cc->customer_email ?></td>
										<td><?= $cc->customer_phone_no ?></td>
									</tr>
									<?php 
								} ?>
							</tbody>
						</table>		
					</div> <!-- end col-->
				</div><!-- end row-->
			</div> <!-- container -->
		</div> <!-- content -->
	</div>
</div>

<script>
	$(document).ready( function () {
		$('#compCusTbl').DataTable({
			responsive: true,
			
		});
	});
</script>
