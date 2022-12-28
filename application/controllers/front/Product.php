<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';


class Product extends MY_Controller {

    public function __construct(){
        parent::__construct();

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
		$totalCompany = count_row('tb_product'); //get from helper
		$config['base_url'] = base_url().'admin/Product/index/';
        $config['total_rows'] = $totalCompany;
        $config['per_page'] = 6;
        $this->pagination->initialize($config);

		$page = ($this->uri->segment(4))? $this->uri->segment(4) : 0;
		$data['proData'] = $this->product->get_pro_data($config['per_page'], $page);
		// echo "<pre>"; print_r($data['proData']); exit;
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
		$this->load->view('admin/product/index' , $data);
		$this->load->view('admin/include/footer');
	}

	public function add()
	{
		if(checkPermission($this->roleId,'user_role')->create_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['get_comp_name'] = $this->product->get_comp_name();
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
        $this->load->view('admin/product/add',$data);
		$this->load->view('admin/include/footer');
	}

	public function store()
	{
		// for product images
		if(isset($_FILES["product_images"]["name"]) && !empty($_FILES["product_images"]["name"]))  
		{  
			$this->load->library('upload');  
			$dataInfo=array();
			$files = $_FILES;
			$cpt = count($_FILES['product_images']['name']);
			for($i=0; $i<$cpt; $i++)
			{           
				$_FILES['product_images']['name']= $files['product_images']['name'][$i];
				$_FILES['product_images']['type']= $files['product_images']['type'][$i];
				$_FILES['product_images']['tmp_name']= $files['product_images']['tmp_name'][$i];
				$_FILES['product_images']['error_flash']= $files['product_images']['error_flash'][$i];
				$_FILES['product_images']['size']= $files['product_images']['size'][$i];    

				$this->upload->initialize($this->set_upload_options());
				if($this->upload->do_upload('product_images')){
					$data = $this->upload->data();
					array_push($dataInfo ,['file_name'=>$data['file_name']]);
				}else{
					$dataInfo = '';
				}
			}
	
		}
		
		// echo "<pre>";print_r($dataInfo);exit;
		
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('product_add')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->product->add_product($data,$dataInfo))//data success
			{
				$this->session->set_flashdata('error_flash','Product added successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','Product not added please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('admin/Product'); 
		}
		else
		{
			$this->load->view('admin/include/header');
			$this->load->view('admin/include/topbar'); 
			$this->load->view('admin/product/add');
			$this->load->view('admin/include/footer');
		}
	}

	public function set_upload_options()
	{   
		//upload an image options
		$config = array();
		$config['upload_path'] = './upload/product_images/';
		$config['allowed_types'] = 'gif|jpg|png|JPEG|jpeg|PNG';
		$config['max_size']      = '1000';
		$config['overwrite']     = FALSE;

		return $config;
	}

	public function product_detail($proId)
	{
		if(checkPermission($this->roleId,'user_role')->view == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['proDetData'] = $this->product->get_parComp_data($proId);
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
		$this->load->view('admin/product/product_detail', $data);
		$this->load->view('admin/include/footer');
	}

	public function edit($proId)
	{
		if(checkPermission($this->roleId,'user_role')->Edit_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		$data['get_comp_name'] = $this->product->get_comp_name();
		$data['proDetData'] = $this->product->get_parComp_data($proId);
		$data['proCompDet'] = $this->product->getProCom($proId);
		$data['proImage'] = $this->product->getProImg($proId);
		// echo "<pre>"; print_r($data['proImage']);exit;	
		$this->load->view('admin/include/header');
		$this->load->view('admin/include/topbar'); 
		$this->load->view('admin/product/edit', $data);
		$this->load->view('admin/include/footer');
	}

	public function update($proId)
	{
		$dataInfo=array();
		$oldProImg = array();
		// for product images
		if(isset($_FILES["product_images"]["name"]) && !empty($_FILES["product_images"]["name"]))  
		{  
			// log_message('debug','product image set');
			$this->load->library('upload');  
			
			$files = $_FILES;
			$cpt = count($_FILES['product_images']['name']);
			for($i=0; $i<$cpt; $i++)
			{           
				$_FILES['product_images']['name']= $files['product_images']['name'][$i];
				$_FILES['product_images']['type']= $files['product_images']['type'][$i];
				$_FILES['product_images']['tmp_name']= $files['product_images']['tmp_name'][$i];
				$_FILES['product_images']['error_flash']= $files['product_images']['error_flash'][$i];
				$_FILES['product_images']['size']= $files['product_images']['size'][$i];    

				$this->upload->initialize($this->set_upload_options());
				if($this->upload->do_upload('product_images')){
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
			foreach($this->input->post('old_product_image') as $key => $opi){
				$path = './upload/product_images/'.$opi;
				log_message('debug','delete file path :- '.$path); 
				unlink($path);
			}
		}else{
			foreach($this->input->post('old_product_image') as $key => $opi){
				$oldProImg[] = $opi;
			}
		}

		// merge old product & new updated product images
		$mergeArr = array_merge($dataInfo,$oldProImg);

		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('product_update')) //validation success 
        {
			$data=$this->input->post();
			$data = $this->security->xss_clean($data);
			// print_r($data); exit;
			if($this->product->update_product($proId,$data,$mergeArr))//data success
			{
				$this->session->set_flashdata('error_flash','Product update successfully');
				$this->session->set_flashdata('error_flash_class','all-success');
			}
			else
			{
				$this->session->set_flashdata('error_flash','Product not update please try again!!!');
				$this->session->set_flashdata('error_flash_class','all-error');
			}
			return redirect('admin/Product');
		}
		else
		{
			$data['get_comp_name'] = $this->product->get_comp_name();
			$data['proDetData'] = $this->product->get_parComp_data($proId);
			$data['proCompDet'] = $this->product->getProCom($proId);
			$data['proImage'] = $this->product->getProImg($proId);
			$this->load->view('admin/include/header');
			$this->load->view('admin/include/topbar'); 
			$this->load->view('admin/product/edit', $data);
			$this->load->view('admin/include/footer');
		}
	}

	public function delete($proId)
	{
		if(checkPermission($this->roleId,'user_role')->delete_all == 0){
			$this->session->set_flashdata('error_flash','You have no permission to access this page');
			$this->session->set_flashdata('error_flash_class','alert-danger');
			redirect('admin/Dashboard');
		}
		if($this->product->delete_product($proId)){
			$this->session->set_flashdata('error_flash','Product deleted successfully');
			$this->session->set_flashdata('error_flash_class','all-success');
        }else{
            $this->session->set_flashdata('error_flash',"Product can't able to delete please try again!!!");
				$this->session->set_flashdata('error_flash_class','all-error');
        }
		return redirect('admin/Product'); 
	}
}	
?>
