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
<div class="divider divider-margins"></div>
<!-- Add referral button -->
<?php $this->load->view('front/includes/referral_btn'); ?>
	<div class="card card-style">
	
		<div class="content">
			<div class="row mb-0">
				<div class="col-12">
					<a href="#" onclick="history.back()" style="float: right;" class="btn btn-sm btn-primary mb-3 rounded-0 text-uppercase font-700 shadow-s">Back</a>
					<h4 class="page-title">Referral Edit</h4>
				</div>
			</div>
				
			<div class="content">
				<form action="<?= base_url('front/Customer/update/').$cusDetData->Customer_id ?>" id="editReferral" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
					<input type="hidden" id="CustomerId" value="<?=$cusDetData->Customer_id?>"/>

			
					<div class="has-borders no-icon input-style-always-active mb-4">
						<label class="color-highlight">Select Company</label>
						<select class="form-control js-example-basic-single" multiple="multiple" name="cm_id[]">
							<?php
								$cm_ids = 0;
								foreach ($proCompDet as $id){$cm_ids .= ",".$id->cm_id;}

								$cmId = explode(",",$cm_ids);
								// print_r( $comDetData);
								if (count($get_comp_name)){	
									foreach ($get_comp_name as $cat){
									?>
									<option value="<?= $cat['cm_id'] ?>"
										<?php echo (in_array($cat['cm_id'], $cmId)) ? 'selected':''; ?>>
										<?= $cat['company_name']; 
										?>
									</option>
								<?php
									}
								}
							?>
						</select>
					</div>
				
					<!-- <div class="input-style has-borders no-icon input-style-always-active mb-4 <?= (get_ut_role($this->session->userdata('user_type')) == 'Admin')? '' : 'd-none' ?>">
						<label for="" class="color-highlight font-10">Select User Role</label>
						<select name="ur_id" id="" class="form-control">
							<?php
							foreach ($roleData as $rd) { ?>
								<option <?php if ( $cusDetData->ur_id == $rd['role_id']) {echo "selected"; }?>
										value="<?= $rd['role_id'] ?>" <?= (get_ut_role($this->session->userdata('user_type')) != 'Admin' && $rd['role_id'] == 2)? 'selected' : '' ?>><?php echo $rd['role_name']?></option>
							<?php }
							?>
						</select>
					</div> -->
					<input type="hidden" name="ur_id" value="2">
					
					<div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="customerName" class="color-highlight">Referral Name : <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="customer_name" id="customerName" required="" value="<?= set_value('customer_name',$cusDetData->customer_name)?>"/>
						<?=  form_error('customer_name');?>
					</div>
					
					<!-- <div class="input-style has-borders no-icon input-style-always-active mb-4"> -->
					<div class="has-borders no-icon input-style-always-active mb-4">
						<label for="cusPhoneNumber" class="color-highlight">Referral Contact Number : <span class="text-danger">*</span></label>
						<input type="text" class="form-control phone_with_code" name="customer_phone_no" id="cusPhoneNumber" required="" value="<?= set_value('full_phone',$cusDetData->customer_phone_no)?>"/>
						<?=  form_error('full_phone');?>
						<div class="errorintlPhone"></div>
					</div>
				
					<div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="customerEmail" class="color-highlight">Email : <span class="text-danger">*</span></label>
						<input type="email" id="customerEmail" name="customer_email" class="form-control" name="email" required="" value="<?= set_value('customer_email',$cusDetData->customer_email)?>"/>
						<?=  form_error('customer_email');?>
					</div>
					<?php if (get_ut_role($this->session->userdata('user_type')) == 'Admin' || empty($cusDetData->cus_ref_id) || $cusDetData->Customer_id == $this->session->userdata('user_id')){ ?>
						<div class="input-style has-borders no-icon input-style-always-active mb-4">
							<label for="customerAddress" class="color-highlight">Referral Address : </label>
							<textarea id="customerAddress" class="form-control" name="customer_address"><?= set_value('customer_address',$cusDetData->customer_address)?></textarea>
							<?=  form_error('customer_address');?>
						</div>
					<?php } ?>
					<?php if($cusDetData->cus_ref_id == ''){ ?>
						<div class="form-check icon-check mb-3  <?= (get_ut_role($this->session->userdata('user_type')) == 'Admin')? '' : 'd-none' ?>">
							<input type="checkbox" name="referral_check" class="form-check-input" id="referralCheck" <?= $cusDetData->referral_check == '1' ? 'checked' : ''  ?> value="1"/>
							<label class="form-check-label" for="referralCheck"> Check if reference by </label>
							<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
							<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
						</div>
						<?php if(get_ut_role($this->session->userdata('user_type')) == 'Admin'){ ?>
							<div class="refName">	
								<div class="has-borders no-icon input-style-always-active mb-4">
									<label for="refer_by" class="color-highlight font-10">Referral Name</label>
									<select name="cus_ref_id" id="refer_by" class="form-control customer_referral">
										<option>Select Referral</option>
										<?php
										foreach ($cusRefData as $cl) { ?>
											<option <?php if ( $cusDetData->cus_ref_id == $cl['cus_id']) {echo "selected"; }?>
													value="<?= $cl['cus_id'] ?>" <?= (get_ut_role($this->session->userdata('user_type')) != 'Admin' && $rd['cus_id'] == 2)? 'selected' : '' ?>><?php echo $cl['customer_phone_no']." : ".$cl['customer_name']?></option>
										<?php }
										?>
									</select>
								</div>
							</div>
						<?php }else{ ?>
							<input type="hidden" name="cus_ref_id" value="<?= $this->session->userdata('user_id') ?>"/>
						<?php } ?>
					<?php }else{ ?>
						<input type="hidden" name="referral_check" value="1"/>
						<input type="hidden" name="cus_ref_id" value="<?= $cusDetData->cus_ref_id ?>"/>
					<?php } ?>
					<span class="text-danger" id="cusRef"></span>
					<?php if (get_ut_role($this->session->userdata('user_type')) == 'Admin' || empty($cusDetData->cus_ref_id) || $cusDetData->Customer_id == $this->session->userdata('user_id')){ ?>
						<div class="events">
							<label for="form1" class="color-highlight event_title">Add Bank Details</label>
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="accountName" class="color-highlight">Account Name : </label>
								<input type="text" class="form-control" name="account_name" id="accountName" value="<?= set_value('account_name',$cusDetData->account_name)?>"/>
								<?=  form_error('account_name');?>
							</div>
						
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="accountNumber" class="color-highlight">Account Number : </label>
								<input type="text" class="form-control" name="account_number" id="accountNumber" pattern="[0-9]+" maxlength="14" value="<?= set_value('account_number',$cusDetData->account_number)?>"/>
								<?=  form_error('account_number');?>
							</div>
						
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="IfscCode" class="color-highlight">IFSC Code : </label>
								<input type="text" class="form-control" name="ifsc_code" maxlength="11" id="IfscCode" value="<?= set_value('ifsc_code',$cusDetData->ifsc_code)?>"/>
								<?=  form_error('ifsc_code');?>
							</div>
						
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="branchName" class="color-highlight">Branch Name : </label>
								<input type="text" class="form-control" name="branch_name" id="branchName" value="<?= set_value('branch_name',$cusDetData->branch_name)?>"/>
								<?=  form_error('branch_name');?>
							</div>
						</div>

						<div class="events">
							<label for="form1" class="color-highlight event_title">Add Other Id Details</label>
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="paypalId" class="color-highlight">Enter Paypal Id</label>
								<input type="text" class="form-control" name="paypal_id" id="paypalId" value="<?= set_value('paypal_id',$cusDetData->paypal_id)?>"/>
							</div>
						
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="stripeId" class="color-highlight">Enter Stripe Id</label>
								<input type="text" class="form-control" name="stripe_id" id="stripeId" value="<?= set_value('stripe_id',$cusDetData->stripe_id)?>"/>
							</div>
						</div>
					<?php } ?>
					<div class="row mt-2">
						<div class="col-lg-12 text-center">
							<input type="submit" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4" value="Update">	
						</div>
					</div>
				</form>
			</div>
		</div> <!-- content -->
	</div>
