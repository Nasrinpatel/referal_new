<?php
class Authentication_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }//__construct

    public function check_login($cus_phone,$cus_id){
		if($cus_phone != null && !empty($cus_phone)){
        	$this->db->where('customer_phone_no', $cus_phone);
		}else{
			$this->db->where('cus_id', $cus_id);
		}
        // $this->db->where('password', md5($password));
        return $this->db->get('tb_customer')->row();
    }

	public function check_ad_login($user_phone,$user_id){
		if($user_phone != null && !empty($user_phone)){
        	$this->db->where('phone_no', $user_phone);
		}else{
			$this->db->where('user_id', $user_id);
		}
        // $this->db->where('password', md5($password));
        return $this->db->get('tb_user')->row();
    }
	
}
