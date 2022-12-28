<style>
	#grad1 {
		height: 200px;
		background: linear-gradient(to bottom, #f0d68a 0%, #ffffff 100%);
	}
</style>
<div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-welcome">
	<div class="card rounded-0 bg-6" data-card-height="150" style="height: 150px;">
		<div class="card-top">
			<a href="#" class="close-menu float-end me-2 text-center mt-3 icon-40 notch-clear"><i class="fa fa-times color-white"></i></a>
		</div>
		<div id="grad1">

			<div class="card-bottom">
				<div class="mb-2 ps-3"><img width="100" class="fluid-img rounded-m" src="<?= base_url('docs/Referral-Logo.png') ?>"></div>


				<!-- <h1 class="color-white ps-3 mb-n1 font-28">Digiworx</h1> -->
				<p class="mb-2 ps-3 font-13 color-white opacity-120">Welcome, <?= $this->session->userdata('user_name'); ?></p>
			</div>
		</div>
		<div class="card-overlay bg-gradient"></div>
	</div>
	<?php if(get_ut_role($this->session->userdata('user_type')) == 'Admin'){?>
		<div class="sidebar-main-menu show">
			<div class="list-group list-custom-small list-menu ms-0 me-2">
					<a href="<?= base_url('front/Dashboard') ?>" class="menu-active">
						<i class="fa fa-home gradient-blue color-white"></i>
						<span><i class="fas fa-home"></i>Home</span>				
					</a>
				<?php if(checkPermission($this->roleId,'company')->view == 1){?>
					<a href="<?= base_url('front/Company') ?>">
						<i class="fa fa-star gradient-magenta color-white"></i>
						<span>Company</span>				
					</a>
				<?php }if(checkPermission($this->roleId,'customer')->view == 1){?>
					<a href="<?= base_url('front/Customer') ?>">
						<i class="fa fa-users gradient-green color-white"></i>
						<span>Referral</span>				
					</a>
				<?php }if(checkPermission($this->roleId,'user')->view == 1){?>
					<a href="<?= base_url('front/User') ?>">
						<i class="fa fa-user gradient-yellow color-white"></i>
						<span>User</span>				
					</a>
				<?php } if(checkPermission($this->roleId,'email_temp')->view == 1){?>
					<a href="<?= base_url('front/Email_template') ?>">
						<i class="fa fa-sticky-note gradient-teal color-white"></i>
						<span>Email Template</span>				
					</a>
				<?php }if(checkPermission($this->roleId,'user_role')->view == 1){?>
					<!-- <a href="<?= base_url('front/User_role') ?>">
						<i class="fa fa-user-circle gradient-orange color-white"></i>
						<span>User Role</span>				
					</a> -->
				<?php }if(checkPermission($this->roleId,'plan')->view == 1){?>
					<a href="<?= base_url('front/Plan') ?>">
						<i class="fa fa-clone gradient-pink color-white"></i>
						<span>Plan</span>				
					</a>
				<?php }?>
				<a href="<?= base_url('front/Commission/history_admin') ?>">
					<i class="fa fa-address-card gradient-brown color-white"></i>
					<span>Bougth Fee History</span>				
				</a>
				<a href="<?= base_url('front/Authentication/logout') ?>">
					<i class="fa fa-sign-out gradient-red color-white"></i>
					<span>Logout</span>				
				</a>
			</div>
		</div>
	<?php }else{?>
		<div class="sidebar-main-menu show">
			<div class="list-group list-custom-small list-menu ms-0 me-2">
				<a href="<?= base_url('front/Dashboard') ?>" class="menu-active">
					<i class="fa fa-home gradient-blue color-white"></i>
					<span><i class="fas fa-home"></i>Home</span>				
				</a>
				<a href="<?= base_url('front/Customer/edit/'.$this->session->userdata('user_id')) ?>" class="menu-active">
					<i class="fa fa-edit gradient-yellow color-white"></i>
					<span>Edit</span>				
				</a>
				<?php if(checkPermission($this->roleId,'company')->view == 1){?>
					<a href="<?= base_url('front/Company') ?>">
						<i class="fa fa-star gradient-magenta color-white"></i>
						<span>Company</span>				
					</a>
				<?php }if(checkPermission($this->roleId,'customer')->view == 1){?>
					<a href="<?= base_url('front/Customer') ?>">
						<i class="fa fa-users gradient-green color-white"></i>
						<span>Referral</span>				
				
					</a>
				<?php }if(checkPermission($this->roleId,'user')->view == 1){?>
					<a href="<?= base_url('front/User') ?>">
						<i class="fa fa-user gradient-yellow color-white"></i>
						<span>User</span>				
					</a>
				<?php }if(checkPermission($this->roleId,'email_temp')->view == 1){?>
					<a href="<?= base_url('front/Email_template') ?>">
						<i class="fa fa-sticky-note gradient-teal color-white"></i>
						<span>Email Template</span>				
					</a>
				<?php }if(checkPermission($this->roleId,'user_role')->view == 1){?>
					<!-- <a href="<?= base_url('front/User_role') ?>">
						<i class="fa fa-user-circle gradient-orange color-white"></i>
						<span>User Role</span>				
					</a> -->
				<?php }if(checkPermission($this->roleId,'plan')->view == 1){?>
					<a href="<?= base_url('front/Plan') ?>">
						<i class="fa fa-clone gradient-pink color-white"></i>
						<span>Plan</span>				
					</a>
				<?php }?>
				<a href="<?= base_url('front/Commission/history_single_cus/'.$this->session->userdata('user_id')) ?>">
					<i class="fa fa-address-card gradient-brown color-white"></i>
					<span>Referral's</span>	
								
				</a>
				<a href="<?= base_url('front/Commission/single_cus_ref_con/'.$this->session->userdata('user_id')) ?>">
					<i class="fa fa-credit-card gradient-teal color-white"></i>
					<span>Referral & Bought Fee</span>				
				</a>
				<a href="<?= base_url('front/Authentication/logout') ?>">
					<i class="fa fa-sign-out gradient-red color-white"></i>
					<span>Logout</span>				
				</a>

			</div>
		</div>
	<?php }?>
