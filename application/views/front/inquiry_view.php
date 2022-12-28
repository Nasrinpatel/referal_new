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

	.team {
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

	.event_details {
		height: 100%;
		border-left-width: 1px !important;
		border-right-width: 1px !important;
		border-top-width: 1px !important;
		padding-left: 13px !important;
		padding-right: 10px !important;
		padding-top: 12px !important;
		border-radius: 10px !important;
		border-color: rgba(0, 0, 0, 0.08) !important;
		border-style: solid;
		margin-bottom: 10px;
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

	.event_btn {
		opacity: 1;
		right: 13px !important;
		transform: translateX(-14px) !important;
		margin-left: 0px !important;
		position: absolute;
		padding: 0px 5px !important;
		height: 23px;
		font-size: 12px;
		top: -12px;
		transition: all 250ms ease;
	}

	.event_remove_btn {
		opacity: 1;
		right: 0 !important;
		transform: translateX(-14px) !important;
		margin-left: 0px !important;
		position: absolute;
		padding: 0px 0px !important;
		height: 23px;
		font-size: 15px;
		top: -12px;
		transition: all 250ms ease;
	}

	.artists {
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

	.artist_details {
		height: 100%;
		border-left-width: 1px !important;
		border-right-width: 1px !important;
		border-top-width: 1px !important;
		padding-left: 10px !important;
		padding-right: 10px !important;
		padding-top: 12px !important;
		border-radius: 10px !important;
		border-color: rgba(0, 0, 0, 0.08) !important;
		border-style: solid;
		margin-bottom: 10px;
		position: relative;
	}

	.artist_title {
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

	.artist_btn {
		opacity: 1;
		right: 13px !important;
		transform: translateX(-14px) !important;
		margin-left: 0px !important;
		position: absolute;
		padding: 0px 5px !important;
		height: 23px;
		font-size: 12px;
		top: -12px;
		transition: all 250ms ease;
	}

	.artist_remove_btn {
		opacity: 1;
		right: 0 !important;
		transform: translateX(-14px) !important;
		margin-left: 0px !important;
		position: absolute;
		padding: 0px 0px !important;
		height: 23px;
		font-size: 15px;
		top: -12px;
		transition: all 250ms ease;
	}
</style>
<script>var minBudget = [];</script>
<div class="page-content pb-5">
	<div class="card card-style">
		<div class="content">
			<!-- <p class="mb-n1 color-highlight font-600 font-12">Edit your Account</p> -->
			<h4>Inquiry Form</h4>
			<!-- <p>Public information that shows on top of your card in your profile page. This is just a dummy page.</p>-->
			<form action="<?= base_url('front/inquiry/inquirySave') ?>" enctype="" method="post" role="form" data-toggle="validator"  >
				<div class="content m-0">
					<div class="mt-5 mb-3">
						<div class="row mb-1">
							<div class="col-6 mb-3">
								<div class="form-check icon-check">
									<input class="form-check-input" type="radio" name="inquiry_type" checked value="cl" id="client">
									<label class="form-check-label font-10" for="client">Client</label>
									<i class="icon-check-1 fa fa-circle color-gray-dark font-16"></i>
									<i class="icon-check-2 fa fa-check-circle font-16 color-highlight"></i>
								</div>
							</div>
							<div class="col-6 mb-3">
								<div class="form-check icon-check">
									<input class="form-check-input" type="radio" name="inquiry_type" value="ag" id='agency'>
									<label class="form-check-label font-10" for="agency">Agency</label>
									<i class="icon-check-1 fa fa-circle color-gray-dark font-16"></i>
									<i class="icon-check-2 fa fa-check-circle font-16 color-highlight"></i>
								</div>
							</div>
						</div>
					</div>

					<div id='agency_div' style='display:none'>
						<div class="input-style has-borders no-icon input-style-always-active mb-4">
							<label for="form1" class="color-highlight font-10">Agency</label>
							<em>(required)</em>
							<select name="agency_id" id='agency_details' >
								<option value="" selected>Select</option>
								<?php
								foreach ($Agency as $ag) { ?>
									<option <?php if (set_value('agency_id')== $ag['id']) {echo "selected"; }?>
											value="<?= $ag['id'] ?>"><?= $ag['agency_name'] ?></option>
								<?php }
								?>
							</select>
						</div>

						<div id='business1' style='display:none'>
							<div class="row mb-0 text-center">
								<div class="col-4">
									<a href="#" class="chip chip-s bg-gray-light">
										<strong id="ag_name" class="color-black font-400"></strong>
									</a>
								</div>
								<div class="col-4">
									<a href="#" class="chip chip-s bg-gray-light">
										<strong id="ag_phone" class="color-black font-400"></strong>
									</a>
								</div>
								<div class="col-4">
									<a href="#" class="chip chip-s bg-gray-light">
										<strong id="ag_add" class="color-black font-400"></strong>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- <div id='agency_contact_div' style='display:none'> -->
					
					<div id='agency_contact_div' style='display:none'>
						<div class="input-style has-borders no-icon input-style-always-active mb-4">
							<label for="form1" class="color-highlight font-10">Contact Person</label>
							<em>(required)</em>
							<select name="agency_contact_person" id='agency_contact_details' >
								<option value="" selected>Select</option>
								<?php
								foreach ($AgCp as $agcp) { ?>
									<option <?php if (set_value('agency_contact_person')== $agcp['contact_id']) {echo "selected"; }?>
											value="<?= $agcp['contact_id'] ?>"><?= $agcp['name'] ?></option>
								<?php }
								?>
							</select>
						</div>
						<div id='business2' style='display:none;'>
							<div class="row mb-0 text-center" id="cpDataDet">
								<div class="col-4">
									<a href="#" class="chip chip-s bg-gray-light">
										<!-- <i class="fa fa-user bg-green-dark color-white"></i> -->
										<strong id="ag_cp_name" class="color-black font-400"></strong>
									</a>
								</div>
								<div class="col-4">
									<a href="#" class="chip chip-s bg-gray-light">
										<!-- <i class="fa fa-phone bg-green-dark color-white"></i> -->
										<strong id="ag_cp_phone" class="color-black font-400"></strong>
									</a>
								</div>
								<div class="col-4">
									<a href="#" class="chip chip-s bg-gray-light">
										<!-- <i class="fa fa-location bg-green-dark color-white"></i> -->
										<strong id="ag_cp_des" class="color-black font-400"></strong>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-check icon-check mb-4" id="cust_na_div" style="display:none">
						<input class="form-check-input" name="client_data_chk" type="checkbox" value="1" id="cust_na_chk">
						<label class="form-check-label" for="cust_na_chk">Client Data Not Available</label>
						<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
						<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
					</div>
					
					<div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="inqDesc" class="color-highlight font-10">Inquiry Name</label>
						<input type="text" id="inqDesc" name="inq_name_desc" placeholder="inquiry name or description" required />
						<em>(required)</em> 
						<?= form_error('inq_name_desc') ?>
					</div>

					<div class="row mb-0" id="cust_drop">
						<div class="col-10">
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="custo" name='business' class="color-highlight font-10">Client</label>
								<select name="client_id" id='cust_details' class="client_details" >
									<option value="" selected>Select</option>
									<?php
									foreach ($client as $cl) { ?>
										<option <?php if (set_value('client_id')== $cl['id']) {echo "selected"; }?>
												value="<?= $cl['id'] ?>"><?= $cl['client_name'] ?></option>
									<?php }
									?>
								</select>
								<em id="req_cust">(required)</em>
							</div>
						</div>
						<div class="col-2 mx-0" style="margin: auto;">
							<a class="btn btn-primary px-1 py-0 mb-4" data-menu="popup-customer" href="#"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					<!-- Client details -->
					<div id='business' style='display:none'>
						<div class="row mb-0 text-center">
							<div class="col-4">
								<a href="#" class="chip chip-s bg-gray-light">
									<strong id="inq_cl_name" class="color-black font-400"></strong>
								</a>
							</div>
							<div class="col-4">
								<a href="#" class="chip chip-s bg-gray-light">
									<strong id="inq_cl_phone" class="color-black font-400"></strong>
								</a>
							</div>
							<div class="col-4">
								<a href="#" class="chip chip-s bg-gray-light">
									<strong id="inq_cl_add" class="color-black font-400"></strong>
								</a>
							</div>
						</div>
					</div>
				
					<div class="row mb-0 p-1">
						<div class="col-6">
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="form1" class="color-highlight font-10">Enquiry From</label>
								<input type="text" name="inquiry_from" placeholder="inquiry from" required />
								<em>(required)</em>
								<?= form_error('inquiry_from') ?>
							</div>
						</div>
						<!-- <div class="col-1">
							<a class="btn btn-primary px-1 py-1" href="#" id=""><i class="fa fa-plus"></i></a>
						</div> -->
						<div class="col-6">
							<div class="input-style has-borders no-icon input-style-always-active mb-4">
								<label for="form1" class="color-highlight font-10">Enquiry Source</label>
								<input type="text" name="inquiry_source" placeholder="inquiry source" required/>
								<em>(required)</em>
								<?= form_error('inquiry_source') ?>
							</div>
						</div>
						<!-- <div class="col-1">
							<a class="btn btn-primary px-1 py-1" href="#" id=""><i class="fa fa-plus"></i></a>
						</div> -->
					</div>

					<div class="events">
						<label for="form1" class="color-highlight event_title">Events</label>
						<a class="btn btn-primary btn-xs px-1 py-0 event_btn add_event" href="#" ><i class="fa fa-plus"></i></a>
						
						<div class="event_details" data-eventInc="1">
							<div class="row mb-0">
								<div class="col-6">
									<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
										<input type="hidden" name="temp_event_id[]" class="tempEventId" value="1"/>
										<input type="text" class="form-control validate-name" name="event_name[]" id="form1" placeholder="Event Name" required/>
										<label for="form1" class="color-highlight font-10">Name</label>
										<i class="fa fa-times disabled invalid color-red-dark"></i>
										<i class="fa fa-check disabled valid color-green-dark"></i>
										<em>(required)</em>
									</div>
								</div>
								<div class="col-6">
									<div class="input-style has-borders no-icon input-style-always-active mb-4">
										<label for="form1" class="color-highlight font-10">Event Type</label>
										<select id="event_type" name="event_type[]" required="">
											<option value="" selected>Select</option>
											<option value="Private">Private</option>
											<option value="Corporate">Corporate</option>
										</select>
										<em>(required)</em>
									</div>
								</div>
							</div>
							<div class="row mb-0">
								<div class="col-6">
									<div class="input-style has-borders no-icon input-style-always-active mb-4">
										<em>(required)</em>
										<input type="date" name="start_date[]" value="<?= date('Y-m-d')?>" max="" min="<?= date('Y-m-d')?>" class="form-control validate-text" placeholder="Event Date">
										<label class="color-highlight font-10">Start Date</label>
										<i class="fa fa-check disabled valid me-4 pe-3 font-12 color-green-dark"></i>
										<i class="fa fa-check disabled invalid me-4 pe-3 font-12 color-red-dark"></i>
									</div>
								</div>
								<div class="col-6">
									<div class="input-style has-borders no-icon input-style-always-active mb-4">
										<em>(required)</em>
										<input type="date" name="end_date[]" value="<?= date('Y-m-d')?>" max="" min="<?= date('Y-m-d')?>" class="form-control validate-text" placeholder="Event Date">
										<label class="color-highlight font-10">End Date</label>
										<i class="fa fa-check disabled valid me-4 pe-3 font-12 color-green-dark"></i>
										<i class="fa fa-check disabled invalid me-4 pe-3 font-12 color-red-dark"></i>
									</div>
								</div>
							</div>
							<div class="row mb-0">
								<div class="col-10">
									<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
										<!-- <a href="#" data-menu="popup-city" class="btn btn-primary btn-xs px-1 py-0 event_btn"><i class="fa fa-plus"></i></a> -->
										<label class="color-highlight font-10">City</label>
										<!-- <i class="fa fa-times disabled invalid color-red-dark"></i>
										<i class="fa fa-check disabled valid color-green-dark"></i> -->
										<select name="city_id[]" class="ci_details" required="">
											<option value="">Select</option>
											<?php
											foreach ($city as $ct) { ?>
												<option <?php if (set_value('city_id')== $ct['city_id']) {echo "selected"; }?>
														value="<?= $ct['city_id'] ?>"><?= $ct['name'] ?>
												</option>
											<?php }
											?>
										</select>
										<em></em>
									</div>
								</div>
                                <div class="col-2 mx-0" style="margin: auto;">
                                    <a class="btn btn-primary px-1 py-0 mb-4" data-menu="popup-city" href="#"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="row mb-0">
								<div class="col-6">
									<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
										<input type="text" name="venue[]" class="form-control validate-name" id="form1" placeholder="Venue" required/>
										<label for="form1" class="color-highlight font-10">Venue</label>
										<i class="fa fa-times disabled invalid color-red-dark"></i>
										<i class="fa fa-check disabled valid color-green-dark"></i>
										<em></em>
									</div>
								</div>
								<div class="col-6">
									<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
										<input type="text" name="pax[]" class="form-control validate-name" id="form1" placeholder="Pax" required/>
										<label for="form1" class="color-highlight font-10">Pax</label>
										<i class="fa fa-times disabled invalid color-red-dark"></i>
										<i class="fa fa-check disabled valid color-green-dark"></i>
										<em></em>
									</div>
								</div>
							</div>
                            <div class="row mb-0">
                                <div class="col-6">
                                    <div class="input-style has-borders no-icon input-style-always-active mb-4">
                                        <input type="text" name="evt_min_budget[]" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="evt_min_budget1" placeholder="Minimum" required/>
                                        <label for="min_budget1" class="color-highlight font-10">Min Budget</label>
                                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                                        <i class="fa fa-check disabled valid color-green-dark"></i>
                                        <em></em>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-style has-borders no-icon input-style-always-active mb-4">
                                        <input type="text" name="evt_max_budget[]" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="evt_max_budget1" placeholder="Maximum" required/>
                                        <label for="max_budget1" class="color-highlight font-10">Max Budget</label>
                                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                                        <i class="fa fa-check disabled valid color-green-dark"></i>
                                        <em></em>
                                    </div>
                                </div>
                            </div>
							<div class="artists">
								<label for="form1" class="color-highlight artist_title">Artist Details</label>
								<a class="btn btn-primary btn-xs px-1 py-0 artist_btn add_artist" href="#"><i class="fa fa-plus"></i></a>
								<div class="artist_details" data-atinc="1">
									<div class="row mb-0">
										<div class="col-6">
											<div class="input-style has-borders no-icon input-style-always-active mb-4">
												<label for="form1" class="color-highlight font-10">Artists type</label>
												<em></em>
												<select name="multiple_artist_1[]" class="artistType" required="">
													<option value="" selected>Select</option>
													<?php foreach ($artistType as $at) { ?>
														<option value="<?= set_value('atm_id',$at['atm_id']) ?>"><?= $at['type'] ?></option>
													<?php }?>
												</select>
											</div>
										</div>
										<div class="col-6">
											<div class="input-style has-borders no-icon input-style-always-active mb-4">
												<label for="form1" class="color-highlight font-10">Artist Name</label>
												<em></em>
												<select name="artist_name_1[]" class="artist_name1" onchange="artistName(this)"  required="">
													<option value="" selected>Select First Artist Type</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row mb-0">
										<div class="col-6">
											<div class="input-style has-borders no-icon input-style-always-active mb-4">
												<input type="text" name="min_budget_1[]" onchange="overallMinBudget(this)"  onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="min_budget1" placeholder="Minimum" required/>
												<label for="min_budget1" class="color-highlight font-10">Min Budget</label>
												<i class="fa fa-times disabled invalid color-red-dark"></i>
												<i class="fa fa-check disabled valid color-green-dark"></i>
												<em></em>
											</div>
										</div>
										<div class="col-6">
											<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
												<input type="text" name="max_budget_1[]" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="max_budget1" placeholder="Maximum" required/>
												<label for="max_budget1" class="color-highlight font-10">Max Budget</label>
												<i class="fa fa-times disabled invalid color-red-dark"></i>
												<i class="fa fa-check disabled valid color-green-dark"></i>
												<em></em>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
							
					<!-- overall budget temp comment 
						<div class="events">
						<label for="form1" class="color-highlight event_title">Overall Budget</label>
						<div class="row mt-1 mb-0">
							<div class="col-6">
								<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
									<input type="text" name="overall_min_budget" id="overallMinBud" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control " placeholder="Minimum" required readonly/>
									<label for="min_budget1" class="color-highlight">Min Budget</label>
									<i class="fa fa-times disabled invalid color-red-dark"></i>
									<i class="fa fa-check disabled valid color-green-dark"></i>
									<em></em>
								</div>
							</div>
							<div class="col-6">
								<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
									<input type="text" name="overall_max_budget" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control " placeholder="Maximum" required readonly/>
									<label for="max_budget1" class="color-highlight">Max Budget</label>
									<i class="fa fa-times disabled invalid color-red-dark"></i>
									<i class="fa fa-check disabled valid color-green-dark"></i>
									<em></em>
								</div>
							</div>
						</div>
					</div> -->

					<div class="form-check icon-check mb-4" id="">
						<input class="form-check-input font-10" name="is_international_evt" type="checkbox" value="" id="int_evt_chk">
						<label class="form-check-label" for="int_evt_chk">International Event</label>
						<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
						<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
					</div>
					
					<div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="form1" class="color-highlight font-10">Inquiry Status</label>
						<select name="inquiry_status" id="" required="">
							<option value="" selected>Select</option>
							<?php
								foreach ($stages as $cl) { ?>
									<option <?php if (set_value('sm_id')== $cl['sm_id']) {echo "selected"; }?>
											value="<?= $cl['sm_id'] ?>"><?= $cl['stage_name'] ?></option>
								<?php }
							?>
						</select>
						<em>(required)</em>
					</div>

					<div class="row mb-0">

						<!-- <div class="col-6">
							<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
								<input type="text" class="form-control validate-name" name="convert_type" id="form1" placeholder="Convert">
								<label for="form1" class="color-highlight">Convert</label>
								<i class="fa fa-times disabled invalid color-red-dark"></i>
								<i class="fa fa-check disabled valid color-green-dark"></i>
								<em>(required)</em>
							</div>
						</div>
						<div class="col-6">
							<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
								<input type="text" class="form-control validate-name" id="form1" name="conformation" placeholder="Confirmation">
								<label for="form1" class="color-highlight">Confirmation</label>
								<i class="fa fa-times disabled invalid color-red-dark"></i>
								<i class="fa fa-check disabled valid color-green-dark"></i>
								<em>(required)</em>
							</div>
						</div> -->
					</div>

					<!-- <div class="input-style has-borders no-icon input-style-always-active validate-field mb-4 clas">
						<input type="datetime-local" id="form1" name="reminder" class="form-control validate-name" placeholder="Reminders">

						<label for="form1" class="color-highlight">Reminders</label>
						<i class="fa fa-times disabled invalid color-red-dark"></i>
						<i class="fa fa-check disabled valid color-green-dark"></i>
						<em></em>
					</div> -->

					<!-- <div class="input-style has-borders no-icon input-style-always-active mb-4">
						<label for="form1" class="color-highlight">User Selection</label>
						<select name="user_id" id="" required="">
							<option value="0">Select</option>
							<?php /* foreach ($user as $us) { ?>
									<option value="<?= set_value('user_id',$us['admin_id']) ?>"><?= $us['name'] ?></option>
							<?php } ?>
						</select>
						<em>(required)</em>
						<?= form_error('user_id') */?>
					</div> -->

					<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">
						<!-- <input type="text" class="form-control validate-name" id="form1" placeholder="Note"> -->
						<textarea id="form7" name="note" placeholder="Enter Note"></textarea>
						<label for="form1" class="color-highlight font-10">Note</label>
						<i class="fa fa-times disabled invalid color-red-dark"></i>
						<i class="fa fa-check disabled valid color-green-dark"></i>
						<em></em>
					</div>
					
					<div class="team">
						<label for="form1" class="color-highlight event_title">Team Selection</label>
						<?php
							$user_ids = 0; $artist_ids = 0;
							/*if($inqTeamData){
								foreach ($inqTeamData['artist'] as $ad){$artist_ids .= ",".$ad['artist_id'];}
								foreach ($inqTeamData['user'] as $ud){$user_ids .= ",".$ud['user_id'];}
								$UserId = explode(",",$user_ids);
								$artistId = explode(",",$artist_ids);
							}else{
								$user_ids = 0; $artist_ids =0;
							}*/
						?>
						<div class="has-borders no-icon input-style-always-active mb-3">
							<label for="form1" class="color-highlight font-10">User</label>
							<select name="user_id[]" id="" class="form-control js-example-basic-single" multiple="multiple" >
								<?php
								if($user_ids=='0'){
								foreach ($user as $us) { ?>
									<option <?php if (set_value('user_id')== $us['admin_id']) {echo "selected"; }?>
											value="<?= $us['admin_id'] ?>"><?= $us['name'] ?></option>
								<?php } }else{
									foreach ($user as $us) { ?>
									<option value="<?= $us['admin_id'] ?>"<?php echo (in_array($us['admin_id'], $UserId)) ? 'selected':''; ?>>
										<?= $us['name'];?></option>
								<?php } }?>
							</select>
							<?= form_error('user_id')?>
						</div>
					</div>

					<!-- <div class="row mb-0">
						<div class="col-12">
							<div class="form-check icon-check">
								<input class="form-check-input" name="inquiry_status" type="checkbox" value="1" id="check1" >
								<label class="form-check-label" for="check1">Confirmed</label>
								<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
								<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
							</div>
							<div class="form-check icon-check">
								<input class="form-check-input" name="inquiry_status" type="checkbox" value="2" id="check2" checked>
								<label class="form-check-label" for="check2">Work in Progress</label>
								<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
								<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
							</div>
							<div class="form-check icon-check">
								<input class="form-check-input" name="inquiry_status" type="checkbox" value="3" id="check3" >
								<label class="form-check-label" for="check3">Cancelled</label>
								<i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
								<i class="icon-check-2 fa fa-check-square font-16 color-highlight"></i>
							</div>
						</div>
					</div> -->

					<input type="submit" id="inqSubmit" class="btn btn-full btn-m gradient-highlight rounded-s font-13 font-600 mt-4" value="Submit" />
				</div>
			</form>
		</div>
	</div>
</div>

</div>
</div>
</div>

<script>
    // var plus = 0;
	var eventAdd = 0;
	var artNameInc = 1;
	$(document).ready(function() {
		
		$('input[name=inquiry_type]').click(function() {

			if (this.id == "agency") {
				$("#agency_div").show('slow');
				$("#agency_contact_div").show('slow');
				$("#cust_na_div").show('slow');
				$("#req_cust").hide();
			} else {
				$("#agency_div").hide('slow');
				$("#agency_contact_div").hide('slow');
				$("#cust_na_div").hide('slow');
				$("#req_cust").show();
			}
		});

		$('#cust_na_chk').change(function() {
			if ($(this).is(":checked")) {
				$('#cust_drop').hide('slow');
				$("#business").css('display','none');
			} else {
				$('#cust_drop').show('slow');
			}
		});

		$('#agency_contact_details').on('change', function(m) {
			m.preventDefault();
			var cpd= $(this).val();
			if (this.value != '') {
				$("#business2").show();
				$("#req_cust").hide();
				$.ajax({
					url:"<?= base_url('front/Inquiry/get_agency_cp_details/') ?>"+cpd,
					type:"GET",
					// data:    {irmId},
					success: function(data) {
						var data = JSON.parse(data);
						var agency_cp_name = data.name.toString();
						var agency_cp_phone = data.phone.toString();
						var agency_cp_desg = data.des.toString();
						var result = data.result.toString();
						if(result == 'true'){
							$('#ag_cp_name').html(agency_cp_name);
							$('#ag_cp_phone').html(agency_cp_phone);
							$('#ag_cp_des').html(agency_cp_desg);
							$('#inqSubmit').removeAttr('disabled','disabled');
						}else{
							$('#cpDataDet').html('<span class="text-center text-danger"> Please assign designation on agency contact person</span>');
							$('#inqSubmit').attr('disabled','disabled');
						}
					},
					error:   function() {
						/* ...show an error... */
					}
				});
				m.stopImmediatePropagation();
			} else {
				$("#business2").hide();
				$("#req_cust").show();
			}
		});

		$('.add_event').on('click', function() {
			eventAdd++;
			var eventPlus = Number(eventAdd)+Number(1);
			artNameInc++;
			// $('.tempEventId').val(eventPlus);
			var html = '<div class="event_details" data-eventInc="'+eventPlus+'">\
							<a class="color-red-dark event_remove_btn" href="#"><i class="fa fa-close"></i></a>\
								<div class="row mb-0">\
									<div class="col-6">\
										<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">\
											<input type="hidden" name="temp_event_id[]" class="tempEventId" value="'+eventPlus+'"/>\
											<input type="text" name="event_name[]" class="form-control validate-name" id="form1" placeholder="Event Name">\
											<label for="form1" class="color-highlight font-10">Name</label>\
											<i class="fa fa-times disabled invalid color-red-dark"></i>\
											<i class="fa fa-check disabled valid color-green-dark"></i>\
										</div>\
									</div>\
									<div class="col-6">\
										<div class="input-style has-borders no-icon input-style-always-active mb-4">\
											<label for="form1" class="color-highlight font-10">Event Type</label>\
											<!-- <em>(required)</em> -->\
											<select name="event_type[]" id="event_type" required="">\
												<option value="" selected>Select</option>\
												<option value="Private">Private</option>\
												<option value="Corporate">Corporate</option>\
											</select>\
										</div>\
										</div>\
								</div>\
								<div class="row mb-0">\
									<div class="col-6">\
										<div class="input-style has-borders no-icon input-style-always-active mb-4">\
											<input type="date" name="start_date[]" value="<?= date('Y-m-d')?>" max="" min="<?= date('Y-m-d')?>" class="form-control validate-text" id="form6" placeholder="Event Date">\
											<label for="form1" class="color-highlight font-10">Start Date</label>\
											<i class="fa fa-check disabled valid me-4 pe-3 font-12 color-green-dark"></i>\
											<i class="fa fa-check disabled invalid me-4 pe-3 font-12 color-red-dark"></i>\
										</div>\
									</div>\
									<div class="col-6">\
										<div class="input-style has-borders no-icon input-style-always-active mb-4">\
											<input type="date" name="end_date[]" value="<?= date('Y-m-d')?>" max="" min="<?= date('Y-m-d')?>" class="form-control validate-text" id="form6" placeholder="Event Date">\
											<label for="form1" class="color-highlight font-10">End Date</label>\
											<i class="fa fa-check disabled valid me-4 pe-3 font-12 color-green-dark"></i>\
											<i class="fa fa-check disabled invalid me-4 pe-3 font-12 color-red-dark"></i>\
										</div>\
									</div>\
								</div>\
								<div class="row mb-0">\
									<div class="col-12">\
										<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">\
										<label for="form1" class="color-highlight font-10">City</label>\
										<select name="city_id[]" class="ci_details" required="">\
											<option value="">Select</option>';
										html += refreshed_city(); 
										html +='</select>\
										<em></em>\
										</div>\
									</div>\
                                </div>\
                                <div class="row mb-0">\
									<div class="col-6">\
										<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">\
											<input type="text" name="venue[]" class="form-control validate-name" id="form1" placeholder="Venue">\
											<label for="form1" class="color-highlight font-10">Venue</label>\
											<i class="fa fa-times disabled invalid color-red-dark"></i>\
											<i class="fa fa-check disabled valid color-green-dark"></i>\
											<!-- <em>(required)</em> -->\
										</div>\
									</div>\
									<div class="col-6">\
										<div class="input-style has-borders no-icon input-style-always-active validate-field mb-4">\
											<input type="text" name="pax[]" class="form-control validate-name" id="form1" placeholder="Pax">\
											<label for="form1" class="color-highlight font-10">Pax</label>\
											<i class="fa fa-times disabled invalid color-red-dark"></i>\
											<i class="fa fa-check disabled valid color-green-dark"></i>\
											<!-- <em>(required)</em> -->\
										</div>\
									</div>\
								</div>\
                                <div class="row mb-0">\
                                    <div class="col-6">\
                                        <div class="input-style has-borders no-icon input-style-always-active mb-4">\
                                            <input type="text" name="evt_min_budget[]" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="evt_min_budget1" placeholder="Minimum" required/>\
                                            <label for="min_budget1" class="color-highlight font-10">Min Budget</label>\
                                            <i class="fa fa-times disabled invalid color-red-dark"></i>\
                                            <i class="fa fa-check disabled valid color-green-dark"></i>\
                                            <em></em>\
                                        </div>\
                                    </div>\
                                    <div class="col-6">\
                                        <div class="input-style has-borders no-icon input-style-always-active mb-4">\
                                            <input type="text" name="evt_max_budget[]" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="evt_max_budget1" placeholder="Maximum" required/>\
                                            <label for="max_budget1" class="color-highlight font-10">Max Budget</label>\
                                            <i class="fa fa-times disabled invalid color-red-dark"></i>\
                                            <i class="fa fa-check disabled valid color-green-dark"></i>\
                                            <em></em>\
                                        </div>\
                                    </div>\
                                </div>\
								<div class="artists"> \
									<label for="form1" class="color-highlight artist_title">Artist Details</label> \
									<a class="btn btn-primary btn-xs px-1 py-0 artist_btn add_artist" href="#"><i class="fa fa-plus"></i></a> \
									<div class="artist_details" data-atinc="'+artNameInc+'"> \
										<div class="row mb-0"> \
											<div class="col-6"> \
												<div class="input-style has-borders no-icon input-style-always-active mb-4"> \
													<label for="form1" class="color-highlight font-10">Artists type</label> \
													<!-- <em>(required)</em> --> \
													<select name="multiple_artist_'+eventPlus+'[]" class="artistType" required=""> \
														<option value="" selected>Select</option> \
														<?php foreach ($artistType as $at) { ?>\
															<option value="<?= set_value('atm_id',$at['atm_id']) ?>"><?= $at['type'] ?></option>\
														<?php }?>\
													</select> \
												</div> \
											</div> \
											<div class="col-6"> \
												<div class="input-style has-borders no-icon input-style-always-active mb-4"> \
													<label for="form1" class="color-highlight font-10">Artist Name</label> \
													<!-- <em>(required)</em> --> \
													<select name="artist_name_'+eventPlus+'[]" class="artist_name'+artNameInc+'" onchange="artistName(this)" required=""> \
														<option value="" selected>Select First Artist Type</option> \
													</select> \
												</div> \
											</div> \
										</div> \
										<div class="row mb-0"> \
											<div class="col-6"> \
												<div class="input-style has-borders no-icon input-style-always-active mb-4"> \
													<input type="text" name="min_budget_'+eventPlus+'[]" onchange="overallMinBudget(this)" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="min_budget'+eventPlus+'" placeholder="Minimum"/> \
													<label for="min_budget'+eventPlus+'" class="color-highlight font-10">Min Budget</label> \
													<i class="fa fa-times disabled invalid color-red-dark"></i> \
													<i class="fa fa-check disabled valid color-green-dark"></i> \
													<!-- <em>(required)</em> --> \
												</div> \
											</div> \
											<div class="col-6"> \
												<div class="input-style has-borders no-icon input-style-always-active mb-4"> \
													<input type="text" name="max_budget_'+eventPlus+'[]" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="max_budget'+eventPlus+'" placeholder="Maximum"/> \
													<label for="max_budget'+eventPlus+'" class="color-highlight font-10">Max Budget</label> \
													<i class="fa fa-times disabled invalid color-red-dark"></i> \
													<i class="fa fa-check disabled valid color-green-dark"></i> \
													<!-- <em>(required)</em> --> \
												</div> \
											</div> \
										</div> \
									</div> \
								</div> \
							</div>\
						</div>\
						';
			$('.events').append(html);
		});

		$(document).on('click', '.event_remove_btn', function() {
			$(this).parent().remove();
		});

		$('#agency_details').on('change', function() {
			if (this.value != '') {
				$("#business1").show();
				$("#req_cust").hide();
				var agency_id = this.value;
				$.ajax({
					url: "<?= base_url() ?>front/Inquiry/getContactPerson/" + agency_id,
					type: "POST",
					cache: false,
					success: function(result) {
						$.ajax({
							url:"<?= base_url('front/Inquiry/get_agency_details/') ?>"+agency_id,
							type:"GET",
							// data:    {irmId},
							success: function(data) {
								var data = JSON.parse(data);
								var agency_name = data.name.toString();
								var agency_phone = data.phone.toString();
								var agency_add = data.add.toString();
								var result = data.result.toString();
								if(result == 'true'){
									$('#ag_name').html(agency_name);
									$('#ag_phone').html(agency_phone);
									$('#ag_add').html(agency_add);
									$('#inqSubmit').removeAttr('disabled','disabled');
								}else{
									$('#cpDataDet').html('<span class="text-center text-danger"> Please assign designation on agency contact person</span>');
									$('#inqSubmit').attr('disabled','disabled');
								}
							},
							error:   function() {
								/* ...show an error... */
							}
						});
						$("#agency_contact_details").html(result);
					}
				});
			} else {
				$("#business1").hide();
				$("#req_cust").show();
			}
		});
		
	});
	
	$(document).on('click', '.add_artist', function() {
		var artistInc = $(this).closest('.event_details').attr('data-eventInc');
		// console.log(artistInc);
		artNameInc++;
		var html = '\<div class="artist_details" data-atinc="'+artNameInc+'">\
				<a class="color-red-dark artist_remove_btn" href="#"><i class="fa fa-close"></i></a>\
					<div class="row mb-0">\
						<div class="col-6">\
						<div class="input-style has-borders no-icon input-style-always-active mb-4">\
								<label for="form1" class="color-highlight font-10">Artists type</label>\
								<!-- <em>(required)</em> -->\
								<select name="multiple_artist_'+artistInc+'[]" class="artistType" required="">\
									<option value="" selected>Select</option>\
									<?php foreach ($artistType as $at) { ?>\
											<option value="<?= set_value('atm_id',$at['atm_id']) ?>"><?= $at['type'] ?></option>\
									<?php }?>\
								</select>\
							</div>\
			            </div>\
						<div class="col-6">\
						<div class="input-style has-borders no-icon input-style-always-active mb-4">\
									<label for="form1" class="color-highlight font-10">Artist Name</label>\
									<!-- <em>(required)</em> -->\
									<select name="artist_name_'+artistInc+'[]" class="artist_name'+artNameInc+'" onchange="artistName(this)" required="">\
										<option value="" selected>Select First Artist Type</option>\
									</select>\
						    </div>\
						</div>\
					</div>\
					<div class="row mb-0">\
						<div class="col-6">\
							<div class="input-style has-borders no-icon input-style-always-active mb-4">\
								<input type="text" name="min_budget_'+artistInc+'[]" onchange="overallMinBudget(this)" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="min_budget'+artNameInc+'" placeholder="Minimum"/>\
								<label for="min_budget'+artNameInc+'" class="color-highlight font-10">Min Budget</label>\
								<i class="fa fa-times disabled invalid color-red-dark"></i>\
								<i class="fa fa-check disabled valid color-green-dark"></i>\
						    </div>\
						</div>\
						<div class="col-6">\
							<div class="input-style has-borders no-icon input-style-always-active mb-4">\
								<input type="text" name="max_budget_'+artistInc+'[]" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))" class="form-control validate-name" id="max_budget'+artNameInc+'" placeholder="Maximum"/>\
								<label for="max_budget'+artNameInc+'" class="color-highlight font-10">Max Budget</label>\
								<i class="fa fa-times disabled invalid color-red-dark"></i>\
								<i class="fa fa-check disabled valid color-green-dark"></i>\
							</div>\
						</div>\
					</div>\
				</div>\
			';
		$(this).closest('.artists').append(html);
	});

	$(document).on('click', '.artist_remove_btn', function() {
		$(this).parent().remove();
	});

	$(document).on('change','#cust_details',function(e){
		e.preventDefault();
		var type= $(this).val();
		if (this.value != '' ) {
			$("#business").show();
			$.ajax({
				url:     "<?= base_url('front/Inquiry/get_client/') ?>"+type,
				type:    "GET",
				// data:    {irmId},
				success: function(data) {
					var data = JSON.parse(data);
					var ine_clientName = data.name.toString();
					var ine_cl_phoneNo = data.phone.toString();
					var ine_cl_address = data.add.toString();
					$('#inq_cl_name').html(ine_clientName);
					$('#inq_cl_phone').html(ine_cl_phoneNo);
					$('#inq_cl_add').html(ine_cl_address);
				},
				error:   function() {
					/* ...show an error... */
				}
			});
			e.stopImmediatePropagation();
		} else {
			$("#business").hide();
			return false;
		}
	});

	$(document).on('change','.artistType',function(e){
		// e.preventDefault();
		var atmId= $(this).val();
		var artInc = $(this).closest('.artist_details').attr('data-atinc');
		// plus = Number(artInc);
		// console.log('artInc :- '+artInc);
		$.ajax({
			url:     "<?= base_url('front/Inquiry/getArtistName/') ?>"+atmId,
			type:    "GET",
			// data:    {irmId},
			success: function(data) {
				// var data = JSON.parse(data);
				// var ine_clientName = data.name.toString();
				// var ine_cl_phoneNo = data.phone.toString();
				// var ine_cl_address = data.add.toString();
				$(".artist_name"+artInc).html(data);
			},
			error:   function() {
				/* ...show an error... */
			}
		});
	});

	function artistName(val){
		// console.log(val);
		// debugger
		var atId= $(val).val();
		var artInc = $(val).closest('.artist_details').attr('data-atinc');
		// console.log('artInc :- '+artInc);
		$.ajax({
			url:"<?= base_url('front/Inquiry/getArtistData/') ?>"+atId,
			type:"GET",
			// data:    {irmId},
			success: function(data)
			{
				var data = JSON.parse(data);
				var artistMinBud = data.minBud.toString();
				var artistMaxBud = data.maxBud.toString();
				$('#min_budget'+artInc).val(artistMinBud);
				$('#max_budget'+artInc).val(artistMaxBud);
				// artInc++;
			},
			error:function(){
				/* ...show an error... */
			}
		});
	};

	function overallMinBudget(value){
		var maxBud= $(value).val();
        minBudget.push(maxBud);
		// var artInc = $(val).closest('.artist_details').attr('data-atinc');
		// maxBud = (Number(maxBud) + Number(maxBud));
        
        var total = 0;
        for (var i = 0; i < minBudget.length; i++) {
            total += minBudget[i] << 0;
            console.log("Increment max budget :"+total);
        }
		$("#overallMinBud").val(total);
	};

</script>
