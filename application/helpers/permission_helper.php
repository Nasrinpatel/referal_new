<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('checkPermission'))
	{
		function checkPermission($roleId,$module)
		{
			$ci =& get_instance();
			
			$data =  $ci->db->select('*')
							->where('role_id',$roleId)
							->where('module_name',$module)
							->get('tb_user_permission')->row();
			
			if($data){
				return $data;
			}else{
				return false;
			}
		}
	}
?>
