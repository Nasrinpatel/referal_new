<div class="page-content pb-3">

	<div class="">
		<div class="content" style="margin-bottom: 20% !important;">
			
			<div class="divider divider-margins"></div>

			<div class="row mb-0">
				<div class="col-12">
					<a href="<?= base_url('front/User/add') ?>" style="float: right;" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add User</a>
					<h4>Manage User</h4>
				</div>
			</div>

			<div class="divider divider-margins"></div>

			<div class="">
				<div class="content">
					<div class="clearfix mb-3"></div>
					<table class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap" id="userTable">
						<thead>
							<tr class="bg-blue-dark">
								<th>Name</th>
								<th>Type</th>
								<th>Email-Id</th>
								<th>Phone Number</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$countNo = 0;
							foreach ($usersData as $ud)
							{
								$countNo++; ?>
								<tr>
									<td><?=$ud['name']?></td>
									<td><?=$ud['role_name']?></td>
									<td><?=$ud['email']?></td>
									<td><?=numberMask($ud['phone_no'])?></td>
									<td>
										<div>
											<div class="dropdown">
												<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
													Action
												</a>
												<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
													<li><a class="dropdown-item" href="<?= base_url('front/User/edit/'.$ud['u_id']) ?>">Edit</a></li>
													<li><a class="dropdown-item" href="#" onclick="onClickDeleteCnf(this)" data-url="<?= base_url('front/User/delete/'.$ud['u_id']) ?>" data-id="<?=$ud['u_id']?>" >Delete</a></li>
													<!-- <li><a class="dropdown-item" href="<?php // base_url('front/User/view/'.$ud['u_id']) ?>">View</a></li> -->
												</ul>
											</div>
										</div>
									</td>
								</tr>
								<?php 
							} ?>
						</tbody>
					</table>
                </div> <!-- content -->
            </div>
        </div>
	</div>
</div>
<script>
	$(document).ready( function () {
		$('#userTable').DataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 4}
        	]
		});
	});
</script>
