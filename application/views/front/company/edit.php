<style>
	.events {
		height: 100%;
		border-left-width: 1px !important;
		border-right-width: 1px !important;
		border-top-width: 1px !important;
		padding-left: 13px !important;
		padding-right: 10px !important;
		padding-top: 20px !important;
		border-radius: 10px !important;
		border-color: rgba(0, 0, 0, 0.08) !important;
		border-style: solid;
		margin-bottom: 20px;
		position: relative;
	}
</style>
	
	<div class="content-page">
		<div class="card card-style" style="margin-bottom: 100px !important;">
			<div class="content">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
				<a type="button" href="<?=base_url('front/Company')?>" class="btn btn-sm btn-primary mb-3 rounded-0 text-uppercase font-700 shadow-s" style="float:right;" >Back</a>
					<h4 class="page-title">Add Company</h4>
				</div>
			</div>     
			<!-- end page title --> 

			<div class="content">
				<form action="<?= base_url('front/Company/update/').$comDetData->cm_id ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
					<?php if(!empty($comImgs)){
						foreach($comImgs as $img){?> 
							<input type="hidden" name="old_company_images[]" value="<?= $img->cm_img_name?>"/>
						<?php } 
					} else { ?> 
						<input type="hidden" name="old_company_images[]" value=""/>
					<?php  }?>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="companyName" class="color-highlight">Company Name : <span class="text-danger">*</span></label>
						<input type="text" class="form-control" name="company_name" id="companyName" required="" value="<?= set_value('company_name',$comDetData->company_name)?>"/>
						<?=  form_error('company_name');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="companyNumber" class="color-highlight">Company Contact Number : <span class="text-danger">*</span></label>
						<input type="text" pattern="\d*" class="form-control" name="company_phone_no" maxlength="10" id="companyNumber" required="" value="<?= set_value('company_phone_no',$comDetData->company_phone_no)?>"/>
						<?=  form_error('company_phone_no');?>
					</div>
			
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="email" class="color-highlight">Email : <span class="text-danger">*</span></label>
						<input type="email" id="email" name="company_email" class="form-control" name="email" required="" value="<?= set_value('company_email',$comDetData->company_email)?>"/>
						<?=  form_error('company_email');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="companyWebsite" class="color-highlight">Company Website : </label>
						<input type="url" placeholder="http://www.google.com" id="companyWebsite" class="form-control" name="company_website" value="<?= set_value('company_website',$comDetData->company_website)?>"/>
						<?=  form_error('company_website');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="companyAddress" class="color-highlight">Company Address : <span class="text-danger">*</span></label>
						<textarea id="companyAddress" class="form-control" name="company_address"><?= set_value('company_address')?><?=$comDetData->company_address?></textarea>
						<?=  form_error('company_address');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="companyNotes" class="color-highlight">Notes : </label>
						<textarea id="companyNotes" class="form-control" name="notes"><?=$comDetData->notes?></textarea>
						<?=  form_error('notes');?>
					</div>

					<div class="file-data">
						<input type="file" name="company_logo" class="upload-file bg-highlight shadow-s rounded-s" />
						<p class="upload-file-text color-white">Select Company Logo</p>
						<input type="hidden" name="old_logo" value="<?=$comDetData->company_logo?>"/>
						<img src="<?=base_url('upload/company_logo/').$comDetData->company_logo?>" height="50%" style="width: -webkit-fill-available;" />
						<?=  form_error('company_logo');?>
					</div>

					<div class="file-data">
						<input type="file" name="company_banner" class="upload-file bg-highlight shadow-s rounded-s" />
						<p class="upload-file-text color-white">Select Company Banner</p>
						<input type="hidden" name="old_banner" value="<?=$comDetData->company_banner?>"/>
						<img src="<?=base_url('upload/company_banner/').$comDetData->company_banner?>" height="50%" style="width: -webkit-fill-available;"/>
					</div>

					<div class="file-data">
						<input type="file" name="company_video" class="upload-file bg-highlight shadow-s rounded-s" value=""/>
						<p class="upload-file-text color-white">Select Company video</p>
						<input type="hidden" name="old_video" value="<?=$comDetData->company_video?>"/>
						<iframe src="<?=base_url('upload/company_video/').$comDetData->company_video?>"></iframe>
					</div>
			
					<div class="form-check icon-check mt-3 mb-3">
						<input type="checkbox" class="form-check-input" id="customCheck1" name="old_image_remove">
						<label class="color-highlight" for="customCheck1">Check if you remove old images</label>
						<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
						<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
					</div>
					<div class="file-data">
						<input type="file" name="company_images[]" class="upload-file bg-highlight shadow-s rounded-s" multiple />	
						<p class="upload-file-text color-white">Select Company Images</p>
						<?=  form_error('company_images');?>
						<img src="">
					</div>
					
					<input type="submit" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600" value="Update">	
					
				</form>
			</div><!-- end row-->
		</div> <!-- content -->
	</div>
</div>
