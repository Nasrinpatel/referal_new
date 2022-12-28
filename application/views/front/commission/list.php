<div class="page-content pb-3">
	<div>

		<div class="content" style="margin-bottom: 20% !important;">
		<h4>Manage Referral Fee</h4>
		<div class="divider divider-margins"></div>
		<div class="row mb-0">
			<div class="col-12">
				<a href="#" style="float: right;" data-menu="popup-commission" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add Commission</a>
			</div>
		</div>

		<div class="divider divider-margins"></div>

		<div>
			<div class="content">
				<div class="clearfix mb-3"></div>
				<table id="commissionTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
					<thead>
						<tr class="bg-blue-dark">
							<th>Referral Name</th>
							<th>Referral Code</th>
							<th>Referral Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="commissionData">
						<?php
						$countNo = 0;
						foreach ($comData as $comL)
						{
							$countNo++;
							?>
							<tr>
								<td><?= $comL['customer_name'] ?></td>
								<td><?= $comL['customer_code'] ?></td>
								<td><?php if($comL['referral_name'] != ''){ echo $comL['referral_name']; }else{ echo "-";}?></td>
								<td>
									<div>
										<div class="dropdown">
											<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
												Action
											</a>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<li><a href="" class="commission_edit dropdown-item" data-comid="<?=$comL['com_id']?>">Edit</a></li>
												<li><a class="dropdown-item" href="<?= base_url('front/Commission/delete/'.$comL['com_id']) ?>">Delete</a></li>
											</ul>
										</div>
									</div>
								</td>
							</tr>
							<?php 
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div> <!-- content -->
</div>
<script>
	$(document).ready( function () {
		$('#commissionTable').DataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 3}
        	]
		});
	});
</script>
