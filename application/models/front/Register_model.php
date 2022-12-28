<?php
class Register_model extends CI_Model
{
    public function __construct(){
       
		$this->user_id = $this->session->userdata('user_id');
		parent::__construct();
    }//__construct+

	public function storeRegister($data)
	{
		return $this->db->insert('tb_customer',[
			                    // 'company_name'=>$data['company_name'],
								'customer_name'=>$data['customer_name'],
								'customer_phone_no'=>$data['full_phone'],
								'customer_email'=>$data['customer_email']
							
		]);
	}

}
?>
