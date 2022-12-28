<?php

class MY_Controller extends CI_Controller {
	protected $user_id; // Logged in user id
	
	public function __construct(){
		parent::__construct();
        if(!$this->session->userdata('renew')){
			$this->session->sess_destroy();
            redirect('front/Authentication');
        }

		// Check Logged in or not
		if($this->session->userdata('user_id')=='' && empty($this->session->userdata('user_id'))){
			// log_message('debug','session user not set');
			$this->session->sess_destroy();
            redirect('front/Authentication');
        }

		// Load Model
			$this->load->model('front/User_model','userModel');
		// End Load model
		
		//access permission from all pages
			$this->roleId = $this->session->userdata('user_type');//$this->getMyPermissions();
		
		//readonly true or false
			/* if($this->getUserType() != 1){
				$this->readonly = true;
			}else{
				$this->readonly = false;
			}  */
	}

	/* public function getUserType(){
		$this->user_id = $this->session->userdata('user_id');   // Set logged in user id       
		return $this->db->get_where('tb_user',array('user_id'=>$this->user_id))->row()->ur_id;
	} */

	public function getMyPermissions()
	{
        $this->user_id = $this->session->userdata('user_id');   // Set logged in user id       
		return $this->userModel->getRoleId($this->user_id);
		//print_r($response);
	}
}
?>
