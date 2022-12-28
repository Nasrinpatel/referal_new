<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Commission extends MY_Controller {

    public function __construct(){
        parent::__construct();

		$this->load->model('front/Commission_model','commission');
		$this->load->model('front/Customer_model','customer');
        if(!$this->session->userdata('user_id')){
            redirect('front/Authentication');
        }
    }//__construct()

	public function index()
	{
		if(checkPermission($this->roleId,'commission')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['comData'] = $this->commission->all($cus_Id=null);
		$data['page_name'] = 'commission/list';
		$this->load->view('front/index',$data);
	}

	public function add()
	{
		if(checkPermission($this->roleId,'commission')->create_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['page_name'] = 'commission/add';
		$this->load->view('front/index',$data);
	}

	public function store()
	{
		// $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        // if ($this->form_validation->run('company_add')) //validation success 

		$data=$this->input->post();
		$data = $this->security->xss_clean($data);

		if($this->commission->add($data))//data success
		{
			echo json_encode(array('status' => 'success', 'message' => 'Referral Fee added successfully'));
		}
		else
		{
			echo json_encode(array('status' => 'error', 'message' => 'Something went wrong. Please try again'));	
		}
	}

	public function all_commission($cus_Id=null)
	{   
		$data = $this->commission->getCusRefConData($cus_Id);
		echo json_encode($data);
	}

	public function company_detail($cmId)
	{
		if(checkPermission($this->roleId,'commission')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		$data['comDetData'] = $this->commission->get_parComp_data($cmId);
		$data['page_name'] = 'commission/company_detail';
		$this->load->view('front/index',$data);
	}

	public function edit_com($comId)
	{
		$userData = $this->commission->edit($comId);
		if($userData){
		echo json_encode(['cusId'=>$userData->cus_id,
							'cusRefId'=>$userData->cus_ref_id,
							'comAmount'=>$userData->com_amount,
							'comId'=>$userData->com_id]);
		}else{
			echo json_encode(['cusId'=>'',
							'cusRefId'=>'',
							'comAmount'=>'',
							'comId'=>'']);
		}
	}

	public function update($cmId)
	{
	
		$data=$this->input->post();
		$data = $this->security->xss_clean($data);
		// echo "<pre>"; print_r($data);exit;

		if($this->commission->update($cmId,$data))//data success
		{
			echo json_encode(array('status' => 'success', 'message' => 'Referral Fee Updated successfully'));
		}
		else
		{
			echo json_encode(array('status' => 'error', 'message' => 'Something went wrong. Please try again'));	
		}
	}

	public function delete($proId)
	{
		if(checkPermission($this->roleId,'commission')->delete_all == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		}
		if($this->commission->delete($proId)){
			$this->session->set_flashdata('success','Referral Fee deleted successfully');
        }else{
            $this->session->set_flashdata('error',"Referral Fee can't able to delete please try again!!!");
        }
		return redirect('front/Commission'); 
	}

	public function get_cus_ref_det($cudRefId)
	{
		$cusRefData = $this->commission->cus_ref_details($cudRefId);
		if($cusRefData){
			echo json_encode(['cusName'=>$cusRefData->customer_name,'cusPhone'=>$cusRefData->customer_phone_no,'cusAdd'=>$cusRefData->customer_address]);
		}else{
			echo json_encode(['cusName'=>'','cusPhone'=>'','cusAdd'=>'']);
		}
	}

	public function getCusAccDet($cus_Id)
	{
		$accData = $this->commission->get_cus_accDetails($cus_Id);
		if($accData){
			echo json_encode([
								'cusBankName'=>$accData->account_name,
								'cusAccNo'=>$accData->account_number,
								'cusIfscCode'=>$accData->ifsc_code,
								'cusBrName'=>$accData->branch_name,
								'cusPaypalId'=>$accData->paypal_id,
								'cusStripId'=>$accData->stripe_id,
							]);
		}else{
			echo json_encode(['cusBankName'=>'','cusAccNo'=>'','cusIfscCode'=>'','cusBrName'=>'']);
		}
	}

	public function history_single_cus($cus_Id)
	{
		// $data['comData'] = $this->commission->getCusRefConData($cus_Id);
		$data['cus_id'] = $cus_Id;
		$data['cusRefConData'] = $this->commission->cusBriefRefConMonthWise($cus_Id);
		$data['page_name'] = 'commission/history_customer';
		$this->load->view('front/index',$data);
	}

	public function history_admin($cus_Id = null)
	{
		$data['comData'] = $this->commission->getCusRefConData($cus_Id);
		// echo "<pre>"; print_r($data['comData']);exit;
		$data['cusData'] = $this->commission->getCusDet();
		$data['page_name'] = 'commission/history_admin';
		$this->load->view('front/index',$data);
	}

	public function sendMail()
	{
        $to = 'sutharbhavin29@gmail.com';
        $cc=''; $bcc='';
        $subject = 'Testing yy';
        $message = "Hello";

        $fromEmail ='noreply@xdemo.app';
        $fromName = 'Xdemo server'; 
    
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['newline']  = "\r\n";
        
        $this->email->initialize($config);
        $this->email->from($fromEmail, $fromName);
        $this->email->to($to.',noreply@xdemo.app');
        if(!empty($cc)){
            $this->email->cc($cc);
        }
        if(!empty($bcc)){
            $this->email->bcc($bcc);
        }	
    
        $this->email->subject($subject);
        $message1="
                    <div style='width:100%; margin:0 auto; min-height:200px;background-color:#E6E6FA;'>
                        <div style='width:80%; height:100px; margin:0 auto;'>
                            <h2 style='padding-top: 50px;'>Ardour Analytics</h2>
                        </div>
                        <div style='width:75%;height:auto; margin:0 auto; background:#f7f7f7; padding:20px; box-shadow: 0 -2px 20px 0 rgba(0, 0, 0, 0.2), 0 15px 20px 0 rgba(0, 0, 0, 0.19);'>
                        ".$message."
                        </div>
                        <br>
                        <div style='width:80%; min-height:80px; padding:7px 0px;  margin:0 auto;'>
                            <div style='width:50%; float:left'>
                                <a href='https://play.google.com/store/apps/details?id=com.fundlyplus.crm'style='margin-left:20px;'><img src='http://www.ad-blinds.com/adb/admin/img/applogo.png' alt='Android Application' width='150px' height='50px'></a>
                                
                            </div>
                            <div style='width:45%; float:left; text-align:right'>
                                <a href='https://xdemo.app/fundly/' target='_blank' style='text-shadow: 2px 2px 10px #000000;'>Visit Website</a>
                            </div> 	     
                        </div>
                    </div>
                ";
        $this->email->message($message1);	
        if($this->email->send())
        {
            echo 'Email sent.';
        }
        else
        {
            show_error($this->email->print_debugger());
        }
	}

	public function cusBriefDetail($customer_id,$month)
	{
		$data['refCusData'] = $this->commission->showRefDetail($customer_id,$month);
		$data['month'] = $month;
		$data['page_name'] = 'commission/customer_brief_det';
		$this->load->view('front/index',$data);
	}

	public function single_cus_ref_con($cusId)
	{
		$data['SingCusData'] = $this->commission->getCusRefConData($cusId);
		$data['page_name'] = 'commission/cus_ref_con_list';
		$this->load->view('front/index',$data);
	}
	
	public function cusRedConDetail($month,$customerId)
	{
		$data['cusRefConData'] = $this->commission->cusRefConMonthWise($month,$customerId);
		$data['month'] = $month;
		$data['page_name'] = 'commission/customer_ref_con';
		$this->load->view('front/index',$data);
	}
	
	public function singleCusRefConData($cus_id,$mon)
	{
		// Export all pending invoices 
        $data = $this->commission->single_cus_refCon_data_mon($cus_id,$mon);
		$cusName = $this->customer->get_cus_data($cus_id);
		// echo"<pre>"; print_r($data);exit;
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
			
			$spreadsheet->getActiveSheet()->getStyle('A1:S1')->applyFromArray($styleArray);
			// auto fit column to content
			
			foreach(range('A', 'S') as $columnID) {
				$spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
				// $spreadsheet->getDefaultStyle()->applyFromArray($style);				
			}
			
			// set the names of header cells
			$sheet->setCellValue('A1', '#');
			$sheet->setCellValue('B1', 'Referral Code');
			$sheet->setCellValue('C1', 'Referral Name');
			$sheet->setCellValue('D1', 'Referral Address');
			$sheet->setCellValue('E1', 'Referral Email');
			$sheet->setCellValue('F1', 'Referral Contact Number');
			$sheet->setCellValue('G1', 'Referral Account Name');
			$sheet->setCellValue('H1', 'Referral Account Number');
			$sheet->setCellValue('I1', 'Referral IFSC Code');
			$sheet->setCellValue('J1', 'Referral Branch Name');
			$sheet->setCellValue('K1', 'Referral Stripe Id');
			$sheet->setCellValue('L1', 'Referral Paypal Id');
			$sheet->setCellValue('M1', "Refer Referral Name");
			$sheet->setCellValue('N1', "Refer Referral Account Name");
			$sheet->setCellValue('O1', "Refer Referral Account NUmber");
			$sheet->setCellValue('P1', "Refer Referral IFSC Code");
			$sheet->setCellValue('Q1', "Refer Referral Branch Name");
			$sheet->setCellValue('R1', "Refer Referral Stripe Id");
			$sheet->setCellValue('S1', "Refer Referral Paypal Id");
			
			// Add some data
			$x = 2;
			$count=1;
			$today = date('Y-m-d');
			//print_r($data); exit;
			foreach($data as $cd){
				$spreadsheet->getActiveSheet()->getRowDimension($x)->setRowHeight(20);

				$sheet->setCellValue('A'.$x, $count);
				$sheet->setCellValue('B'.$x, $cd['customer_code']);
				$sheet->setCellValue('C'.$x, $cd['customer_name']);
				$sheet->setCellValue('D'.$x, $cd['customer_address']);
				$sheet->setCellValue('E'.$x, $cd['customer_email']);
				$sheet->setCellValue('F'.$x, $cd['customer_phone_no']);
				$sheet->setCellValue('G'.$x, $cd['account_name']);
				$sheet->setCellValue('H'.$x, $cd['account_number']);
				$sheet->setCellValue('I'.$x, $cd['ifsc_code']);
				$sheet->setCellValue('J'.$x, $cd['branch_name']);
				$sheet->setCellValue('K'.$x, $cd['paypal_id']);
				$sheet->setCellValue('L'.$x, $cd['stripe_id']);
				$sheet->setCellValue('M'.$x, $cd['Reference_By']);
				$sheet->setCellValue('N'.$x, $cd['refer_acc_name']);
				$sheet->setCellValue('O'.$x, $cd['refer_acc_no']);
				$sheet->setCellValue('P'.$x, $cd['refer_ifsc_code']);
				$sheet->setCellValue('Q'.$x, $cd['refer_br_name']);
				$sheet->setCellValue('R'.$x, $cd['refer_paypal_id']);
				$sheet->setCellValue('S'.$x, $cd['refer_stripe_id']);
				$x++;
				$count++;
			}
		//Create file excel.xlsx
		$writer = new Xlsx($spreadsheet);
		$fileName= $cusName->customer_name.'_Referral_converted_'.date('d_m_Y').'.xlsx';
		$writer->save('upload/report/'.$fileName);
		$this->load->helper('download');
		force_download('upload/report/'.$fileName,null); // Download File 
		//redirect(base_url('product_three/Invoice_P_Three/pending'), 'refresh');
		$this->history_admin();
	}

	public function refConMonthlyDataXls($mon)
	{
		// Export all pending invoices 
        $data = $this->commission->single_cus_refCon_data_mon($cus_id=null,$mon);
		// $cusName = $this->customer->get_cus_data($cus_id);
		// echo"<pre>"; print_r($data);exit;
		
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
			
			$spreadsheet->getActiveSheet()->getStyle('A1:S1')->applyFromArray($styleArray);
			// auto fit column to content
			
			foreach(range('A', 'S') as $columnID) {
				$spreadsheet->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
				// $spreadsheet->getDefaultStyle()->applyFromArray($style);				
			}
			
			// set the names of header cells
			$sheet->setCellValue('A1', '#');
			$sheet->setCellValue('B1', 'Referral Code');
			$sheet->setCellValue('C1', 'Referral Name');
			$sheet->setCellValue('D1', 'Referral Address');
			$sheet->setCellValue('E1', 'Referral Email');
			$sheet->setCellValue('F1', 'Referral Contact Number');
			$sheet->setCellValue('G1', 'Referral Account Name');
			$sheet->setCellValue('H1', 'Referral Account Number');
			$sheet->setCellValue('I1', 'Referral IFSC Code');
			$sheet->setCellValue('J1', 'Referral Branch Name');
			$sheet->setCellValue('K1', 'Referral Stripe Id');
			$sheet->setCellValue('L1', 'Referral Paypal Id');
			$sheet->setCellValue('M1', "Refer Referral Name");
			$sheet->setCellValue('N1', "Refer Referral Account Name");
			$sheet->setCellValue('O1', "Refer Referral Account NUmber");
			$sheet->setCellValue('P1', "Refer Referral IFSC Code");
			$sheet->setCellValue('Q1', "Refer Referral Branch Name");
			$sheet->setCellValue('R1', "Refer Referral Stripe Id");
			$sheet->setCellValue('S1', "Refer Referral Paypal Id");
			
			// Add some data
			$x = 2;
			$count=1;
			$today = date('Y-m-d');
			//print_r($data); exit;
			foreach($data as $cd){
				$spreadsheet->getActiveSheet()->getRowDimension($x)->setRowHeight(20);

				$sheet->setCellValue('A'.$x, $count);
				$sheet->setCellValue('B'.$x, $cd['customer_code']);
				$sheet->setCellValue('C'.$x, $cd['customer_name']);
				$sheet->setCellValue('D'.$x, $cd['customer_address']);
				$sheet->setCellValue('E'.$x, $cd['customer_email']);
				$sheet->setCellValue('F'.$x, $cd['customer_phone_no']);
				$sheet->setCellValue('G'.$x, $cd['account_name']);
				$sheet->setCellValue('H'.$x, $cd['account_number']);
				$sheet->setCellValue('I'.$x, $cd['ifsc_code']);
				$sheet->setCellValue('J'.$x, $cd['branch_name']);
				$sheet->setCellValue('K'.$x, $cd['paypal_id']);
				$sheet->setCellValue('L'.$x, $cd['stripe_id']);
				$sheet->setCellValue('M'.$x, $cd['Reference_By']);
				$sheet->setCellValue('N'.$x, $cd['refer_acc_name']);
				$sheet->setCellValue('O'.$x, $cd['refer_acc_no']);
				$sheet->setCellValue('P'.$x, $cd['refer_ifsc_code']);
				$sheet->setCellValue('Q'.$x, $cd['refer_br_name']);
				$sheet->setCellValue('R'.$x, $cd['refer_paypal_id']);
				$sheet->setCellValue('S'.$x, $cd['refer_stripe_id']);
				$x++;
				$count++;
			}

		$dateObj   = DateTime::createFromFormat('!m', $mon);
		$monthName = $dateObj->format('F');
		//Create file excel.xlsx
		$writer = new Xlsx($spreadsheet);
		$fileName= $monthName.'_month_Referral_converted_'.date('d_m_Y').'.xlsx';
		$writer->save('upload/report/'.$fileName);
		$this->load->helper('download');
		force_download('upload/report/'.$fileName,null); // Download File 
		//redirect(base_url('product_three/Invoice_P_Three/pending'), 'refresh');
		$this->history_admin();
	}
}	
?>
