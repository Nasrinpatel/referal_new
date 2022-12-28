<!-- model for add commission -->
<div id="popup-commission" class="menu menu-box-modal rounded-m" data-menu-height="290" data-menu-width="350">
	<div class="menu-title">
		<h1 class="font-16">ADD COMMISSION</h1>
		<a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
	</div>

	<div class="content mb-0 mt-2">
		<form method="post" id="store-commission" action="<?php echo base_url() . 'front/Commission/store'; ?>">
			<input type="hidden" name="cus_ref_id" id="cusRefId"/>
			<div class="input-style has-borders no-icon input-style-always-active mb-4">
				<label for="referral_by" name='business' class="color-highlight font-10">Referral</label>
				<select name="cus_id" id="referral_by" >
					<option value="" selected>Select</option>
					<?php
					foreach ($cusData as $cr) { ?>
						<option <?php if (set_value('cus_id')== $cr['cus_id']) {echo "selected"; }?>
								value="<?= $cr['cus_id'] ?>" data-cusrefid="<?=$cr['cus_ref_id']?>"><?= $cr['customer_name'] ?>
						</option>
					<?php }
					?>
				</select>
				<em>(required)</em>
			</div>

			<!-- Client details -->
			<div id="customer_error"></div>
			<div id="cusRefDetails" style='display:none'>
					<h6>Referral Details</h6>
					<div class="row" style='padding-left: 20px;'>
						<div class="col-12">
							<label class="color-highlight">Referral By :-</label>
							<strong id="ref_cus_name" class="color-black font-400"></strong>
						</div>
						<div class="col-12">
							<label class="color-highlight">Referral Contact No :-</label>
							<strong id="ref_cus_phone" class="color-black font-400"></strong>
						</div>
						<div class="col-12">
							<label class="color-highlight">Referral Address :-</label>
							<strong id="ref_cus_add" class="color-black font-400"></strong>
						</div>
					</div>
				</div>
			<div id="CusBankDet" style="display: none;">
					<h6>Referral Details</h6>
					<div class="row" style='padding-left: 20px;'>
						<div class="col-12">
							<label class="color-highlight">Account Name :- </label>
							<strong id="Ref_cus_bkn" class="color-black font-400"></strong>
						</div>
						<div class="col-12">
							<label class="color-highlight">Account Number :-</label>
							<strong id="Ref_cus_ano" class="color-black font-400"></strong>
						</div>
						<div class="col-12">
							<label class="color-highlight">IFSC Code :-</label>
							<strong id="Ref_cus_ic" class="color-black font-400"></strong>
						</div>
						<div class="col-12">
							<label class="color-highlight">Branch Name :- </label>
							<strong id="Ref_cus_brn" class="color-black font-400"></strong>
						</div>
						<div class="col-12">
							<label class="color-highlight">PayPal Id :- </label>
							<strong id="Ref_cus_ppid" class="color-black font-400"></strong>
						</div>
						<div class="col-12">
							<label class="color-highlight">Stripe Id :- </label>
							<strong id="Ref_cus_strid" class="color-black font-400"></strong>
						</div>
					</div>
				</div>
			
			

			<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
				<input type="text" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="comAmount" name="com_amount" required>
				<label for="comAmount" class="color-highlight">Commission Amount</label>
				<i class="fa fa-times disabled invalid color-red-dark"></i>
				<i class="fa fa-check disabled valid color-green-dark"></i>
				<em>(required)</em>
			</div>

			<button type="submit" name="save" id="comSubmit" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4">ADD</button>

		</form>
		<!-- <a href="#" class="btn btn-full btn-m shadow-l rounded-s font-600 bg-green-dark mt-4">ADD</a> -->
	</div>
</div>

