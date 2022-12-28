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
                                        <ol class="breadcrumb m-0">
											<a type="button" onclick="history.back()" style="margin-right: 10px;" class="btn btn-info waves-effect waves-light">
												<span class="btn-label"><i class="mdi mdi-keyboard-backspace"></i></span>Back
											</a>
											<?php /* <a type="button" href="<?=base_url('admin/Company/edit/').$getCompPro->cm_id?>" style="margin-right: 10px;" class="btn btn-primary waves-effect waves-light">
												<span class="btn-label"><i class="mdi mdi-account-edit"></i></span>edit
											</a>
											<!-- <a type="button" href="<?php //base_url('admin/Company/add_user/').$getCompPro->cm_id?>" style="margin-right: 10px;" class="btn btn-primary waves-effect waves-light">
												<span class="btn-label"><i class="mdi mdi-account-plus"></i></span>Add User
											</a> -->
											<a type="button" href="<?=base_url('admin/Company/delete/').$getCompPro->cm_id?>" onclick="return confirm('Are you sure you want to delete this company?');" id="" class="btn btn-danger waves-effect waves-light">
												<span class="btn-label"><i class="mdi mdi-delete"></i></span>Delete
											</a> */ ?>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Company Products</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
										<div class="row">
											<div class="col-lg-12">
												<table id="basic-datatable" class="table dt-responsive w-100">
													<thead>
														<th>#</th>
														<th>Image</th>
														<th>Name</th>
														<th>Code</th>
														<th>Rate</th>
														<th>Commission</th>
														<th>Created</th>
													</thead>
													<?php 
														$count=0;
														foreach($getCompPro as $cp){
														$count++;
													?>
													<tbody>
														<tr>
															<td><?= $count ?></td>
															<td>'<img src="<?= base_url('upload/product_images/').$cp->product_image?>" height="20" weight="20"  class="avatar-md" /></td>
															<td><?= $cp->product_name ?></td>
															<td><?= $cp->product_code ?></td>
															<td><?= $cp->product_rate ?></td>
															<td><?= $cp->product_commission ?></td>
															<td><?= $cp->created?></td>
														</tr>
													</tbody>
													<?php 
													} ?>
												</table>
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
