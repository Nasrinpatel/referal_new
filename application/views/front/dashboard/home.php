<?php if(get_ut_role($this->session->userdata('user_type')) == 'Admin'){?>
	<div class="page-content">
		<div class="content">
			<div class="row mb-0">
				<div class="col ps-2">
					<a href="<?= base_url('front/Company') ?>" data-back-button class="card card-style rounded-m ms-0  p-3 mb-3">
						<i class="fa fa-users color-red-light font-40 icon-50"></i>
						<h5 class="pt-3">Company - <?= count_row('tb_company_master') ?></h5>
					</a>
				</div>
				<div class="col ps-2">
					<a href="<?= base_url('front/Customer') ?>" data-back-button class="card card-style rounded-m ms-0  p-3 mb-3">
						<i class="fa fa-user color-yellow-light font-40 icon-50"></i>
						<h5 class="pt-3">Referral- <?= count_row('tb_customer') ?></h5>
					</a>
				</div>
			</div>
			<!-- <div class="row mb-0">
				<div class="col ps-2">
					<a href="<?php // base_url('front/Quotation') ?>" data-back-button class="card card-style rounded-m ms-0  p-3 mb-3">
						<i class="fa fa-user color-yellow-light font-40 icon-50"></i>
						<h5 class="pt-3">Quotation - <?php // count_row('tb_quotation') ?></h5>
					</a>
				</div>
			</div> -->
		</div>
	</div>
<?php }else{?>
	<div class="page-content">
		<div class="divider divider-margins"></div>
		
		<!-- Add Referral button -->
		<?php $this->load->view('front/includes/referral_btn'); ?>

		<div class="card card-style mt-4 text-center">

            <div class="content">
				<h5 class="font-14 opacity-50">Total Earnings</h5>
				<div class="divider mb-3"></div>
				<div class="content mb-0 mt-3">
					<div class="row mb-0">
						<div class="col-6 pr-1">
							<div class="card card-style mx-0 mb-2 p-3">
								<h6 class="font-14"><?php $cur = date('m')-1;
														$dateObj   = DateTime::createFromFormat('!m',$cur );
														echo $dateObj->format('F');?></h6>
								<h3 class="color-green-dark mb-0">$<?php if(!empty(get_ref_con_total_count((date('m')-1),$this->session->userdata('user_id')))){
									echo get_ref_con_total_count((date('m')-1),$this->session->userdata('user_id'));
								}else{
									echo 0;
								} ?></h3>
							</div>
						</div>
						<div class="col-6 pr-1">
							<div class="card card-style mx-0 mb-2 p-3">
							<h6 class="font-14"><?php $cur = date('m')-2;
														$dateObj   = DateTime::createFromFormat('!m',$cur );
														echo $dateObj->format('F');?></h6>
								<h3 class="color-green-dark mb-0">$<?php if(!empty(get_ref_con_total_count((date('m')-2),$this->session->userdata('user_id')))){
									echo get_ref_con_total_count((date('m')-2),$this->session->userdata('user_id'));
								}else{
									echo 0;
								} ?></h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="divider divider-margins"></div>
		<div class="content">
			<div class="clearfix mb-3"></div>
				<h2 class="text-center">Current month referral list</h2>
				<table id="CusRefHisTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
					<thead>
						<tr class="bg-blue-dark">
							<th>Date</th>
							<th>Referral Name</th>
							<th>Bougth</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$countNo = 0;
						foreach ($refList as $rl)
						{
							$countNo++;
							?>
							<tr>
								<td><?=date_format(date_create($rl['refer_date']),'d-m-Y')?></td>
								<!-- <td><span><?= date_format(date_create($comL['refer_date']),'Ymd') ?></span><?=date_format(date_create($comL['refer_date']),'d-m-Y')?></td> -->

								<td><?=$rl['customer_name']?></td>
								<!-- <td><input class="form-check-input font-18" id="" name="company_create" type="checkbox" value="1" <?=$rl['convert_cus'] == 1 ? 'checked' : 'disabled'?>/></td> -->
								<td><?php if($rl['convert_cus'] == 1){echo "<span class='fa fa-check color-green-dark'></span>"; }else{echo "";} ?></td>
							</tr>
							<?php 
						} ?>
					</tbody>
				</table>
		</div>
	</div>
<?php }?>
<script>
	$(document).ready( function () {
		
		$('#CusRefHisTable').DataTable({
			responsive: true,
			order: [[0, 'desc']],
			responsive: true
		});
	});
</script>
