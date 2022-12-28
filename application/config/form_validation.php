<?php

$config = array(
	'company_add' => array(
		array(
			'field' => 'company_name',
			'label' => 'Please enter company name',
			'rules' => 'required'
		),
		array(
			'field' => 'company_email',
			'label' => 'Please enter company email',
			'rules' => 'required|valid_email'
		),
		array(
			'field' => 'company_phone_no',
			'label' => 'Please enter phone number',
			'rules' => 'required'
		),
		array(
			'field' => 'company_address',
			'label' => 'Please enter company address',
			'rules' => 'required'
		)
	),

	'product_add'=>array(
		array(
			'field' => 'cm_id[]',
			'label' => 'Please select company name',
			'rules' => 'required'
		),
		array(
			'field' => 'product_name',
			'label' => 'Please enter company email',
			'rules' => 'required'
		),
		array(
			'field' => 'product_rate',
			'label' => 'Please enter product rate',
			'rules' => 'required'
		),
		array(
			'field' => 'product_commission',
			'label' => 'Please enter product Referral fee for Referral',
			'rules' => 'required'
		)
	),

	'customer_add' => array(
		array(
			'field' => 'cm_id[]',
			'label' => 'Company name',
			'rules' => 'required'
		),
		array(
			'field' => 'customer_name',
			'label' => 'Referral name',
			'rules' => 'required'
		),
		array(
			'field' => 'ur_id',
			'label' => 'User role',
			'rules' => 'required'
		),
		array(
			'field' => 'country_code',
			'label' => 'Country Code',
			'rules' => 'required'
		),
		array(
			'field' => 'full_phone',
			'label' => 'Referral phone no',
			'rules' => 'required|is_unique[tb_customer.customer_phone_no]',
			array(
				'required' => 'Referral Phone Number',
				'is_unique'=> 'This %s already exists'
			)
		),
    	array(
			'field' => 'customer_email',
			'label' => 'Referral email',
			array(
				'required' => 'Referral Email id',
				'valid_email' => 'Please enter valid email',
				'is_unique'=> 'This %s already exists'
			),
			'rules' => 'required|valid_email|is_unique[tb_customer.customer_email]'
		)
	),
	
	'customer_update' => array(
		array(
			'field' => 'cm_id[]',
			'label' => 'Company name',
			'rules' => 'required'
		),
		array(
			'field' => 'customer_name',
			'label' => 'Referral name',
			'rules' => 'required'
		),
		array(
			'field' => 'country_code',
			'label' => 'Country Code',
			'rules' => 'required'
		),
		array(
			'field' => 'full_phone',
			'rules' => 'required',
			array(
				'required' => 'Referral Phone Number'
			)
		),
		array(
			'field' => 'customer_email',
			'label' => 'Referral email',
			'rules' => 'required|valid_email'
		)
	),

	'customer_ref_add' => array(
		array(
			'field' => 'customer_name',
			'label' => 'Please enter Referral name',
			'rules' => 'required'
		),
		array(
			'field' => 'customer_phone_no',
			'label' => 'Please enter Referral phone no',
			'rules' => 'required'
		),
		array(
			'field' => 'customer_email',
			'label' => 'Please enter Referral email',
			'rules' => 'required'
		)
	),

	'company_user_add' => array(
		array(
			'field' => 'cm_id[]',
			'label' => 'Please select company name',
			'rules' => 'required'
		),
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email'
		),
		array(
			'field' => 'designation',
			'label' => 'Designation',
			'rules' => 'required'
		),
		array(
			'field' => 'confirm_pass',
			'label' => 'Confirm password',
			'rules' => 'required|matches[password]'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|matches[confirm_pass]'
		)
	),

	'compLinkUser_add' => array(
		array(
			'field' => 'cm_id[]',
			'label' => 'select company name',
			'rules' => 'required'
		),
		array(
			'field' => 'cum_id',
			'label' => 'select user name',
			'rules' => 'required'
		)
	),

	'quotation_add' => array(
		array(
			'field' => 'qut_subject',
			'label' => 'subject',
			'rules' => 'required'
		),
		array(
			'field' => 'cm_id',
			'label' => 'select company',
			'rules' => 'required|callback_check_default',
			'errors' => ['check_default'=>'You need to select something other than the default']
		),
		array(
			'field' => 'qut_cus_id',
			'label' => 'select Referral',
			'rules' => 'required|callback_check_default',
			'errors' => ['check_default'=>'You need to select something other than the default']
		),
		array(
			'field' => 'qut_created',
			'label' => 'quotation create date',
			'rules' => 'required'
		),
		array(
			'field' => 'qut_expired',
			'label' => 'quotation expire date',
			'rules' => 'required'
		),
		array(
			'field' => 'qut_status',
			'label' => 'select status',
			'rules' => 'required'
		)
		/* array(
			'field' => 'qut_grand_total',
			'label' => 'Grand total is not zero please enter at least one product data',
			'rules' => 'required|is_natural_no_zero'
		) */
	),
	
	'user_role_add' => array(
		array(
			'field' => 'role_name',
			'label' => 'User role name',
			'rules' => 'required'
		)
	),

	'user_add' => array(
		array(
			'field' => 'name',
			'label' => 'User name',
			'rules' => 'required'
		),
		array(
			'field' => 'ur_id',
			'label' => 'Role type',
			'rules' => 'required|callback_check_default',
			'errors' => ['check_default'=>'You need to select something other than the default']
		),
		array(
			'field' => 'email',
			'label' => 'Email-Id',
			'rules' => 'required'
		),
		array(
			'field' => 'phone_no',
			'label' => 'Phone Number',
			'rules' => 'required'
		),
		array(
			'field' => 're_password',
			'label' => 'Confirm password',
			'rules' => 'required|matches[password]'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|matches[re_password]'
		)
	),

	'user_update' => array(
		array(
			'field' => 'name',
			'label' => 'User name',
			'rules' => 'required'
		),
		array(
			'field' => 'ur_id',
			'label' => 'Role type',
			'rules' => 'required|callback_check_default',
			'errors' => ['check_default'=>'You need to select something other than the default']
		),
		array(
			'field' => 'email',
			'label' => 'Email-Id',
			'rules' => 'required'
		),
		array(
			'field' => 'phone_no',
			'label' => 'Phone Number',
			'rules' => 'required'
		)
	),

	'pass_change' => array(
		array(
			'field' => 'old_pass',
			'label' => 'Old password',
			'rules' => 'required'
		),
		array(
			'field' => 'cnf_pass',
			'label' => 'Confirm password',
			'rules' => 'required|matches[new_pass]'
		),
		array(
			'field' => 'new_pass',
			'label' => 'New password',
			'rules' => 'required|matches[cnf_pass]'
		)
	),
	
	'emailTemp_add' => array(
		array(
			'field' => 'email_for',
			'label' => 'Email for',
			'rules' => 'required'
		),
		array(
			'field' => 'email_subject',
			'label' => 'Email subject',
			'rules' => 'required'
		),
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required'
		)
	),
	'register_add' => array(
		array(
			'field' => 'cm_id[]',
			'label' => 'Company name',
			'rules' => 'required'
		),
		array(
			'field' => 'customer_name',
			'label' => 'Name',
			'rules' => 'required'
		),
		array(
			'field' => 'full_phone',
			'label' => 'Referral phone no',
			'rules' => 'required|is_unique[tb_customer.customer_phone_no]',
			array(
				'required' => 'Referral Phone Number',
				'is_unique'=> 'This %s already exists'
			)
		),
    	array(
			'field' => 'customer_email',
			'label' => 'Referral email',
			array(
				'required' => 'Referral Email id',
				'valid_email' => 'Please enter valid email',
				'is_unique'=> 'This %s already exists'
			),
			'rules' => 'required|valid_email|is_unique[tb_customer.customer_email]'
		)
	),
);
