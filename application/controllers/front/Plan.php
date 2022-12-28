<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Plan extends MY_Controller {

    public function __construct(){
        parent::__construct();

		// $this->load->model('front/Commission_model','commission');
		$this->load->model('front/Plan_model','plan');
        if(!$this->session->userdata('user_id')){
            redirect('front/Authentication');
        }
    }//__construct()

	public function cronTest()
	{
		$this->plan->everyMothCronGetRefCal();
	}
	public function index()
	{
		if(checkPermission($this->roleId,'plan')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['planData'] = $this->plan->all();
		$data['page_name'] = 'plan/index';
		$this->load->view('front/index',$data);
	}

	public function add()
	{
	    if(checkPermission($this->roleId,'plan')->add == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['page_name'] = 'plan/add';
		$this->load->view('front/index',$data);
	}

	public function store()
	{
		$data=$this->input->post();
		$data = $this->security->xss_clean($data);

		// echo"<pre>";print_r($data);exit;

		if($this->plan->add($data))//data success
		{
			$this->session->set_flashdata('success','Plan details add successfully');
		}
		else
		{
			$this->session->set_flashdata('error','Plan details do not add please try again!!!');
		}
		return redirect('front/Plan'); 
	}

	public function edit($planId)
	{
	    if(checkPermission($this->roleId,'plan')->edit == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['pl'] = $this->plan->edit_pl($planId);
		$data['planDet'] = $this->plan->edit_pl_det($planId);
		$data['page_name'] = 'plan/edit';
		$this->load->view('front/index',$data);
	}

	public function update($plan_id)
	{
		$data=$this->input->post();
		$data = $this->security->xss_clean($data);

		// echo"<pre>";print_r($data);exit;
		if($this->plan->update($plan_id,$data))//data success
		{
			$this->session->set_flashdata('success','Plan details update successfully');
		}
		else
		{
			$this->session->set_flashdata('error','Plan details do not update please try again!!!');
		}
		return redirect('front/Plan'); 
	}

}
?>
