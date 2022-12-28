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
		<div class="card card-style">
			<div class="content">
				
				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<a type="button" href="<?=base_url('front/Company/')?>" class="btn btn-sm btn-primary mb-3 rounded-0 text-uppercase font-700 shadow-s" style="float:right;" >Back</a>
						<h4 class="page-title">Add Company</h4>
					</div>
				</div>     
				<!-- end page title --> 
				
				<div class="content">
					<form action="<?= base_url('front/Company/store') ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="companyName" class="color-highlight font-12">Company Name : <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="company_name" id="companyName"  <?= set_value('company_name')?>/>
							<?=  form_error('company_name');?>
						</div>
					
						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="companyNumber" class="color-highlight font-12">Company Contact Number : <span class="text-danger">*</span></label>
							<input type="text" pattern="\d*" class="form-control" name="company_phone_no" maxlength="10" id="companyNumber"  <?= set_value('company_phone_no')?>/>
							<?=  form_error('company_phone_no');?>
						</div>
								
						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="email" class="color-highlight font-12">Email : <span class="text-danger">*</span></label>
							<input type="email" id="email" name="company_email" class="form-control" name="email"  <?= set_value('company_email')?>/>
							<?=  form_error('company_email');?>
						</div>

						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="companyWebsite" class="color-highlight font-12">Company Website : </label>
							<input type="url" placeholder="http://www.google.com" id="companyWebsite" class="form-control" name="company_website" <?= set_value('company_website')?>/>
							<?=  form_error('company_website');?>
						</div>
					
						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="companyAddress" class="color-highlight font-12">Company Address : <span class="text-danger">*</span></label>
							<textarea id="companyAddress" class="form-control" name="company_address"><?= set_value('company_address')?></textarea>
							<?=  form_error('company_address');?>
						</div>
					
						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="companyNotes" class="color-highlight font-12">Notes : </label>
							<textarea id="companyNotes" class="form-control" name="notes"></textarea>
							<?=  form_error('notes');?>
						</div>
				
						
						<div class="file-data">
							<input type="file" class="upload-file bg-highlight shadow-s rounded-s" name="company_logo" />
							<p class="upload-file-text color-white">Select Company Logo</p>
							<?=  form_error('company_logo');?>
							<img src="">
						</div>	
						
						<div class="file-data">
							<input type="file" class="upload-file bg-highlight shadow-s rounded-s" name="company_banner" />
							<p class="upload-file-text color-white">Select Company Banner</p>
							<img src="">
						</div>
						
						<div class="file-data">
							<input type="file" class="upload-file bg-highlight shadow-s rounded-s" name="company_video" />
							<p class="upload-file-text color-white">Select Company video</p>
							<img src="">
						</div>
					
						<div class="file-data">
							<input type="file" class="upload-file bg-highlight shadow-s rounded-s" name="company_images[]" multiple />
							<p class="upload-file-text color-white">Select Company Images</p>
							<?=  form_error('company_images');?>
							<img src="">
						</div>
					
						<input type="submit" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600" style="margin-bottom: 20%;" value="Submit">	
						
					</form>
				</div>
			</div> <!-- container -->
		</div> <!-- content -->
	</div>
	<!-- ============================================================== -->
	<!-- End Page content -->
	<!-- ============================================================== -->


</div>
<!-- END wrapper -->
