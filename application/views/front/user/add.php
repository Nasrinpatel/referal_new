<div class="content-page">
	<div class="card card-style">
		<div class="content">
			
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<a type="button" href="<?=base_url('front/User')?>" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s btn btn-primary" style="float:right;" >Back</a>
					<h4>Add User</h4>
				</div>
			</div>     
			<!-- end page title --> 
			
			<div class="content">
				<form action="<?= base_url('front/User/store') ?>" id="addUser" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
					
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="customerName" class="color-highlight">Name</label>
						<input type="text" class="form-control" name="name" id="customerName" value="<?= set_value('name')?>"/>
						<em>(required)</em>
						<?=  form_error('name');?>
					</div>
		
					<!-- <div class="input-style has-borders no-icon input-style-always-active">
						<label for="customerName" class="color-highlight">Role Type</label>
						<select name="ur_id">
							<option data-display="Select">--select--</option>
							<?php
							if (count($role)) :
								foreach ($role as $cus) :
								?> 
									<option <?php if (set_value('ur_id')== $cus['role_id']) {echo "selected";} ?> 
											value="<?=$cus['role_id']?>"><?= $cus['role_name']?></option>
								<?php
								endforeach;
							endif; ?>
						</select>
						<em>(required)</em>
						<?=  form_error('ur_id');?>
					</div>-->
					<input type="hidden" name="ur_id" value="1">
					<!-- <div class="input-style has-borders no-icon input-style-always-active"> -->
					<div class="has-borders no-icon input-style-always-active mb-4">
						<label for="customerNumber" class="color-highlight">Mobile Number</label>
						<input type="text" pattern="\d*" class="form-control phone_with_code" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" name="phone_no" id="customerNumber" value="<?= set_value('full_phone')?>"/>
						<div class="errorintlPhone"></div>
						<?=  form_error('full_phone');?>
					</div>
		
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="customerEmail" class="color-highlight">Email ID</label>
						<input type="email" id="customerEmail" name="email" class="form-control" name="email" value="<?= set_value('email')?>"/>
						<em>(required)</em>
						<?=  form_error('email');?>
					</div>
		
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="pwd" class="color-highlight">Password : </label>
						<input type="password" id="pwd" class="form-control" name="password" value="<?= set_value('password')?>"/>
						<em>(required)</em>
						<?=  form_error('password');?>
					</div>
		
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="RePwd" class="color-highlight">Re-Write Password : </label>
						<input type="password" id="RePwd" class="form-control" name="re_password" value="<?= set_value('re_password')?>" />
						<em>(required)</em>
						<?=  form_error('re_password');?>
					</div>
				
					<input type="submit" id="UserSave" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600" value="Submit">	
				</form>
			</div><!-- end row-->
		</div> <!-- container -->
	</div> <!-- content -->
</div>
<script>
	//for admin password change
	$(document).ready(function () { 
		$("#addUser").validate({
			errorPlacement: function(error, element) {
				//Custom position: first name
				if (element.attr("name") == "phone_no" ) {
					error.appendTo($(element).parents('div').find($('.errorintlPhone')));
				}else{
					error.insertAfter(element);
				}
			},
			errorElement: 'p',
			errorClass: 'text-danger',
			rules: {
				phone_no: {
					required: true,
					intlTelNumber: true,
					remote: {
						url: "<?= base_url('front/User/mobileVal') ?>",
						type: "post",
						data: {
							mobile_no: function() {
								return $(".country_code").val()+$( "#customerNumber" ).val();
							}
						}
					}
				},
				email:{
					required: true,
					email: true,
					remote: {
						url: "<?= base_url('front/User/email_val') ?>",
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
                phone_no: {
                    remote: "This mobile number is already register with us , Please enter different mobile number"
                },
				email: {
                    remote: "This email id is already register with us , Please enter different email"
                }
            }
		}); 
	});
	$(document).on('change','#RePwd',function(){
		var newPass = $('#pwd').val();
		var cnfPass = $(this).val();
		if(newPass != cnfPass){
			error_message('error','Confirm password not match with new password');
			$('#pwd').val('');
			$(this).val('');
			$('#UserSave').attr('disabled','disabled');
		}else{
			$('#UserSave').removeAttr('disabled','disabled');
		}
	});
</script>
