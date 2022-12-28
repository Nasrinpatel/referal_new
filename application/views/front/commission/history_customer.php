<div class="page-content pb-3">
<div class="divider divider-margins"></div>
<style>
	#commissionCusHisTable span{
		display:none;
	}
</style>
<!-- Add referral button -->
<?php $this->load->view('front/includes/referral_btn'); ?>
	<div>
		<div class="content" style="margin-bottom: 20% !important;">
		<h4>Referral History</h4>
		<div class="divider divider-margins"></div>
		<!-- <div class="row mb-0">
			<div class="col-12">
				<a href="#" style="float: right;" data-menu="popup-commission" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add Commission</a>
			</div>
		</div>

		<div class="divider divider-margins"></div> -->
		
		<div>
			<div class="content">
				<div class="clearfix mb-3"></div>
				<table id="commissionCusHisTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
					<thead>
						<tr class="bg-blue-dark">
							<th>Date</th>
							<th>Total Referral</th>
							<th>Total Bought</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$countNo = 0;
						foreach ($cusRefConData as $comL)
						{
							$countNo++;

							if($comL['convert_cus']==1){ ?>
							<tr class="bg-green-light">
								<td><span><?= date_format(date_create($comL['refer_date']),'Ymd') ?></span><?=date_format(date_create($comL['refer_date']),'d-m-Y')?></td>
								<td><?=$comL['refer_count']?></td>
								<td><?=$comL['customer_con_count']?></a></td>
								<td><a class="btn btn-xs rounded-2 font-700 shadow-s bg-magenta-dark" href="<?= base_url('front/Commission/cusBriefDetail/').$cus_id.'/'.date_format(date_create($comL['refer_date']),'Y-m-d') ?>">View</a></td>
							</tr>
						<?php } else{?>
							<tr>
							<td><span><?= date_format(date_create($comL['refer_date']),'Ymd') ?></span><?=date_format(date_create($comL['refer_date']),'d-m-Y')?></td>
								<td><?=$comL['refer_count']?></td>
								<td><?=$comL['customer_con_count']?></a></td>
								<td><a class="btn btn-xs rounded-2 font-700 shadow-s bg-magenta-dark" href="<?= base_url('front/Commission/cusBriefDetail/').$cus_id.'/'.date_format(date_create($comL['refer_date']),'Y-m-d') ?>">View</a></td>
							</tr>
						<?php } }?>
					</tbody>
					<!-- <tbody>
						<?php
						// $countNo = 0;
						// foreach ($cusRefConData as $comL)
						// {
							// $countNo++;
							// ?>
							<tr>
								<td><span><?= date_format(date_create($comL['refer_date']),'Ymd') ?></span><?=date_format(date_create($comL['refer_date']),'d-m-Y')?></td>
								<td><?=$comL['refer_count']?></td>
								<td><?=$comL['customer_con_count']?></a></td>
								<td><a class="btn btn-xs rounded-2 font-700 shadow-s bg-magenta-dark" href="<?= base_url('front/Commission/cusBriefDetail/').$cus_id.'/'.date_format(date_create($comL['refer_date']),'Y-m-d') ?>">View</a></td>
							</tr>
							<?php 
						// } ?>
					</tbody> -->
				</table>
			</div>
		</div>
	</div> <!-- content -->
</div>
<script>
	$(document).ready( function () {
		// $.fn.dataTable.moment('DD/MM/YYYY');
			// $('#commissionCusHisTable').DataTable();
		$('#commissionCusHisTable').DataTable({
			responsive: true,
			order: [[0, 'desc']],
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 3},
        	],
			

			
		});
		
	});
</script>
