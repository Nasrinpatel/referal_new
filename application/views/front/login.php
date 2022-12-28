<?php /* <style>
	.pin{
		height: 45px;
		width: 45px;
		font-size: 18px !important;
		text-align: center;		
	}
</style>
<div class="page-content header-clear-medium">
	<div class="card card-style" style="margin-top: 100px;">
		<div class="content" id="phoneNumber">
			<div class="text-center mb-3"><img src="<?= base_url('docs/Referral-Logo.png');?>" style="width:100px;height:auto"></div>
			<!-- <p class="font-600 color-highlight mb-n1">Let's start</p> -->
			<h1 class="font-30">Sign In</h1>
			<p class="mb-0" >Enter your credentials below to sign into your account.</p>
			<p class="text-danger" >Please enter the country code before enter mobile number like (+91).</p>
			<form id="login" method="post" role="form" data-toggle="validator" >
			
				<div class="input-style has-icon input-style-1 input-required">
					<i class="input-icon fa fa-phone"></i>
					<!-- <span>Username</span> -->
					<em></em>
					<input class="form-control" name="email" type="text" id="emailPhone" required="" placeholder="+918200394895">
				</div> 
				<!-- <div class="input-style has-icon input-style-1 input-required">
					<i class="input-icon fa fa-lock"></i>
					<span>Password</span>
					<em>(required)</em>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
				</div> --> 
				
				<input type="submit" name="btn-login" id="signInBtn" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s" value="Sign In"/>
				<div class="col-12 m-2" style="display: none;" id="cus_login_loader">
					<div class="d-flex justify-content-center">
						<div class="spinner-border color-blue-dark" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
				</div>
				<!-- <div class="row pt-3 mb-3">
					<div class="col-6 text-left">
						<a href="page-forgot-1.html" class="color-highlight">Forgot Password?</a>
					</div>
					<div class="col-6 text-right">
						<a href="page-signup-1.html" class="color-highlight">Create Account</a>
					</div>
				</div> -->
				
				
				<!-- <div class="text-center">
					<a href="#" class="icon icon-xs rounded-xl bg-facebook"><i class="fab fa-facebook"></i></a>
					<a href="#" class="icon icon-xs rounded-xl bg-twitter"><i class="fab fa-twitter"></i></a>
					<a href="#" class="icon icon-xs rounded-xl bg-google"><i class="fab fa-google"></i></a>
				</div> -->
				<div id="recaptcha-container"></div>
			</form>
		</div>

		<div class="content" id="verificationCode" style="display: none;">
			<div class="text-center mb-3"><img src="<?= base_url('docs/Referral-Logo.png');?>" style="width:100px;height:auto"></div>
			<!-- <p class="font-600 color-highlight mb-n1">Let's start</p> -->
			<h1 class="font-30">OTP Verification</h1>
			<p>Enter OTP send to your mobile number.</p>
			<!-- <form id="verifyOtp" method="post" role="form" data-toggle="validator" > -->
			
				<div class="row ml-3 mr-3 mb-0">
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
				<input type="hidden" id="cus_id"  />
				<input type="button" name="btn-login" id="codeVerify" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s" value="Verify Code"/>
				<div class="col-12 m-2" style="display: none;" id="cus_verify_loader">
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

		$("#login").on('submit',function(r){
			r.preventDefault();
			var number = $("#emailPhone").val();
			// $("#signInBtn").attr('disabled',true);
			$("#signInBtn").hide();
			$("#cus_login_loader").css('display','block');
			$.ajax({
				type: "POST",
				url: '<?php echo base_url() ?>front/Authentication/login_check',
				data: $("#login").serialize(),
				dataType: 'json',
				success: function(data) {
					if (data.status == 'success') {
						$("#login").get(0).reset();

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
							$("#cus_id").val(data.cusData.cus_id);
							$("#phoneNumber").hide();
							$("#verificationCode").show();
						}).catch(function(error) {
							error_message('',error.message);
							// $("#signInBtn").attr('disabled',false);
							$("#signInBtn").show();
							$("#cus_login_loader").css('display','none');
						});

						// success_message('', data.msg);
					} else {
						error_message('', data.msg);
						// $("#signInBtn").attr('disabled',false);
						$("#signInBtn").show();
						$("#cus_login_loader").css('display','none');
					}
				},
				error: function() {
					error_message('', data.msg);
					// $("#signInBtn").attr('disabled',false);
					$("#signInBtn").show();
					$("#cus_login_loader").css('display','none');
				}
			});
		});
	
		$("#codeVerify").on('click',function(q){
			q.preventDefault();
			$("#cus_verify_loader").css('display','block');
			$(this).hide();
			var one = document.getElementById('codeBox1').value;
			var two = document.getElementById('codeBox2').value;
			var three = document.getElementById('codeBox3').value;
			var four = document.getElementById('codeBox4').value;
			var five = document.getElementById('codeBox5').value;
			var six = document.getElementById('codeBox6').value;
			var cusId = $("#cus_id").val();
			var durl ='';
			var code = one+two+three+four+five+six;

			coderesult.confirm(code).then(function(result) {
				$.ajax({
					type: "POST",
					url: '<?php echo base_url() ?>/front/Authentication/redirect_db/'+cusId,
					// data: $("#store-commission").serialize(),
					dataType: 'json',
					success: function(data) {
						if (data.status == 'success') {
							confirm_message("success","Your Verification code has verified",data.url);
							$("#cus_verify_loader").css('display','none');
						} else {
							confirm_message("error","Customer not registered with us",data.url);
							$(this).show();
							$("#cus_verify_loader").css('display','none');
						}
					},
					error: function() {
						error_message('', 'Something went wrong. Please try again');
						$(this).show();
						$("#phoneNumber").show();
						$("#verificationCode").hide();
						$("#cus_verify_loader").css('display','none');
					}
				});

				var user = result.user;
				// console.log(user); // after phone number verified response

			}).catch(function(error) {
				confirm_message('error',error.message);
				$(this).show();
				$("#phoneNumber").show();
				$("#verificationCode").hide();
				$("#cus_verify_loader").css('display','none');
			});
		});
	});
</script> */?>

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
		<div class="content" id="phoneNumber">
			<div class="text-center mb-3"><img src="<?= base_url('docs/Referral-Logo.png');?>" style="width:100px;height:auto"></div>
			<!-- <p class="font-600 color-highlight mb-n1">Let's start</p> -->
			<h1 class="font-30">Sign In</h1>
			<p class="mb-0" >Enter your credentials below to sign into your account.</p>
			<p class="text-danger" >Please enter the country code before enter mobile number like (+91).</p>
			<form id="login" method="post" role="form" data-toggle="validator" >
				<input type="hidden" id="CusMobileNo"/>
				<div class="has-icon input-style-1 input-required">
					<!-- <span>Username</span> -->
					<em></em> 
					<input class="form-control phone_with_code" name="phone" type="tel" id="emailPhone" required="" placeholder="+918200394895">
					<div class="errorintlPhone"></div>
				</div> 
				<!-- <div class="input-style has-icon input-style-1 input-required">
					<i class="input-icon fa fa-lock"></i>
					<span>Password</span>
					<em>(required)</em>
					<input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
				</div> --> 
				
				<input type="submit" name="btn-login" id="signInBtn" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s" value="Sign In"/>
				<div class="text-center"><p class="mb-0 pt-2" >Don't have an Account? <strong class="color-blue-dark"><a href="<?= base_url('front/register');?>">Signup</a></strong></p></div>
				<div class="col-12 m-2" style="display: none;" id="cus_login_loader">
					<div class="d-flex justify-content-center">
						<div class="spinner-border color-blue-dark" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
				</div>
				<!-- <div class="row pt-3 mb-3">
					<div class="col-6 text-left">
						<a href="page-forgot-1.html" class="color-highlight">Forgot Password?</a>
					</div>
					<div class="col-6 text-right">
						<a href="page-signup-1.html" class="color-highlight">Create Account</a>
					</div>
				</div> -->
				<div id="recaptcha-container"></div>
			</form>
		</div>
		<div class="content" id="verificationCode" style="display: none;">
			<div class="text-center mb-3"><img src="<?= base_url('docs/Referral-Logo.png');?>" style="width:100px;height:auto"></div>
			<!-- <p class="font-600 color-highlight mb-n1">Let's start</p> -->
			<!-- <h1 class="font-30">OTP Verification</h1> -->
			<h1 class="font-30">Verification Code</h1>
			<p>Enter OTP send to your mobile number.</p>
			<!-- <form id="verifyOtp" method="post" role="form" data-toggle="validator" > -->
			
				<div class="row ml-3 mr-3 mb-0">
					<?php
					/* if($data['pin']==1)
					{
					?>
					<div class="col-12">
						<label class="color-highlight">Enter new pin</label>
					</div>	
					<?php 
					} */
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
				<div class="form-group text-center" ><span id="timerCl"></span>
					<div>
						<span id="resendOtpCl" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s" name="btn-login" style="display:none;" >Resend OTP</span>	<!-- color: blue;text-decoration: underline;cursor: pointer; -->	
					</div>
				</div>
				<input type="hidden" id="cus_id"/>
				<input type="button" name="btn-login" id="codeVerify" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s" value="Verify Code"/>
				<div class="col-12 m-2" style="display: none;" id="cus_verify_loader">
					<div class="d-flex justify-content-center">
						<div class="spinner-border color-blue-dark" role="status">
							<span class="sr-only">Loading...</span>
						</div>
					</div>
				</div>
				<div id="recaptcha-container-vc"></div>
			<!-- </form> -->
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#login").validate({
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
				var number = $("input[name='full_phone']").val();
				$("#CusMobileNo").val(number);
				
				// $("#signInBtn").attr('disabled',true);
				$("#signInBtn").hide();
				$("#cus_login_loader").css('display','block');
				$.ajax({
					type: "POST",
					url: '<?php echo base_url() ?>front/Authentication/login_check',
					data: $("#login").serialize(),
					dataType: 'json',
					success: function(data) {
						if(data.status == 'success')
						{
							// $("#login").get(0).reset();
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
								$("#cus_id").val(data.cusData.cus_id);
								$("#phoneNumber").hide();
								$("#verificationCode").show();
								//on timer while click confirm to send otp your register mobile number
								let timerOn = true;

									function timer(remaining) {
										var m = Math.floor(remaining / 60);
										var s = remaining % 60;
										
										m = m < 10 ? '0' + m : m;
										s = s < 10 ? '0' + s : s;
										document.getElementById('timerCl').innerHTML = m + ':' + s;
										remaining -= 1;
										
										if(remaining >= 0 && timerOn) {
											setTimeout(function() {
												timer(remaining);
											}, 1000);
											return;
										}

										if(!timerOn) {
											// Do validate stuff here
											return;
										}
										
										// Do timeout stuff here
										//alert('Please Select Resend Otp');
										$("#resendOtpCl").css("display", "block");			
										$("#timerCl").css("display", "none");		
										$("#codeVerify").css("display", "none");		
									}
									timer(240);
							}).catch(function(error){
								error_message('',error.message);
								// $("#signInBtn").attr('disabled',false);
								$("#signInBtn").show();
								$("#cus_login_loader").css('display','none');
							});
							// success_message('', data.msg);
						}
						else
						{
							error_message('', data.msg);
							// $("#signInBtn").attr('disabled',false);
							$("#signInBtn").show();
							$("#cus_login_loader").css('display','none');
						}
					},
					error: function()
					{
						error_message('', data.msg);
						// $("#signInBtn").attr('disabled',false);
						$("#signInBtn").show();
						$("#cus_login_loader").css('display','none');
					}
				});
			}
		}); 
	
		$("#codeVerify").on('click',function(q){
			q.preventDefault();
			$("#cus_verify_loader").css('display','block');
			$(this).hide();
			var one = document.getElementById('codeBox1').value;
			var two = document.getElementById('codeBox2').value;
			var three = document.getElementById('codeBox3').value;
			var four = document.getElementById('codeBox4').value;
			var five = document.getElementById('codeBox5').value;
			var six = document.getElementById('codeBox6').value;
			var cusId = $("#cus_id").val();
			var durl ='';
			var code = one+two+three+four+five+six;

			coderesult.confirm(code).then(function(result) {
				$.ajax({
					type: "POST",
					url: '<?php echo base_url() ?>/front/Authentication/redirect_db/'+cusId,
					// data: $("#store-commission").serialize(),
					dataType: 'json',
					success: function(data) {
						if (data.status == 'success') {
							confirm_message("success","Your Verification code has verified",data.url);
							$("#cus_verify_loader").css('display','none');
						} else {
							confirm_message("error","Customer not registered with us",data.url);
							$(this).show();
							$("#cus_verify_loader").css('display','none');
						}
					},
					error: function() {
						error_message('', 'Something went wrong. Please try again');
						$(this).show();
						$("#phoneNumber").show();
						$("#verificationCode").hide();
						$("#cus_verify_loader").css('display','none');
					}
				});

				var user = result.user;
				// console.log(user); // after phone number verified response

			}).catch(function(error) {
				confirm_message('error',error.message);
				$(this).show();
				$("#phoneNumber").show();
				$("#verificationCode").hide();
				$("#cus_verify_loader").css('display','none');
			});
		});

		$("#resendOtpCl").on('click',function(r){
			r.preventDefault();
			$(this).hide();
			var number = $("#CusMobileNo").val();
			$("#cus_verify_loader").css('display','block');
			
				window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container-vc', {
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
					success_message('Success',"OTP sent successfully to your registered mobile number");
					// $("#cus_id").val(data.cusData.cus_id);
					// $("#phoneNumber").hide();
					// $("#verificationCode").show();
					$("#codeVerify").show();
					$("#cus_verify_loader").css('display','none');
					//on timer while click confirm to send otp your register mobile number
					let timerOn = true;

						function timer(remaining) {
							var m = Math.floor(remaining / 60);
							var s = remaining % 60;
							
							m = m < 10 ? '0' + m : m;
							s = s < 10 ? '0' + s : s;
							document.getElementById('timerCl').innerHTML = m + ':' + s;
							remaining -= 1;
							
							if(remaining >= 0 && timerOn) {
								setTimeout(function() {
									timer(remaining);
								}, 1000);
								return;
							}

							if(!timerOn) {
								// Do validate stuff here
								return;
							}
							
							// Do timeout stuff here
							//alert('Please Select Resend Otp');
							$("#resendOtpCl").css("display", "block");			
							$("#timerCl").css("display", "none");		
							$("#codeVerify").css("display", "none");		
						}
						timer(240);
				}).catch(function(error){
					error_message('',error.message);
					// $("#signInBtn").attr('disabled',false);
					$("#signInBtn").show();
					$("#cus_verify_loader").css('display','none');
				});
						// success_message('', data.msg);
			
		});
	});
</script>
