<?php

use phpDocumentor\Reflection\Types\This;

class User_model extends CI_Model
{
    public function __construct(){
       
		$this->user_id = $this->session->userdata('user_id');
		parent::__construct();
    }//__construct

	public function getRoleId($user_id)
	{
		return $this->db->select(['tb_user.ur_id'])					
					->where('tb_user.user_id', $user_id)
					->get('tb_user')->row()->ur_id;
	}

	public function get_users()
	{
		/* $action = '<div class="btn-group">
						<button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fe-more-vertical"></i></button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="'.base_url('admin/User/edit/$1').'" data-toggle="tooltip" title="Edit"><spn class="fe-edit me-1">Edit</span></a>
							<a class="dropdown-item" href="'.base_url('admin/User/view/$1').'" data-toggle="tooltip" title="View"><spn class="fe-eye	 me-1">View</span></a>
							<a class="dropdown-item" href="'.base_url('admin/User/delete/$1').'" onclick="return confirm(`Are you sure want to delete ?`)" data-toggle="tooltip" title="Delete"><spn class="fe-trash me-1">Delete</span></a>
						</div>
					</div>'; */

		$Data =$this->db->select('tb_user.user_id as u_id,
						`tb_user`.`name`,
						`tb_user_role`.`role_name`,
						`tb_user`.`email`,
						`tb_user`.`phone_no`
					')
			->join('tb_user_role','tb_user.ur_id = tb_user_role.role_id')
			->get('tb_user');
		// $this->datatables->add_column('Actions', $action, 'u_id');
		return $Data->result_array();
	}

	public function storeUser($data)
	{
		return $this->db->insert('tb_user',[
								'name'=>$data['name'],
								'ur_id'=>$data['ur_id'],
								'email'=>$data['email'],
								'phone_no'=>$data['full_phone'],
								'password'=>md5($data['password'])
		]);
	}

	public function userData($user_id)
	{
		return $this->db->select(['tb_user.*','tb_user_role.role_name'])
						->where('tb_user.user_id',$user_id)
						->join('tb_user_role','tb_user_role.role_id = tb_user.ur_id')
						->get('tb_user')->row(); 
	}

	public function updateUser($data,$user_id)
	{
		return $this->db->where('user_id',$user_id)
						->update('tb_user',[
							'name'=>$data['name'],
							'ur_id'=>$data['ur_id'],
							'email'=>$data['email'],
							'phone_no'=>$data['full_phone']
						]);	
	}

	public function userDel($userId)
	{
		try {
			$success = $this->db->where('user_id',$userId)->delete('tb_user');                         
		
			if(!$success) {
				$error = "You cannot delete this row";
				throw new Exception($error);
			}else{
				return $this->db->affected_rows();
			}      
		} catch (Exception $e) {
			return '-1';
		}

	}

	public function getUserRole()
	{
		return $this->db->select('*')
						->join('tb_user_permission','tb_user_permission.role_id = tb_user_role.role_id')
						->group_by('tb_user_role.role_id')
						->get('tb_user_role')->result(); 
	}

	public function 	storeUserRole($data)
	{
		$this->db->insert('tb_user_role',['role_name' => $data['role_name']]);
		$role_id = $this->db->insert_id();

		foreach($data['role'] as $key => $ra){
			if(@$data[$ra.'_view']==TRUE){ $view=1; }else{ $view=0; }
			if(@$data[$ra.'_create']==TRUE){ $create=1; }else{ $create=0; }
			if(@$data[$ra.'_edit']==TRUE){ $edit=1; }else{ $edit=0; }
			if(@$data[$ra.'_delete']==TRUE){ $delete=1; }else{ $delete=0; }
			// if(@$data['import']==TRUE){ $import=1; }else{ $import=0; }
			// if(@$data['export']==TRUE){ $export=1; }else{ $export=0; }
			// if(@$data['view_all']==TRUE){ $view_all=1; }else{ $view_all=0; } // View own


			$this->db->insert('tb_user_permission',[
									'role_id'=>$role_id,
									'module_name' => $ra,
									'view'=>$view,
									'create_all'=>$create,
									'edit_all'=>$edit,
									'delete_all'=>$delete,
									'import_all'=>0,
									'export_all'=>0,
									'view_all'=>0 // View own
			]);	
		}
		return true;
	}

	public function getUserRoleData($role_id)
	{
		$role = $this->db->select('*')->where('role_id',$role_id)->get('tb_user_role')->row();
		$permission = $this->db->select('*')->where('role_id',$role_id)->get('tb_user_permission')->result();

		return ['role' => $role,'permission'=>$permission];
	}

	public function updateUserRole($data,$urId)
	{
		$this->db->where('role_id',$urId)
				->update('tb_user_role',['role_name' => $data['role_name']]);
		
		foreach($data['role'] as $key => $ra){		
			if(@$data[$ra.'_view']==TRUE){ $view=1; }else{ $view=0; }
			if(@$data[$ra.'_create']==TRUE){ $create=1; }else{ $create=0; }
			if(@$data[$ra.'_edit']==TRUE){ $edit=1; }else{ $edit=0; }
			if(@$data[$ra.'_delete']==TRUE){ $delete=1; }else{ $delete=0; }		
			// if(@$data['import']==TRUE){ $import=1; }else{ $import=0; }
			// if(@$data['export']==TRUE){ $export=1; }else{ $export=0; }
			// if(@$data['view_all']==TRUE){ $view_all=1; }else{ $view_all=0; } // View own
			
			$this->db->where('up_id',$data['upId'][$key])
					->update('tb_user_permission',[
									'role_id'=>$urId,
									'module_name' => $ra,
									'view'=>$view,
									'create_all'=>$create,
									'edit_all'=>$edit,
									'delete_all'=>$delete,
									'import_all'=>0,
									'export_all'=>0,
									'view_all'=>0 //view own
							]);
		}
		return true;
	}

	public function role_list()
	{
		$data=$this->db
						->select('*')
						->order_by("role_name","ASC")
						->from('tb_user_role') 
						->get();
		return $data->result_array();	
	}

	public function userRoleDel($urId)
	{
		$res =$this->db->where('ur_id',$urId)->get('tb_user')->num_rows();
        // echo $res;exit;
		if($res == 0){
			try {
				$success = $this->db->where('role_id',$urId)->delete('tb_user_role');                         
			
				if(!$success) {
					$error = "You cannot delete this row";
					throw new Exception($error);
				}else{
					return $this->db->affected_rows();
				}      
			} catch (Exception $e) {
				return '-1';
			}
		}else{
			return '-1';
		}

	}



}
?>
