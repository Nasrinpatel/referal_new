<?php
class Customer_model extends CI_Model
{
    public function __construct(){
       
		$this->user_id = $this->session->userdata('user_id');
		parent::__construct();
    }//__construct+

	public function get_customer_data()
	{
		$userType = $this->session->userdata('user_type');
		$this->db->select(['tb_user.*','tb_customer.*']);
		$this->db->where('tb_customer.convert_cus IS NULL');
		if($userType != '1'){
			$this->db->where('tb_customer.cus_ref_id',$this->user_id);
		}
		$this->db->join('tb_user','tb_user.user_id = tb_customer.user_id','left');
		$this->db->order_by('tb_customer.cus_id','asc');
		return $this->db->get('tb_customer')->result_array();
	}

	public function get_ref_customer_data($cusId)
	{
		$userType = $this->session->userdata('user_type');
		$this->db->select('*');
		// $this->db->where('tb_customer.convert_cus IS NULL');
		if($cusId != ''){
			$this->db->where('tb_customer.cus_id != ',$cusId);
		}
		$this->db->order_by('tb_customer.cus_id','asc');
		return $this->db->get('tb_customer')->result_array();
	}

	public function get_con_customer_data()
	{
		$userType = $this->session->userdata('user_type');
		$this->db->select(['tb_user.*','tb_customer.*']);
		$this->db->where('tb_customer.convert_cus',1);
		if($userType != '1'){
			$this->db->where('tb_customer.cus_ref_id',$this->user_id);
		}
		$this->db->join('tb_user','tb_user.user_id = tb_customer.user_id','left');
		$this->db->order_by('tb_customer.cus_id','asc');
		return $this->db->get('tb_customer')->result_array();
	}

	public function add_customer($data)
	{
		if($data['cus_ref_id'] != '')
		{
			$cus_ref_id = $data['cus_ref_id'];
		}else{
			$cus_ref_id = NULL;
		}

		if(isset($data['referral_check']) )
		{
			$referral_check = $data['referral_check'];  

			//send mail to referral customer you are added by xyz 
		}else{
			$referral_check = 0; 
		}

		if($data['cus_ref_id'] !='' && isset($data['referral_check'])){
			$refDate = date('Y-m-d h:i:s'); 
		}else{
			$refDate = null;
		}

		$custCode = $this->gen_customer_code();
		$this->db->insert('tb_customer',[
											'ur_id'				=>$data['ur_id'],
											'plan_id'			=>1,
											'customer_name'		=>$data['customer_name'],
											'customer_address' 	=>$data['customer_address'],
											'customer_phone_no' =>$data['full_phone'],
											'customer_email'	=>$data['customer_email'],
											'user_id'			=>$this->user_id,
											'cus_ref_id'		=>$cus_ref_id,
											// 'customer_password' =>	md5($data['customer_password']),
											'customer_code'		=>$custCode,
											'referral_check'	=>(($cus_ref_id == '')?0:$referral_check),
											'refer_date'		=>$refDate,
											'user_type'         =>(($this->session->userdata('is_admin') == 1)?'admin':'referral') 
										]);
		$cus_id = $this->db->insert_id();

		if(isset($data['account_name']) && !empty($data['account_name'])){
			$this->db->insert('tb_customer_bank_accounts',[
										'cus_id'			=> $cus_id,
										'account_name'		=> $data['account_name'],
										'account_number' 	=> $data['account_number'],
										'ifsc_code'			=> $data['ifsc_code'],
										'branch_name'		=> $data['branch_name'],
										'paypal_id'			=> $data['paypal_id'],
										'stripe_id'			=> $data['stripe_id'],
										]);
		}
		if(!empty($data['cm_id'])){
			foreach ($data['cm_id'] as $key => $value) {
				if(!empty($value)){ 
					$this->db->insert('tb_customer_map_company',['cm_id' =>	$value,'cus_id' =>	$cus_id]);
				}
			}
		}

		//send customer mail 
		return true;
	}

	public function gen_customer_code()
	{
		$CustomerCode=$this->db 
						->select(['customer_code'])
						->from('tb_customer') 
						// ->where('dist_id IS NULL')
						->order_by('cus_id',"DESC")
						->get();
		$Icode=$CustomerCode->row();	
		if($CustomerCode->num_rows()==0){
			$CusCode="CUS"."1001"; // Starting Number
		}
		else
		{
			$number=preg_replace('/[A-Z]+/','',$Icode->customer_code );
			if($Icode->customer_code > 1000)
			{
				$CusCode = $number + 1;
				$CusCode = "CUS".$CusCode;
			}
			else{			
				$CusCode="CUS"."1001"; // Starting Number
			}   
		}
		return $CusCode;
	}

