<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';


class User extends MY_Controller {

    public function __construct(){
        parent::__construct();

		$this->load->model('front/User_model','user');
		$this->load->model('front/Product_model','product');
        if(!$this->session->userdata('user_id')){
            redirect('front/Authentication');
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
		if(checkPermission($this->roleId,'user')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['page_name'] = 'user/index';
		$data['usersData'] = $this->user->get_users();
		$this->load->view('front/index',$data);
	}

	public function add()
	{
		if(checkPermission($this->roleId,'user')->create_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['role'] = $this->user->role_list(); 
		$data['page_name'] = 'user/add';
        $this->load->view('front/index',$data);
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
				$this->session->set_flashdata('success','User added successfully');
			}
			else
			{
				$this->session->set_flashdata('error','User not added please try again!!!');
			}
			return redirect('front/User'); 
		}
		else
		{
			$data['role'] = $this->user->role_list(); 
			$data['page_name'] = 'user/add';
			$this->load->view('front/index',$data);
		}
	}

	public function edit($user_id)
	{
		if(checkPermission($this->roleId,'user')->create_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['role'] = $this->user->role_list();
		$data['ud'] = $this->user->userData($user_id);
		$data['page_name'] = 'user/edit';
		$this->load->view('front/index',$data);
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
				$this->session->set_flashdata('success','User updated successfully');
			}
			else
			{
				$this->session->set_flashdata('error','User not updated please try again!!!');
			}
			return redirect('front/User'); 
		}
		else
		{
			$data['role'] = $this->user->role_list();
			$data['ud'] = $this->user->userData($userId);
			$data['page_name'] = 'user/edit';
			$this->load->view('front/index',$data);
		}
	}

	public function view($user_id)
	{
		if(checkPermission($this->roleId,'user')->create_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['ud'] = $this->user->userData($user_id);
		$data['page_name'] = 'user/view';
        $this->load->view('front/index',$data);
	}

	public function delete($userId)
	{
		if(checkPermission($this->roleId,'user')->delete_all == 0){
			//$this->session->set_flashdata('error','You have no permission to access this page');
			//redirect('front/Dashboard');
			echo json_encode(array('status' => 'error', 'message' => "You have no permission to access this page",'url'=> base_url('Dashboard')));
		}
		$status = $this->user->userDel($userId);
		if($status != '-1')//data success
		{
			//$this->session->set_flashdata('success','User deleted successfully');
			echo json_encode(array('status' => 'success', 'message' => "User deleted successfully",'url'=> base_url('User')));
		}
		else
		{
			if($status == '-1'){
				// $this->session->set_flashdata('error','Some depending data has to store please remove it first after than delete it!!!');
				echo json_encode(array('status' => 'error', 'message' => "Some depending data has to store please remove it first after than delete it!!!",'url'=> base_url('User')));
			}else{
				// $this->session->set_flashdata('error','User not deleted please try again!!!');
				echo json_encode(array('status' => 'error', 'message' => "User can't not able to delete please try again",'url'=> base_url('User')));
			}
		}
		// return redirect('front/User'); 
	}

	public function mobileVal($id=null)
	{
		$mobNo=$_POST['mobile_no'];
		echo json_encode(userUniqValidation($mobNo,'phone_no',$id));
	}

	public function email_val($id=null)
	{
		$email = $_POST['email'];
		echo json_encode(userUniqValidation($email,'email',$id));
	}

}

?>
