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
							<h4 class="page-title">Edit User Role</h4>
						</div>
					</div>
				</div>     
				<!-- end page title --> 

				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<form action="<?= base_url('admin/User/ur_update/').$ur_edit->ur_id ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
								<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
								<div class="row">
									<div class="col-lg-4">
									</div>    
									<div class="col-lg-4">
										<div class="form-group">
											<label for="inputAddress" class="col-form-label">User Role</label>
											<?php echo form_input(['name'=>'role_name','onkeypress' => 'return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' , 'class'=>'form-control','placeholder'=>'Enter User Role','autofocus'=>'autofocus','value'=>set_value('role_name',$ur_edit->role_name)]);?>
											<?php echo form_error('role_name') ;?>
										</div>
										<div class="row mt-2">
											<div class="col-sm-3">
												<label><?php echo form_checkbox('view', '1', $ur_edit->view);?>View</label>
											</div>
											<div class="col-sm-3">
												<label>	<?php echo form_checkbox('create', '1', $ur_edit->create_all);?> Create</label>
											</div> 
											<div class="col-sm-3">
												<label> <?php echo form_checkbox('edit', '1',$ur_edit->edit_all);?>Edit</label>
											</div>
											<div class="col-sm-3">
												<label>	<?php echo form_checkbox('delete', '1',$ur_edit->delete_all);?>Delete</label>
											</div>
										</div> 
										<div class="row mt-2">
											<div class="col-sm-3">
												<label>	<?php echo form_checkbox('import', '1', $ur_edit->import_all);?>Import</label>
											</div> 
												
											<div class="col-sm-3">
												<label>	<?php echo form_checkbox('export', '1', $ur_edit->export_all);?>Export</label>
											</div> 
											<div class="col-sm-4">
												<label>	<?php echo form_checkbox('view_all', '1', $ur_edit->view_all);?>View Own</label>
											</div>    
										</div>
										
										<div class="form-group mt-2 text-center">
											<?php echo form_submit(['name'=>'update','value'=>'Update','class'=>'btn btn-primary waves-effect waves-light']); ?>
											<?php echo form_reset(['name'=>'Reset','value'=>'Reset','class'=>'btn btn-white waves-effect waves-light']); ?>
										</div>
									</div>        
									<div class="col-lg-4">
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

