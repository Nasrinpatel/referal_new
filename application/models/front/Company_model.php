<?php
class Company_model extends CI_Model
{
    public function __construct(){
       
		$this->user_id = $this->session->userdata('user_id');
		parent::__construct();
    }//__construct

	public function getCompData()
	{
		/* $action = '<div class="btn-group">
						<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-more-vertical"></i></button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="'.base_url('admin/Company/user_index/$1').'" data-toggle="tooltip" title="View">Users</a>
							<a class="dropdown-item" href="'.base_url('admin/Company/comp_pro/$1').'" data-toggle="tooltip" title="View">Products</a>
							<a class="dropdown-item" href="'.base_url('admin/Company/customers/$1').'" data-toggle="tooltip" title="View">Customers</a>
							<a class="dropdown-item" href="'.base_url('admin/Company/company_detail/$1').'" data-toggle="tooltip" title="View">View</a>
						</div>
					</div>';
				//<a class="dropdown-item" href="#" data-toggle="tooltip" title="View">Invoices</a> */
		return  $this->db->select(['*'])
			->join('tb_user','tb_user.user_id = tb_company_master.user_id')
			->order_by('tb_company_master.cm_id','desc')
			->get('tb_company_master')->result();
		
	}

	public function add_company($data,$companyLogo,$companyBanner,$companyVideo,$companyImages)
	{

		$this->db->insert('tb_company_master',[
												'company_name'		=>	$data['company_name'],
												'company_phone_no' 	=>	$data['company_phone_no'],
												'company_email' 	=>	$data['company_email'],
												'company_address'	=>	$data['company_address'],
												'company_website'	=>	$data['company_website'],
												'notes'				=>	$data['notes'],
												'company_logo'		=>	$companyLogo,
												'company_banner'	=>	$companyBanner,
												'company_video'		=>	$companyVideo,
												'user_id'			=>	$this->user_id
											  ]);
		$cm_id = $this->db->insert_id();

		if(!empty($companyImages) && $companyImages !=''){
			foreach($companyImages as $comImg){
				$this->db->insert('tb_company_images',['cm_id'=>$cm_id,'cm_img_name'=>$comImg]);
			}
		}
		return true;
	}

	public function get_parComp_data($cmId)
	{
		return $this->db->select('*')->where('cm_id',$cmId)->get('tb_company_master')->row();
	}

	public function get_com_imgs($cm_id)
	{
		return $this->db->select('*')->where('cm_id',$cm_id)->get('tb_company_images')->result();
	}

	public function update_company($cm_id,$data,$companyLogo,$companyBanner,$companyVideo,$companyImages)
	{
		$this->db->where('cm_id',$cm_id)
						->update('tb_company_master',[
														'company_name'		=>	$data['company_name'],
														'company_phone_no' 	=>	$data['company_phone_no'],
														'company_email' 	=>	$data['company_email'],
														'company_address'	=>	$data['company_address'],
														'company_website'	=>	$data['company_website'],
														'notes'				=>	$data['notes'],
														'company_logo'		=>	$companyLogo,
														'company_banner'	=>	$companyBanner,
														'company_video'		=>	$companyVideo,
														'user_id'			=>	$this->user_id
														]);
		if(!empty($companyImages) && $companyImages !=''){
			$this->db->where('cm_id',$cm_id)->delete('tb_company_images');
			foreach($companyImages as $comImg){
				$this->db->insert('tb_company_images',['cm_id'=>$cm_id,'cm_img_name'=>$comImg]);
			}
		}
		return true;
	}

	public function delete_company($cm_id)
	{
		$res = $this->db->where('cm_id',$cm_id)->delete('tb_company_master');
		if($res){
			return true;
		}else{
			return false;
		}
		
	}

