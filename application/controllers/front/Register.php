<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';


class Register extends CI_Controller {

    public function __construct(){
        parent::__construct();
		$this->load->model('front/Register_model','register');
		$this->load->model('front/Product_model','product');
        // if(!$this->session->userdata('user_id')){
        //     redirect('front/Authentication');
        // }
    }//__construct()


	// public function index()
	// {
	// 	if(checkPermission($this->roleId,'customer')->view == 0){
	// 		$this->session->set_flashdata('error','You have no permission to access this page');
	// 		redirect('front/Dashboard');
	// 	}
	// 	$data['cusData'] = $this->customer->get_customer_data();
	// 	$data['page_name'] = 'customer/index';
	// 	$this->load->view('front/index',$data);
	// }

	// public function convertCus()
	// {
	// 	if(checkPermission($this->roleId,'customer')->view == 0){
	// 		$this->session->set_flashdata('error','You have no permission to access this page');
	// 		redirect('front/Dashboard');
	// 	}
	// 	$data['cusData'] = $this->customer->get_con_customer_data();
	// 	$data['page_name'] = 'customer/convert_cus';
	// 	$this->load->view('front/index',$data);
	// }

	public function index()
	{
		// if(checkPermission($this->roleId,'register')->create_all == 0){
		// 	$this->session->set_flashdata('error','You have no permission to access this page');
		// 	redirect('front/Dashboard');
		// }
		$data['get_comp_name'] = $this->product->get_comp_name();
    	// $data['cusRefData'] = $this->customer->get_ref_customer_data($cus_id=null);
		// $data['roleData'] = $this->customer->get_user_role();
		// echo "<pre>";print_r($data['roleData']);exit;
		$data['page_name'] = 'register';	
        $this->load->view('front/index',$data);
	}

	public function store()
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('register_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->register->storeRegister($data))//data success
			{
				$this->session->set_flashdata('success','Register successfully');
			}
			else
			{
				$this->session->set_flashdata('error','Register not added please try again!!!');
			}
			return redirect('front/Authentication'); 
		}
		else
		{
			$data['get_comp_name'] = $this->product->get_comp_name();
			// $data['cusRefData'] = $this->customer->get_customer_data();
			// $data['roleData'] = $this->customer->get_user_role();
			$data['page_name'] = 'register';	
			$this->load->view('front/index',$data);
		}
	}

	public function mobileVal($id=null)
	{
		$mobNo=$_POST['mobile_no'];
		echo json_encode(cusMobValidation($mobNo,'customer_phone_no',$id));
	}

	public function email_val($id=null)
	{
		$email = $_POST['email'];
		echo json_encode(cusMobValidation($email,'customer_email',$id));
	}
}	
?>
