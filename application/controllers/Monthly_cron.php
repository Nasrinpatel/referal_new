<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monthly_cron extends CI_Controller {

	public function index()
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
			->where('tb_customer.is_referral_counted',0)
			->get('tb_customer');
			if($refCus){
				$cusRefCount = $refCus->num_rows(); 
			}else{
				$cusRefCount = 0;
			}
			// echo "<pre>"; print_r($refCus->result_array());exit;
			$cusConvertCount=0;

			//find converted referral from referral
			$conCus = $this->db->where('tb_customer.cus_ref_id',$cd['cus_id'])
			->where('convert_cus_date IS NOT NULL') // also add the condition in month wise 
			->where('convert_cus',1)
			->where('is_bought_counted',0)
			->get('tb_customer');

			if($conCus->num_rows()!=0){
				$cusConvertCount = $conCus->num_rows();
			}else{
				$cusConvertCount = 0;
			}
			// $cusReferralId .= "0";

			//get plan details
			$where = "`plan_id` = ".$cd['plan_id']." and (`ref_days_from` <= ".$cusRefCount." ) AND (`ref_days_to` >= ".$cusRefCount.")";
			$this->db->where($where);
			$planDet = $this->db->get('tb_plan_det')->row();

			$this->db->where('plan_id',$cd['plan_id']);
			$plan = $this->db->get('tb_plan')->row();

			if($cusRefCount != 0 || $cusConvertCount != 0){
				$this->db->insert('tb_customer_ref_con',[
					'cus_id'=>$cd['cus_id'],
					'plan_id'=>$cd['plan_id'],
					'cus_ref_total_amt'=>$cusRefCount*$planDet->ref_fee_per_wise,
					'cus_con_total_amt'=>$cusConvertCount*$plan->ref_con_fee,
					'total_customer_ref' => $cusRefCount,
					'total_customer_con' => $cusConvertCount,
					'total'=> (($cusRefCount*$planDet->ref_fee_per_wise) + ($cusConvertCount*$plan->ref_con_fee)),
					'entry_date' => date('Y-m-d')
				]);
				//update refral counts
				foreach($refCus->result_array() as $row){
					$this->db->update('tb_customer',array('is_referral_counted'=>1),array('cus_id'=>$row['cus_id']));
				}
				//update bougth counts
				foreach($conCus->result_array() as $row2){
					$this->db->update('tb_customer',array('is_bought_counted'=>1),array('cus_id'=>$row2['cus_id']));
				}

                //for find total days in 
                /* $dateToTest = date('Y-m-d');
                $lastDate = date('t',strtotime($dateToTest));
                echo $lastDate; */
			}			
		}
		return true;
	}

}
