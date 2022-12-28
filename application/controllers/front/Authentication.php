<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('front/Authentication_model','authentic');
    }//__construct()

	public function index()
	{
        $userSession = $this->session->userdata('user_id');
		
		if(isset($userSession) && !empty($userSession) ){
			return redirect('front/Dashboard');
		} 

        /*if($this->input->post()){
			$email = $this->security->xss_clean($this->input->post('email'));
			if(strlen($email) == 13){
				// $password = $this->security->xss_clean($this->input->post('password'));
				$user = $this->authentic->check_login(substr($email,3)); //$password
				if(!empty($user) || $user!=''){
					$this->session->set_flashdata('success', 'Login successfully!');
					$this->session->set_userdata('renew', 1);
					// $this->session->set_userdata('user_type', $user->user_type_id);
					$this->session->set_userdata('user_id', $user->user_id);
					$this->session->set_userdata('user_name', $user->name);
					$this->session->set_userdata('user_email', $user->email);
					// $this->session->set_userdata('password_change_permission', $user->password_change_permission);
					//  $this->db->insert('login_logout_logs', [
					// 	'user_id' => $user->id,
					// 	'activity' => 'login',
					// 	'ip_address' => $this->input->ip_address()
					// ]);
					redirect('front/Dashboard');
				}else{
					$this->session->set_flashdata('error', 'Invalid login credentials!');
					// $this->session->set_flashdata('error_flash_class', 'all-error');
				}
			}else{
				$this->session->set_flashdata('error', 'Please enter country code first!!!');
			}
        } */
		$data['page_name'] = 'login';
		$this->load->view('front/index',$data);
    }

	public function login_check()
	{
		$phone = $this->security->xss_clean($this->input->post('full_phone'));

		$user = $this->authentic->check_login($phone, $password=null);
		if(!empty($user))
		{
			echo json_encode(array('status' => 'success', 'msg' => '','cusData'=>$user));
		}
		else
		{
			echo json_encode(array('status' => 'error', 'msg' => 'Entered mobile number not registered with us','cusData'=>''));	
		}
	}

	public function redirect_db($cus_id)
	{
		$cus= $this->authentic->check_login($phone=null, $cus_id);	
		if(!empty($cus)){
			$this->session->set_userdata('renew', 1);
			$this->session->set_userdata('is_admin', 0);
			$this->session->set_userdata('user_type', $cus->ur_id);
			$this->session->set_userdata('user_id', $cus->cus_id);
			$this->session->set_userdata('user_name', $cus->customer_name);
			$this->session->set_userdata('user_email', $cus->customer_email);
			echo json_encode(array("status" => "success", "msg" => "","url"=>base_url()."front/Dashboard"));
		}else{
			echo json_encode(array("status" => "error", "msg" => "","url"=>base_url()."front/Authentication"));
		}

	}
    
	public function admin_login()
	{
		$userSession = $this->session->userdata('user_id');
		
		if(isset($userSession) && !empty($userSession) ){
			return redirect('front/Dashboard');
		} 
		$data['page_name'] = 'admin_login';
		$this->load->view('front/index',$data);
	}

	public function admin_login_check()
	{
		$phone = $this->security->xss_clean($this->input->post('full_phone'));
		$user = $this->authentic->check_ad_login($phone, $password=null);
		if(!empty($user))
		{
			echo json_encode(array('status' => 'success', 'msg' => '','userData'=>$user));
		}
		else
		{
			echo json_encode(array('status' => 'error', 'msg' => 'Entered mobile number not registered with us','userData'=>''));	
		}
	}

	public function ad_redirect_db($user_id)
	{
		$adUser= $this->authentic->check_ad_login($phone=null, $user_id);	
		if(!empty($adUser)){
			$this->session->set_userdata('renew', 1);
			$this->session->set_userdata('is_admin', 1);
			$this->session->set_userdata('user_type', $adUser->ur_id);
			$this->session->set_userdata('user_id', $adUser->user_id);
			$this->session->set_userdata('user_name', $adUser->name);
			$this->session->set_userdata('user_email', $adUser->email);
			echo json_encode(array("status" => "success", "msg" => "","adUrl"=>base_url()."front/Dashboard"));
		}else{
			echo json_encode(array("status" => "error", "msg" => "","adUrl"=>base_url()."front/Authentication/admin_login"));
		}

	}

    public function logout(){
       /*  $this->db->insert('login_logout_logs', [
            'user_id' => $this->session->userdata('user_id'),
            'activity' => 'logout',
            'ip_address' => $this->input->ip_address()
        ]); */
		$this->session->sess_destroy();
		$urData = get_data('tb_user_role','role_id',$this->session->userdata('user_type'));
		if($urData->role_name == 'Admin'){
			return redirect(base_url('admin'));
		}else{
			return redirect(base_url());
		}
    }
}
