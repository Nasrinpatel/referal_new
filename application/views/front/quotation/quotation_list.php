<div class="page-content pb-3">

	<div class="">
		<div class="content mb-2">
			<h4>Manage Quotation</h4>
			<div class="divider divider-margins"></div>

			<div class="row mb-0">
				<div class="col-12">
					<a href="<?= base_url('front/Quotation/add') ?>" style="float: right;" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">ADD Quotation</a>
				</div>
			</div>

			<div class="divider divider-margins"></div>

			<div class="">
				<div class="content" id="tab-group-2">
					<div class="tab-controls tabs-small tabs-rounded">
							<a href="<?= base_url('front/Quotation/index/pending') ?>" data-tab="tab-1" class="gradient-magenta text-white font-15">Pending</a>	
							<a href="<?= base_url('front/Quotation/index/confirm')?>" data-tab="tab-2" class="gradient-green text-white font-15">Confirm</a>	
							<a href="<?= base_url('front/Quotation/index/cancel')?>" data-tab="tab-3" class="gradient-red text-white font-15">Cancel</a>							 
					</div>
					<div class="clearfix mb-3"></div>
					<div class="tab-content" id="tab-<?=$nt?>">
						<table class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap" id="quotation_table">
							<thead>
								<tr class="bg-blue-dark">
									<th scope="col" class="color-white py-3 font-13">Quotation Code</th>
									<th scope="col" class="color-white py-3 font-13">Subject</th>
									<th scope="col" class="color-white py-3 font-13">Status</th>
									<th scope="col" class="color-white py-3 font-13">Customer Name</th>
									<th scope="col" class="color-white py-3 font-13">Reference By</th>
									<th scope="col" class="color-white py-3 font-13">Created</th>
									<th scope="col" class="color-white py-3 font-13">Expired</th>
									<th scope="col" class="color-white py-3 font-13">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$countNo = 0;
								foreach ($qutData as $il)
								{
									$countNo++;
									?>
									<tr>
										<td><?= $il['qut_code'] ?></td>
										<td><?= $il['qut_subject'] ?></td>
										<td><?= $il['qut_status']  ?></td>
										<td><?= $il['customer_name'] ?></td>
										<td><?= $il['reference_by'] ?></td>
										<td><?= $il['qut_created'] ?></td>
										<td><?= $il['qut_expired'] ?></td>
										<td>
											<div>
												<div class="dropdown">
													<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
														Action
													</a>
													<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
														<li><a class="dropdown-item" href="<?= base_url('front/Quotation/edit/'.$il->qut_id) ?>">Edit</a></li>
														<li><a class="dropdown-item" href="<?= base_url('front/Quotation/view/'.$il->qut_id) ?>">View</a></li>
													</ul>
												</div>
											</div>
										</td>
										<!-- <td><i class="fa fa-arrow-right rotate-90 color-red-dark"></i></td> -->
									</tr>
									<?php 
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready( function () {
		$('#quotation_table').DataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 7}
        	]
		});
		
	
	});
</script>
