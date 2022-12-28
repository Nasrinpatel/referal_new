
<style>
	.card-style-cusref {
		overflow: hidden;
		margin: 0px 15px 15px 15px;
		border-radius: 20px;
		border: none;
		box-shadow: 0 4px 24px 0 rgb(0 0 0 / 10%);
	}
</style>
<div class="page-content pb-3" style="margin-bottom: 70px;">
	
	<div class="content">
		<h4>Referral & Bought History</h4>
		<div class="divider divider-margins mb-2"></div>
		<div class="row mb-0">
			<div class="col-12">
				<a href="#" onclick="history.back()" style="float: right;" class="btn btn-sm rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Back</a>
			</div>
		</div>  onclick 
	</div>

	<div class="content">
		<!-- <div class="divider divider-margins mb-2"></div> -->
		<div class="row mb-0">
			<div class="col-12">
				<?php 
					$dateObj   = DateTime::createFromFormat('!m', $month);
					$monthName = $dateObj->format('F');
				?>
				<!-- <h5>Month :- <?= $monthName?></h5> -->
				<!-- <h5>Month :- <?= date_format(date_create($monthName),'d-m-Y')?></h5>
				<h5>Month :- <?= date_format(date_create($monthName),'F Y')?></h5> -->
				
			</div>
		</div>
	</div>

	<div class="divider divider-margins"></div>
	
	<?php foreach($cusRefConData as $crc){ ?>
		<div class="card card-style-cusref bg-teal-light">
			<div class="content">
				<!-- <p class="mb-n1 color-white opacity-50 font-600">Customer Name</p> -->
				<?php if(get_ut_role($this->session->userdata('user_type')) == 'Admin'){?>
				
					<h2 class="color-white" style="float: left;"><?= date_format(date_create($monthName),'F, Y')?></h5>
				
					<!-- <h1 class="color-white" style="float: left;"><?=$crc['customer_name']?></h1> -->
					<a href="<?=base_url('front/Commission/singleCusRefConData/'.$crc['cus_id'].'/'.$month)?>" class="btn btn-xs rounded-3 font-700 shadow-s bg-white" style="float: right;"><i class="fa fa-download color-black"></i></a>
				<?php }else{?>
					<!-- <h1 class="color-white"><?=$crc['customer_name']?></h1> -->
					<h2 class="color-white" style="float: left;"><?= date_format(date_create($monthName),'F, Y')?></h5>
				<?php } ?>
				<!-- <p class="color-white opacity-60">
					This is a large content card, it uses an awesome iOS styled desing with a large heading
					and over title.
				</p> -->
			</div>
			<div class="card card-style-cusref">
				<div class="content">
					<!-- <p class="mb-n1 font-600 color-green-dark">The Awesome</p> -->
					<h6>Calculation Of Referral & Bought</h6>
					<!-- <p class="opacity-60">
						This is a large content card, it uses an awesome iOS styled desing with a large heading
						and over title.
					</p> -->
					<table class="table responsive mobile-l display nowrap"> <!-- table-borderless text-center rounded-sm shadow-l -->
						<!-- <thead>
							<tr class="bg-blue-dark">
								<th>Customer Name</th>
								<th>Customer Code</th>
								<th>Referral Name</th>
							</tr>
						</thead> -->
						<tbody>
							<tr>
								<td>Referral Fee</td>
								<td>:</td>
								<td><b><?=$crc['total_customer_ref'] ?> * <?=$crc['cus_ref_total_amt']/$crc['total_customer_ref']?> = <?=$crc['cus_ref_total_amt']?></b></td>
							</tr>
							<tr>
								<td>Bought Fee</td>
								<td>:</td>
								<td>
									<b><?=$crc['total_customer_con'] ?> * 
									<?php if($crc['cus_con_total_amt']!=0)
										{ echo $crc['cus_con_total_amt']/$crc['total_customer_con'];}else{ echo "0";}?> = <?=$crc['cus_con_total_amt']?>
									</b>
								</td>
							</tr>
							<tr>
								<td>Total</td>
								<td>:</td>
								<td><b><?=$crc['total']?></b></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- </div> -->
</div>