	public function add_company_user($data)
	{
		$this->db->insert('tb_company_user_master',[
							'name'	=>	$data['name'],
							'email'	=>	$data['email'],
							'designation'	=> $data['designation'],
							'password'	=> md5($data['password']),
							'user_id'	=>	$this->user_id
							]);
		$cum_id = $this->db->insert_id();

		if(!empty($data) && $data['cm_id'] !=''){
			foreach($data['cm_id'] as $value){
				$this->db->insert('tb_company_link_user',['cm_id'=>$value,'cum_id'=>$cum_id,'user_id'=>$this->user_id]);
			}
		}
			return true;
	}

	public function get_comp_user()
	{
		return $this->db->select('*')->get('tb_company_user_master')->result_array();
	}

	/* public function get_company_user()
	{
		$action = '<a class="btn btn-blue btn-xs" href="'.base_url('admin/Company/view/$1').'" title="View" tabindex="0" data-plugin="tippy" data-tippy-animation="shift-away" data-tippy-arrow="true"><span class="fe-eye"></span></a>
					<a class="btn btn-primary btn-xs" href="'.base_url('admin/Company/edit/$1').'" data-toggle="tooltip" title="Edit"><span class="fe-edit"></span></a>
					<a class="btn btn-danger btn-xs" href="'.base_url('admin/Company/delete/$1').'" data-toggle="tooltip" title="Delete"><span class="fe-trash"></span></a>
					';

		$this->datatables
			->select('tb_company_user_master.cum_id as cumId,
						`tb_company_user_master`.`name` as `user_name`,
						`tb_company_user_master`.`email` as `user_email`,
						`tb_company_user_master`.`designation` as `user_designation`,
						`tb_user`.`name` as `created_by`,
						DATE_FORMAT(`tb_company_user_master`.`created`, "%d-%m-%Y") as `created_date`,
					')
			->join('tb_user','tb_user.user_id = tb_company_user_master.user_id')
			->from('tb_company_user_master');
		$this->datatables->add_column('Actions', $action, 'cumId');
		return $this->datatables->generate();
	} */

	public function getCompUser($cm_id)
	{
		return $this->db->select(['`tb_company_link_user`.*',
										'`tb_company_user_master`.`name`',
										'`tb_company_user_master`.`email`',
										'`tb_company_user_master`.`designation`',
										'`tb_user`.`name` as `created_by`'])
						->where('`tb_company_link_user`.`cm_id`',$cm_id)
						->join('`tb_company_user_master`','`tb_company_user_master`.`cum_id` = `tb_company_link_user`.`cum_id`')
						->join('tb_user','tb_user.user_id = tb_company_user_master.user_id')
						->get('`tb_company_link_user`')->result();
			// echo $this->db->last_query(); exit;
	}

	public function company_data()
	{
		return $this->db->select(['tb_company_master.*','tb_company_master.created as comp_created','tb_user.name as u_name'])
						->join('tb_user','tb_user.user_id = tb_company_master.user_id')
						->get('tb_company_master')->result();
	}

	public function get_comp_product($cmId)
	{
		return $this->db->select(['`tb_product`.*','`tb_product_images`.`pro_img_name` as `product_image`',
									'`tb_company_master`.`company_name`','`tb_product_company`.`cm_id`'])
						->where('`tb_product_company`.`cm_id`',$cmId)
						->join('`tb_product_company`','`tb_product_company`.`pro_id` = `tb_product`.`pro_id`')
						->join('`tb_company_master`','`tb_company_master`.`cm_id` = `tb_product_company`.`cm_id`')
						->join('`tb_product_images`','`tb_product_images`.`pro_id` = `tb_product`.`pro_id`')
						->group_by('`tb_product_company`.`pro_id`')
						->get('`tb_product`')->result();
		// echo $this->db->last_query();exit;
	}

	public function get_comp_customer($cmId)
	{
		return $this->db->select(['`tb_customer`.*'])
						->where('`tb_customer_map_company`.`cm_id`',$cmId)
						->join('`tb_customer_map_company`','`tb_customer_map_company`.`cus_id` = `tb_customer`.`cus_id`')
						->get('`tb_customer`')->result();
		// echo $this->db->last_query();exit;
	}
}
?>
