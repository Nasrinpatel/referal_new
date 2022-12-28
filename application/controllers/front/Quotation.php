<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';


class Quotation extends MY_Controller {

    public function __construct(){
        parent::__construct();

		$this->load->model('front/Quotation_model','quotation');
		$this->load->model('front/Customer_ref_model','customer_ref');
		$this->load->model('front/Product_model','product');
        if(!$this->session->userdata('user_id')){
            redirect('front/Authentication');
        }
    }//__construct()


	public function index($status)
	{
		/* if(checkPermission($this->roleId,'user_role')->view == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('front/Dashboard');
		} */	
		$data['qutData'] = $this->quotation->get_qut_data($status);
		$data['page_name'] = 'quotation/quotation_list'; 
		$this->load->view('front/index',$data);
	}

	public function add()
	{
		/* if(checkPermission($this->roleId,'user_role')->create_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('front/Dashboard');
		} */
		$data['page_name'] = 'quotation/add';
		$data['get_cus'] = $this->customer_ref->get_cus_name();
		$data['get_comp_name'] = $this->product->get_comp_name();
		
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
		
		if ($this->form_validation->run('quotation_add')) //validation success 
		{
			// $this->form_validation->set_rules('cm_id','Company','required|callback_check_default');
			// $this->form_validation->set_message('check_default', 'You need to select something other than the default');
			// if($this->input->post('qut_grand_total')!='0'){
				$data=$this->input->post();
				$data = $this->security->xss_clean($data);

				if($this->quotation->add_quotation($data))//data success
				{
					$this->session->set_flashdata('error_flash','Referral added successfully');
					$this->session->set_flashdata('error_flash_class','all-success');
				}
				else
				{
					$this->session->set_flashdata('error_flash','Referral not added please try again!!!');
					$this->session->set_flashdata('error_flash_class','all-error');
				}
				return redirect('front/Quotation/index/'.$this->input->post('qut_status').'_quotation'); 
			// }
			// else
			// {
			// 	$this->session->set_flashdata('error_flash','Please add at least one product!!!');
			// 	$this->session->set_flashdata('error_flash_class','all-error');
			// 	$this->add();
			// 	// $data['get_cus'] = $this->customer_ref->get_cus_name();
			// 	// $data['get_comp_name'] = $this->product->get_comp_name();
			//
			// 	// 
			// 	// $this->load->view('front/quotation/add',$data);
			//
			// }
		}
		else
		{
			// echo validation_errors();
			$data['get_cus'] = $this->customer_ref->get_cus_name();
			$data['get_comp_name'] = $this->product->get_comp_name();
			
			$this->load->view('front/quotation/add',$data);
		}
	}

	public function edit($cusId)
	{
		if(checkPermission($this->roleId,'user_role')->edit_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('front/Dashboard');
		}
		$data['cusDetData'] = $this->customer->get_cus_data($cusId);
		$data['get_comp_name'] = $this->product->get_comp_name();
		$data['proCompDet'] = $this->customer->getCusCom($cusId);
		
		$this->load->view('front/quotation/edit', $data);
	}

	public function update($cusId)
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('customer_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->customer->update_customer($cusId,$data))//data success
			{
				$this->session->set_flashdata('error_flash','Referral details update successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','Referral details do not update please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('front/Customer'); 
		}
		else
		{
			$data['cusDetData'] = $this->customer->get_cus_data($cusId);
			$data['get_comp_name'] = $this->product->get_comp_name();
			$data['proCompDet'] = $this->customer->getCusCom($cusId);
			
			$this->load->view('front/quotation/edit', $data);
			
		}
	}

	public function view($cusId)
	{
		if(checkPermission($this->roleId,'user_role')->view == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('front/Dashboard');
		}
		$data['cusDetData'] = $this->customer->get_cus_data($cusId);
		$data['get_comp_name'] = $this->product->get_comp_name();
		$data['proCompDet'] = $this->customer->getCusCom($cusId);
		
		$this->load->view('front/quotation/view', $data);
	}

	public function delete($proId)
	{
		if(checkPermission($this->roleId,'user_role')->delete_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('front/Dashboard');
		}
		if($this->customer->delete_customer($proId)){
			$this->session->set_flashdata('error_flash','Referral deleted successfully');
			$this->session->set_flashdata('error_flash_class','all-success');
        }else{
            $this->session->set_flashdata('error_flash',"Referral can't able to delete please try again!!!");
				$this->session->set_flashdata('error_flash_class','all-error');
        }
		return redirect('front/Customer'); 
	}
}	
?>
