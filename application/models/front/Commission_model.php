<?php
class Commission_model extends CI_Model
{
    public function __construct(){
		$this->user_id = $this->session->userdata('user_id');
        parent::__construct();
    }//__construct

    public function all($cus_id){

     	$this->db->select(['tb_commission.*','tb_customer.customer_name','tb_customer.customer_code','cus_ref.customer_name as referral_name']);
		if($cus_id !='' && !empty($cus_id)){
			$this->db->where('tb_commission.cus_id',$cus_id);
		}
		$this->db->join('tb_customer','tb_customer.cus_id = tb_commission.cus_id');
		$this->db->join('tb_customer as cus_ref','cus_ref.cus_id = tb_commission.cus_ref_id','left');
		return $this->db->get('tb_commission')->result_array();
		// echo $this->db->last_query(); exit;
    }

	public function add($data)
	{
		// echo "<pre>"; print_r($data); exit;

		return $this->db->insert('tb_commission',[
											'cus_id'=>$data['cus_id'],
											'cus_ref_id'=>$data['cus_ref_id'],
											'com_amount'=>$data['com_amount']
										]);
	}

	public function edit($com_id)
	{
		return $this->db->where('com_id',$com_id)->get('tb_commission')->row();
	}

	public function update($com_id,$data)
	{
		// echo "<pre>"; print_r($data); exit;

		return $this->db->where('com_id',$com_id)
					->update('tb_commission',[
											'cus_id'=>$data['cus_id'],
											'cus_ref_id'=>$data['cus_ref_id'],
											'com_amount'=>$data['com_amount']
										]);
	}

	public function cus_ref_details($cusRefId)
	{
		return $this->db->where('cus_id',$cusRefId)->get('tb_customer')->row();
	}

	public function get_cus_accDetails($cusId)
	{
		return $this->db->where('cus_id',$cusId)->get('tb_customer_bank_accounts')->row();
	}

	public function delete($comId)
	{
		return $this->db->where('com_id',$comId)->delete('tb_commission');
	}

	public function getCusDet()
	{
		return $this->db->select(['*'])
						// ->where('tb_customer.convert_cus IS NULL')
						->join('tb_user','tb_user.user_id = tb_customer.user_id','left')
						->order_by('tb_customer.cus_id','asc')
						->get('tb_customer')->result_array();
	}

	public function get_cus_com($cus_id)
	{
		return $this->db->where('cus_id',$cus_id)->get('tb_commission')->result_array();
	}

	public function getCusRefConData($cus_id)
	{
		$date = "'2022-10-11'";
		// $where = "(`entry_date` >= ".$date." AND `entry_date` <= ".$date.")";
		$this->db->select(['*','SUM(total) as refConTotal']);
		if($cus_id !='' && !empty($cus_id)){
			$this->db->where('cus_id',$cus_id);
		}
		// $this->db->join('tb_customer','tb_customer.cus_id = cus_id');
		// $this->db->join('tb_customer as cus_ref','cus_ref.cus_id = cus_ref_id','left');
		$this->db->group_by('MONTH(entry_date)');
		return $this->db->get('tb_customer_ref_con')->result_array();
		// echo $this->db->last_query();
	}

	public function cusRefConMonthWise($month,$customerId)
	{
		$this->db->select(['*']);
		$this->db->where('MONTH(tb_customer_ref_con.entry_date)',$month);
		if($customerId != 0 && !empty($customerId)){
			$this->db->where('tb_customer_ref_con.cus_id',$customerId);
		}
		$this->db->join('tb_customer','tb_customer.cus_id = tb_customer_ref_con.cus_id');
		$this->db->join('tb_plan','tb_plan.plan_id = tb_customer_ref_con.plan_id');
		return $this->db->get('tb_customer_ref_con')->result_array();
	}

	public function cusBriefRefConMonthWise($customer_id)
	{
		$this->db->select(['*','count(tb_customer.cus_ref_id) as refer_count','count(tb_customer.convert_cus) as customer_con_count']);
		$this->db->where('tb_customer.cus_ref_id',$customer_id);
		$this->db->where('tb_customer.refer_date IS NOT NULL');
		$this->db->join('tb_plan','tb_plan.plan_id = tb_customer.plan_id');
		$this->db->group_by('DATE(tb_customer.refer_date)');
	    $this->db->order_by('refer_date', 'desc');	
		return $this->db->get('tb_customer')->result_array();
		// echo $this->db->last_query();exit;
	}

	public function showRefDetail($customer_id,$date)
	{
		// echo $date;exit;
		$this->db->select(['*']);
		$this->db->where('tb_customer.cus_ref_id',$customer_id);
		$this->db->where('DATE(tb_customer.refer_date)',$date);
		$this->db->join('tb_plan','tb_plan.plan_id = tb_customer.plan_id');
		return $this->db->get('tb_customer')->result_array();
		// echo $this->db->last_query();exit;
	}
	
	public function single_cus_refCon_data_mon($cus_id,$month)
	{
		$this->db->select(['tb_customer.*','tb_plan.*','tb_customer_bank_accounts.*',
							'orgCus.customer_name as Reference_By',
							'orgRefByAcc.account_name as refer_acc_name',
							'orgRefByAcc.account_number as refer_acc_no',
							'orgRefByAcc.ifsc_code as refer_ifsc_code',
							'orgRefByAcc.branch_name as refer_br_name',
							'orgRefByAcc.paypal_id as refer_paypal_id',
							'orgRefByAcc.stripe_id as refer_stripe_id',
						]);
		if($cus_id!=null && !empty($cus_id)){
			$this->db->where('tb_customer.cus_ref_id',$cus_id);
		}
		$this->db->where('MONTH(tb_customer.refer_date)',$month);
		$this->db->join('tb_plan','tb_plan.plan_id = tb_customer.plan_id');
		$this->db->join('tb_customer_bank_accounts','tb_customer_bank_accounts.cus_id = tb_customer.cus_id','left');
		$this->db->join('tb_customer as orgCus','orgCus.cus_id = tb_customer.cus_ref_id');
		$this->db->join('tb_customer_bank_accounts as orgRefByAcc','orgRefByAcc.cus_id = tb_customer.cus_ref_id','left');
		return $this->db->get('tb_customer')->result_array();
		// echo $this->db->last_query();exit;
	}
}
