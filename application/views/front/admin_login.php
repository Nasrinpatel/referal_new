<style>
	.pin{
		height: 45px;
		width: 45px;
		font-size: 18px !important;
		text-align: center;		
	}
</style>
<div class="page-content header-clear-medium">
	<div class="card card-style" style="margin-top: 100px;">
		<div class="content" id="adPhoneNumber">
			<div class="text-center mb-3"><img src="<?= base_url('docs/Referral-Logo.png');?>" style="width:100px;height:auto"></div>
			<!-- <p class="font-600 color-highlight mb-n1">Let's start</p> -->
			<h1 class="font-30">Admin Login</h1>
			<p class="mb-0" >Enter your credentials below to sign into your account.</p>
			<p class="text-danger" >Please enter the country code before enter mobile number like (+91).</p>
			<form id="adLogin" method="post" role="form" data-toggle="validator" >
			
				<div class="has-icon input-style-1 input-required">
					<!-- <i class="input-icon fa fa-phone"></i> -->
					<!-- <span>Username</span> -->
					<em></em>
					<input class="form-control phone_with_code" name="phone" type="text" id="usEmailPhone" required="" placeholder="Enter your registered phone number">
					<div class="errorintlPhone"></div>
				</div> 
				<input type="submit" name="btn-login" id="adSignInBtn" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s" value="Sign In"/>
				<div class="col-12 m-2" style="display: none;" id="ad_login_loader">
					<div class="d-flex justify-content-center">
						<div class="spinner-border color-blue-dark" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
				</div>
				<div id="recaptcha-container"></div>
				<!-- <div class="row pt-3 mb-3">
					<div class="col-6 text-left">
						<a href="page-forgot-1.html" class="color-highlight">Forgot Password?</a>
					</div>
					<div class="col-6 text-right">
						<a href="page-signup-1.html" class="color-highlight">Create Account</a>
					</div>
				</div> -->
			</form>
		</div>

		<div class="content" id="adVerificationCode" style="display: none;">
			<div class="text-center mb-3"><img src="<?= base_url('docs/Referral-Logo.png');?>" style="width:100px;height:auto"></div>
			<!-- <p class="font-600 color-highlight mb-n1">Let's start</p> -->
			<!-- <h1 class="font-30">OTP Verification</h1> -->
			<h1 class="font-30">Verification Code</h1>
			<p>Enter OTP send to your mobile number.</p>
			<!-- <form id="verifyOtp" method="post" role="form" data-toggle="validator" > -->
			
				<div class="row ml-3 mr-3 mb-0">
					<?php
					?>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="one" id="codeBox1" type="number" maxlength="1" onkeyup="onKeyUpEvent(1, event)" onfocus="onFocusEvent(1)" onkeypress="if(this.value.length==1) return false";/>
							<em></em>
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="two" id="codeBox2" type="number" maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)" onkeypress="if(this.value.length==1) return false";/>
							<em></em>
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="three" id="codeBox3" type="number" maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)" onkeypress="if(this.value.length==1) return false";/>
							<em></em>
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="four" id="codeBox4" type="number" maxlength="1" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)" onkeypress="if(this.value.length==1) return false";/>
							<em></em>
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="five" id="codeBox5" type="number" maxlength="1" onkeyup="onKeyUpEvent(5, event)" onfocus="onFocusEvent(5)" onkeypress="if(this.value.length==1) return false";/>
							<em></em>
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="six" id="codeBox6" type="number" maxlength="1" onkeyup="onKeyUpEvent(6, event)" onfocus="onFocusEvent(6)" onkeypress="if(this.value.length==1) return false";/>
							<em></em>
						</div>         
					</div>
				</div>
				<div class="form-group text-center" ><span id="timerFP"></span>
					<div>
						<span id="resendOtpFP" class="font-13" name="btn-login" style="display:none;color: blue;text-decoration: underline;cursor: pointer;" >Resend OTP</span>		
					</div>
				</div>
				<input type="hidden" id="user_id"  />
				<input type="button" name="btn-login" id="adCodeVerify" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s" value="Verify Code"/>
				<div class="col-12 m-2" style="display: none;" id="ad_verify_loader">
					<div class="d-flex justify-content-center">
						<div class="spinner-border color-blue-dark" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
				</div>
				
			<!-- </form> -->
		</div>
	</div>