<!-- model for commission -->
<div id="commission_edit" class="menu menu-box-modal rounded-m" data-menu-height="290" data-menu-width="350">
	<div class="menu-title">
		<h1 class="font-16">EDIT REFERRAL FEE</h1>
		<a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
	</div>

	<div class="content mb-0 mt-2">
		<form method="post" id="update_commission" action="<?php echo base_url() . 'front/Commission/store'; ?>">
			<input type="hidden" name="cus_ref_id" id="edit_cusrefid"/>
			<input type="hidden" name="com_id" id="edit_comId"/>
			<div class="input-style has-borders no-icon input-style-always-active mb-4">
				<label for="edit_referral_by" name='business' class="color-highlight font-10">Referral</label>
				<select name="cus_id" id="edit_referral_by" class="edit_com_cus">
					<option value="" selected>Select</option>
					<?php
					foreach ($cusData as $cr) { ?>
						<option <?php if (set_value('cus_id')== $cr['cus_id']) {echo "selected"; }?>
								value="<?= $cr['cus_id'] ?>" data-cusrefid="<?=$cr['cus_ref_id']?>"><?= $cr['customer_name'] ?>
						</option>
					<?php }
					?>
				</select>
				<em>(required)</em>
			</div>

			<!-- Client details -->
			<div id ="editCustomer_error"></div>
			<div id="editCusRefDetails" style='display:none'>
					<h6>Referral Details</h6>
					<div class="row" style='padding-left: 20px;'>
						<div class="col-12">
							<label class="color-highlight">Name :-</label>
							<strong id="editRef_cus_name" class="color-black font-400"></strong>
						</div>
						<div class="col-12">
							<label class="color-highlight">Contact No :-</label>
							<strong id="editRef_cus_phone" class="color-black font-400"></strong>
						</div>
						<div class="col-12">
							<label class="color-highlight">Referral Address :-</label>
							<strong id="editRef_cus_add" class="color-black font-400"></strong>
						</div>
					</div>
			</div>
			<div id="editCusBankDet" style="display: none;">
				<h6>Referral Details</h6>
				<div class="row" style='padding-left: 20px;'>
					<div class="col-12">
						<label class="color-highlight">Account Name :- </label>
						<strong id="editRef_cus_bkn" class="color-black font-400"></strong>
					</div>
					<div class="col-12">
						<label class="color-highlight">Account Number :- </label>
						<strong id="editRef_cus_ano" class="color-black font-400"></strong>
					</div>
					<div class="col-12">
						<label class="color-highlight">IFSC Code :- </label>
						<strong id="editRef_cus_ic" class="color-black font-400"></strong>
					</div>
					<div class="col-12">
						<label class="color-highlight">Branch Name :- </label>
						<strong id="editRef_cus_brn" class="color-black font-400"></strong>
					</div>
					<div class="col-12">
						<label class="color-highlight">PayPal Id :- </label>
						<strong id="editRef_cus_ppid" class="color-black font-400"></strong>
					</div>
					<div class="col-12">
						<label class="color-highlight">Stripe Id :- </label>
						<strong id="editRef_cus_strid" class="color-black font-400"></strong>
					</div>
				</div>
			</div>

			<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
				<input type="text" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="edit_comAmount" name="com_amount" required>
				<label for="comAmount" class="color-highlight">Referral Fee Amount</label>
				<i class="fa fa-times disabled invalid color-red-dark"></i>
				<i class="fa fa-check disabled valid color-green-dark"></i>
				<em>(required)</em>
			</div>

			<button type="submit" name="save" id="comUpdate" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4">UPDATE</button>

		</form>
		<!-- <a href="#" class="btn btn-full btn-m shadow-l rounded-s font-600 bg-green-dark mt-4">ADD</a> -->
	</div>
</div>

<!-- model for add commission -->
<div id="popup-convert" class="menu menu-box-modal rounded-m" data-menu-height="230" data-menu-width="350">
	<div class="menu-title">
		<h1 class="font-16">Bought Referral</h1>
		<a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
	</div>
	<form method="post" id="update_cus_convert" action="#">
		<div class="content">
			<input type="hidden" name="cus_id" id="edit_cus_id"/>
			<div class="form-check icon-check mb-3">
				<input type="checkbox" name="convert_cus" class="form-check-input" id="convertCus" value="1"/>
				<label class="form-check-label" for="convertCus"> Check if Referral has buy product</label>
				<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
				<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
			</div>
			<div id="conCus" class="<?=$this->session->userdata('user_type')==1 ? 'd-block' : 'd-none'?>" >
				<div class="form-check icon-check mb-3">
					<input type="checkbox" name="convert_cus_can" class="form-check-input" id="convertCusCan" value="1"/>
					<label class="form-check-label" for="convertCusCan"> Check if Referral has buy product but cancel </label>
					<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
					<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
				</div>
			</div>	
		</div>
		<div class="content mb-0 mt-2">
			<button type="submit" name="save" id="conSubmit" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4">UPDATE</button>
			<!-- <a href="#" class="btn btn-full btn-m shadow-l rounded-s font-600 bg-green-dark mt-4">ADD</a> -->
		</div>
	</form>
