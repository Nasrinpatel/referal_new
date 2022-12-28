<style>
	.form-checkbox{
		width: 1.2em;
		height: 1.2em;
		margin-top: 0.25em;
		vertical-align: top;
		background-color: #fff;
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
		border: 1px solid rgba(0, 0, 0, 0.25);
	}
</style>
<div class="content-page">
	<div class="card card-style">
		<div class="content">
			
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<a type="button" href="<?=base_url('front/User_role')?>" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s btn btn-primary" style="float:right;" >Back</a>
					<h4 class="page-title">Add User Role</h4>
				</div>
			</div>     
			<!-- end page title --> 
			
			<div class="content">
				<form action="<?= base_url('front/User_role/ur_store') ?>" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
						
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="inputAddress" class="color-highlight">User Role</label>
						<?php echo form_input(['name'=>'role_name','onkeypress' => 'return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))' , 'class'=>'form-control','placeholder'=>'Enter User Role','autofocus'=>'autofocus','value'=>set_value('role_name')]);?>
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
							<tr>
								<td>Company<input type="hidden" name="role[]" value="company"/></td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="company_view" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="company_create" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="company_edit" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="company_delete" type="checkbox" value="1" checked/>
									</div>
								</td>
							</tr>
							<tr>
								<td>Referral<input type="hidden" name="role[]" value="customer"/></td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="customer_view" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="customer_create" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="customer_edit" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="customer_delete" type="checkbox" value="1" checked/>
									</div>
								</td>
							</tr>
							<tr>
								<td>User<input type="hidden" name="role[]" value="user"/></td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="user_view" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="user_create" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="user_edit" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="user_delete" type="checkbox" value="1" checked/>
									</div>
								</td>
							</tr>
							<tr>
								<td>User Role<input type="hidden" name="role[]" value="user_role"/></td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="user_role_view" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="user_role_create" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="user_role_edit" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="user_role_delete" type="checkbox" value="1" checked/>
									</div>
								</td>
							</tr>
							<tr>
								<td>Referral Fee<input type="hidden" name="role[]" value="commission"/></td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="commission_view" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="commission_create" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="commission_edit" type="checkbox" value="1" checked/>
									</div>
								</td>
								<td>
									<div class="form-check">
										<input class="form-check-input font-18" id="" name="commission_delete" type="checkbox" value="1" checked/>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
						
					<?php echo form_submit(['name'=>'save','value'=>'Save','class'=>'btn btn-full btn-m gradient-highlight rounded-s font-13 font-600']); ?>    
				</form>
			</div><!-- end row-->
		</div> <!-- container -->
	</div> <!-- content -->
</div>

