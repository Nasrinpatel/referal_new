<style>
	.events {
		height: 100%;
		border-left-width: 1px !important;
		border-right-width: 1px !important;
		border-top-width: 1px !important;
		padding-left: 13px !important;
		padding-right: 10px !important;
		padding-top: 20px !important;
		border-radius: 10px !important;
		border-color: rgba(0, 0, 0, 0.08) !important;
		border-style: solid;
		margin-bottom: 20px;
		position: relative;
	}
	.event_title {
		opacity: 1;
		left: 23px !important;
		transform: translateX(-14px) !important;
		margin-left: 0px !important;
		position: absolute;
		padding: 0px 5px !important;
		height: 23px;
		font-size: 12px;
		top: -12px;
		transition: all 250ms ease;
		background-color: #FFF;
	}
</style>
<div class="content-page">
	<div class="card card-style" style="margin-bottom: 100px !important;">
		<div class="content">
			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<a type="button" href="<?=base_url('front/Quotation/index/pending')?>" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s btn btn-primary" style="float:right;" >Back</a>
					<h6 class="page-title">Add New Quotation <br/> Proposal <br/> Estimate</h6>
				</div>
			</div>     
			<!-- end page title --> 
			
			<div class="content">
				<form action="<?= base_url('admin/Quotation/store') ?>" id="" method="post" role="form" enctype="multipart/form-data" data-toggle="validator" >
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?=$this->security->get_csrf_hash()?>" />
					
					
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="qutSubject" class="color-highlight">Subject : <span class="text-danger">*</span></label>
						<input type="text" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" id="qutSubject" class="form-control" name="qut_subject" value="<?= set_value('qut_subject')?>" />
						<?=  form_error('qut_subject');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="qutSubject" class="color-highlight">Select Company : <span class="text-danger">*</span></label>
						<select id="selectize-select" class="form-control" name="cm_id">
							<option data-display="Select">--select--</option>
							<?php
							if (count($get_comp_name)) :
								foreach ($get_comp_name as $cn) :
								?>
									<option <?php if (set_value('cm_id')== $cn['cm_id']) {echo "selected";} ?> 
											value="<?= $cn['cm_id'] ?>" ><?= $cn['company_name'] ?></option>
								<?php
								endforeach;
							endif; ?>
						</select>
						<?=  form_error('cm_id');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="productName" class="color-highlight">Select Customer : <span class="text-danger">*</span></label>
						<select id="selectize-select" name="qut_cus_id" class="form-control refer_change" >
							<option data-display="Select">--select--</option>
							<?php
							if (count($get_cus)) :
								foreach ($get_cus as $cus) :
								?>
									<option <?php if (set_value('qut_cus_id')== $cus['cus_id']) {echo "selected";} ?> 
											value="<?=$cus['cus_id']?>" data-refer="<?= $cus['reference_by'] ?>" ><?= $cus['customer_name']?></option>
									<?php
								endforeach;
							endif; ?>
						</select>
						<?=  form_error('qut_cus_id');?>
						<span id="refer_by" style="display: none;"></span>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="add" class="color-highlight">Address : </label>
						<textarea style="height: 130px;" id="add" class="form-control" name="qut_add"><?= set_value('qut_add')?></textarea>
						<?=  form_error('qut_add');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="dateCreate" class="color-highlight">Date Created : <span class="text-danger">*</span></label>
						<input type="date" class="form-control" name="qut_created" id="dateCreate" <?= set_value('qut_created')?>/>
						<?=  form_error('qut_created');?>
					</div>

					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="dateExpire" class="color-highlight">Date Expired : <span class="text-danger">*</span></label>
						<input type="date" class="form-control" name="qut_expired" id="dateExpire" <?= set_value('qut_expired')?>/>
						<?=  form_error('qut_expired');?>
					</div>
					
					<div class="input-style has-borders no-icon input-style-always-active">
						<label for="" class="color-highlight">Status : <span class="text-danger">*</span></label>
						<select name="qut_status" class="form-control" >
							<option value="pending">Pending</option>
							<option value="cancel">Cancel</option>
							<option value="confirm">Confirm</option>
						</select>
						<?=  form_error('qut_status');?>
					</div>
					
					<div class="events">
						<label class="color-highlight event_title" > Add Product's  </label>

						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="item_name" class="color-highlight">Item</label>
							<input type="text" class="form-control item_name" onkeypress="return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))" name="qut_item_name[]" id="item_name" placeholder="Item Name">
						</div>

						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="qty_hrs" class="color-highlight">Qty/Hr</label>
							<input type="text" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control qty_hrs" name="qut_qty_hrs[]" id="qty_hrs" value="1">
						</div>

						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="unit_price" class="color-highlight">Unit Price</label>
							<input class="form-control unit_price" type="text" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" name="qut_unit_price[]" value="0" id="unit_price" />
						</div>

						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="profession" class="color-highlight">Sub Total</label>
							<input type="text" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control sub-total-item" readonly="readonly" name="qut_sub_total_item[]" value="0" />
							<p style="display:none" class="form-control-static"><span class="amount-html">0</span></p>
						</div>

						<div class="input-style has-borders no-icon input-style-always-active">
							<label for="profession">&nbsp;</label>
							<button type="button" disabled="disabled" class="btn icon-btn btn-sm btn-outline-secondary waves-effect waves-light" data-repeater-delete=""> <span class="fa fa-trash"></span></button>
						</div>
					
						<div id="item-list"></div>
						<div class="form-group overflow-hidden1">
							<div class="col-xs-12">
							<button type="button" data-repeater-create="" class="btn btn-sm btn-primary" id="add-invoice-item">
							Add Item                          </button>
							</div>
						</div>
					</div>

					<input type="hidden" class="items-sub-total" name="qut_sub_total" value="0" />

					<div class="row">
						<div class="col-md-6 col-sm-12 text-xs-center text-md-left">
						<div class="table-responsive">
								<table class="table">
								<tbody>
									
									<tr>
										<td colspan="2" style="border-bottom:1px solid #dddddd; padding:0px !important; text-align:left"><table class="table table-bordered">
											<thead>
												<tr>
												<th width="30%" style="border-bottom:1px solid #dddddd; text-align:left">Discount Type</th>
												<th style="border-bottom:1px solid #dddddd; text-align:center">Discount</th>
												<th style="border-bottom:1px solid #dddddd; text-align:left">Discount Amount</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="input-style has-borders no-icon input-style-always-active">
															<select name="qut_discount_type" class="form-control discount_type">
																<option value="1">Flat</option>
																<option value="2">Percent</option>
															</select>
														</div>
													</td>
													<td>
														<div class="input-style has-borders no-icon input-style-always-active">
															<input style="text-align:right" type="text" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" name="qut_discount_figure" class="form-control discount_figure" value="0" data-valid-num="required">
														</div>
													</td>
													<td>
														<div class="input-style has-borders no-icon input-style-always-active">
															<input type="text" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" style="text-align:right" readonly="" name="qut_discount_amount" value="0" class="discount_amount form-control">
														</div>
													</td>
												</tr>
											</tbody>
											</table>
										</td>
									</tr>
								</tbody>
								
								</table>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="table-responsive">
								<table class="table">
									<tbody>
										<tr>
											<td colspan="2" style="border-bottom:1px solid #dddddd; padding:0px !important; text-align:left"><table class="table table-bordered">
											<thead>
												<tr>
													<th width="50%" style="border-bottom:1px solid #dddddd; text-align:left">Tax Type</th>
													<th style="border-bottom:1px solid #dddddd; text-align:left">Tax Rate</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="input-style has-borders no-icon input-style-always-active">
															<select name="qut_tax_type" class="form-control tax_type">
																<option tax-type="percentage" tax-rate="10" value="capital_gains_10_per"> Capital Gains (10%)</option>
																<option tax-type="percentage" tax-rate="5" value="value_added_tax_5_per"> Value-Added Tax (5%)</option>
																<option tax-type="fixed" tax-rate="12" value="excise_tax_12_fix"> Excise Taxes ($12.00)</option>
																<option tax-type="percentage" tax-rate="8" value="wealth_tax_8_per"> Wealth Taxes (8%)</option>
																<option tax-type="fixed" tax-rate="0" value="no_tax"> No Tax ($0.00)</option>
															</select>
														</div>
													</td>
													<td align="right">
														<div class="input-style has-borders no-icon input-style-always-active">
															<input type="text" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" style="text-align:right" readonly="" name="qut_tax_rate" value="0" class="tax_rate form-control">
														</div>
													</td>
												</tr>
											</tbody>
											</table>
											</td>
										</tr>
										
										<tr>
											<td>Sub Total : </td>
											<td class="text-xs-right">USD : <span class="sub_total">0</span></td>
										</tr>
										<tr>
											<td>Grand Total : </td>
											<td class="text-xs-right">USD : <span class="grand_total">0</span>
												<input type="hidden" class="fgrand_total" name="qut_grand_total" value="0" />
												<?= form_error('qut_grand_total') ?>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div class="row mt-2">
						<div class="col-lg-12 text-center">
							<input type="submit" class="btn btn-success" value="Submit">	
						</div>
					</div>
				</form>
			</div><!-- content -->
		</div> <!-- content -->
	</div> 
</div>

