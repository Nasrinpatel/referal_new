<div class="page-content pb-3">
	<div>

		<div class="content" style="margin-bottom: 20% !important;">
		<h4>Manage Plan</h4>
		<div class="divider divider-margins"></div>
		<div class="row mb-0">
			<div class="col-12">
				<?php if(get_ut_role($this->session->userdata('user_type')) == 'Admin'){?>
					<a href="<?= base_url('front/Plan/add') ?>" style="float: right;" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add Plan</a>
				<?php } ?>
			</div>
		</div>

		<div class="divider divider-margins"></div>

		<div>
			<div class="content">
				
				<div class="clearfix mb-3"></div>
				<table id="planTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
					<thead>
						<tr class="bg-blue-dark">
							<th>Bought Fee</th>
							<th>Created On</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$countNo = 0;
						foreach ($planData as $cusL)
						{
							$countNo++;
							?>
							<tr>
								<td><?= $cusL['ref_con_fee'] ?></td>
								<td><?= date_format( date_create($cusL['created']),'d-m-Y') ?></td>
								<td>
									<div>
										<div class="dropdown">
											<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
												Action
											</a>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<li><a class="dropdown-item" href="<?= base_url('front/Plan/edit/'.$cusL['plan_id']) ?>">Edit</a></li>
												<!--<li><a class="dropdown-item" href="<?php // base_url('front/Plan/delete/'.$cusL['plan_id']) ?>">Delete</a></li>
                                                <li><a class="dropdown-item" href="<?php // base_url('front/Customer/view/'.$cusL['cus_id']) ?>">View</a></li>
												<li><a class="popup-convert dropdown-item" href="#" data-cusid="<?php //$cusL['cus_id']?>">Convert</a></li> -->
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
		$('#planTable').DataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 2}
        	]
		});
	});
</script>
