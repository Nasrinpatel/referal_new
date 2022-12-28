<?php if(get_ut_role($this->session->userdata('user_type')) == 'Admin'){?>
	<div id="footer-bar" class="footer-bar-6">
		<a href="<?= base_url('front/Company') ?>"><i class="fa fa-layer-group"></i><span>Company</span></a>
		<a href="<?= base_url('front/Customer') ?>"><i class="fa fa-file"></i><span>Referral</span></a>
		<a href="<?= base_url('front/Dashboard') ?>" class="circle-nav active-nav"><i class="fa fa-home"></i><span>Welcome</span></a>
		<a href="<?= base_url('front/User') ?>"><i class="fa fa-image"></i><span>User</span></a>
		<a href="<?= base_url('front/Authentication/logout') ?>"><i class="fa fa-sign-out"></i><span>Log out</span></a>
		<!-- <a href="<?= base_url('front/User_role') ?>"><i class="fa fa-user"></i><span>User Role</span></a>  -->
	</div>
<?php }else{?>
	<div id="footer-bar" class="footer-bar-6">
		<a href="<?= base_url('front/Customer') ?>"><i class="fa fa-users"></i><span>Referral</span></a>
		<a href="<?= base_url('front/Commission/history_single_cus/'.$this->session->userdata('user_id')) ?>"><i class="fa fa-address-card"></i><span>Referral's</span></a>
		<a href="<?= base_url('front/Dashboard') ?>" class="circle-nav active-nav"><i class="fa fa-home"></i><span>Welcome</span></a>
		<a href="<?= base_url('front/Commission/single_cus_ref_con/'.$this->session->userdata('user_id')) ?>"><i class="fa fa-credit-card"></i><span>Bought</span></a> 
		<a href="<?= base_url('front/Authentication/logout') ?>"><i class="fa fa-sign-out"></i><span>Log out</span></a>
	</div>
<?php }?>
