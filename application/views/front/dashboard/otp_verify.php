<style>
	.pin{
		height: 45px;
		width: 45px;
		font-size: 18px !important;
		text-align: center;		
	}
</style>
<div class="page-content header-clear-medium">
	<div class="card card-style">
		<div class="content">
			<div class="text-center mb-3"><img src="<?= base_url('docs/Referral-Logo.png');?>" style="width:100px;height:auto"></div>
			<p class="font-600 color-highlight mb-n1">Let's start</p>
			<h1 class="font-30">OTP Verification</h1>
			<p>
				Enter OTP send to your mobile number.
			</p>
			<form id="verifyOtp" method="post" role="form" data-toggle="validator" >
			
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
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="two" id="codeBox2" type="number" maxlength="1" onkeyup="onKeyUpEvent(2, event)" onfocus="onFocusEvent(2)" onkeypress="if(this.value.length==1) return false";/>
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="three" id="codeBox3" type="number" maxlength="1" onkeyup="onKeyUpEvent(3, event)" onfocus="onFocusEvent(3)" onkeypress="if(this.value.length==1) return false";/>
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="four" id="codeBox4" type="number" maxlength="1" onkeyup="onKeyUpEvent(4, event)" onfocus="onFocusEvent(4)" onkeypress="if(this.value.length==1) return false";/>
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="five" id="codeBox5" type="number" maxlength="1" onkeyup="onKeyUpEvent(5, event)" onfocus="onFocusEvent(5)" onkeypress="if(this.value.length==1) return false";/>
						</div>         
					</div>
					<div class="col-2 p-1">
						<div class="input-style input-style-2 input-required">
							<input class="pin" required name="six" id="codeBox6" type="number" maxlength="1" onkeyup="onKeyUpEvent(6, event)" onfocus="onFocusEvent(6)" onkeypress="if(this.value.length==1) return false";/>
						</div>         
					</div>
				</div>
				<div class="form-group text-center" ><span id="timerFP"></span>
					<div>
						<span id="resendOtpFP" class="font-13" name="btn-login" style="display:none;color: blue;text-decoration: underline;cursor: pointer;" >Resend OTP</span>		
					</div>
				</div>
				<input type="submit" name="btn-login"  class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s" value="Sign In"/>
				
				<div class="divider"></div>
				
			</form>
		</div>
	</div>
</div>
<script>
	// var VerifyKey = <?php //$vId?>;
	$(document).ready(function(){

		let timerOn = true;

		function timer(remaining) {
			var m = Math.floor(remaining / 60);
			var s = remaining % 60;
			
			m = m < 10 ? '0' + m : m;
			s = s < 10 ? '0' + s : s;
			// document.getElementById('timer').innerHTML = m + ':' + s;
			$("#timerFP").html(m + ':' + s);
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
			$("#resendOtpFP").css("display", "block");			
			$("#timerFP").css("display", "none");									
			//window.location.href = "<?php //= base_url('mobile/authentication/delete_pass/') ?>"+mobile;
			//$('#v').val(v);			
		}

		timer(30);

		$("#verifyOtp").on('submit',function(w){
			w.preventDefault();
			var one = document.getElementById('codeBox1').value;
			var two = document.getElementById('codeBox2').value;
			var three = document.getElementById('codeBox3').value;
			var four = document.getElementById('codeBox4').value;
			var five = document.getElementById('codeBox5').value;
			var six = document.getElementById('codeBox6').value;

			var code = one+two+three+four+five+six;

			verificationKey.confirm(code).then(function(result) {
				alert("Successfully registered");
				var user = result.user;
				console.log(user);
			}).catch(function(error) {
				alert(error.message);
			});
		});
	});
</script>


