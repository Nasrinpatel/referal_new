<?php

class Plan_model extends CI_Model{

	public function __construct(){
       
		$this->user_id = $this->session->userdata('user_id');
		parent::__construct();
    }//__construct

	public function all()
	{
		return $this->db->select('*')->get('tb_plan')->result_array();
	}

	public function add($data)
	{
		
		$this->db->insert('tb_plan',['ref_con_fee'=> $data['ref_con_fee']]);
		$plan_id = $this->db->insert_id();

		if(!empty($data['ref_fee_per_wise'])){
			foreach ($data['ref_fee_per_wise'] as $key => $value) {
				if(!empty($value)){ 
					$this->db->insert('tb_plan_det',[
									'ref_fee_per_wise' =>$value,
									'plan_id' =>$plan_id,
									'ref_days_from' =>$data['ref_days_from'][$key],
									'ref_days_to' =>$data['ref_days_to'][$key]
								]);
				}
			}
		}
		return true;
	}

	public function update($plan_id,$data)
	{
		
		$this->db->where('plan_id',$plan_id)
				->update('tb_plan',['ref_con_fee'=> $data['ref_con_fee']]);

		$before_plan =  $this->db->where('plan_id',$plan_id)->get('tb_plan_det')->num_rows();
		$after_plan = count($data['ref_fee_per_wise']);

		if(!empty($data['ref_fee_per_wise']) && ($after_plan > $before_plan || $after_plan < $before_plan)){
			// echo "after_plan".$after_plan."> before_plan".$before_plan; exit;
			$this->db->where('plan_id',$plan_id)->delete('tb_plan_det');
			foreach ($data['ref_fee_per_wise'] as $key => $value) {
				if(!empty($value)){ 
					$this->db
					//where('plan_id',$plan_id)
							->insert('tb_plan_det',[
									'ref_fee_per_wise' =>$value,
									'plan_id' =>$plan_id,
									'ref_days_from' =>$data['ref_days_from'][$key],
									'ref_days_to' =>$data['ref_days_to'][$key]
								]);
				}
			}
		}
		return true;
	}

	public function edit_pl($plan_id)
	{
		return $this->db->where('plan_id',$plan_id)->get('tb_plan')->row_array();
	}

	public function edit_pl_det($plan_id)
	{
		return $this->db->where('plan_id',$plan_id)->get('tb_plan_det')->result_array();
	}

	public function everyMothCronGetRefCal()
	{
		$cus_data = $this->db->select('*')->get('tb_customer')->result_array();

		$cusRefCount=0;
		
		$cusReferralId='';
		$cusConvertId = '';
		foreach($cus_data as $cd)
		{
			//find total referral customer from table
			$refCus = $this->db->where('tb_customer.cus_ref_id',$cd['cus_id'])
							->where('tb_customer.refer_date IS NOT NULL') // change condition while cron run eom(end of month) then add the moth wise refer get
							->where('tb_customer.referral_check',1)
							->join('tb_plan','tb_plan.plan_id = tb_customer.plan_id')
							->get('tb_customer');

				if($refCus){
					$cusRefCount = $refCus->num_rows(); 
				}else{
					$cusRefCount = 0;
				}
				// echo "<pre>"; print_r($refCus->result_array());exit;
				$cusConvertCount=0;
			foreach($refCus->result_array() as $rc)
			{
				//find Bought customer from referral 
				$conCus = $this->db->where('cus_id',$rc['cus_id'])
									->where('convert_cus_date IS NOT NULL') // also add the condition in month wise 
									->where('convert_cus',1)
									->get('tb_customer');

				if($conCus->num_rows()!=0){
					$cusConvertCount += $conCus->num_rows();
				}else{
					$cusConvertCount += 0;
				}
			}
			// $cusReferralId .= "0";
			//get plan details
			$where = "`plan_id` = ".$cd['plan_id']." and (`ref_days_from` <= ".$cusRefCount." ) AND (`ref_days_to` >= ".$cusRefCount.")";
			$this->db->where($where);
			$planDet = $this->db->get('tb_plan_det')->row();

			if($cusRefCount !=0 ){
				$this->db->insert('tb_customer_ref_con',[
															'cus_id'=>$cd['cus_id'],
															'plan_id'=>$cd['plan_id'],
															'cus_ref_total_amt'=>$cusRefCount*$planDet->ref_fee_per_wise,
															'cus_con_total_amt'=>$cusConvertCount*$rc['ref_con_fee'],
															'total_customer_ref' => $cusRefCount,
															'total_customer_con' => $cusConvertCount,
															'total'=> ($cusRefCount*$planDet->ref_fee_per_wise + $cusConvertCount*$rc['ref_con_fee']),
															'entry_date' => date('Y-m-d')
														]);
                //for find total days in 
                /* $dateToTest = date('Y-m-d');
                $lastDate = date('t',strtotime($dateToTest));
                echo $lastDate; */
			}

			
		}
		return true;
	}
}
?>