</div>
<script>	
	
	function formatDate(date) {
		var d = new Date(date),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		return [day, month, year].join('-')
	}
	
	$(document).ready(function() 
	{
		//for while change referral name set hidden value 
		$("#referral_by").on('change',function(){
			var customer_id = $(this).val();
			var cusReffId = $(this).find(':selected').attr('data-cusrefid');

			if(cusReffId!='' && cusReffId !=null){
				$.ajax({
					url:"<?= base_url('front/Commission/get_cus_ref_det/') ?>"+cusReffId,
					type:"post",
					dataType: "json",
					data:    "data",
					success: function(data) {
						$("#popup-commission").css('height','350px');
						// $("#popup-commission").data('menu-height',350);
						$("#cusRefDetails").css('display','block');
						$("#cusRefId").val(cusReffId);
						$('#ref_cus_name').html(data.cusName);
						$('#ref_cus_phone').html(data.cusPhone);
						$("#ref_cus_add").html(data.cusAdd);
						$('#comSubmit').removeAttr('disabled','disabled');
						$("#customer_error").html("");
					}
				});
				
			}else{
				// debugger;
				$("#popup-commission").css('height','290px');
				$("#cusRefDetails").css('display','none');
				$("#customer_error").css('margin-bottom','25px');
				$("#customer_error").css('text-align','center');
				$("#customer_error").css('text-align','center');
				$("#customer_error").html("Referral has not any referral");
				$("#cusRefId").val('');
				$('#comSubmit').attr('disabled','disabled');
			}

			if(customer_id !='' && customer_id !=null){
				$.ajax({
					url:"<?= base_url('front/Commission/getCusAccDet/') ?>"+customer_id,
					type:"post",
					dataType: "json",
					data:    "data",
					success: function(cusBnkData) {
						if(cusBnkData.cusAccNo != ""){
							$("#popup-commission").css('height','490px');
							$("#CusBankDet").css('display','block');
							$("#Ref_cus_bkn").html(cusBnkData.cusBankName);
							$("#Ref_cus_ano").html(cusBnkData.cusAccNo);
							$("#Ref_cus_ic").html(cusBnkData.cusIfscCode);
							$("#Ref_cus_brn").html(cusBnkData.cusBrName);
							$("#Ref_cus_ppid").html(cusBnkData.cusPaypalId);
							$("#Ref_cus_strid").html(cusBnkData.cusStripId);
						}else{
							$("#popup-commission").css('height','290px');
							$("#CusBankDet").css('display','none');
							// $("#customer_error").css('display','block');
							// $("#customer_error").html("Customer has not add any bank details");
							// $("#comSubmit").attr('disabled','disabled');
						}
					}
				});
			}else{
				// error_message('','Please assign this customer as a referral');
				$("#popup-commission").css('height','350px');
				$("#CusBankDet").css('display','none');
				$("#comSubmit").attr('disabled','disabled');
			}
		});

		$("#edit_referral_by").on('change',function(){
			var customerId = $(this).val();
			var cusReffId = $(this).find(':selected').attr('data-cusrefid');

			if(cusReffId!='' && cusReffId !=null){
				$.ajax({
					url:"<?= base_url('front/Commission/get_cus_ref_det/') ?>"+cusReffId,
					type:"post",
					dataType: "json",
					data:    "data",
					success: function(data) {
						$("#commission_edit").css('height','350px');
						$("#editCusRefDetails").css('display','block');
						$("#edit_cusrefid").val(cusReffId);
						$('#editRef_cus_name').html(data.cusName);
						$('#editRef_cus_phone').html(data.cusPhone);
						$('#comUpdate').removeAttr('disabled','disabled');	
					}
				});
				
			}else{
				$("#commission_edit").css('height','290px');
				$("#editCusRefDetails").css('display','none');
				$("#edit_cusrefid").val('');
				// $('#cpDataDet').html('<span class="text-center text-danger"> Please assign designation on agency contact person</span>');
				$('#comUpdate').attr('disabled','disabled');
			}

			if(customerId !='' && customerId !=null){
				$.ajax({
					url:"<?= base_url('front/Commission/getCusAccDet/') ?>"+customerId,
					type:"post",
					dataType: "json",
					data:    "data",
					success: function(cusBnkData) {
						$("#commission_edit").css('height','490px');
						$("#editCusBankDet").css('display','block');
						$("#editRef_cus_bkn").html(cusBnkData.cusBankName);
						$("#editRef_cus_ano").html(cusBnkData.cusAccNo);
						$("#editRef_cus_ic").html(cusBnkData.cusIfscCode);
						$("#editRef_cus_brn").html(cusBnkData.cusBrName);
						$("#editRef_cus_ppid").html(cusBnkData.cusPaypalId);
						$("#editRef_cus_strid").html(cusBnkData.cusStripId);
					}
				});
			}else{
				error_message('','Please assign this Referral as a referral');
				$("#commission_edit").css('height','350px');
				$("#editCusBankDet").css('display','none');
			}
		});

		//Add Questions
		$("#store-commission").submit(function(n) {
			n.preventDefault();
			$.ajax({
				type: "POST",
				url: '<?php echo base_url() ?>/front/Commission/store',
				data: $("#store-commission").serialize(),
				dataType: 'json',
				success: function(data) {
					if (data.status == 'success') {
						commissionList();
						$("#question_table_body").html(data.data);
						$(".question_details").html(data.option);
						$("#store-commission").get(0).reset();
						close_popup();
						success_message('', 'Commission added successfully');
					} else {
						error_message('', 'Something went wrong. Please try again');
					}
				},
				error: function() {
					error_message('', 'Something went wrong. Please try again');
				}
			});


		});

		//fetch stages data
		$(document).on('click',	'.commission_edit',function(i){
			i.preventDefault();
			var comId = $(this).attr('data-comid');
			$.ajax({
				url:     "<?= base_url('front/Commission/edit_com/') ?>"+comId,
				type:    "post",
				dataType: "json",
				data:    "data",
				success: function(data) {		
					var menuData = "commission_edit";
					document.getElementById(menuData).classList.add('menu-active');
					document.getElementsByClassName('menu-hider')[0].classList.add('menu-active');

					$("#edit_cusrefid").val(data.cusRefId);										
					$('#edit_comAmount').val(Number(data.comAmount));
					$("#edit_comId").val(data.comId);
					$("#edit_referral_by").val(data.cusId);
					$("#edit_referral_by").trigger('change');
				}
			});
		});

		//update stages
		$("#update_commission").submit(function(g) {
			g.preventDefault();
			var com_id = $('#edit_comId').val();
			$.ajax({
				type: "POST",
				url: '<?php echo base_url() ?>/front/Commission/update/'+com_id,
				data: $(this).serialize(),
				dataType: "json",
				success: function (response) {
					close_popup();

					if(response.status == 'success'){
						commissionList();
						// $('#question_table_body').html(response.data); 
						success_message('',response.message);
					}else{
					   error_message('',response.message);
					}
				}
			});
		});

		//stages html list while stage add or update
		function commissionList(){
			$.ajax({
				type: 'ajax',
				url: '<?php echo base_url() ?>front/Commission/all_commission',
				async: false,
				dataType: 'json',
				success: function(data){
					var html = '';
					var i; var j =1;
					var SideBar = '';
					var Tab = '';
					for(i=0; i<data.length; i++){
						
						html +='<tr>'+
									'<td>'+data[i].customer_name+'</td>'+
									'<td>'+data[i].customer_code+'</td>'+
									'<td>'+
										'<div>'+
											'<div class="dropdown">'+
												'<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">'+
													'Action'+
												'</a>'+
												'<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">'+
													'<li><a class="commission_edit dropdown-item" data-comid="'+data[i].com_id+'">Edit</a></li>'+
													'<li><a class="dropdown-item" href="<?= base_url('front/Commission/delete/')?>'+data[i].com_id+'">Delete</a></li>'+
												'</ul>'+
											'</div>'+
										'</div>'+
									'</td>'+
								'</tr>';
						j++;		
					}
					$('#commissionTable').DataTable().destroy();
					$('#commissionData').html(html);
					$('#commissionTable').DataTable({
						responsive : true,
						columnDefs: [
							{ responsivePriority: 1, targets: 0 },
							{ responsivePriority: 3, targets: 1},
							{ responsivePriority: 2, targets: 3}
						]
					});
				},
				error: function(){
					alert('Could not get Data from Database');
				}
			});
		}

		//fetch Referral convert type data
		$(document).on('click',	'.popup-convert',function(i){
			i.preventDefault();
			var cusId = $(this).attr('data-cusid');
			$.ajax({
				url:     "<?= base_url('front/Customer/edit_cus_convert/') ?>"+cusId,
				type:    "post",
				dataType: "json",
				data:    "data",
				success: function(data) {		
					if(data.result==true){
						var menuData = "popup-convert";
						document.getElementById(menuData).classList.add('menu-active');
						document.getElementsByClassName('menu-hider')[0].classList.add('menu-active');
						$("#edit_cus_id").val(data.cusId);
						if(data.convertCus == "1"){
							$("#convertCus").prop('checked',true);
							$("#convertCus").attr('disabled',true);
							$("#convertCusCan").attr('disabled',false);
						}else{
							$("#convertCus").prop('checked',false);
							$("#convertCus").attr('disabled',false);
							$("#convertCusCan").attr('disabled',true);
						}						
					}
				}
			});
		});

		//update stages
		$("#update_cus_convert").submit(function(o) {
			o.preventDefault();
			var cus_id = $('#edit_cus_id').val();
			$.ajax({
				type: "POST",
				url: '<?php echo base_url() ?>/front/Customer/cus_convert_update/'+cus_id,
				data: $(this).serialize(),
				dataType: "json",
				success: function (response) {
					close_popup();
					if(response.status == 'success'){
						// success_message('',);
						confirm_message('Success',response.message,response.url);
					}else{
						// error_message('',response.message);
						confirm_message('Error',response.message,response.url);
					}
					// location.reload();
				}
			});
		});

	});
</script>
