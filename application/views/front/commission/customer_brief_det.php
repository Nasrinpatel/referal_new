
<style>
	/* .card-style-cusref {
		overflow: hidden;
		margin: 0px 15px 15px 15px;
		border-radius: 20px;
		border: none;
		box-shadow: 0 4px 24px 0 rgb(0 0 0 / 10%);
	} */
</style>
<div class="page-content pb-3" style="margin-bottom: 70px;">
	
	<div class="content">
		<h4>Referral & Bought Referral's </h4>
		<div class="divider divider-margins mb-2"></div>
		<div class="row mb-0">
			<div class="col-12">
				<a href="#" onclick="history.back()" style="float: right;" class="btn btn-sm rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Back</a>
			</div>
		</div>
	</div>

	<div class="content">
		<div class="divider divider-margins mb-2"></div>
		<div class="row mb-0">
			<div class="col-12">
				<h5>Date :- <?= date_format(date_create($month),'d-m-Y')?></h5>
			</div>
		</div>
	</div>

	<div class="divider divider-margins"></div>
		<div class="content">
				<table id="cusRefTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap"> <!--  -->
					<thead>
						<tr class="bg-blue-dark">
							<th>Referral Name</th>
							<th>Mobile Number</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($refCusData as $rcd){ 
						
						if($rcd['convert_cus']==1){ ?>
							<tr class="bg-green-light">
								<td><?=$rcd['customer_name'];?></td>
								<td><?=$rcd['customer_phone_no']?></td>
							</tr>
						<?php } else{?>
							<tr>
								<td><?=$rcd['customer_name'];?></td>
								<td><?=$rcd['customer_phone_no']?></td>
							</tr>
						<?php } }?>
					</tbody>
				</table>
		</div>
	</div>
</div>
<script>
	$(document).ready( function () {
		$('#cusRefTable').DataTable({
			responsive: true
		});
	});
</script>
