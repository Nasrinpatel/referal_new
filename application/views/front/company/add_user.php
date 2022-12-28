
<div class="content-page">
	<div class="card card-style">
		<div class="content">

			<!-- start page title -->
			<div class="row mb-0">
				<div class="col-12">
					<a type="button" href="<?=base_url('front/Company/user_index/'.$cm_id)?>" class="btn btn-sm btn-primary mb-3 rounded-0 text-uppercase font-700 shadow-s" style="float:right;" >Back</a>
					<h4 class="page-title">Add User</h4>
				</div>
			</div>     
			<!-- end page title --> 

			<!-- Start Content-->
			<div class="content">
				
				<form action="<?= base_url('front/Company/user_store') ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
					<input type="hidden" name="cmId" value="<?=$cm_id?>" />
					
					<div class="has-borders no-icon input-style-always-active mb-3">
						<label class="color-highlight font-10">Select Company</label>
						<select name="cm_id[]" class="form-control js-example-basic-single" multiple="multiple">
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

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="userName" class="color-highlight font-10">Name</label>
						<input type="text" class="form-control" name="name" id="userName" placeholder="Enter your name" value="<?= set_value('name')?>"/>
						<?=  form_error('name');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="email" class="color-highlight font-10">Email</label>
						<input type="email" id="email" name="email" class="form-control" name="email" placeholder="abcd123@gmail.com"  value="<?= set_value('email')?>"/>
						<?=  form_error('email');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="userName" class="color-highlight font-10">Designation</label>
						<input type="text" class="form-control" name="designation" id="userName" placeholder="Enter designation" value="<?= set_value('designation')?>"/>
						<?=  form_error('designation');?>
					</div>
									
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="password" class="color-highlight font-10">Password</label>
						<input class="form-control" name="password" type="password" required id="password" placeholder="Enter your password"  value="<?= set_value('password')?>">
						<?=  form_error('password');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="CnfPassword" class="color-highlight font-10">Confirm Password</label>
						<input class="form-control" name="confirm_pass" type="password" required id="CnfPassword" placeholder="Enter your Confirm password"  value="<?= set_value('confirm_pass')?>">
						<?=  form_error('confirm_pass');?>
					</div>
			
					<input type="submit" id="compUserSave" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4" value="Submit">	
				</form>
									
			</div> <!-- container -->
		</div>
	</div> <!-- content -->
</div>
<script>
	//for admin password change
	$(document).on('change','#CnfPassword',function(){
		var newPass = $('#password').val();
		var cnfPass = $(this).val();
		if(newPass != cnfPass){
			error_message('error','Confirm password not match with new password');
			$('#password').val('');
			$(this).val('');
			$('#compUserSave').attr('disabled','disabled');
		}else{
			$('#compUserSave').removeAttr('disabled','disabled');
		}
	});
</script>
