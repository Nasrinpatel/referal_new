<div class="page-content pb-3">
	<div>
		<div class="content" style="margin-bottom: 20% !important;">
		<h4>Manage Email Template</h4>
		<div class="divider divider-margins"></div>
		<div class="row mb-0">
			<div class="col-12">
				<a href="<?= base_url('front/Email_template/add') ?>" style="float: right;" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add Template</a>
			</div>
		</div>

		<div class="divider divider-margins"></div>

		<div>
			<div class="content">
				<div class="clearfix mb-3"></div>
				<table id="emailTempTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
					<thead>
						<tr class="bg-blue-dark">
							<th>Email For</th>
							<th>Subject</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$countNo = 0;
						foreach ($et_all as $cusL)
						{
							$countNo++;
							?>
							<tr>
								<td><?= $cusL['email_for'] ?></td>
								<td><?= $cusL['email_subject'] ?></td>
								<td>
									<div>
										<div class="dropdown">
											<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
												Action
											</a>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<li><a class="dropdown-item" href="<?= base_url('front/Email_template/edit/'.$cusL['et_id']) ?>">Edit</a></li>
												<!-- <li><a class="dropdown-item" href="<?php // base_url('front/Email_template/delete/'.$cusL['et_id']) ?>">Delete</a></li> -->
												<!-- <li><a class="dropdown-item" href="<?php //base_url('front/Email_template/view/'.$cusL['et_id']) ?>">View</a></li> -->
											</ul>
										</div>
									</div>
								</td>
							</tr>
							<?php 
						}?>
					</tbody>
				</table>
			</div>
		</div>
	</div> <!-- content -->
</div>
<script>
	$(document).ready( function () {
		$('#emailTempTable').DataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 2}
        	]
		});
	});
</script>
