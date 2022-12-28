<?php
class Customer_ref_model extends CI_Model
{
    public function __construct(){
       
		$this->user_id = $this->session->userdata('user_id');
		parent::__construct();
    }//__construct

	public function  get_customer_data()
	{
		// return $this->db->select('*')->get('tb_customer_referral')->result();
		$action = '<a class="btn btn-blue btn-xs" href="'.base_url('admin/Customer_referral/view/$1').'" title="View" tabindex="0" data-plugin="tippy" data-tippy-animation="shift-away" data-tippy-arrow="true"><span class="fe-eye"></span></a>
					<a class="btn btn-primary btn-xs" href="'.base_url('admin/Customer_referral/edit/$1').'" data-toggle="tooltip" title="Edit"><span class="fe-edit"></span></a>
					<a class="btn btn-danger btn-xs" href="'.base_url('admin/Customer_referral/delete/$1').'" data-toggle="tooltip" title="Delete"><span class="fe-trash"></span></a>
					';

		$this->datatables
			->select('tb_customer_referral.cr_id as crId,
						`tb_customer_referral`.`customer_name` as `cus_name`,
						`tb_customer_referral`.`customer_phone_no` as `cus_number`,
						`tb_customer_referral`.`customer_email` as `cus_email`,
						`tb_customer`.`customer_name` as `reference_by`
					')
			->join('tb_user','tb_user.user_id = tb_customer_referral.user_id')
			->join('tb_customer','tb_customer.cus_id = tb_customer_referral.cus_id','left')
			->from('tb_customer_referral');
		$this->datatables->add_column('Actions', $action, 'crId');
		return $this->datatables->generate();
	}

	public function add_customer_ref($data)
	{
		$this->db->insert('tb_customer_referral',[
											'customer_name'		=>	$data['customer_name'],
											'customer_address' 	=>	$data['customer_address'],
											'customer_phone_no' =>	$data['customer_phone_no'],
											'customer_email'	=>	$data['customer_email'],
											'user_id'			=>	$this->user_id,
											'cus_id'			=> $data['cus_id']
											]);
		$cr_id = $this->db->insert_id();
		
		if(!empty($data['cm_id'])){
			foreach ($data['cm_id'] as $key => $value) {
				if(!empty($value)){ 
					$this->db->insert('tb_customer_ref_company',['cm_id' =>	$value,'cr_id' =>	$cr_id]);
				}
			}
		}
		return true;
	}

	public function get_cusRef_data($crId)
	{
		return $this->db->select(['tb_customer_referral.*','tb_customer.customer_name as cus_name'])
						->where('`tb_customer_referral`.`cr_id`',$crId)
						->join('`tb_customer`','`tb_customer`.`cus_id` = `tb_customer_referral`.`cus_id`','left')
						->get('`tb_customer_referral`')->row();
	}

	public function getCusRefCom($crId)
	{
		return $this->db->select('*')->where('cr_id',$crId)->get('tb_customer_ref_company')->result();
	}
	
	public function update_customer_ref($cr_id,$data)
	{
		$this->db->where('cr_id',$cr_id)
						->update('tb_customer_referral',[
												'customer_name'		=>	$data['customer_name'],
												'customer_address' 	=>	$data['customer_address'],
												'customer_phone_no' =>	$data['customer_phone_no'],
												'customer_email'	=>	$data['customer_email'],
												'user_id'			=>	$this->user_id
												]);
		if(!empty($data['cm_id'])){
			$this->db->where('cr_id',$cr_id)->delete('tb_customer_ref_company');
			foreach ($data['cm_id'] as $key => $value) {
					$this->db->insert('tb_customer_ref_company',['cm_id' =>	$value,'cr_id' => $cr_id]);
			}
		}
		return true;
	}

	public function delete_customer_ref($cr_id)
	{
		$res = $this->db->where('cr_id',$cr_id)->delete('tb_customer_referral');
		if($res){
			return true;
		}else{
			return false;
		}
		
	}

	/**
     * ToDo     : get customer name
     * DB Table : tb_customer
	 * @return  : customer's names
    */
	public function get_cus_name()
	{
		return $this->db->select(['customer_name','cus_id','reference_by'])->get('tb_customer')->result_array();
	}

	/**
     * ToDo     : get referral customer's company name
     * DB Table : tb_company,tb_customer_referral
	 * @return  : Referral customer Company
    */
	public function getRefCusCompName($cr_id)
	{
		return $this->db->select(['tb_company_master.company_name'])
						->where('tb_customer_ref_company.cr_id',$cr_id)
						->join('tb_company_master','tb_company_master.cm_id = tb_customer_ref_company.cm_id')
						->get('tb_customer_ref_company')
						->result();
	}
}
?>
