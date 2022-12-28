	<div class="content-page">
		<div class="card card-style">
			<div class="content">
				
				<!-- start page title -->
				<div class="row">
					<div class="col-12">
						<a type="button" href="<?=base_url('front/User_role')?>" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s btn btn-primary" style="float:right;" >Back</a>
						<h4 class="page-title">Edit User Role</h4>
					</div>
				</div>     
				<!-- end page title --> 
				
				<div class="content">
					<form action="<?= base_url('front/User_role/ur_update/').$ur_edit['role']->role_id ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
						<div class="row">
							
							<div class="input-style has-borders no-icon input-style-always-active">
								<label for="inputAddress" class="color-highlight">User Role</label>
								<?php echo form_input(['name'=>'role_name','onkeypress' => 'return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' , 'class'=>'form-control','placeholder'=>'Enter User Role','autofocus'=>'autofocus','value'=>set_value('role_name',$ur_edit['role']->role_name)]);?>
								<?php echo form_error('role_name') ;?>
							</div>
							
							<table class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap" id="userTable">
								<thead>
									<tr class="bg-blue-dark">
										<th></th>
										<th>View</th>
										<th>Add</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($ur_edit['permission'] as $ur){?>
									<tr>
										<input type="hidden" name="role[]" value="<?=$ur->module_name?>"/>
										<input type="hidden" name="upId[]" value="<?=$ur->up_id?>"/>
										<td><?= ucfirst(str_replace('_',' ',$ur->module_name))?></td>
										<td>
											<div class="form-check">
												<input class="form-check-input font-18" id="" name="<?=$ur->module_name?>_view" type="checkbox" value="1" <?= $ur->view == '1' ? 'checked' : ''?>/>
											</div>
										</td>
										<td>
											<div class="form-check">
												<input class="form-check-input font-18" id="" name="<?=$ur->module_name?>_create" type="checkbox" value="1" <?= $ur->create_all == '1' ? 'checked' : ''?>/>
											</div>
										</td>
										<td>
											<div class="form-check">
												<input class="form-check-input font-18" id="" name="<?=$ur->module_name?>_edit" type="checkbox" value="1" <?= $ur->edit_all == '1' ? 'checked' : ''?>/>
											</div>
										</td>
										<td>
											<div class="form-check">
												<input class="form-check-input font-18" id="" name="<?=$ur->module_name?>_delete" type="checkbox" value="1" <?= $ur->delete_all == '1' ? 'checked' : ''?>/>
											</div>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
								
							<?php echo form_submit(['name'=>'update','value'=>'Update','class'=>'btn btn-full btn-m gradient-highlight rounded-s font-13 font-600']); ?>
							      
						</div> 
					</form>
				</div><!-- end row-->
			</div> <!-- container -->
		</div> <!-- content -->
	</div>
