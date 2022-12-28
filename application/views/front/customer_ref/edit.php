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
							<h4 class="page-title">Edit Referral</h4>
						</div>
					</div>
				</div>     
				<!-- end page title --> 

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url('admin/Customer_referral/update/').$cusRefData->cr_id ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<div class="mb-3">
													<label class="form-label">Select Company : <span class="text-danger">*</span></label>
													<select class="form-control select2-multiple" data-toggle="select2" data-width="100%" multiple="multiple" name="cm_id[]" data-placeholder="Choose ...">
														<?php
															$cm_ids = 0;
															foreach ($cusRefCom as $id){$cm_ids .= ",".$id->cm_id;}
					 
															$cmId = explode(",",$cm_ids);
															// print_r( $comDetData);
															if (count($get_comp_name)){	
																foreach ($get_comp_name as $cat){
																?>
																<option value="<?= $cat['cm_id'] ?>"
																	<?php echo (in_array($cat['cm_id'], $cmId)) ? 'selected':''; ?>>
																	<?= $cat['company_name']; 
																	?>
																</option>
															<?php
																}
															}
														?>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<div class="mb-3">
													<label for="customerName" class="form-label">Reference By : <span class="text-danger">*</span></label>
													<select id="selectize-select" name="cus_id">
                                                        <option data-display="Select">--select--</option>
														<?php
														if (count($get_cus)) :
															foreach ($get_cus as $cus) :
															?>
                                								<option value="<?=$cus['cus_id']?>" <?= $cus['cus_id']==$cusRefData->cus_id ? 'selected' : '' ?>><?= $cus['customer_name']?></option>
															<?php
															endforeach;
														endif; ?>
                                                    </select>
													<?=  form_error('cus_id');?>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<div class="mb-3">
													<label for="customerName" class="form-label">Referral Name : <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="customer_name" id="customerName" required="" value="<?= set_value('customer_name',$cusRefData->customer_name)?>"/>
													<?=  form_error('customer_name');?>
												</div>
											</div>
										</div>
										
									</div>
										
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<div class="mb-3">
													<label for="customerNumber" class="form-label">Referral Contact Number : <span class="text-danger">*</span></label>
													<input type="text" pattern="\d*" class="form-control" name="customer_phone_no" maxlength="10" id="customerNumber" required="" value="<?= set_value('customer_phone_no',$cusRefData->customer_phone_no)?>"/>
													<?=  form_error('customer_phone_no');?>
												</div>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<div class="mb-3">
													<label for="customerEmail" class="form-label">Email ID : <span class="text-danger">*</span></label>
													<input type="email" id="customerEmail" name="customer_email" class="form-control" name="email" required="" value="<?= set_value('customer_email',$cusRefData->customer_email)?>"/>
													<?=  form_error('customer_email');?>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<div class="mb-3">
													<label for="customerAddress" class="form-label">Customer Address : </label>
													<textarea id="customerAddress" class="form-control" name="customer_address"><?= set_value('customer_address',$cusRefData->customer_address)?></textarea>
													<?=  form_error('customer_address');?>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row mt-2">
										<div class="col-lg-12 text-center">
											<input type="submit" class="btn btn-success" value="Update">	
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
