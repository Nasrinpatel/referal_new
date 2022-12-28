<?php
class Product_model extends CI_Model
{
    public function __construct(){
       
		$this->user_id = $this->session->userdata('user_id');
		parent::__construct();
    }//__construct

	/**
     * ToDo     : get company name
     * DB Table : tb_company_master
	 * @return  : companies names
    */
	public function get_comp_name()
	{
		return $this->db->select(['company_name','cm_id'])->get('tb_company_master')->result_array();
	}

	/**
     * ToDo     : get product related data
     * DB Table : tb_product, tb_product_company, tb_product_images
	 * @return  : Product Data
    */
	public function get_pro_data($limit,$start)
	{
		return $this->db->select(['`tb_product`.*','`tb_product_images`.`pro_img_name` as `product_image`',
									'`tb_company_master`.`company_name`','`tb_product_company`.`cm_id`'])
						->join('`tb_product_company`','`tb_product_company`.`pro_id` = `tb_product`.`pro_id`')
						->join('`tb_company_master`','`tb_company_master`.`cm_id` = `tb_product_company`.`cm_id`')
						->join('`tb_product_images`','`tb_product_images`.`pro_id` = `tb_product`.`pro_id`')
						->group_by('`tb_product_company`.`pro_id`')
						->limit($limit,$start)
						->get('`tb_product`')->result();
	}

	/**
     * ToDo: Check holiday for given date
     * DB Table : holiday
     * @param $checkdate : (holiday check date)
	 * @return Holiday check
    */
	public function add_product($data,$productImages)
	{
		$this->db->insert('tb_product',[
										'product_name'	=>	$data['product_name'],
										'product_code' 	=>	$data['product_code'],
										'product_rate' 	=>	$data['product_rate'],
										'product_commission'	=>	$data['product_commission'],
										'product_description'	=>	$data['product_description'],
										]);
		$pro_id = $this->db->insert_id();

		if(!empty($data['cm_id'])){
			foreach ($data['cm_id'] as $key => $value) {
				if(!empty($value)){ 
					$this->db->insert('tb_product_company',['cm_id'	=>	$value,'pro_id' =>	$pro_id]);
				}
			}
		}

		if(!empty($productImages)){
			foreach ($productImages as $key => $value) {
				if(!empty($value)){ 
					foreach($value as $proImg){
						$this->db->insert('tb_product_images',['pro_img_name' => $proImg,'pro_id' => $pro_id]);
					}
				}
			}
		}
		return true;
	}

	public function get_parComp_data($proId)
	{
		return $this->db->select(['`tb_product`.*','`tb_product_images`.`pro_img_name` as `product_image`',
							'`tb_company_master`.`company_name`','`tb_product_company`.`cm_id`'])
					->where('`tb_product`.`pro_id`',$proId)
					->join('`tb_product_company`','`tb_product_company`.`pro_id` = `tb_product`.`pro_id`')
					->join('`tb_company_master`','`tb_company_master`.`cm_id` = `tb_product_company`.`cm_id`')
					->join('`tb_product_images`','`tb_product_images`.`pro_id` = `tb_product`.`pro_id`')
					->get('`tb_product`')->row();
					
	}

	public function getProCom($pro_id)
	{
		return $this->db->select('*')->where('pro_id',$pro_id)->get('tb_product_company')->result();
	}

	public function getProImg($pro_id)
	{
		return $this->db->select('*')->where('pro_id',$pro_id)->get('tb_product_images')->result();
	}

	public function update_product($pro_id,$data,$productImages)
	{
		$this->db->where('pro_id',$pro_id)
					->update('tb_product',[
										'product_name'	=>	$data['product_name'],
										'product_code' 	=>	$data['product_code'],
										'product_rate' 	=>	$data['product_rate'],
										'product_commission'	=>	$data['product_commission'],
										'product_description'	=>	$data['product_description'],
										]);

		if(!empty($data['cm_id'])){
			$this->db->where('pro_id',$pro_id)->delete('tb_product_company');
			foreach ($data['cm_id'] as $key => $value) {
					$this->db->insert('tb_product_company',['cm_id'	=>	$value,'pro_id' =>	$pro_id]);
			}
		}

		if(!empty($productImages)){
			$this->db->where('pro_id',$pro_id)->delete('tb_product_images');
			foreach ($productImages as $key => $value) {
				$this->db->insert('tb_product_images',['pro_img_name' => $value,'pro_id' => $pro_id]);
			}
		}
		return true;
	}

	public function delete_product($pro_id)
	{
		$res = $this->db->where('pro_id',$pro_id)->delete('tb_product');
		if($res){
			return true;
		}else{
			return false;
		}
		
	}
}
?>
