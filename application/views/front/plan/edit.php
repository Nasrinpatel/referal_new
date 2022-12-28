<style>
	.events {
		height: 100%;
		border-left-width: 1px !important;
		border-right-width: 1px !important;
		border-top-width: 1px !important;
		padding-left: 13px !important;
		padding-right: 10px !important;
		padding-top: 20px !important;
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

	.ref_plus_btn {
		opacity: 1;
		right: 13px !important;
		transform: translateX(-14px) !important;
		margin-left: 0px !important;
		position: absolute;
		padding: 0px 5px !important;
		height: 23px;
		font-size: 12px;
		top: -12px;
		transition: all 250ms ease;
	}
</style>
<div class="content-page">
	<div class="card card-style" style="margin-bottom: 100px !important;">
		<div class="content">
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<a type="button" href="<?=base_url('front/Plan')?>" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s btn btn-primary" style="float:right;" >Back</a>
					<h6 class="page-title">Edit Plan</h6>
				</div>
			</div>     
			<!-- end page title --> 
			
			<div class="content">
				<form action="<?= base_url('front/Plan/update/').$pl['plan_id'] ?>" method="post" role="form" data-toggle="validator">
					<input type="hidden" name="plan_id" value="<?=$pl['plan_id']?>"/>
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="qutSubject" class="color-highlight">Bought Fee</label>
						<input type="number" step="0.01" class="form-control" name="ref_con_fee" value="<?= set_value('ref_con_fee',$pl['ref_con_fee'])?>" />
						<?=  form_error('ref_con_fee');?>
						<em>Required</em>
					</div>
					
					<div class="events">
						<label class="color-highlight event_title" > Update Plan Detail's  </label>
						<a class="btn btn-primary btn-xs px-1 py-0 ref_plus_btn" id="oneMoreLoyaltyEdit" href="#"><i class="fa fa-plus"></i></a>
						<table id="planTable" class="table table-borderless text-center rounded-sm shadow-l" style="overflow: hidden;">
							<thead>
								<tr class="bg-blue-dark">
									<th colspan="3">Referral's Range</th>
									<th>Amount</th>
									<th></th>
								</tr>
								<tr class="bg-blue-dark">
									<th>From</th>
									<th></th>
									<th>To</th>
									<th>(P/R)</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								$co=0;
								foreach($planDet as $pd){
									$co++; 
								?>
								<tr class="refRow<?=$co?>" data-refInc="">
									<td><input type="text" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57)) || ((event.charCode == 45))" name="ref_days_from[]" value="<?= set_value('ref_days_from',$pd['ref_days_from']) ?>"/></td>
									<td>-</td>
									<td><input type="text" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57)) || ((event.charCode == 45))" name="ref_days_to[]" value="<?= set_value('ref_days_to',$pd['ref_days_to']) ?>"/></td>
									<td><input type="number" step="0.01" class="form-control" name="ref_fee_per_wise[]" placeholder="Amount" value="<?= set_value('ref_fee_per_wise',$pd['ref_fee_per_wise']) ?>" /></td> <!-- onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" -->
									<td><a style="padding: 2px 8px !important;height: 25px;margin-top: 4px;" class="btn btn-danger btn-xs px-1 py-0" onclick="removeLoyaltyEdit(this)" href="#" ><i class="fa fa-trash"></i></a></td>
								</tr>
								<?php } ?>
								<input type="hidden" id="lastRefIncNo" value="<?=$co?>">
							</tbody>
						</table>
					</div>

					<div class="row mb-0">
						<div class="col-lg-12 text-center">
							<input type="submit" id="cusSubmit" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4" value="Update">	
						</div>
					</div>
				</form>
			</div><!-- content -->
		</div> <!-- content -->
	</div> 
</div>
<script>
	// var inc = $("#lastRefIncNo").val();
	$(document).ready(function() {  
		
		$('#oneMoreLoyaltyEdit').on('click',function() {
			var inc = $("#lastRefIncNo").val();
			/* alert('hiiii');
			var txt = $("#refRow").clone();
			$("#refRow").after(txt); */
			var refPlus = Number(inc)+Number(1);
			var html = '\<tr class="refRow'+refPlus+'">\
							<td><input type="text" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 45))" name="ref_days_from[]" placeholder="0"></td>\
							<td>-</td>\
							<td><input type="text" class="form-control" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode == 45))" name="ref_days_to[]" placeholder="25"></td>\
							<td><input type="number" class="form-control" step="0.01" name="ref_fee_per_wise[]" placeholder="Amount"></td>\
							<td><a style="padding: 2px 8px !important;height: 25px;margin-top: 4px;" class="btn btn-danger btn-xs px-1 py-0" onclick="removeLoyaltyEdit(this)" href="#" ><i class="fa fa-trash"></i></a></td>\
						</tr>';
			$('.refRow'+inc+'').after(html);
			$("#lastRefIncNo").val(refPlus);
		});
		// $("#oneMoreLoyaltyEdit").trigger('click');
		
	});
	
	function removeLoyaltyEdit(str){
		//console.log(str);
		var dec = $("#lastRefIncNo").val();
		var refMin = Number(dec)-Number(1);
		str.closest('tr').remove();
		$("#lastRefIncNo").val(refMin);
		// $(str).parent().remove();
	}
</script>
