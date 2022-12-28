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


<div class="card card-style" style="margin-top: 100px;">
		<div class="content">
			
			
			<div class="text-center mb-3"><img src="<?= base_url('docs/Referral-Logo.png');?>" style="width:100px;height:auto"></div>
			<!-- <p class="font-600 color-highlight mb-n1">Let's start</p> -->
			<h1 class="font-30 text-center">Sign Up</h1>
				<form action="<?= base_url('front/Register/store') ?>" id="addRegister" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
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
							
					
					
					<div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="userName" class="color-highlight">Name</label>
						<input type="text" class="form-control" name="customer_name" id="userName" value="<?= set_value('customer_name')?>"/>
						<?=  form_error('customer_name');?>
					</div>
					<!-- <div class="has-icon input-style-1 input-required"> -->
					<div class="has-borders no-icon input-style-always-active mb-4">
						<label for="userPhoneNumber" class="color-highlight"> Contact Number</label>
						<input type="text" pattern="\d*" class="form-control phone_with_code" name="customer_phone_no" id="userPhoneNumber"  value="<?= set_value('full_phone')?>" required="" placeholder="+918200394895"/>
						<!-- <input class="form-control" name="email" type="text" id="emailPhone" required="" placeholder="+918200394895"> -->
						<div class="errorintlPhone"></div>
						<?=  form_error('full_phone');?>
					</div>
							
					<div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="userEmail" class="color-highlight">Email</label>
						<input type="email" id="userEmail" name="customer_email" class="form-control" name="email" value="<?= set_value('customer_email')?>"/>
						<?=  form_error('customer_email');?>
					</div>

					<!-- <div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="customerPwd" class="color-highlight">Password : </label>
						<input type="password" id="customerPwd" class="form-control" name="customer_password" placeholder="Ex Abcd@1234" value="<?= set_value('customer_password')?>"/>
						<?php //  form_error('customer_password');?>
					</div> -->
				

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
		$("#addRegister").validate({
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
						url: "<?= base_url('front/Register/mobileVal') ?>",
						type: "post",
						data: {
							mobile_no: function() {
								return $(".country_code").val()+$("#userPhoneNumber").val();
							}
						}
					}
				},
				customer_email:{
					required: true,
					email: true,
					remote: {
						url: "<?= base_url('front/Register/email_val') ?>",
						type: "post",
						data: {
							email: function() {
								return $("#userEmail").val();
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
		// $('#referralCheck').on('click',function(){
		// 	if($("#referralCheck").is(':checked')){
		// 		// alert('checked');
		// 		$("#refer_by").attr('readonly',false);  // checked
		// 		$(".refName").css('display','block');
		// 	}else{
		// 		// alert('unchecked');
		// 		$("#refer_by").attr('readonly',true);  // unchecked
		// 		$(".refName").css('display','none');
		// 	}
		// });

		// $("#referralCheck").trigger('change');
	})
</script>
