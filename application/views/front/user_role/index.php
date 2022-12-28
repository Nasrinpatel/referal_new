<div class="content-page">
	<div class="">
		<div class="content" style="margin-bottom: 20% !important;">
			<div class="divider divider-margins"></div>
			<!-- start page title -->
			<div class="row mb-0">
				<div class="col-12">
					<a href="<?= base_url('front/User_role/add') ?>" style="float: right;" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add User Role</a>
					<h4>Manage User Role</h4>
				</div>
			</div>     
			<!-- end page title --> 
			<div class="divider divider-margins"></div>
			
			<div class="">
				<div class="content">
					<table id="userRoleTbl" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
						<thead>
							<tr class="bg-blue-dark">
								<th>#</th>
								<th>User Role</th>
								<!-- <th>View</th>
								<th>Create</th>
								<th>Edit</th>
								<th>Delete</th>
								<th>Import</th>
								<th>Export</th>
								<th>View Own</th> -->
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$count=0;
								foreach($user_role as $ur){
									$count++;
							?>
							<tr>
								<td><?=$count?></td>
								<td><?= $ur->role_name; ?></td>
								<!--<td><?php /* if($ur->view==1){ echo"<span class='fa fa-check color-green-dark'></span>"; }else{ echo"<span class='fa fa-close color-red-dark'></span>"; } ?></td>
								<td><?php if($ur->create_all==1){ echo"<span class='fa fa-check color-green-dark'></span>"; }else{ echo"<span class='fa fa-close color-red-dark'></span>"; } ?></td>
								<td><?php if($ur->edit_all==1){ echo"<span class='fa fa-check color-green-dark'></span>"; }else{ echo"<span class='fa fa-close color-red-dark'></span>"; } ?></td>
								<td><?php if($ur->delete_all==1){ echo"<span class='fa fa-check color-green-dark'></span>"; }else{ echo"<span class='fa fa-close color-red-dark'></span>"; } ?></td>
								<td><?php if($ur->import_all==1){ echo"<span class='fa fa-check color-green-dark'></span>"; }else{ echo"<span class='fa fa-close color-red-dark'></span>"; } ?></td>
								<td><?php if($ur->export_all==1){ echo"<span class='fa fa-check color-green-dark'></span>"; }else{ echo"<span class='fa fa-close color-red-dark'></span>"; } ?></td>
								<td><?php if($ur->view_all==1){ echo"<span class='fa fa-check color-green-dark'></span>"; }else{ echo"<span class='fa fa-close color-red-dark'></span>"; } */?></td>-->
								<td>
									<div>
										<div class="dropdown">
											<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
												Action
											</a>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<li><a class="dropdown-item" href="<?= base_url('front/User_role/edit/'.$ur->role_id) ?>">Edit</a></li>
												<li><a class="dropdown-item" onclick="onClickDeleteCnf(this)" href="#" data-url="<?= base_url('front/User_role/delete/'.$ur->role_id) ?>" data-id="<?=$ur->role_id?>">Delete</a></li>
											</ul>
										</div>
									</div>   
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready( function () {
		$('#userRoleTbl').DataTable({
			responsive: true
			/* columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 8}
        	] */
		});
	});
</script>
