<style>
	.events {
		height: 100%;
		border-left-width: 1px !important;
		border-right-width: 1px !important;
		border-top-width: 1px !important;
		padding-left: 13px !important;
		padding-right: 10px !important;
		padding-top: 30px !important;
		border-radius: 10px !important;
		border-color: rgba(0, 0, 0, 0.08) !important;
		border-style: solid;
		margin-bottom: 20px;
		position: relative;
	}

	.event_title {
		opacity: 1;
		left: 23px !important;
		transform: translateX(-14px) !important;
		margin-left: 0px !important;
		position: absolute;
		padding: 0px 5px !important;
		height: 23px;
		font-size: 12px;
		top: -12px;
		transition: all 250ms ease;
		background-color: #FFF;
	}
</style>
<div class="page-content pb-5">
	<div class="card card-style">
		<div class="content">
			<h4>Referral View</h4>
			<div class="row mb-0">
				<div class="col-12">
					<a href="<?= base_url('front/Customer') ?>" style="float: right;" class="btn btn-sm btn-primary mb-3 rounded-0 text-uppercase font-700 shadow-s">Back</a>
				</div>
			</div>

			
			<div class="content">
				<div class="row">
					<div class="col-12">
						<label class="color-highlight">Referral Company Name : </label> 
					</div>
					<div class="col-12">
						<?php
							$cm_ids = 0;
							foreach ($proCompDet as $id){$cm_ids .= ",".$id->cm_id;}
							$cmId = explode(",",$cm_ids);
							// print_r( $comDetData);
							if (count($get_comp_name)){
								foreach ($get_comp_name as $cat){
									echo (in_array($cat['cm_id'], $cmId)) ? $cat['company_name'].'</br>':''; 
								}
							}
						?>
					</div>
					<div class="col-12">
						<label class="color-highlight">Referral Name : </label>
						<?=  $cusDetData->customer_name;?>
					</div>
					<div class="col-12">
						<label class="color-highlight">Referral Contact Number : </label>
						<?= $cusDetData->customer_phone_no;?>
					</div>
				
					<div class="col-12">
						<label class="color-highlight">Referral Email : </label>
						<?=  $cusDetData->customer_email;?>
					</div>	
					<div class="col-12">
						<label class="color-highlight">Referral Address : </label>
						<?= $cusDetData->customer_address;?>
					</div>
				</div>
				<?php if($cusDetData->account_name!='' && !empty($cusDetData->account_name)) { ?>
				<div class="events">
					<label for="form1" class="color-highlight event_title">Bank Details</label>
					<div class="row mb-0">
						<div class="col-12">
							<label class="color-highlight">Account Name : </label>
							<?=  $cusDetData->account_name;?>
						</div>
						<div class="col-12">
							<label class="color-highlight">Account Number : </label>
							<?=  $cusDetData->account_number;?>
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<label class="color-highlight">IFSC Code : </label>
							<?=  $cusDetData->ifsc_code;?>
						</div>
						<div class="col-12">
							<label class="color-highlight">Branch Name : </label>
							<?=  $cusDetData->branch_name;?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div><!-- end row-->
			

			<?php /*<div class="card card-style bg-theme pb-0">
				<div class="content">
					<div class="tab-controls tabs-round tab-animated tabs-medium tabs-rounded shadow-xl" data-tab-items="2" data-tab-active="bg-blue-dark color-white">
						<a href="#" data-tab-active="" data-tab="tab-11" class="gradient-brown text-white" >Referral</a>
						<a href="#" data-tab="tab-12" class="gradient-red text-white" >Commission</a>							
					</div>
					<div class="clearfix mb-3"></div>
					<div class="tab-content" id="tab-11">	
						<table id="cusRefTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
							<thead>
								<tr class="bg-blue-dark">
									<th>Customer Name</th>
								</tr>
							</thead>
							<tbody id="cusRefData">
								<?php
								$countNo = 0;
								foreach ($refData as $cusData)
								{
									$countNo++;
									?>
									<tr>
										<td><?= $cusData['customer_name'] ?></td>
										<!-- <td>
											<div>
												<div class="dropdown">
													<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
														Action
													</a>
													<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
														<li><a href="" class="commission_edit dropdown-item" data-comid="<?php //$cusData['com_id']?>">Edit</a></li>
														<li><a class="dropdown-item" href="<?php // base_url('front/Commission/delete/'.$cusData['com_id']) ?>">Delete</a></li>
													</ul>
												</div>
											</div>
										</td> -->
									</tr>
									<?php 
								} ?>
							</tbody>
						</table>
					</div>
					<div class="tab-content" id="tab-12" style="display: none;">
						<table id="cusCommissionTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
							<thead>
								<tr class="bg-blue-dark">
									<th>Customer Name</th>
									<th>Commission</th>
								</tr>
							</thead>
							<tbody id="cusCommissionData">
								<?php
								$countNo = 0;
								foreach ($cusComm as $cmData)
								{
									$countNo++;
									?>
									<tr>
										<td><?= $cmData['customer_name'] ?></td>
										<td>$.<?= $cmData['com_amount'] ?></td>
										<!-- <td>
											<div>
												<div class="dropdown">
													<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
														Action
													</a>
													<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
														<li><a href="" class="commission_edit dropdown-item" data-comid="<?php //$cmData['com_id']?>">Edit</a></li>
														<li><a class="dropdown-item" href="<?php // base_url('front/Commission/delete/'.$cmData['com_id']) ?>">Delete</a></li>
													</ul>
												</div>
											</div>
										</td> -->
									</tr>
									<?php 
								} ?>
							</tbody>
						</table>
					</div>
				</div> */?>
			</div>
		</div> <!-- content -->
	</div>
</div>
<!-- END wrapper -->
<script>
	$(document).ready( function () {
		$('#cusRefTable').DataTable({
			responsive: true
		});
		$('#cusCommissionTable').DataTable({
			responsive: true
		});
	});
</script>
