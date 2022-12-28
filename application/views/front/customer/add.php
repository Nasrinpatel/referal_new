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
			<div class="row mb-0">
				<div class="col-12">
					<a href="#" onclick="history.back()" style="float: right;" class="btn btn-sm btn-primary mb-3 rounded-0 text-uppercase font-700 shadow-s">Back</a>
					<h4 class="page-title" >Referral Add</h4>
				</div>
			</div>
			<div class="content">
				<form action="<?= base_url('front/Customer/store') ?>" id="addReferral" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
				
					<div class="has-borders no-icon input-style-always-active mb-4">
						<label class="color-highlight">Select Company</label>
						<select class="form-control js-example-basic-single" multiple="multiple" name="cm_id[]">
							<?php 
							if (count($get_comp_name)) :
								foreach ($get_comp_name as $comp) :
									?>
									<option value="<?= $comp['cm_id'] ?>"><?= $comp['company_name'] ?></option>
									<?php
								endforeach;
							endif; ?>
						</select>
						<?=  form_error('cm_id[]');?>
					</div>
							
					<!-- <div class="input-style has-borders no-icon input-style-always-active mb-4 <?= (get_ut_role($this->session->userdata('user_type')) == 'Admin')? '' : 'd-none' ?>">
						<label class="color-highlight">Select User Role</label>
						<select class="form-control" name="ur_id">
							<?php 
							if (count($roleData)) :
								foreach ($roleData as $rd) :
									?>
									<option value="<?= $rd['role_id'] ?>" <?= (get_ut_role($this->session->userdata('user_type')) != 'Admin' && $rd['role_id'] == 2)? 'selected' : '' ?>><?= $rd['role_name'] ?></option>
									<?php
								endforeach;
							endif; ?>
						</select>
						<?=  form_error('ur_id');?>
					</div> -->
					<input type="hidden" name="ur_id" value="2">
					
					<div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="customerName" class="color-highlight">Referral Name</label>
						<input type="text" class="form-control" name="customer_name" id="customerName" value="<?= set_value('customer_name')?>"/>
						<?=  form_error('customer_name');?>
					</div>
					<!-- <div class="has-icon input-style-1 input-required"> -->
					<div class="has-borders no-icon input-style-always-active mb-4">
						<label for="cusPhoneNumber" class="color-highlight">Referral Contact Number</label>
						<input type="text" pattern="\d*" class="form-control phone_with_code" name="customer_phone_no" id="cusPhoneNumber"  value="<?= set_value('full_phone')?>" required="" placeholder="+918200394895"/>
						<!-- <input class="form-control" name="email" type="text" id="emailPhone" required="" placeholder="+918200394895"> -->
						<div class="errorintlPhone"></div>
						<?=  form_error('full_phone');?>
					</div>
							
					<div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="customerEmail" class="color-highlight">Email</label>
						<input type="email" id="customerEmail" name="customer_email" class="form-control" name="email" value="<?= set_value('customer_email')?>"/>
						<?=  form_error('customer_email');?>
					</div>

					<!-- <div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="customerPwd" class="color-highlight">Password : </label>
						<input type="password" id="customerPwd" class="form-control" name="customer_password" placeholder="Ex Abcd@1234" value="<?= set_value('customer_password')?>"/>
						<?php //  form_error('customer_password');?>
					</div> -->
					<?php if (get_ut_role($this->session->userdata('user_type')) == 'Admin'){ ?>
						<div class="input-style has-borders no-icon input-style-always-active mb-4">
							<textarea id="customerAddress" placeholder="Enter Referral Address" name="customer_address"><?= set_value('customer_address')?></textarea>
							<label for="customerAddress" class="color-highlight font-10">Referral Address</label>
							<i class="fa fa-times disabled invalid color-red-dark"></i>
							<i class="fa fa-check disabled valid color-green-dark"></i>
							<?=  form_error('customer_address');?>
						</div>
					<?php } ?>
						<div class="form-check icon-check mb-3  <?= (get_ut_role($this->session->userdata('user_type')) == 'Admin')? '' : 'd-none' ?>">
							<input type="checkbox" name="referral_check" class="form-check-input" id="referralCheck" value="1" checked/>
							<label class="form-check-label" for="referralCheck">Check if reference by </label>
							<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
							<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
						</div>
	
						<?php if(get_ut_role($this->session->userdata('user_type')) == 'Admin'){ ?>
							<div class="refName mb-4">
								<div class="has-borders no-icon input-style-always-active">
									<label for="refer_by" class="color-highlight">Referral Name</label>
									<select name="cus_ref_id" class="form-control customer_referral" id="refer_by">
										<option value="">Select Referral</option>
										<?php
										foreach ($cusRefData as $cr) { ?>
											<option <?php if (set_value('cus_id') == $cr['cus_id']) {echo "selected"; }?>
													value="<?= $cr['cus_id'] ?>"><?php echo $cr['customer_phone_no']." : ".$cr['customer_name']?> </option>
										<?php }
										?>
									</select>
								</div>
							</div>
						<?php }else{ ?>
							<input type="hidden" name="cus_ref_id" value="<?= $this->session->userdata('user_id') ?>"/>
						<?php } ?>
					<?php if (get_ut_role($this->session->userdata('user_type')) == 'Admin'){ ?>
						<div class="events">
							<label for="form1" class="color-highlight event_title">Add Bank Details</label>
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="accountName" class="color-highlight">Account Name</label>
								<input type="text" class="form-control" name="account_name" id="accountName" value="<?= set_value('account_name')?>"/>
								<?=  form_error('account_name');?>
							</div>
						
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="accountNumber" class="color-highlight">Account Number</label>
								<input type="text" class="form-control" name="account_number" id="accountNumber" value="<?= set_value('account_number')?>"/>
								<?=  form_error('account_number');?>
							</div>
						
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="IfscCode" class="color-highlight">IFSC Code</label>
								<input type="text" class="form-control" name="ifsc_code" maxlength="11" id="IfscCode" value="<?= set_value('ifsc_code')?>"/>
								<?=  form_error('ifsc_code');?>
							</div>
						
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="branchName" class="color-highlight">Branch Name</label>
								<input type="text" class="form-control" name="branch_name" id="branchName" value="<?= set_value('branch_name')?>"/>
								<?=  form_error('branch_name');?>
							</div>
						</div>

						<div class="events">
							<label for="form1" class="color-highlight event_title">Add Other Id Details</label>
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="paypalId" class="color-highlight">Enter Paypal Id</label>
								<input type="text" class="form-control" name="paypal_id" id="paypalId" value="<?= set_value('paypal_id')?>"/>
							</div>
						
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="stripeId" class="color-highlight">Enter Stripe Id</label>
								<input type="text" class="form-control" name="stripe_id" id="stripeId" value="<?= set_value('stripe_id')?>"/>
							</div>
						</div>
					<?php } ?>

					<div class="row mt-2 mb-0">
						<div class="col-lg-12 text-center">
							<input type="submit" id="cusSubmit" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4" value="Submit">	
						</div>
					</div>
				</form>
			</div> <!-- end card-->
		</div> <!-- container -->
	</div>
</div>
<script>
	$(document).ready(function () { 
		$("#addReferral").validate({
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
						url: "<?= base_url('front/Customer/mobileVal') ?>",
						type: "post",
						data: {
							mobile_no: function() {
								return $(".country_code").val()+$( "#cusPhoneNumber" ).val();
							}
						}
					}
				},
				customer_email:{
					required: true,
					email: true,
					remote: {
						url: "<?= base_url('front/Customer/email_val') ?>",
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
		//for add customer to if any customer come any other person reference 
		$('#referralCheck').on('click',function(){
			if($("#referralCheck").is(':checked')){
				// alert('checked');
				$("#refer_by").attr('readonly',false);  // checked
				$(".refName").css('display','block');
			}else{
				// alert('unchecked');
				$("#refer_by").attr('readonly',true);  // unchecked
				$(".refName").css('display','none');
			}
		});

		$("#referralCheck").trigger('change');
	})
</script>
