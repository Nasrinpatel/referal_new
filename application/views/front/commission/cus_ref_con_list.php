<div class="page-content pb-3">
<div class="divider divider-margins"></div>
<!-- Add referral button -->
<?php $this->load->view('front/includes/referral_btn'); ?>
	<div>
		<div class="content" style="margin-bottom: 20% !important;">
		<h4>Referral & Bougth fee history</h4>
		<div class="divider divider-margins"></div>
		<div>
			<div class="content">
				<div class="clearfix mb-3"></div>
				<table id="customerRefConTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
					<thead>
						<tr class="bg-blue-dark">
							<th>Month</th>
							<th>Amount</th>
							<th>Year</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$countNo = 0;
						$cusId =  $this->session->userdata('user_id');
						foreach ($SingCusData as $comL)
						{
							$countNo++;
							?>
							<tr>
								<td><?= date_format(date_create($comL['created']),'M') ?></td> <!-- class="getBifOfRefConOfCus" data-art="<?php //$countNo?>" data-month="<?php //date_format(date_create($comL['entry_date']),'m')?>" -->
								<td><a class="dropdown-item">$.<?= number_format($comL['refConTotal'],2) ?></a><?php // number_format($comL['refConTotal'],2) ?></td>
								<td><?= date_format(date_create($comL['created']),'Y') ?></td>
								<td><a class="btn btn-xs rounded-2 font-700 shadow-s bg-magenta-dark"  href="<?= base_url('front/Commission/cusRedConDetail/'.date_format(date_create($comL['entry_date']),'m')).'/'.$cusId ?>">View</a></td>
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
		$('#customerRefConTable').DataTable({
			responsive: true,
			/* columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 2}
        	] */
		});

	});
</script>
