<?php
class Quotation_model extends CI_Model
{
    public function __construct(){
       
		$this->user_id = $this->session->userdata('user_id');
		parent::__construct();
    }//__construct

	/**
     * ToDo     : get company name
     * DB Table : tb_company_master
	 * @return  : companies names
    */
	public function get_comp_name()
	{
		return $this->db->select(['company_name','cm_id'])->get('tb_company_master')->result_array();
	}

	public function get_qut_data($status)
	{
		/* $action = '<div class="btn-group">
						<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-more-vertical"></i></button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="'.base_url('admin/Quotation/user_index/$1').'" data-toggle="tooltip" title="View">Edit</a>
							<a class="dropdown-item" href="'.base_url('admin/Quotation/company_detail/$1').'" data-toggle="tooltip" title="View">View</a>
						</div>
					</div>'; */
		return $this->db->select(['`tb_quotation`.`qut_id`',
							'`tb_quotation`.`qut_code`',
							'`tb_quotation`.`qut_subject`',
							'`tb_quotation`.`qut_status`',
							'`tb_customer`.`customer_name`',
							'`tb_customer`.`reference_by`',
							'`tb_quotation`.`qut_created`',
							'`tb_quotation`.`qut_expired`'])
			->where('tb_quotation.qut_status',$status)
			->join('tb_user','tb_user.user_id = tb_quotation.user_id')
			->join('tb_customer','tb_quotation.qut_cus_id = tb_customer.cus_id')
			->get('tb_quotation')->result_array();
		// $this->datatables->add_column('Actions', $action, 'qut_id');
		// return $this->datatables->generate();
	}

	public function add_quotation($data)
	{
		$qut_code = $this->gen_quotation_code();
		$this->db->insert('tb_quotation',[
							'qut_code'				=>	$qut_code,
							'cm_id'					=>	$data['cm_id'],
							'qut_subject'			=>	$data['qut_subject'],
							'qut_cus_id' 			=>	$data['qut_cus_id'],
							'qut_add'				=>	$data['qut_add'],
							'qut_created'			=>	$data['qut_created'],
							'qut_expired'			=>	$data['qut_expired'],
							'qut_status'			=>	$data['qut_status'],
							'qut_discount_type'		=>	$data['qut_discount_type'],
							'qut_discount_figure'	=>	$data['qut_discount_figure'],
							'qut_discount_amount'	=>	$data['qut_discount_amount'],
							'qut_tax_type'			=>	$data['qut_tax_type'],
							'qut_tax_rate'			=>	$data['qut_tax_rate'],
							'qut_sub_total'			=>	$data['qut_sub_total'],
							'qut_grand_total'		=>	$data['qut_grand_total'],
							'user_id'				=> 	$this->user_id
		]);
		
		$qut_id = $this->db->insert_id();

		if(!empty($data['qut_item_name'])){
			foreach ($data['qut_item_name'] as $key => $value) {
				if(!empty($value)){ 
					$this->db->insert('tb_quotation_product',[
								'qut_id'				=>	$qut_id,
								'cus_id'				=>	$data['qut_cus_id'],
								'qut_item_name'			=>	$value,
								'qut_qty_hrs'			=>	$data['qut_qty_hrs'][$key],
								'qut_unit_price'		=>	$data['qut_unit_price'][$key],
								'qut_sub_total_item'	=>	$data['qut_sub_total_item'][$key]
					]);
				}
			}
		}
		return true;
	}

	public function gen_quotation_code()
	{
		$CustomerCode=$this->db 
						->select(['qut_code'])
						->from('tb_quotation') 
						// ->where('dist_id IS NULL')
						->order_by('qut_code',"DESC")
						->get();
		$Icode=$CustomerCode->row();	
		if($CustomerCode->num_rows()==0){
			$CusCode="QUOTE"."1001"; // Starting Number
		}
		else
		{
			$number=preg_replace('/[A-Z]+/','',$Icode->qut_code );
			if($Icode->qut_code > 1000)
			{
				$CusCode = $number + 1;
				$CusCode = "QUOTE".$CusCode;
			}
			else{			
				$CusCode="QUOTE"."1001"; // Starting Number
			}   
		}
		return $CusCode;
	}
	
}
?>