	public function get_cus_data($cusId)
	{
		return $this->db->select(['*','`tb_customer`.`cus_id` as Customer_id'])
						->where('`tb_customer`.`cus_id`',$cusId)
						->join('`tb_customer_bank_accounts`','`tb_customer_bank_accounts`.`cus_id` = `tb_customer`.`cus_id`','left')
						->get('`tb_customer`')->row();
						// echo $this->db->last_query(); exit;
	}

	public function getCusCom($cusId)
	{
		return $this->db->select('*')->where('cus_id',$cusId)->get('tb_customer_map_company')->result();
	}
	
	public function update_customer($cus_id,$data)
	{
		// echo "<pre>";print_r($data);exit;
		if($data['cus_ref_id'] !='')
		{
			$cus_ref_id = $data['cus_ref_id'];
		}else{
			$cus_ref_id = '';
		}

		if(isset($data['referral_check']) )
		{
			$referral_check = $data['referral_check'];  
		}else{
			$referral_check = 0;
		}

		$prevNotUpdateData = $this->db->where('cus_id',$cus_id)->get('tb_customer')->row();

		$update_data = [
			'ur_id'				=>$data['ur_id'],
			'customer_name'		=>$data['customer_name'],
			'customer_address' 	=>$data['customer_address'],
			'customer_phone_no' =>$data['full_phone'],
			'customer_email'	=>$data['customer_email'],			
		];
		if($this->user_id != $cus_ref_id){
			$update_data = [
				'user_id'			=>$this->user_id,
				'cus_ref_id'		=>$cus_ref_id,
				'referral_check'	=>(($cus_ref_id == '')?0:$referral_check)
			];
		}
		if($prevNotUpdateData->cus_ref_id != $data['cus_ref_id']){
			if($data['cus_ref_id'] !='' && isset($data['referral_check'])){
				$update_data['refer_date'] = date('Y-m-d h:i:s'); 
			}
		}
		$this->db->where('cus_id',$cus_id)
						->update('tb_customer',$update_data);
		if(!empty($data['account_name'])){	
			$cusBankData = $this->db->where('cus_id',$cus_id)->get('tb_customer_bank_accounts')->num_rows();
			if($cusBankData > 0){
				$this->db->where('cus_id',$cus_id)	
					->update('tb_customer_bank_accounts',[
											'account_name'		=> $data['account_name'],
											'account_number' 	=> $data['account_number'],
											'ifsc_code'			=> $data['ifsc_code'],
											'branch_name'		=> $data['branch_name'],
											'paypal_id'			=> $data['paypal_id'],
											'stripe_id'			=> $data['stripe_id'],
											]);
			}else{
				$this->db->insert('tb_customer_bank_accounts',[
										'account_name'		=> $data['account_name'],
										'account_number' 	=> $data['account_number'],
										'ifsc_code'			=> $data['ifsc_code'],
										'branch_name'		=> $data['branch_name'],
										'paypal_id'			=> $data['paypal_id'],
										'stripe_id'			=> $data['stripe_id'],
										'cus_id'			=> $cus_id
									]);
				
			}
		}

		if(!empty($data['cm_id'])){
			$this->db->where('cus_id',$cus_id)->delete('tb_customer_map_company');
			foreach ($data['cm_id'] as $key => $value) {
				if(!empty($value)){ 
					$this->db->insert('tb_customer_map_company',['cm_id' =>	$value,'cus_id' =>	$cus_id]);
				}
			}
		}
		return true;
	}

	public function delete_customer($cus_id)
	{
		$res = $this->db->where('cus_id',$cus_id)->delete('tb_customer');
		if($res){
			return true;
		}else{
			return false;
		}
		
	}

	public function getRefCusData($cus_id)
	{
		return $this->db->where('cus_ref_id',$cus_id)->get('tb_customer')->result_array();
	}

	public function getRefCusCommissionData($cus_id)
	{
		return $this->db->select(['tb_commission.*','tb_customer.customer_name'])->where('tb_commission.cus_ref_id',$cus_id)->join('tb_customer','tb_customer.cus_id = tb_commission.cus_id')->get('tb_commission')->result_array();
	}

	public function get_user_role()
	{
		$data=$this->db
						->select('*')
						->where_not_in('role_name','admin')
						->order_by("role_name","ASC")
						->from('tb_user_role') 
						->get();
		return $data->result_array();	
	}

	public function update_cus_con($cusId,$data)
	{
		if(isset($data['convert_cus'])){
			$convert_cus = $data['convert_cus'];
			$conCusDate = date('Y-m-d H:i:s');
		}else{
			$convert_cus = null;
			$conCusDate = null;
		}

		if(isset($data['convert_cus_can'])){
			$convert_cus = null;
			$conCusDate = null;
		}else{
			$convert_cus = $data['convert_cus'];
			$conCusDate = date('Y-m-d H:i:s');
		}

		$this->db->where('cus_id',$cusId)->update('tb_customer',['convert_cus'=>$convert_cus,'convert_cus_date'=>$conCusDate]);
		return $this->db->affected_rows();
	}
}
?>
