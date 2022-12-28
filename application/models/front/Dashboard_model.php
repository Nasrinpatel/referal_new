<?php
class Dashboard_model extends CI_Model
{
    public function __construct(){
		$this->user_id = $this->session->userdata('user_id');
        parent::__construct();
    }//__construct

    public function admin_acc_det(){
        return $this->db->select('*')->where('user_id',$this->user_id)->get('tb_user')->row();
    }

	public function update_acc_det($userId,$data)
	{
		return $this->db->where('user_id',$userId)->update('tb_user',['name'=>$data['name'],'email'=>$data['email']]);
	}

	public function update_pass($userId,$data)
	{
		return $this->db->where('user_id',$userId)->update('tb_user',['password'=>md5($data['new_pass'])]);
	}

	public function getCurMonthRefList()
	{
		$this->db->select(['*']);
		$this->db->where('tb_customer.cus_ref_id',$this->user_id);
		$this->db->where('MONTH(tb_customer.refer_date)',date('m'));
		$this->db->join('tb_plan','tb_plan.plan_id = tb_customer.plan_id');
		$this->db->order_by('tb_customer.cus_id','asc');
		$this->db->order_by('refer_date', 'desc');	
		return $this->db->get('tb_customer')->result_array();
		// echo $this->db->last_query(); exit;
	}
}
