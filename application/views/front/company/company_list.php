<div class="page-content pb-3">

	<div class="">
		<div class="content" style="margin-bottom: 20% !important;">
			
			<div class="divider divider-margins"></div>

			<div class="row mb-0">
				<div class="col-12">
					<a href="<?= base_url('front/Company/add') ?>" style="float: right;" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add Company</a>
					<h4>Manage Company</h4>
				</div>
			</div>

			<div class="divider divider-margins"></div>

			<div class="">
				<div class="content">
					<div class="clearfix mb-3"></div>
					<table class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap" id="compTable">
						<thead>
							<tr class="bg-blue-dark">							
								<th scope="col" class="color-white py-3 font-13">Company Name</th>
								<th scope="col" class="color-white py-3 font-13">Address</th>
								<th scope="col" class="color-white py-3 font-13">Email</th>
								<th scope="col" class="color-white py-3 font-13">Contact No</th>
								<th scope="col" class="color-white py-3 font-13">Logo</th>	
								<th scope="col" class="color-white py-3 font-13">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$countNo = 0;
							foreach ($compData as $icl)
							{
								$countNo++;
								?>
								<tr>
									<td><?= $icl->company_name ?></td>
									<td><?= $icl->company_address ?></td>
									<td><?= $icl->company_email ?></td>
									<td><?= $icl->company_phone_no ?></td>
									<td><img src="<?= base_url('upload/company_logo/'.$icl->company_logo)?>" width="20%" height="20%"/></td>
									<td>
										<div>
											<div class="dropdown">
												<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
													Action
												</a>
												<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
													<li><a class="dropdown-item" href="<?= base_url('front/Company/user_index/'.$icl->cm_id) ?>">Company User</a></li>
													<li><a class="dropdown-item" href="<?= base_url('front/Company/customers/'.$icl->cm_id) ?>">Referral's</a></li>
													<li><a class="dropdown-item" href="<?= base_url('front/Company/edit/'.$icl->cm_id) ?>">Edit</a></li>
													<li><a class="dropdown-item" href="<?= base_url('front/Company/company_detail/'.$icl->cm_id) ?>">View</a></li>
													<li><a class="dropdown-item" onclick="onClickDeleteCnf(this)" href="#" data-url="<?= base_url('front/Company/delete/'.$icl->cm_id) ?>" data-id="<?=$icl->cm_id?>">Delete</a></li>
												</ul>
											</div>
										</div>
									</td>
								</tr>
								<?php 
							} 
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready( function () {
		$('#compTable').DataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 5}
        	],
			// order: [[0, 'asc']],
		});
	});
</script>
