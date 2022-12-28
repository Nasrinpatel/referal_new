<div class="content-page">
	<div class="card card-style">
		<div class="content">
			
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<a type="button" href="<?=base_url('front/User')?>" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s btn btn-primary" style="float:right;" >Back</a>
					<h4>Edit User</h4>
				</div>
			</div>     
			<!-- end page title --> 
			
			<div class="content">
				<form action="<?= base_url('front/User/update/').$ud->user_id ?>" id="editUser" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
					
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="customerName" class="color-highlight">Name</label>
						<input type="text" class="form-control" name="name" id="customerName" value="<?= set_value('name',$ud->name)?>"/>
						<?=  form_error('name');?>
					</div>
					<!-- <div class="input-style has-borders no-icon input-style-always-active">
						<label for="customerName" class="color-highlight">Role Type</label>
						<select id="selectize-select" name="ur_id">
							<option data-display="Select">--select--</option>
							<?php
							if (count($role)) :
								foreach ($role as $cus) :
								?> 
									<option <?php if (set_value('ur_id',$ud->ur_id)== $cus['role_id']) {echo "selected";} ?> 
											value="<?=$cus['role_id']?>"><?= $cus['role_name']?></option>
								<?php
								endforeach;
							endif; ?>
						</select>
						<?=  form_error('ur_id');?>
					</div> -->
					<input type="hidden" name="ur_id" value="1">
					<!-- <div class="has-borders no-icon input-style-always-active"> -->
					<div class="has-borders no-icon input-style-always-active mb-4">
						<label for="customerNumber" class="color-highlight">Mobile Number</label>
						<input type="text" class="form-control phone_with_code" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" name="phone_no" id="customerNumber" value="<?= set_value('full_phone',$ud->phone_no)?>"/>
						<div class="errorintlPhone"></div>
						<?=  form_error('full_phone');?>
					</div>
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="customerEmail" class="color-highlight">Email ID</label>
						<input type="email" id="customerEmail" name="email" class="form-control" name="email" value="<?= set_value('email',$ud->email)?>"/>
						<?=  form_error('email');?>
					</div>
					
					<input type="submit" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600" value="Update">	
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	//for admin password change
	$(document).ready(function () { 
		$("#editUser").validate({
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
						url: "<?= base_url('front/User/mobileVal/').$ud->user_id ?>",
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
						url: "<?= base_url('front/User/email_val/').$ud->user_id ?>",
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
</script>