</div>
<script>
	
	$(document).ready(function(){
		$("#adLogin").validate({
			errorPlacement: function(error, element) {
				//Custom position: first name
				if (element.attr("name") == "phone" ) {
					error.appendTo($(element).parents('div').find($('.errorintlPhone')));
				}else{
					error.insertAfter(element);
				}
			},
			errorElement: 'p',
			errorClass: 'text-danger',
			rules: {
				phone: {
					required: true,
					intlTelNumber: true,
				},
			},
			messages:{
                phone: {
                    remote: "This mobile number is already register with us , Please enter different mobile number"
                },
            },
			submitHandler: function(form, event) { 
				event.preventDefault();
				// var number = $("#usEmailPhone").val();
				var number = $("input[name='full_phone']").val();
				// $("#adSignInBtn").attr('disabled',true);
				$("#adSignInBtn").hide();
				$("#ad_login_loader").css('display','block');
				$.ajax({
					type: "POST",
					url: '<?php echo base_url() ?>front/Authentication/admin_login_check',
					data: $("#adLogin").serialize(),
					dataType: 'json',
					success: function(data) {
						if (data.status == 'success') {
							$("#adLogin").get(0).reset();

							window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
							'size': 'invisible',
							'callback': (response) => {
								// reCAPTCHA solved, allow signInWithPhoneNumber.
								onSignInSubmit();
							}
							});

							firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
								//s is in lowercase
								window.confirmationResult = confirmationResult;
								coderesult = confirmationResult;
								// console.log(coderesult); // after send phone number otp response
								success_message('Success',"Message sent successfully to your registered mobile number");
								$("#user_id").val(data.userData.user_id); //set hidden user id
								$("#adPhoneNumber").hide();
								$("#adVerificationCode").show();
								$("#ad_login_loader").css('display','none');
							}).catch(function(error) {
								error_message('',error.message);
								// $("#adSignInBtn").attr('disabled',false);
								$("#adSignInBtn").show();
								$("#ad_login_loader").css('display','none');
							});

							// success_message('', data.msg);
						} else {
							error_message('', data.msg);
							// $("#adSignInBtn").attr('disabled',false);
							$("#adSignInBtn").show();
							$("#ad_login_loader").css('display','none');
						}
					},
					error: function() {
						error_message('', data.msg);
						// $("#adSignInBtn").attr('disabled',false);
						$("#adSignInBtn").show();
						$("#ad_login_loader").css('display','none');
					}
				});
			}
		});
	

		$("#adCodeVerify").on('click',function(t){
			t.preventDefault();
			$(this).hide();
			$("#ad_verify_loader").css('display','block');
			var one = $('#codeBox1').val();
			var two = $('#codeBox2').val();
			var three = $('#codeBox3').val();
			var four = $('#codeBox4').val();
			var five = $('#codeBox5').val();
			var six = $('#codeBox6').val();
			var userId = $("#user_id").val();
			var code = one+two+three+four+five+six; //concat verification code 
			coderesult.confirm(code).then(function(result) {
				$.ajax({
					type: "POST",
					url: '<?php echo base_url() ?>/front/Authentication/ad_redirect_db/'+userId,
					dataType: 'json',
					success: function(data) {
						if (data.status == 'success') {
							confirm_message("success","Your Verification code has verified",data.adUrl);
							$("#ad_verify_loader").css('display','none');
							$(this).show();
						} else {
							confirm_message("error","Referral not registered with us",data.adUrl);
							$("#ad_verify_loader").css('display','none');
							$(this).show();
						}
					},
					error: function() {
						error_message('', 'Something went wrong. Please try again');
						$(this).show();
						$("#adPhoneNumber").show();
						$("#adVerificationCode").hide();
						$("#ad_login_loader").css('display','none');
					}
				});

				var user = result.user;
				// console.log(user); // after phone number verified response

			}).catch(function(error) {
				confirm_message('error',error.message);
				$(this).show();
				$("#ad_login_loader").css('display','none');
				$("#adPhoneNumber").show();
				$("#adVerificationCode").hide();
			});
		});
	});
</script>


