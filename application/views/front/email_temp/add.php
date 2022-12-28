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
						<a type="button" href="<?=base_url('front/Email_template/')?>" class="btn btn-sm btn-primary mb-3 rounded-0 text-uppercase font-700 shadow-s" style="float:right;" >Back</a>
						<h4 class="page-title">Add Email Template</h4>
					</div>
				</div>     
				<!-- end page title --> 
				
				<div class="content">
					<form action="<?= base_url('front/Email_template/store') ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="companyName" class="color-highlight font-12">For</label>
							<input type="text" class="form-control" name="email_for" id="companyName"  <?= set_value('email_for')?>/>
							<?=  form_error('email_for');?>
						</div>
								
						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="email" class="color-highlight font-12">Subject</label>
							<input type="text" id="email" name="email_subject" class="form-control" name="email"  <?= set_value('email_subject')?>/>
							<?=  form_error('email_subject');?>
						</div>
						<!-- <p class="text-danger" style="margin-bottom:10px ;">*Values in the square brackets like [Username], can't be changed make sure you are correct formate for these values. No New Value will be acceptable.</p> -->
						<div class="has-borders no-icon input-style-always-active">
							<label for="companyAddress" class="color-highlight font-12">Email</label>
							<textarea id="editor1" name="email"><?= set_value('email')?></textarea>
							<?=  form_error('email');?>
						</div>
						<script>
							
							
						</script>
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
<script>
	$(document).ready(function(){
		
	});
</script>
