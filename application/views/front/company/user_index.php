<div class="page-content pb-3">
	<div class="">
		<div class="content" style="margin-bottom: 20% !important;">
			
			<div class="divider divider-margins"></div>

			<div class="row mb-0">
				<div class="col-12">
					<a href="<?= base_url('front/Company/add_user/'.$cmId) ?>" style="float: right;" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add User</a>
					<a type="button" href="<?=base_url('front/Company/index')?>" class="btn btn-sm btn-primary mb-3 rounded-0 text-uppercase font-700 shadow-s mr-1" style="float:right;margin-right :10px;" >Back</a>
					<h4>Company Users</h4>
				</div>
			</div>
			<div class="divider divider-margins"></div>
				<div class="">
					<div class="content">
						<div class="clearfix mb-3"></div>
							<table class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap" id="UserIndexTbl">
								<thead>
									<tr class="bg-blue-dark">
										<th scope="col" class="color-white py-3 font-13">Name</th>
										<th scope="col" class="color-white py-3 font-13">Email</th>
										<th scope="col" class="color-white py-3 font-13">Designation</th>
										<th scope="col" class="color-white py-3 font-13">Created By</th>
										<th scope="col" class="color-white py-3 font-13">Created On</th>
									</tr>
								</thead>
								<tbody>
								<?php
									$count=0;
									foreach($getCompUser as $cu){
									$count++;
								?>
									
										<tr>
											<td><?= $cu->name?></td>
											<td><?= $cu->email?></td>
											<td><?= $cu->designation?></td>
											<td><?= $cu->created_by?></td>
											<td><?= date_format(date_create($cu->created),'d-m-Y')?></td>
											<!-- <td></td> -->
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
</div>
<script>
	$(document).ready( function () {
		$('#UserIndexTbl').DataTable({
			responsive: true
		});
	});
</script>
