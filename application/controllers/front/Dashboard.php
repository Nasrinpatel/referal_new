<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends MY_Controller {
	
	public function __construct(){
        parent::__construct();
        $this->load->model('front/Dashboard_model','dashboard'); // for credit limit counting
    }//__construct()

    public function index(){
		$data['refList'] = $this->dashboard->getCurMonthRefList();
		$data['page_name'] = 'dashboard/home';
		$this->load->view('front/index',$data);
	}

	public function account_view()
	{
		$data['accDet'] = $this->dashboard->admin_acc_det();
        $data['page_name'] = 'dashboard/acc_view';
		$this->load->view('front/index',$data);
	}

	public function update_acc($user_id)
	{
		$data=$this->input->post();
		$data = $this->security->xss_clean($data);

		if($this->dashboard->update_acc_det($user_id,$data))//data success
		{
			$this->session->set_flashdata('error_flash','Admin details update successfully');
			$this->session->set_flashdata('error_flash_class','all-success');
		}
		else
		{
			$this->session->set_flashdata('error_flash','Admin details do not update please try again!!!');
			$this->session->set_flashdata('error_flash_class','all-error');
		}
		return redirect('front/Dashboard'); 
	}

	public function change_pass()
	{
		$data['accDet'] = $this->dashboard->admin_acc_det();
		$this->load->view('front/include/header');
        $this->load->view('front/include/topbar');
        $this->load->view('front/dashboard/pass_change',$data);
        $this->load->view('front/include/footer');
	}

	public function pass_update($userId)
	{
		$known_str = md5($this->input->post('old_pass'));
		$usr_str = $this->input->post('old_pass_hid');
		$res = hash_equals($known_str, $usr_str); 
   		// $passMatch = var_dump($res);
		if ($res == '1'){
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->dashboard->update_pass($userId,$data))//data success
			{
				$this->session->set_flashdata('error_flash','Password update successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','Password do not update please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('front/Dashboard');
		}else{
			// exit;
			$this->session->set_flashdata('error_flash',"Entered old password has does't match to your previous set password !!!");
			$this->session->set_flashdata('error_flash_class','all-error');

			$data['accDet'] = $this->dashboard->admin_acc_det();
			$this->load->view('front/include/header');
			$this->load->view('front/include/topbar');
			$this->load->view('front/dashboard/pass_change',$data);
			$this->load->view('front/include/footer');
		}
	}
}

?>