</div>

<div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-height="370">
	<div class="menu-title">
		<p class="color-highlight">Tap a link to</p>
		<h1>Share</h1>
		<a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
	</div>
	<div class="divider divider-margins mt-3 mb-0"></div>
	<div class="content mt-0">
		<div class="list-group list-custom-small list-icon-0">
			<a href="auto_generated" class="external-link shareToFacebook">
				<i class="fab fa-facebook-f font-12 bg-facebook color-white shadow-l rounded-s"></i>
				<span>Facebook</span>
				<i class="fa fa-angle-right pr-1"></i>
			</a>
			<a href="auto_generated" class="external-link shareToTwitter">
				<i class="fab fa-twitter font-12 bg-twitter color-white shadow-l rounded-s"></i>
				<span>Twitter</span>
				<i class="fa fa-angle-right pr-1"></i>
			</a>
			<a href="auto_generated" class="external-link shareToLinkedIn">
				<i class="fab fa-linkedin-in font-12 bg-linkedin color-white shadow-l rounded-s"></i>
				<span>LinkedIn</span>
				<i class="fa fa-angle-right pr-1"></i>
			</a>
			<a href="auto_generated" class="external-link shareToWhatsApp">
				<i class="fab fa-whatsapp font-12 bg-whatsapp color-white shadow-l rounded-s"></i>
				<span>WhatsApp</span>
				<i class="fa fa-angle-right pr-1"></i>
			</a>
			<a href="auto_generated" class="external-link shareToMail border-0">
				<i class="fa fa-envelope font-12 bg-mail color-white shadow-l rounded-s"></i>
				<span>Email</span>
				<i class="fa fa-angle-right pr-1"></i>
			</a>
		</div>
	</div>

</div>

<div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-height="480">
	<div class="menu-title">
		<p class="color-highlight font-600">Choose your Favorite</p>
		<h1>Highlight</h1>
		<a href="#" class="close-menu"><i class="fa fa-times-circle"></i></a>
	</div>
	<div class="divider divider-margins mt-3 mb-2"></div>
	<div class="content mt-0 ms-0 me-0">
		<div class="row mb-0">
			<div class="col-6">
				<div class="list-group list-custom-small list-menu">
					<a href="#" data-change-highlight="blue">
						<i class="gradient-blue color-white"></i>
						<span>Blue</span>
					</a>
					<a href="#" data-change-highlight="red">
						<i class="gradient-red color-white"></i>
						<span>Red</span>
					</a>
					<a href="#" data-change-highlight="orange">
						<i class="gradient-orange color-white"></i>
						<span>Orange</span>
					</a>
					<a href="#" data-change-highlight="green">
						<i class="gradient-green color-white"></i>
						<span>Green</span>
					</a>
					<a href="#" data-change-highlight="yellow">
						<i class="gradient-yellow color-white"></i>
						<span>Yellow</span>
					</a>
				</div>
			</div>
			<div class="col-6">
				<div class="list-group list-custom-small list-menu">
					<a href="#" data-change-highlight="dark">
						<i class="gradient-dark color-white"></i>
						<span>Dark</span>
					</a>
					<a href="#" data-change-highlight="gray">
						<i class="gradient-gray color-white"></i>
						<span>Gray</span>
					</a>
					<a href="#" data-change-highlight="teal">
						<i class="gradient-teal color-white"></i>
						<span>Teal</span>
					</a>
					<a href="#" data-change-highlight="magenta">
						<i class="gradient-magenta color-white"></i>
						<span>Plum</span>
					</a>
					<a href="#" data-change-highlight="brown">
						<i class="gradient-brown color-white"></i>
						<span>Brown</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="divider divider-margins mt-2"></div>
	<a href="#" class="close-menu btn btn-margins btn-m font-13 rounded-s shadow-xl btn-full gradient-highlight border-0 font-700 text-uppercase">Awesome</a>

</div>
