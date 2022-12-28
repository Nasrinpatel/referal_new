<div class="page-content pb-3">

	<div class="">
		<div class="content mb-2">
			<h4>MANAGE INQUIRY</h4>
			<div class="divider divider-margins"></div>

			<div class="row mb-0">
				<div class="col-7">

					<!-- <a href="#" data-menu="ad-timed-2" data-timed-ad="10" class="btn btn-m btn-full shadow-xl font-600 bg-highlight mb-2">Full Ad</a> -->
				</div>
				<div class="col-5">
					<!-- <a href="<?= base_url('front/inquirylist') ?>" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-600 shadow-s bg-red-dark">Back</a> -->

					<a href="<?= base_url('front/inquiry/add') ?>" class="btn btn-sm  mb-3 rounded-0 text-uppercase font-700 shadow-s bg-magenta-dark">ADD INQUIRY</a>

				</div>
			</div>

			<div class="divider divider-margins"></div>

			<div class="">
				<div class="content" id="tab-group-2">
					<div class="tab-controls tabs-small tabs-rounded">
						<?php $nt=0; 
						$stageCount = count(stageDynamic(1,0));
						foreach(stageDynamic(1,0) as $sl)
						{ 
							$nt++;?>
							<a href="<?= base_url('front/Inquiry/index/'.$sl['sm_id']) ?>" data-tab="tab-<?=$nt?>" class="<?php 
										if($sl['sm_id'] == 1){ 
											echo "gradient-magenta";
										}elseif($sl['sm_id'] == 2){
											echo "gradient-green";
										}elseif($sl['sm_id'] == 3){
											echo "gradient-red";
										}elseif($sl['sm_id'] == 4){
											echo "gradient-yellow";
										}elseif($sl['sm_id'] == 5){
											echo "gradient-teal";
										}elseif($sl['sm_id'] == 6){
											echo "gradient-brown";
										} ?> text-white <?= $stageCount > 3 ? 'font-11' : 'font-15'?>" ><?=$sl['stage_name']?></a>							
							<?php 
						} ?>
					</div>
					<div class="clearfix mb-3"></div>
					<div class="tab-content" id="tab-<?=$nt?>">
						<table class="table table-borderless text-center rounded-sm shadow-l responsive mobile-l display nowrap" id="open_inquiry">
							<thead>
								<tr class="bg-blue-dark">
									<th scope="col" class="color-white py-3 font-13">Inquiry No</th>
									<th scope="col" class="color-white py-3 font-13">Name</th>
									<th scope="col" class="color-white py-3 font-13">Phone</th>
									<th scope="col" class="color-white py-3 font-13">Email</th>
									<th scope="col" class="color-white py-3 font-13">Budget</th>
									<th scope="col" class="color-white py-3 font-13">Progress</th>
									<th scope="col" class="color-white py-3 font-13">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$countNo = 0;
								foreach ($InqList as $il)
								{
									if($il->agency_id != ''){
										$agency_data = $this->db->get_where('agency_master',['id'=>$il->agency_id])->row();
									}else{
										$agency_data = [];
									}
									if($il->client_id != ''){
										$client_data = $this->db->get_where('client_master',['id'=>$il->client_id])->row();
									}else{
										$client_data = [];
									}
									$inq_min_budget = 0;
									$inq_max_budget = 0;
									$inq_events = $this->db->get_where('inquiry_event_master',['im_id'=>$il->im_id])->result_array();
									foreach($inq_events as $event){
										$inq_min_budget += $event['evt_min_budget'];
										$inq_max_budget += $event['evt_max_budget'];
									}
									$countNo++;
									?>
									<tr>
										<td><?= $il->inq_code ?></td>
										<td><?= $il->inq_name_desc ?></td>
										<td><?= ($il->inquiry_type == 'ag') ? $agency_data->agency_phone : $client_data->client_phone ?></td>
										<td><?= ($il->inquiry_type == 'ag') ? $agency_data->agency_email : $client_data->client_email ?></td>
										<td><?= $inq_min_budget.' - '.$inq_max_budget ?></td>
										<td>
											<div class="progress" style="height:8px">
												<div class="progress-bar border-0 bg-green-dark " 
													role="progressbar" style="width: <?php if(all_answer_count($il->im_id)!=0){ echo number_format(( (all_answer_count($il->im_id) / all_question_count($il->im_id,$il->inquiry_status,$il->is_international_evt) ) * 100 ),2);}else{ echo "0"; }?>%" 
													aria-valuenow="<?=all_answer_count($il->im_id)?>" aria-valuemin="0" 
													aria-valuemax="<?= all_question_count($il->im_id,$il->inquiry_status,$il->is_international_evt) ?>">
												</div>
												
											</div>
											<?php if(all_answer_count($il->im_id)!=0){ echo round(number_format(( (all_answer_count($il->im_id) / all_question_count($il->im_id,$il->inquiry_status,$il->is_international_evt) ) * 100 ),2));}else{ echo "0"; }?>%
										</td>
										<td>
											<div>
												<div class="dropdown">
													<a class="btn bg-green-dark dropdown-toggle ps-1 pe-1 font-10" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
														Action
													</a>
													<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
														<?php
														if (!empty($category))
														{
															foreach ($category as $cat)
															{
																/* if($il->inquiry_status == 1){
																	$query = $this->db->query("SELECT question_id FROM question_master WHERE category_id = ".$cat['category_id']." AND is_international IN (0,$il->inquiry_status)");
																	$count = $query->num_rows();
																}else{
																	$query = $this->db->query("SELECT question_id FROM question_master WHERE category_id = ".$cat['category_id']." AND is_international IN (0)");
																	$count = $query->num_rows();
																} */
																
																/* $queryAns = $this->db->query("SELECT * FROM answer_master WHERE category_id = ".$cat['category_id']." AND inquiry_id = $il->im_id GROUP BY question_id");
																if($il->inquiry_status == 1){
																//count total numbers of given answers 
																	$count_ans = $queryAns->num_rows();
																}else{
																	$answer = $queryAns->result_array();
																	$count_ans=0;
																	foreach($answer as $a)
																	{	
																		$chk=$this->db->get_where('question_master',array('question_id'=>$a['question_id'],'is_international'=>0,'category_id' => $cat['category_id']))->num_rows();
																		if($chk > 0){
																			$count_ans++;
																		}
																	}
																} */

																if( in_array($il->inquiry_status, explode(",",$cat['sm_ids'])))
																{	
																	?>
																	<li><a class="dropdown-item" href="<?= base_url('front/eventquestion/index/' . $cat['category_id']) . '/' . $il->im_id . '/' .$il->inquiry_status ?>">
																		<span><?= $cat['name'] ?>  -  <?php echo '(' . inq_action_que_count($il->is_international_evt,$cat['category_id']) . ''; ?> / <?php 	echo '' . inq_action_ans_count($il->im_id,$cat['category_id'],$il->inquiry_status) . ''; ?>)</span></a></li>
																	<?php 
																}
															} ?>
															<?php 
														} ?>
														<li><a class="dropdown-item" href="<?= base_url('front/Reminderlist/index/'.$il->im_id.'/'.$il->inquiry_status) ?>">Reminder & Followup</a></li>
														<li><a class="dropdown-item" href="<?= base_url('front/Inquiry/inquiryEdit/'.$il->im_id) ?>">Edit</a></li>
														<li><a class="dropdown-item" href="<?= base_url('front/inquiry/delete/'.$il->im_id.'/'.$il->inquiry_status) ?>">Delete</a></li>
														<li><a class="dropdown-item" href="<?= base_url('front/Inquiry/inquiry_view/'. $il->im_id.'/'.$il->inquiry_status) ?>">Confirm Artist</a></li>
													</ul>
												</div>
											</div>
										</td>
										<!-- <td><i class="fa fa-arrow-right rotate-90 color-red-dark"></i></td> -->
									</tr>
									<?php 
								} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready( function () {
		$('#open_inquiry').DataTable({
			responsive: true,
			columnDefs: [
				{ responsivePriority: 1, targets: 0 },
				{ responsivePriority: 3, targets: 1},
				{ responsivePriority: 2, targets: 6}
        	]
		});
		
	
	});
</script>
