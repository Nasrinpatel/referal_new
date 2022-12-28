<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';


class Customer_referral extends MY_Controller {

    public function __construct(){
        parent::__construct();

		$this->load->model('admin/Customer_ref_model','customer_ref');
		$this->load->model('admin/Product_model','product');
        if(!$this->session->userdata('user_id')){
            redirect('admin/Authentication');
        }
    }//__construct()


	public function index()
	{
		if(checkPermission($this->roleId,'user_role')->view == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}	
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
		$this->load->view('admin/customer_ref/index');
		$this->load->view('admin/include/footer');
	}

	public function getCusRefData()
	{
		$data= $this->customer_ref->get_customer_data();
		echo $data;
	}

	public function add()
	{
		if(checkPermission($this->roleId,'user_role')->create_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['get_comp_name'] = $this->product->get_comp_name();
		$data['get_cus'] = $this->customer_ref->get_cus_name();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
        $this->load->view('admin/customer_ref/add',$data);
		$this->load->view('admin/include/footer');
	}

	public function store()
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('customer_ref_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->customer_ref->add_customer_ref($data))//data success
			{
				$this->session->set_flashdata('error_flash','Referral  added successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','Referral  not added please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('admin/Customer_referral'); 
		}
		else
		{
			$this->load->view('admin/include/header');
			$this->load->view('admin/include/topbar'); 
			$this->load->view('admin/customer_ref/add');
			$this->load->view('admin/include/footer');
		}
	}

	public function edit($crId)
	{
		if(checkPermission($this->roleId,'user_role')->edit_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['cusRefData'] = $this->customer_ref->get_cusRef_data($crId);
		$data['get_comp_name'] = $this->product->get_comp_name();
		$data['cusRefCom'] = $this->customer_ref->getCusRefCom($crId);
		$data['get_cus'] = $this->customer_ref->get_cus_name();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
		$this->load->view('admin/customer_ref/edit', $data);
		$this->load->view('admin/include/footer');
	}

	public function update($crId)
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('customer_ref_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->customer_ref->update_customer_ref($crId,$data))//data success
			{
				$this->session->set_flashdata('error_flash','Referral  details update successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','Referral  details do not update please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('admin/Customer_referral'); 
		}
		else
		{
			$data['cusRefData'] = $this->customer_ref->get_cusRef_data($crId);
			$data['get_comp_name'] = $this->product->get_comp_name();
			$data['cusRefCom'] = $this->customer_ref->getCusRefCom($crId);
			$data['get_cus'] = $this->customer_ref->get_cus_name();
			$this->load->view('admin/include/header');
			$this->load->view('admin/include/topbar'); 
			$this->load->view('admin/customer_ref/edit', $data);
			$this->load->view('admin/include/footer');
			
		}
	}

	public function view($crId)
	{
		if(checkPermission($this->roleId,'user_role')->view == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['cusRefData'] = $this->customer_ref->get_cusRef_data($crId);
		$data['cusRefComp'] = $this->customer_ref->getRefCusCompName($crId);
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
		$this->load->view('admin/customer_ref/view', $data);
		$this->load->view('admin/include/footer');
	}

	public function delete($crId)
	{
		if(checkPermission($this->roleId,'user_role')->delete_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}

		if($this->customer_ref->delete_customer_ref($crId)){
			$this->session->set_flashdata('error_flash','Referral  deleted successfully');
			$this->session->set_flashdata('error_flash_class','all-success');
        }else{
            $this->session->set_flashdata('error_flash',"Referral  can't able to delete please try again!!!");
				$this->session->set_flashdata('error_flash_class','all-error');
        }
		return redirect('admin/Customer_referral'); 
	}
}	
?>
