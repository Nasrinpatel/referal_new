	<!-- ============================================================== -->
	<!-- Start Page Content here -->
	<!-- ============================================================== -->

	<div class="content-page">
		<div class="content">

			<!-- Start Content-->
			<div class="container-fluid">
				
				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<div class="page-title-box">
							<div class="page-title-right">
								<ol class="breadcrumb m-0"></ol>
									<a onclick="history.back()" class="btn btn-info waves-effect waves-light">
										<span class="btn-label"><i class="mdi mdi-keyboard-backspace"></i></span>Back
									</a>
							</div>
							<h4 class="page-title">Edit Account</h4>
						</div>
					</div>
				</div>     
				<!-- end page title --> 

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-3"></div> <!-- end div col--3 -->
									<div class="col-lg-6">
										<div class="p-sm-3">
											<!-- <h4 class="mt-3 mt-lg-0">Free Sign Up</h4>
											<p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p> -->
											<form action="<?= base_url('admin/Dashboard/pass_update/').$accDet->user_id ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
											<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
												<div class="mb-3">
													<label for="" class="form-label">Old Password</label>
													<input class="form-control" type="password" name="old_pass" placeholder="Enter your old password" value="<?= set_value('old_pass') ?>" required>
													<input type="hidden" name="old_pass_hid" value="<?= $accDet->password ?>"/>
													<?= form_error('old_pass') ?>
												</div>
												<div class="mb-3">
													<label for="" class="form-label">New Password</label>
													<input class="form-control" type="password" id="newPass" name="new_pass" placeholder="Enter your new password" value="<?= set_value('new_pass') ?>" required>
													<?= form_error('new_pass') ?>
												</div>
												<div class="mb-3">
													<label for="" class="form-label">Confirm Password</label>
													<input class="form-control" type="password" id="confPass" name="cnf_pass" value="<?= set_value('cnf_pass') ?>" required placeholder="Enter confirm password">
													<?= form_error('cnf_pass') ?>
												</div>
												<div class="mb-0 text-center">
													<input type="submit" id="updatePass" class="btn btn-success" value="Update"/>
												</div>
											</form>
										</div>
									</div> <!-- end div col 6-->
									<div class="col-lg-3"></div> <!-- end div col--3 -->
								</div>
							</div>
						</div> <!-- end card-->
					</div> <!-- end col-->
				</div><!-- end row-->

			</div> <!-- container -->
		</div> <!-- content -->
	</div>
	<!-- ============================================================== -->
	<!-- End Page content -->
	<!-- ============================================================== -->


</div>
<!-- END wrapper -->
