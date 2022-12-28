<?php

class Email_template_model extends CI_Model{

	public function __construct(){
		$this->user_id = $this->session->userdata('user_id');
        parent::__construct();
    }//__construct

	public function all()
	{
		return $this->db->select('*')->get('tb_email_template')->result_array();
	}

	public function add($data)
	{
		// echo "<pre>"; print_r($data); exit;

		return $this->db->insert('tb_email_template',[
											'email_for'=>$data['email_for'],
											'email_subject'=>$data['email_subject'],
											'email'=>$data['email']
										]);
	}

	public function edit($et_id)
	{
		return $this->db->where('et_id',$et_id)->get('tb_email_template')->row();
	}

	public function update($etId,$data)
	{
		return $this->db->where('et_id',$etId)
						->update('tb_email_template',[
							'email_for'=>$data['email_for'],
							'email_subject'=>$data['email_subject'],
							'email'=>$data['email']
						]);
	}
}
?>
