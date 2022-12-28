<div class="page-content pb-3">
	<div>
		<div class="content" style="margin-bottom: 20% !important;">
		<h4>Referral & Bought History</h4>
		<div class="divider divider-margins"></div>
		<!-- <div class="row mb-0">
			<div class="col-12">
				<a href="#" style="float: right;" data-menu="popup-commission" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">Add Commission</a>
			</div>
		</div>

		<div class="divider divider-margins"></div> -->
		
		<div>
			<div class="content">
				<div class="has-borders no-icon input-style-always-active mb-4">
					<label for="refer_by" class="color-highlight">Referral Name</label>
					<select name="cus_id" class="form-control customer_referral" id="comCusId">
						<option value="" selected>----Select----</option>
						<?php
						foreach ($cusData as $cr) { ?>
							<option <?php if (set_value('cus_id')== $cr['cus_id']) {echo "selected"; }?>
									value="<?= $cr['cus_id'] ?>"><?php echo $cr['customer_phone_no']." : ".$cr['customer_name']?>
							</option>
						<?php }
						?>
					</select>
					<input type="hidden" id="ifCusFilter"/>
				</div>
				<div class="clearfix mb-3"></div>
				<table id="commissionHisTable" class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap">
					<thead>
						<tr class="bg-blue-dark">
							<th>Month</th>
							<th>Amount</th>
							<th>Year</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="commissionHisData">
						<?php
						$countNo = 0;
						$cusId = 0;
						foreach ($comData as $comL)
						{
							$countNo++;
							?>
							<tr>
								<td><?= date_format(date_create($comL['created']),'M') ?></td> <!-- class="getBifOfRefConOfCus" data-art="<?php //$countNo?>" data-month="<?php //date_format(date_create($comL['entry_date']),'m')?>" -->
								<td>$.<?= number_format($comL['refConTotal'],2) ?><?php // number_format($comL['refConTotal'],2) ?></td>
								<td><?= date_format(date_create($comL['created']),'Y') ?></td>
								<!-- <td><a class="btn btn-xs rounded-2 shadow-s bg-magenta-dark" ><i class="fa fa-eye"></i></a></td> -->
								<td>
									<div>
										<div class="dropdown">
											<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
												Action
											</a>
											<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
												<li><a href="<?= base_url('front/Commission/cusRedConDetail/'.date_format(date_create($comL['entry_date']),'m')).'/'.$cusId ?>" class="dropdown-item">View</a></li>
												<li><a class="dropdown-item" href="<?php echo base_url('front/Commission/refConMonthlyDataXls/'.date_format(date_create($comL['entry_date']),'m')) ?>">Report</a></li>
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
		$('#commissionHisTable').DataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 3}
        	]
		});

		$("#comCusId").on('change',function(x){
			x.preventDefault();
			var customerID = $(this).val();
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>front/Commission/all_commission/'+customerID,
				async: false,
				dataType: 'json',
				success: function(data){
					// $("#ifCusFilter").val(customerID);
					var html = '';
					var i; var j =1;
					for(i=0; i<data.length; i++){	
						html +='<tr>'+
									'<td>'+formatDateModify(data[i].created,'m')+'</td>'+
									'<td><a class="dropdown-item" href="<?= base_url('front/Commission/cusRedConDetail/') ?>'+formatDateModify(data[i].created,'M')+'/'+customerID+'">$'+Number(data[i].refConTotal).toFixed(2)+'</a></td>'+
									'<td>'+formatDateModify(data[i].created,'y')+'</td>'+
									/* '<td>'+
										'<div>'+
											'<div class="dropdown">'+
												'<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">'+
													'Action'+
												'</a>'+
												'<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
													'<li><a class="commission_edit dropdown-item" data-comid="'+data[i].com_id+'">Edit</a></li>'+
													'<li><a class="dropdown-item" href="<?php // base_url('front/Commission/delete/')?>'+data[i].com_id+'">Delete</a></li>'+
												'</ul>'+
											'</div>'+
										'</div>'+
									'</td>'+ */
								'</tr>';
						j++;		
					}
					$('#commissionHisTable').DataTable().destroy();
					$('#commissionHisData').html(html);
					$('#commissionHisTable').DataTable({
						responsive : true
					});
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
			
		});

		$(".getBifOfRefConOfCus").on('click',function(w){
			w.preventDefault();
			var month = ($(this).attr('data-month'));
			if($("#ifCusFilter").val() != null && $("#ifCusFilter").val() !=0){
				var cusID = $("#ifCusFilter").val();
			}else{
				var cusId = null;
			}
            $.ajax({
				type: "POST",
				url: '<?php echo base_url() ?>/front/Commission/cusRedConDetail/'+month+'/'+cusID,
				// data: $(this).serialize(),
				dataType: "json",
				success: function (response) {
					// close_popup();
					if(response.status == 'success'){
						success_message('',);
						// confirm_message('Success',response.message,response.url);
					}else{
						error_message('',response.message);
						// confirm_message('Error',response.message,response.url);
					}
					// location.reload();
				}
			});
		});

	});
</script>