</div>
<script>
	$(document).ready(function () {  
		$("#editReferral").validate({
			errorPlacement: function(error, element) {
				//Custom position: first name
				if (element.attr("name") == "customer_phone_no" ) {
					error.appendTo($(element).parents('div').find($('.errorintlPhone')));
				}else{
					error.insertAfter(element);
				}
			},
			errorElement: 'p',
			errorClass: 'text-danger',
			rules: {
				customer_phone_no: {
					required: true,
					intlTelNumber: true,
					remote: {
						url: "<?= base_url('front/Customer/mobileVal/') ?>"+$("#CustomerId").val(),
						type: "post",
						data: {
							mobile_no: function() {
								return $(".country_code").val()+$( "#cusPhoneNumber" ).val().replace(/\s+/g, '');
							}
						}
					}
				},
				customer_email:{
					required: true,
					email: true,
					remote: {
						url: "<?= base_url('front/Customer/email_val/') ?>"+$("#CustomerId").val(),
						type: "post",
						data: {
							email: function() {
								return $( "#customerEmail" ).val();
							}
						}
					}
				}
			},
			messages:{
                customer_phone_no: {
                    remote: "This mobile number is already register with us , Please enter different mobile number"
                },
				customer_email: {
                    remote: "This email id is already register with us , Please enter different email"
                }
            }
		}); 
		//for add Referral to if any Referral come any other person reference 
		$('#referralCheck').on('click',function(){
			if($("#referralCheck").is(':checked')){
				// alert('checked');
				$("#refer_by").attr('readonly',false);  // checked
				$(".refName").css('display','block');
			}else{
				// alert('unchecked');
				$("#refer_by").attr('readonly',true);  // unchecked
				$("#refer_by").val('');
				$(".refName").css('display','none');
			}
		});

		$("#referralCheck").trigger('change');

		$('#refer_by').on('change',function(){

			var CustomerId = $("#CustomerId").val();
			var refCusId = $(this).val();
			if(CustomerId == refCusId){
				$(this).val('');
				$('#cusRef').css('display','block');
				$('#cusRef').css('margin-bottom','20px');
				$('#cusRef').html('Please select different referral customer name');
			}else{
				$('#cusRef').css('display','none');
				$('#cusRef').css('margin-bottom','1px');
				$('#cusRef').html('');
			}
		});
	})
</script>
