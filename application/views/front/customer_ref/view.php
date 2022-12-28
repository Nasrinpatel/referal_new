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
							<h4 class="page-title">View Company Referral</h4>
						</div>
					</div>
				</div>     
				<!-- end page title --> 

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 mb-2">
										<label class="form-label">Companies Name : </label>
										<?php foreach($cusRefComp as $crc){
											echo "<span class='form-label'>".$crc->company_name."</span>&nbsp&nbsp";
										}
										?>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 mb-2">
										<label class="form-label">Reference By : </label>
										<?=  $cusRefData->cus_name;?>
									</div>	
									<div class="col-lg-6 mb-2">
										<label class="form-label">Name : </label>
										<?=  $cusRefData->customer_name;?>
									</div>
									<div class="col-lg-6 mb-2">
										<label class="form-label">Contact Details : </label>
										<?= $cusRefData->customer_phone_no;?>
									</div>
									<div class="col-lg-6 mb-2">
										<label class="form-label">Email Id : </label>
										<?=  $cusRefData->customer_email;?>
									</div>
								</div>
								<div class="row">	
									<div class="col-lg-8">
										<label class="form-label">Address : </label>
										<?= $cusRefData->customer_address;?>										
									</div>
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
