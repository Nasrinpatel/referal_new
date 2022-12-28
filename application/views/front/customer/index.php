<div class="page-content pb-3">
	<div>

		<div class="content" style="margin-bottom: 20% !important;">
		<h4>Manage Referral</h4>
		<div class="divider divider-margins"></div>
		
		<div class="row mb-0">
			<div class="col-12">
				<a href="<?= base_url('front/Customer/add') ?>" style="float: right;" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add Referral</a>
			</div>
		</div>

		<div class="divider divider-margins"></div>

		<div>
			<div class="content" id="tab-group-2">
				<div class="tab-controls tabs-small tabs-rounded">
					<a href="<?= base_url('front/Customer/index')?>" data-tab="tab-1" class="gradient-blue">Default</a>
					<a href="<?= base_url('front/Customer/convertCus')?>" data-tab="tab-2" class="gradient-gray">Bought</a>
				</div>
				<div class="clearfix mb-3"></div>
				<table id="customerDetTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
					<thead>
						<tr class="bg-blue-dark">
							<th>Referral Name</th>
							<th>Referral Code</th>
							<th>Mobile Number</th>
							<th>Email</th>
							<th>Created By</th>
							<th>Created On</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$countNo = 0;
						foreach ($cusData as $cusL)
						{
							$created_by='';
							if($cusL['user_type'] == 'referral'){
								$created_query = $this->db->get_where('tb_customer',['cus_id'=>$cusL['user_id']])->row();
								if($created_query != ''){
									$created_by=$created_query->customer_name;
								}
							}else{
								$created_query = $this->db->get_where('tb_user',['user_id'=>$cusL['user_id']])->row();
								if($created_query != ''){
									$created_by=$created_query->name;
								}
							}
							
							$countNo++;
							?>
							<tr>
								<td><?= $cusL['customer_name'] ?></td>
								<td><?= $cusL['customer_code'] ?></td>
								<td><?= $cusL['customer_phone_no'] ?></td>
								<td><?= $cusL['customer_email'] ?></td>
								<td><?= $created_by ?></td>
								<td><?= date_format(date_create($cusL['created']),'d-m-Y') ?></td>
								
								<td>
									<div>
										<div class="dropdown">
											<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
												Action
											</a>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<li><a class="dropdown-item" href="<?= base_url('front/Customer/edit/'.$cusL['cus_id']) ?>">Edit</a></li>
												<li><a class="dropdown-item" href="<?= base_url('front/Customer/view/'.$cusL['cus_id']) ?>">View</a></li>
												<li><a class="dropdown-item" onclick="onClickDeleteCnf(this)" href="#" data-url="<?= base_url('front/Customer/delete/'.$cusL['cus_id']) ?>" data-id="<?=$cusL['cus_id']?>" >Delete</a></li>
												<?php if(get_ut_role($this->session->userdata('user_type')) == 'Admin'){?>
											    	<li><a class="popup-convert dropdown-item" href="#" data-cusid="<?=$cusL['cus_id']?>">Bought</a></li>
												<?php } ?>
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
		$('#customerDetTable').DataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 6}
        	]
		});
	});
</script>
