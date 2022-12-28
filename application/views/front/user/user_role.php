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
                                        <!-- <ol class="breadcrumb m-0">
											<li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                            <li class="breadcrumb-item active">User role</li>
										</ol> -->
										<a type="button" class="btn btn-danger waves-effect waves-light me-1" href="<?=base_url('admin/User/user_role_add')?>" ><i class="mdi mdi-plus-circle me-1"></i> Add User Role</a>
                                    </div>
                                    <h4 class="page-title">User Role</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
							<div class="col-12">
                                <div class="card">
									<div class="card-body">
									<!-- <span class="btn btn-sm btn-primary waves-effect waves-light" title="I&#39;m a Tippy tooltip!" tabindex="0" data-plugin="tippy" data-tippy-animation="shift-away" data-tippy-arrow="true">Shift away</span> -->
										<table id="basic-datatable" class="table dt-responsive w-100 compact stripe">
											<thead>
												<th>#</th>
												<th>User Role</th>
												<th>View</th>
												<th>Create</th>
												<th>Edit</th>
												<th>Delete</th>
												<th>Import</th>
												<th>Export</th>
												<th>View Own</th>
												<th>Action</th>
											</thead>
											<tbody>
												<?php
													$count=0;
													foreach($user_role as $ur){
														$count++;
												?>
												<tr>
													<td><?= $count; ?></td>
													<td><?= $ur->role_name; ?></td>
													<td><?php if($ur->view==1){ echo"<i class='fe-check'></i>"; }else{ echo"<i class='fe-x'></i>"; } ?></td>
													<td><?php if($ur->create_all==1){ echo"<i class='fe-check'></i>"; }else{ echo"<i class='fe-x'></i>"; } ?></td>
													<td><?php if($ur->edit_all==1){ echo"<i class='fe-check'></i>"; }else{ echo"<i class='fe-x'></i>"; } ?></td>
													<td><?php if($ur->delete_all==1){ echo"<i class='fe-check'></i>"; }else{ echo"<i class='fe-x'></i>"; } ?></td>
													<td><?php if($ur->import_all==1){ echo"<i class='fe-check'></i>"; }else{ echo"<i class='fe-x'></i>"; } ?></td>
													<td><?php if($ur->export_all==1){ echo"<i class='fe-check'></i>"; }else{ echo"<i class='fe-x'></i>"; } ?></td>
													<td><?php if($ur->view_all==1){ echo"<i class='fe-check'></i>"; }else{ echo"<i class='fe-x'></i>"; } ?></td>
													<td>
														<div class="button-list">
															<a class="btn btn-warning btn-xs" href="<?= base_url('admin/User/user_role_edit/'.$ur->ur_id);?>" data-toggle="tooltip" title="Edit"><span class="fe-edit"></spn></a>
															<a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure want to delete ?')"  href="<?= base_url().'admin/User/user_role_delete/'.$ur->ur_id; ?>"  data-toggle="tooltip" title="Delete"><span class="fe-trash-2"></span></a>
														</div>    
													</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="text-end">
									<?php // echo $this->pagination->create_links(); ?>
                                </div>
                            </div>
                        </div> <!-- end row -->
                    </div> <!-- container -->
                </div> <!-- content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
