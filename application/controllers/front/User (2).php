<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';


class User extends MY_Controller {

    public function __construct(){
        parent::__construct();

		$this->load->model('admin/User_model','user');
		$this->load->model('admin/Product_model','product');
        if(!$this->session->userdata('user_id')){
            redirect('admin/Authentication');
        }
    }//__construct()

	public function test()
	{
		$num = '8200394893';

		echo substr( $num, 0, 2 ) // Get the first two digits
			.str_repeat( '*', ( strlen( $num ) - 4 ) ) // Apply enough asterisks to cover the middle numbers
			.substr( $num, -2 ); // Get the last two digits
	}
	
	public function index()
	{	
		if($this->MyPermissions->view == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
		$this->load->view('admin/user/index');
		$this->load->view('admin/include/footer');
	}

	public function getUserData()
	{
		echo $this->user->get_users();
	}

	public function add()
	{
		if($this->MyPermissions->create_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['role'] = $this->user->role_list();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
        $this->load->view('admin/user/add',$data);
		$this->load->view('admin/include/footer');
	}

	public function check_default($post_string)
	{
		// echo $post_string; exit;
		return $post_string == '--select--' ? FALSE : TRUE;
	}

	public function store()
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('user_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->user->storeUser($data))//data success
			{
				$this->session->set_flashdata('error_flash','User added successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','User not added please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('admin/User'); 
		}
		else
		{
			$data['role'] = $this->user->role_list();
			$this->load->view('admin/include/header');
			$this->load->view('admin/include/topbar'); 
			$this->load->view('admin/user/add',$data);
			$this->load->view('admin/include/footer');
		}
	}

	public function edit($user_id)
	{
		if($this->MyPermissions->create_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['role'] = $this->user->role_list();
		$data['ud'] = $this->user->userData($user_id);
		// echo"<pre>"; print_r($data['ud']);exit;
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
        $this->load->view('admin/user/edit',$data);
		$this->load->view('admin/include/footer');
	}

	public function update($userId)
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('user_update')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->user->updateUser($data,$userId))//data success
			{
				$this->session->set_flashdata('error_flash','User updated successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','User not updated please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('admin/User'); 
		}
		else
		{
			$data['role'] = $this->user->role_list();
			$data['ud'] = $this->user->userData($userId);
			// echo"<pre>"; print_r($data['ud']);exit;
			$this->load->view('admin/include/header');
			$this->load->view('admin/include/topbar'); 
			$this->load->view('admin/user/edit',$data);
			$this->load->view('admin/include/footer');
		}
	}

	public function view($user_id)
	{
		if($this->MyPermissions->create_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['ud'] = $this->user->userData($user_id);
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
        $this->load->view('admin/user/view',$data);
		$this->load->view('admin/include/footer');
	}

	public function delete($userId)
	{
		$status = $this->user->userDel($userId);
		// echo $status; exit;
		if($status != '-1')//data success
		{
			$this->session->set_flashdata('error_flash','User deleted successfully');
			$this->session->set_flashdata('error_flash_class','all-success');
		}
		else
		{
			if($status == '-1'){
				$this->session->set_flashdata('error_flash','Some depending data has to store please remove it first after than delete it!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}else{
				$this->session->set_flashdata('error_flash','User not deleted please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
		}
		return redirect('admin/User'); 
	}

	public function user_role()
	{
		if($this->MyPermissions->view == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/dashboard');
		}
		$data['user_role'] = $this->user->getUserRole();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
		$this->load->view('admin/user/user_role',$data);
		$this->load->view('admin/include/footer');
	}

	public function user_role_add()
	{
		if($this->MyPermissions->create_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
        $this->load->view('admin/user/user_role_add');
		$this->load->view('admin/include/footer');
	}

	public function ur_store()
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('user_role_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->user->storeUserRole($data))//data success
			{
				$this->session->set_flashdata('error_flash','User role added successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','User role not added please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('admin/User/user_role'); 
		}
		else
		{
			$this->load->view('admin/include/header');
			$this->load->view('admin/include/topbar'); 
			$this->load->view('admin/user/user_role_add');
			$this->load->view('admin/include/footer');
		}
	}

	public function user_role_edit($ur_id)
	{
		if($this->MyPermissions->create_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['ur_edit'] = $this->user->getUserRoleData($ur_id);
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
        $this->load->view('admin/user/user_role_edit',$data);
		$this->load->view('admin/include/footer');
	}

	public function ur_update($urId)
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('user_role_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->user->updateUserRole($data,$urId))//data success
			{
				$this->session->set_flashdata('error_flash','User role updated successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','User role not updated please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('admin/User/user_role'); 
		}
		else
		{
			$data['ur_edit'] = $this->user->getUserRoleData($urId);
			$this->load->view('admin/include/header');
			$this->load->view('admin/include/topbar'); 
			$this->load->view('admin/user/user_role_edit',$data);
			$this->load->view('admin/include/footer');
		}
	}

	public function user_role_delete($urId)
	{
		$status = $this->user->userRoleDel($urId);
		// echo $status; exit;
		if($status != '-1')//data success
		{
			$this->session->set_flashdata('error_flash','User role deleted successfully');
			$this->session->set_flashdata('error_flash_class','all-success');
		}
		else
		{
			if($status == '-1'){
				$this->session->set_flashdata('error_flash','Some depending data has to store please remove it first after than delete it!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}else{
				$this->session->set_flashdata('error_flash','User role not deleted please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
		}
		return redirect('admin/User/user_role'); 
	}

}

?>
