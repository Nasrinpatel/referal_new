<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('front/User_model','userdigi');
	}

	public function index()
	{
		$data['page_name'] = 'user_list';
		$data['userData'] = $this->user->all();
		$this->load->view('front/index',$data);
	}

	public function all()
	{
		$data = $this->user->all();
		echo json_encode($data);
	}
	
	public function store()
	{
		$formArray = array();
		$formArray['name'] = $this->input->post('name');
		$formArray['email'] = $this->input->post('email');
		$formArray['phone'] = $this->input->post('phone');
		$formArray['password'] = md5($this->input->post('password'));

		$response = $this->user->saveRecords($formArray);
		if ($response == true) {
			echo json_encode(array('status' => 'success', 'message' => 'User added successfully'));
		} else {
			echo json_encode(array('status' => 'error', 'message' => 'Something went wrong. Please try again'));
		}
	}

	public function edit_user($irmId)
	{
		$userData = $this->user->editUser($irmId);
		echo json_encode([	'userName'=>$userData->name,
							'userEmail'=>$userData->email,
							'userPhone'=>$userData->phone,
							'userAdminId'=>$userData->admin_id]);
	}

	public function update_user($admin_id){
		$formArray = array();
		$formArray['name'] = $this->input->post('name');
		$formArray['email'] = $this->input->post('email');
		$formArray['phone'] = $this->input->post('phone');
		$formArray['password'] = $this->input->post('password');
		$response = $this->user->updateRecords($admin_id,$formArray);
		if ($response == true) {
			// $this->session->set_flashdata('success','User Updated Successfully.');
			echo true;
		} else {
			// $this->session->set_flashdata('error','Something went wrong. Please try again');
			echo false;
		}
		// return redirect('front/state');
	}
	

	public function delete($id)
	{
		$response = $this->user->delete($id);
		if ($response == true) {
			$this->session->set_flashdata('success','User deleted successfully.');
		} else {
			$this->session->set_flashdata('error','Something went wrong. Please try again');
		}
		return redirect('front/user');
	}

}
