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
							<h4 class="page-title">Add Product</h4>
						</div>
					</div>
				</div>     
				<!-- end page title --> 

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url('admin/Company/comp_link_user_store') ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
									
									<div class="row">
										<div class="col-lg-12">
											<div class="mb-3">
												<div class="form-group">
													<label class="form-label">Select Company : <span class="text-danger">*</span></label>
													<select class="form-control select2-multiple" data-toggle="select2" data-width="100%" multiple="multiple" name="cm_id[]" data-placeholder="Choose ...">
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
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<div class="mb-3">
                                                    <label class="form-label">Select User : <span class="text-danger">*</span></label> <br/>
                                                    <select id="selectize-select" name="cum_id">
                                                        <option data-display="Select">--select--</option>
														<?php
														if (count($get_comp_user)) :
															foreach ($get_comp_user as $compUs) :
																?>
                                                       			<option value="<?=$compUs['cum_id']?>"><?= $compUs['name']?></option>
																   <?php
															endforeach;
														endif; ?>
                                                    </select>
													<?=  form_error('cum_id');?>
                                                </div>
											</div>
										</div>
									</div>

									<div class="row mt-2">
										<div class="col-lg-12 text-center">
											<input type="submit" class="btn btn-success" value="Submit">	
										</div>
									</div>
								</form>
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

