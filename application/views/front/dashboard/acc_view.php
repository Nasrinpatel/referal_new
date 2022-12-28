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
									<div class="col-lg-3"></div> <!-- end col--2 -->
									<div class="col-lg-6">
										<div class="p-sm-3">
											<!-- <h4 class="mt-3 mt-lg-0">Free Sign Up</h4>
											<p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p> -->

											<form action="<?= base_url('admin/Dashboard/update_acc/').$accDet->user_id ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
											<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
												<div class="mb-3">
													<label for="fullname" class="form-label">Full Name</label>
													<input class="form-control" type="text" name="name" placeholder="Enter your name" value="<?= set_value('name',$accDet->name) ?>" required>
												</div>
												<div class="mb-3">
													<label for="emailaddress2" class="form-label">Email address</label>
													<input class="form-control" type="email" name="email" value="<?= set_value('email',$accDet->email) ?>" required placeholder="Enter your email">
												</div>
												
												<div class="mb-0 text-center">
													<input type="submit" class="btn btn-success" value="Update"/>
													<!-- <div class="form-check pt-1">
														<input type="checkbox" class="form-check-input" id="checkbox-signup">
														<label class="form-check-label" for="checkbox-signup">I accept <a href="javascript: void(0);" class="text-dark">Terms and Conditions</a></label>
													</div> -->
												</div>
											</form>
										</div>
									</div> <!-- end col 8-->
									<div class="col-lg-3"></div>
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
