<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';


class Customer extends MY_Controller {

    public function __construct(){
        parent::__construct();
		// $this->load->model('front/Customer_model','customer');
		$this->load->model('front/Product_model','product');
        if(!$this->session->userdata('user_id')){
            redirect('front/Authentication');
        }
    }//__construct()


	public function index()
	{
		if(checkPermission($this->roleId,'customer')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['cusData'] = $this->customer->get_customer_data();
		$data['page_name'] = 'customer/index';
		$this->load->view('front/index',$data);
	}

	public function convertCus()
	{
		if(checkPermission($this->roleId,'customer')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['cusData'] = $this->customer->get_con_customer_data();
		$data['page_name'] = 'customer/convert_cus';
		$this->load->view('front/index',$data);
	}

	public function add()
	{
		if(checkPermission($this->roleId,'customer')->create_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['get_comp_name'] = $this->product->get_comp_name();
    	$data['cusRefData'] = $this->customer->get_ref_customer_data($cus_id=null);
		$data['roleData'] = $this->customer->get_user_role();
		// echo "<pre>";print_r($data['roleData']);exit;
		$data['page_name'] = 'customer/add';	
        $this->load->view('front/index',$data);
	}

	public function store()
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('customer_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->customer->add_customer($data))//data success
			{
				$this->session->set_flashdata('success','Referral added successfully');
			}
			else
			{
				$this->session->set_flashdata('error','Referral not added please try again!!!');
			}
			return redirect('front/Customer'); 
		}
		else
		{
			$data['get_comp_name'] = $this->product->get_comp_name();
			$data['cusRefData'] = $this->customer->get_customer_data();
			$data['roleData'] = $this->customer->get_user_role();
			$data['page_name'] = 'customer/add';	
			$this->load->view('front/index',$data);
		}
	}

	public function edit($cusId)
	{
		if(checkPermission($this->roleId,'customer')->edit_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['cusDetData'] = $this->customer->get_cus_data($cusId);
		$data['cusRefData'] = $this->customer->get_ref_customer_data($cusId);
		$data['get_comp_name'] = $this->product->get_comp_name();
		$data['proCompDet'] = $this->customer->getCusCom($cusId);
		$data['roleData'] = $this->customer->get_user_role();
		// echo "<pre>";print_r($data['roleData']);exit;
		$data['page_name'] = 'customer/edit';	
        $this->load->view('front/index',$data);
	}

	public function update($cusId)
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('customer_update')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->customer->update_customer($cusId,$data))//data success
			{
				if($cusId == $data['cus_ref_id']){
					$this->session->set_flashdata('success','Profile details update successfully');
				}else{
					$this->session->set_flashdata('success','Referral details update successfully');
				}
			}
			else
			{
				if($cusId == $data['cus_ref_id']){
					$this->session->set_flashdata('error','Profile details do not update please try again!!!');
				}else{
					$this->session->set_flashdata('error','Referral details do not update please try again!!!');
				}
			}
			return redirect('front/Customer'); 
		}
		else
		{
		    $data['cusDetData'] = $this->customer->get_cus_data($cusId);
    		$data['cusRefData'] = $this->customer->get_ref_customer_data($cusId);
    		$data['get_comp_name'] = $this->product->get_comp_name();
    		$data['proCompDet'] = $this->customer->getCusCom($cusId);
    		$data['roleData'] = $this->customer->get_user_role();
			$data['page_name'] = 'customer/edit';	
			$this->load->view('front/index',$data);
		}
	}

	public function view($cusId)
	{
		if(checkPermission($this->roleId,'customer')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['cusDetData'] = $this->customer->get_cus_data($cusId);
		$data['get_comp_name'] = $this->product->get_comp_name();
		$data['proCompDet'] = $this->customer->getCusCom($cusId);
		$data['refData'] = $this->customer->getRefCusData($cusId);
		$data['cusComm'] = $this->customer->getRefCusCommissionData($cusId);
		$data['page_name'] = 'customer/view';	
        $this->load->view('front/index',$data);
	}

	public function delete($proId)
	{
		if(checkPermission($this->roleId,'customer')->delete_all == 0){
            //$this->session->set_flashdata('error','You have no permission to access this page');
            //redirect('front/Dashboard');
            echo json_encode(array('status' => 'error', 'message' => "You have no permission to access this page",'url'=> base_url('Dashboard')));
		}
		if($this->customer->delete_customer($proId)){
			//$this->session->set_flashdata('success','Customer deleted successfully');
			echo json_encode(array('status' => 'success', 'message' => 'Referral deleted successfully','url'=> base_url('Customer')));
        }else{
            //$this->session->set_flashdata('error',"Customer can't able to delete please try again!!!");
            echo json_encode(array('status' => 'error', 'message' => "Referral can't able to delete please try again!!!",'url'=> base_url('Customer')));
        }
		//return redirect('front/Customer'); 
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

	public function edit_cus_convert($cus_id)
	{
		$userData = $this->customer->get_cus_data($cus_id);
		if($userData){
		echo json_encode(['result'=>true,
							'cusId'=>$userData->Customer_id,
							'convertCus'=>$userData->convert_cus,
							]);
		}else{
			echo json_encode(['result'=>false,
								'cusId'=>'',
								'convertCus'=>'']);
		}
	}

	public function cus_convert_update($cusId)
	{
		$data=$this->input->post();
		$data = $this->security->xss_clean($data);
		// echo "<pre>"; print_r($data);exit;

		if($this->customer->update_cus_con($cusId,$data))//data success
		{
			echo json_encode(array('status' => 'success', 'message' => 'Referral Bought successfully','url'=> base_url('Customer')));
		}
		else
		{
			echo json_encode(array('status' => 'error', 'message' => 'Something went wrong. Please try again','url'=> base_url('Customer')));	
		}
	}
}	
?>
