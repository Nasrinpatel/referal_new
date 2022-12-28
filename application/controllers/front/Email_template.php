<?php 

class Email_template extends MY_Controller{

	public function __construct(){
        parent::__construct();

		$this->load->model('front/Email_template_model','et');
        if(!$this->session->userdata('user_id')){
            redirect('front/Authentication');
        }
    }//__construct()

	public function index()
	{
		/* if(checkPermission($this->roleId,'commission')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		} */
		$data['et_all'] = $this->et->all();
		$data['page_name'] = 'email_temp/index';
		$this->load->view('front/index',$data);
	}

	public function add()
	{
		/* if(checkPermission($this->roleId,'commission')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		} */
		$data['page_name'] = 'email_temp/add';
		$this->load->view('front/index',$data);
	}

	public function store()
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('emailTemp_add')){ //validation success 

			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->et->add($data))//data success
			{
				$this->session->set_flashdata('success','Email template added successfully');
			}
			else
			{
				$this->session->set_flashdata('error','Email template not added ,Please try again!!!');
			}
			return redirect('front/Email_template');
		}
		else{
			$data['page_name'] = 'email_temp/add';
			$this->load->view('front/index',$data);
		}
	}

	public function edit($etId)
	{
		/* if(checkPermission($this->roleId,'commission')->view == 0){
			$this->session->set_flashdata('error','You have no permission to access this page');
			redirect('front/Dashboard');
		} */
		$data['etEdit'] = $this->et->edit($etId);
		$data['page_name'] = 'email_temp/edit';
		$this->load->view('front/index',$data);
	}

	public function update($et_id)
	{
		$this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>"); 
        if ($this->form_validation->run('emailTemp_add')){ //validation success 

			$data=$this->input->post();
			$data = $this->security->xss_clean($data);

			if($this->et->update($data))//data success
			{
				$this->session->set_flashdata('success','Email template updated successfully');
			}
			else
			{
				$this->session->set_flashdata('error','Email template not updated ,Please try again!!!');
			}
			return redirect('front/Email_template');
		}
		else{

			$this->edit($et_id);
		}
	}

}
