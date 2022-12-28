<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';


class User_role extends MY_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model('front/User_model','user');
		$this->load->model('front/Product_model','product');
		if(!$this->session->userdata('user_id')){
            redirect('front/Authentication');
        }
    }//__construct()

	public function index()
	{
		/* if(checkPermission($this->roleId,'user_role')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/dashboard');
		} */
		$data['user_role'] = $this->user->getUserRole();
		$data['page_name'] = 'user_role/index';
		$this->load->view('front/index',$data);
	}

	public function add()
	{
		/* if((checkPermission($this->roleId,'user_role')->create_all == 0)){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		} */
		$data['page_name'] = 'user_role/add';
		$this->load->view('front/index',$data);
	}

	public function ur_store()
	{
		// $data=$this->input->post();
		// echo "<pre>"; print_r($data); exit;

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('user_role_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);
			
			if($this->user->storeUserRole($data))//data success
			{
				$this->session->set_flashdata('success','User role added successfully');
			}
			else
			{
				$this->session->set_flashdata('error','User role not added please try again!!!');
			}
			return redirect('front/User_role'); 
		}
		else
		{
			$data['page_name'] = 'user_role/add';
			$this->load->view('front/index',$data);
		}
	}

	public function edit($ur_id)
	{
		if((checkPermission($this->roleId,'user_role')->edit_all == 0)){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['ur_edit'] = $this->user->getUserRoleData($ur_id);
		$data['page_name'] = 'user_role/edit';
        $this->load->view('front/index',$data);
	}

	public function ur_update($roleId)
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('user_role_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);
			// echo"<pre>"; print_r($data); exit;
			if($this->user->updateUserRole($data,$roleId))//data success
			{
				$this->session->set_flashdata('success','User role updated successfully');
			}
			else
			{
				$this->session->set_flashdata('error','User role not updated please try again!!!');
			}

			return redirect('front/User_role'); 
		}
		else
		{
			$data['ur_edit'] = $this->user->getUserRoleData($roleId);
			$data['page_name'] = 'user/user_role_edit';
			$this->load->view('front/index',$data);
		}
	}

	public function delete($urId)
	{
		if((checkPermission($this->roleId,'user_role')->delete_all == 0)){
			//$this->session->set_flashdata('error','You have no permission to access this page');
			//redirect('front/Dashboard');
			echo json_encode(array('status' => 'error', 'message' => "You have no permission to access this page",'url'=> base_url('Dashboard')));
		}
		$status = $this->user->userRoleDel($urId);
		// echo $status; exit;
		if($status != '-1')//data success
		{
			//$this->session->set_flashdata('success','User role deleted successfully');
			echo json_encode(array('status' => 'success', 'message' => "User role deleted successfully",'url'=> base_url('User_role')));
		}
		else
		{
			if($status == '-1'){
				//$this->session->set_flashdata('error','Some depending data has to store please remove it first after than delete it!!!');
				echo json_encode(array('status' => 'error', 'message' => "Some depending data has to store please remove it first after than delete it!!!",'url'=> base_url('User_role')));
			}else{
				//$this->session->set_flashdata('error','User role not deleted please try again!!!');
				echo json_encode(array('status' => 'error', 'message' => "User role not deleted please try again!!!",'url'=> base_url('User_role')));
			}
		}
		//return redirect('front/User_role'); 
	}

}

?>
