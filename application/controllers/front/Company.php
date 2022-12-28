<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Company extends MY_Controller {

    public function __construct(){
        parent::__construct();

		$this->load->model('front/Company_model','company');
		$this->load->model('front/Product_model','product');
        if(!$this->session->userdata('user_id')){
            redirect('front/Authentication');
        }
    }//__construct()

	public function index()
	{
		if(checkPermission($this->roleId,'company')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['compData'] = $this->company->getCompData();
		$data['page_name'] = 'company/company_list';
		$this->load->view('front/index',$data);
	}

	public function getCompData()
	{
		echo $this->company->getCompData();
	}

	public function add()
	{
		if(checkPermission($this->roleId,'company')->create_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['page_name'] = 'company/add';
		$this->load->view('front/index',$data);
	}

	public function store()
	{
		$companyLogo=$companyBanner=$companyVideo='';
		$dataInfo=array();

		// for company logo
		if(isset($_FILES["company_logo"]["name"]) && !empty($_FILES["company_logo"]["name"]))  
		{  
			$config['upload_path'] = './upload/company_logo/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '1024'; 
			$this->load->library('upload', $config);  
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('company_logo'))  
			{  
				$companyLogo='';
			}  
			else  
			{  
				$data = $this->upload->data();   
				$companyLogo=$data["file_name"];
			}	
		}

		// for company banner
		if(isset($_FILES["company_banner"]["name"]) && !empty($_FILES["company_banner"]["name"]))  
		{  
			$config['upload_path'] = './upload/company_banner/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '1024'; 
			$this->load->library('upload', $config);  
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('company_banner'))  
			{  
				$companyBanner='';
			}  
			else  
			{  
				$data = $this->upload->data();  
				$companyBanner=$data["file_name"];
			}	
		}

		// for company video
		if(isset($_FILES["company_video"]["name"]) && !empty($_FILES["company_video"]["name"]))  
		{  
			$config['upload_path'] = './upload/company_video/';  
			$config['allowed_types'] = 'mp4|mov|avi|mkv'; 
			$config['max_size'] = '50000';
			$this->load->library('upload', $config); 
			$this->upload->initialize($config); 
			if(!$this->upload->do_upload('company_video'))  
			{  
				$companyVideo='';
			}  
			else  
			{  
				$data = $this->upload->data();  
				$companyVideo=$data["file_name"];
				
			}	
		}

		// for company images
		if(isset($_FILES["company_images"]["name"]) && !empty($_FILES["company_images"]["name"]))  
		{  
			$this->load->library('upload');
			$files = $_FILES;
			$cpt = count($_FILES['company_images']['name']);
			for($i=0; $i<$cpt; $i++)
			{           
				$_FILES['company_images']['name']= $files['company_images']['name'][$i];
				$_FILES['company_images']['type']= $files['company_images']['type'][$i];
				$_FILES['company_images']['tmp_name']= $files['company_images']['tmp_name'][$i];
				$_FILES['company_images']['error_flash']= $files['company_images']['error_flash'][$i];
				$_FILES['company_images']['size']= $files['company_images']['size'][$i];    

				$this->upload->initialize($this->set_upload_options());
				if($this->upload->do_upload('company_images')){
					$data = $this->upload->data();
					$dataInfo[]= $data['file_name'];
				}else{
					$dataInfo = [];
				}
			}
	
		}

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('company_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->company->add_company($data,$companyLogo,$companyBanner,$companyVideo,$dataInfo))//data success
			{
				$this->session->set_flashdata('success','Company added successfully');
				
			}
			else
			{
				$this->session->set_flashdata('error','Company not added please try again!!!');
				
			}
			return redirect('front/Company'); 
		}
		else
		{
			$data['page_name'] = 'company/add';
			$this->load->view('front/index',$data);
		}
	}

	public function set_upload_options()
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = './upload/company_images/';
		$config['allowed_types'] = 'gif|jpg|png|JPEG|jpeg|PNG';
		$config['max_size']      = '1000';
		$config['overwrite']     = FALSE;

		return $config;
	}

	public function company_detail($cmId)
	{
		if(checkPermission($this->roleId,'company')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['comDetData'] = $this->company->get_parComp_data($cmId);
		$data['page_name'] = 'company/company_detail';
		$this->load->view('front/index',$data);
	}

	public function edit($cmId)
	{
		if(checkPermission($this->roleId,'company')->edit_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['comDetData'] = $this->company->get_parComp_data($cmId);
		$data['comImgs'] = $this->company->get_com_imgs($cmId);
		$data['page_name'] = 'company/edit';
		$this->load->view('front/index', $data);
	}

	public function update($cmId)
	{
		$dataInfo = array();
		$oldComImg = array();
		
		// for company logo
		$companyLogo = $this->input->post('old_logo');
		if(isset($_FILES["company_logo"]["name"]) && !empty($_FILES["company_logo"]["name"]))  
		{  
			$config['upload_path'] = './upload/company_logo/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '1024'; 
			$this->load->library('upload', $config);  
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('company_logo'))  
			{  
				// echo $this->upload->display_errors();
				$companyLogo=$this->input->post('old_logo');;
			}  
			else  
			{  
				$data = $this->upload->data(); 
				$companyLogo=$data["file_name"];
			}	
		}

		// for company banner
		$companyBanner= $this->input->post('old_banner');
		if(isset($_FILES["company_banner"]["name"]) && !empty($_FILES["company_banner"]["name"]))  
		{  
			$config['upload_path'] = './upload/company_banner/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = '1024'; 
			$this->load->library('upload', $config);  
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('company_banner'))  
			{  
				// echo $this->upload->display_errors();
				$companyBanner=$this->input->post('old_banner');;
			}  
			else  
			{  
				$data = $this->upload->data(); 
				$companyBanner=$data["file_name"];
			}	
		}

		// for company video
		$companyVideo= $this->input->post('old_video');
		if(isset($_FILES["company_video"]["name"]) && !empty($_FILES["company_video"]["name"]))  
		{  
			$config['upload_path'] = './upload/company_video/';  
			$config['allowed_types'] = 'mp4|mov|avi|mkv'; 
			$config['max_size'] = '50000';
			$this->load->library('upload', $config); 
			$this->upload->initialize($config); 
			if(!$this->upload->do_upload('company_video'))  
			{  
				// echo $this->upload->display_errors();
				$companyVideo=$this->input->post('old_video');
			}  
			else  
			{  
				$data = $this->upload->data();  
				$companyVideo=$data["file_name"];
			}	
		}

		// for company images
		if(isset($_FILES["company_images"]["name"]) && !empty($_FILES["company_images"]["name"]))  
		{  
			// log_message('debug','product image set');
			$this->load->library('upload');  
			
			$files = $_FILES;
			$cpt = count($_FILES['company_images']['name']);
			foreach($_FILES['company_images']['name'] as $key => $comImg)
			{           
				$_FILES['company_images']['name']= $files['company_images']['name'][$key];
				$_FILES['company_images']['type']= $files['company_images']['type'][$key];
				$_FILES['company_images']['tmp_name']= $files['company_images']['tmp_name'][$key];
				$_FILES['company_images']['error_flash']= $files['company_images']['error_flash'][$key];
				$_FILES['company_images']['size']= $files['company_images']['size'][$key];    

				$this->upload->initialize($this->set_upload_options());
				if($this->upload->do_upload('company_images')){
					$data = $this->upload->data();
					$dataInfo[] = $data['file_name'];
				}else{
					$dataInfo = [];
				}
			}
		}
		else
		{
			$dataInfo = [];
		}

		if($this->input->post('old_image_remove') !='' && !empty($this->input->post('old_image_remove'))){
			foreach($this->input->post('old_company_images') as $key => $oci){
				$path = './upload/company_images/'.$oci;
				log_message('debug','delete file path :- '.$path); 
				unlink($path);
			}
		}else{
			foreach($this->input->post('old_company_images') as $key => $oci){
				$oldComImg[] = $oci;
			}
		}
		 
		$mergeArr = array_merge($dataInfo,$oldComImg);
		// echo "<pre>"; print_r($mergeArr);exit;

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('company_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->company->update_company($cmId,$data,$companyLogo,$companyBanner,$companyVideo,$mergeArr))//data success
			{
				$this->session->set_flashdata('success','Company update successfully');
				
			}
			else
			{
				$this->session->set_flashdata('error','Company not update please try again!!!');
				
			}
			return redirect('front/Company'); 
		}
		else
		{
			$data['comDetData'] = $this->company->get_parComp_data($cmId);
			$this->load->view('front/include/header');
			$this->load->view('front/include/topbar'); 
			$this->load->view('front/company/edit', $data);
			$this->load->view('front/include/footer');
			
		}
	}

	public function delete($proId)
	{
		if(checkPermission($this->roleId,'company')->delete_all == 0){
			// $this->session->set_flashdata('error','You have no permission to access this page');
			echo json_encode(array('status' => 'error', 'message' => "You have no permission to access this page",'url'=> base_url('Dashboard')));
			// redirect('front/Dashboard');
		}
		if($this->company->delete_company($proId)){
			// $this->session->set_flashdata('success','Company deleted successfully');
			echo json_encode(array('status' => 'error', 'message' => 'Company deleted successfully','url'=> base_url('Company')));
        }else{
            // $this->session->set_flashdata('error',"Company can't able to delete please try again!!!");
			echo json_encode(array('status' => 'error', 'message' => "Company can't able to delete please try again",'url'=> base_url('Company')));
        }
		// return redirect('front/Company');
	}

	public function add_user($cmId)
	{
		if(checkPermission($this->roleId,'company')->create_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['get_comp_name'] = $this->product->get_comp_name();
		$data['cm_id'] = $cmId;
		$data['page_name'] = 'company/add_user';
		$this->load->view('front/index',$data);
	}

	public function user_store()
	{	
		// echo $this->input->post('name'); exit;
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('company_user_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->company->add_company_user($data))//data success
			{
				$this->session->set_flashdata('success','Company user added successfully');
				
			}
			else
			{
				$this->session->set_flashdata('error','Company user not added please try again!!!');
				
			}
			return redirect('front/Company'); 
		}
		else
		{
			$data['get_comp_name'] = $this->product->get_comp_name();
			$data['cm_id'] = $this->input->post('cmId');
			$data['page_name'] = 'company/add_user';
			$this->load->view('front/index',$data);
		}
	}

	/* public function user_link_comp()
	{
		$data['get_comp_name'] = $this->product->get_comp_name();
		$data['get_comp_user'] = $this->company->get_comp_user();
		$this->load->view('front/include/header');
		$this->load->view('front/include/topbar'); 
        $this->load->view('front/company/user_link_company',$data);
		$this->load->view('front/include/footer');
	}

	public function comp_link_user_store()
	{	
		// echo $this->input->post('name'); exit;
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('compLinkUser_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->company->add_compLink_user($data))//data success
			{
				$this->session->set_flashdata('error_flash','Company link user added successfully');
				
			}
			else
			{
				$this->session->set_flashdata('error_flash','Company link user not added please try again!!!');
				
			}
			return redirect('front/Company'); 
		}
		else
		{
			$data['get_comp_name'] = $this->product->get_comp_name();
			$data['get_comp_user'] = $this->company->get_comp_user();
			$this->load->view('front/include/header');
			$this->load->view('front/include/topbar'); 
			$this->load->view('front/company/user_link_company',$data);
			$this->load->view('front/include/footer');
		}
	} */

	public function user_index($cm_id)
	{
		if(checkPermission($this->roleId,'company')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['getCompUser'] = $this->company->getCompUser($cm_id);
		$data['cmId'] = $cm_id;
		$data['page_name'] = 'company/user_index';
		$this->load->view('front/index',$data);
	}

	public function getCompUserData()
	{
		$data= $this->company->get_company_user();
		echo $data;
	}

	/* public function export_comp()
	{
		if(checkPermission($this->roleId,'company')->export_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		// Export all pending invoices 
        $data = $this->company->company_data();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		// Set document properties
			$spreadsheet->getProperties()->setCreator('Mohit Soni')
			->setLastModifiedBy('Mohit Soni')
			->setTitle('Referral-management Report File')
			->setSubject('Referral-management Report File')
			->setDescription('Referral-management Report File');
				// add style to the header
			$styleArray = array(
				'font' => array(
					'bold' => true,
				),
				'alignment' => array(
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				),
				'borders' => array(
					'bottom' => array(
						'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
						'color' => array('rgb' => '333333'),
					),
				),
				'fill' => array(
					'type'       => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
					'rotation'   => 90,
					'startcolor' => array('rgb' => '0d0d0d'),
					'endColor'   => array('rgb' => 'f2f2f2'),
				),
			);

			$style = array(
				'alignment' => array(
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
					'vertical'   => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
				)
			);
			
			$spreadsheet->getActiveSheet()->getStyle('A1:H1')->applyFromArray($styleArray);
			// auto fit column to content
			
			foreach(range('A', 'H') as $columnID) {
				$spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
				// $spreadsheet->getDefaultStyle()->applyFromArray($style);				
			}
			
			// set the names of header cells
			$sheet->setCellValue('A1', '#');
			$sheet->setCellValue('B1', 'Company Name');
			$sheet->setCellValue('C1', 'Company Address');
			$sheet->setCellValue('D1', 'Company Email'); //Purpose
			$sheet->setCellValue('E1', 'Company Contact Number');
			$sheet->setCellValue('F1', "Company Notes");
			$sheet->setCellValue('G1', 'Added By');
			$sheet->setCellValue('H1', 'Added On');
			
			// Add some data
			$x = 2;
			$count=1;
			$today = date('Y-m-d');
			//print_r($data); exit;
			foreach($data as $cd){
				$spreadsheet->getActiveSheet()->getRowDimension($x)->setRowHeight(20);

				$sheet->setCellValue('A'.$x, $count);
				$sheet->setCellValue('B'.$x, $cd->company_name);
				$sheet->setCellValue('C'.$x, $cd->company_address);
				$sheet->setCellValue('D'.$x, $cd->company_email);
				$sheet->setCellValue('E'.$x, $cd->company_phone_no);
				$sheet->setCellValue('F'.$x, $cd->notes);
				$sheet->setCellValue('G'.$x, $cd->u_name);
				$sheet->setCellValue('H'.$x, date_format(date_create($cd->comp_created),'d-m-Y'));
				
				$x++;
				$count++;
			}
		//Create file excel.xlsx
		$writer = new Xlsx($spreadsheet);
		$fileName='All_customer_data_'.date('d_m_Y_h_i_s_A').'.xlsx';
		$writer->save('upload/report/'.$fileName);
		// $this->load->helper('download');
		force_download('upload/report/'.$fileName,null); // Download File 
		//redirect(base_url('product_three/Invoice_P_Three/pending'), 'refresh');
		$this->index();
	} */

	public function comp_pro($cm_id)
	{
		if(checkPermission($this->roleId,'company')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['getCompPro'] = $this->company->get_comp_product($cm_id);
		$this->load->view('front/include/header');
		$this->load->view('front/include/topbar');
		$this->load->view('front/company/comp_product',$data);
		$this->load->view('front/include/footer');
	}

	public function customers($cm_id)
	{
		if(checkPermission($this->roleId,'company')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['getCompCus'] = $this->company->get_comp_customer($cm_id);
		$data['page_name'] = 'company/comp_customer';
		$this->load->view('front/index',$data);
	}
}	
?>
