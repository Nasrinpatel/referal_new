<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('count_row'))
	{
		function count_row($table)
		{
			$ci =& get_instance();
			return  $ci->db->select('*')->get($table)->num_rows();
		}
	}

	//for get data using where condition
	if(!function_exists('get_data'))
	{
		function get_data($table,$rowName,$id)
		{
			$ci =& get_instance();
			return  $ci->db->select('*')->where($rowName,$id)->get($table)->row();
		}
	}

	// for inquiry number generate like 00001/mm/YY .
	if(!function_exists('inquiry_auto_gen_num'))
	{
		function inquiry_auto_gen_num()
		{
			$ci =& get_instance();
			$inquiryCode=$ci->db 
							->select(['inq_code'])
							->from('inquiry_master') 
							->order_by('inq_code',"DESC")
							->get();
			$InqCode=$inquiryCode->row();	
			if($inquiryCode->num_rows()==0){
				$CusCode="00001"."/".date('m')."/".date('y'); // Starting Number
			}
			else
			{
				$number=preg_replace('/\/(\d{2})\/(\d{2})\z/','',$InqCode->inq_code);
				
				if($number >= 00001)
				{
					$CusCode = $number + 1;
					$CusCode= str_pad($CusCode,5,0,STR_PAD_LEFT)."/".date('m')."/".date('y');
				}
				else{		
					// echo "else";	
					$CusCode="00001"."/".date('m')."/".date('y'); // Starting Number
				}   
			}
			return $CusCode;
		}
	}

	//for cudtomer or user mobile number masking
	if(!function_exists('numberMask'))
	{
		function numberMask($num)
		{
			return substr( $num, 0, 2 ) // Get the first two digits
					.str_repeat( '*', ( strlen( $num ) - 4 ) ) // Apply enough asterisks to cover the middle numbers
					.substr( $num, -2 ); // Get the last two digits
		}
	}

	//for customer mobile number check in db exist or not
	if(!function_exists('cusMobValidation'))
	{
		function cusMobValidation($CusNum,$columnName,$id=null)
		{
			$ci =& get_instance();	
			if($id != null){
				$ci->db->where('cus_id !=',$id,false);
			}
			$nc = $ci->db->where($columnName,$CusNum)->get('tb_customer')->num_rows();
			// echo $ci->db->last_query();exit;
			if($nc == 0){
				return true;//mob number is unique
			}else{
				return false;//mob is already register with us
			}
		}
	}

	//for user mobile number or email check in db exist or not
	if(!function_exists('userUniqValidation'))
	{
		function userUniqValidation($value,$columnName,$id=null)
		{
			$ci =& get_instance();	
			if($id != null){
				$ci->db->where('user_id !=',$id,false);
			}
			$nc = $ci->db->where($columnName,$value)->get('tb_user')->num_rows();
			// echo $ci->db->last_query();exit;
			if($nc == 0){
				return true;//value is unique
			}else{
				return false;//value is already register with us
			}
		}
	}

	//get usertype through role name
	if(!function_exists('get_ut_role'))
	{
		function get_ut_role($userType)
		{
			$ci =& get_instance();	
			return $ci->db->where('role_id',$userType)->get('tb_user_role')->row()->role_name;
		}
	}
	
	//get month wise total counting through month
	if(!function_exists('get_ref_con_total_count'))
	{
		function get_ref_con_total_count($month,$cus_id)
		{
			$ci =& get_instance();	
			$refConTc = $ci->db->where('cus_id',$cus_id)->where('MONTH(entry_date)',$month)->get('tb_customer_ref_con');

			if($refConTc->num_rows() !=0){
				return $refConTc->row()->total;
			}else{
				return 0;
			}
		}
	}
?>
