<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
	<title>Referral</title>
	<?php $this->load->view('front/includes/hlinks'); ?>
</head>

<body class="theme-light" data-highlight="highlight-red">

	<?php $this->load->view('front/includes/preloader'); ?>

	<div id="page">

		<?php if (!empty($this->session->userdata('user_id'))) { ?>
			<?php $this->load->view('front/includes/header'); ?>
			<?php $this->load->view('front/includes/footer'); ?>
			<div class="page-title-clear"></div>
			<?php $this->load->view('front/includes/sidebar'); ?>
		<?php } ?>

		<?php $this->load->view('front/' . $page_name); ?>
	</div>
	
	<?php
	$data['cusData'] = $this->customer->get_customer_data();
	$this->load->view('front/includes/models', $data); ?>
	<?php $this->load->view('front/includes/flinks'); ?>

</body>
