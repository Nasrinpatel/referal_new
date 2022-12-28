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
									<a type="button" onclick="history.back()" class="btn btn-info waves-effect waves-light">
										<span class="btn-label"><i class="mdi mdi-keyboard-backspace"></i></span>Back
									</a>
							</div>
							<h4 class="page-title">User's View</h4>
						</div>
					</div>
				</div>     	
				<!-- end page title --> 

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
								<div class="col-lg-4"></div>
									<div class="col-lg-4">
										<div class="row">
											<div class="col-lg-12 mb-2">
												<label class="title">User Name : </label>
												<?=$ud->name?>
											</div>
											<div class="col-lg-12 mb-2">
												<label class="title">Role Name : </label>
												<?= $ud->role_name?>
											</div>
											<div class="col-lg-12 mb-2">
												<label class="title">Email : </label>
												<?=$ud->email?>
											</div>
											<div class="col-lg-12 mb-2">
												<label class="title">Phone Number : </label>
												<?=$ud->phone_no?>
											</div>
										</div>
										
									</div>
									<div class="col-lg-4"></div>
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
