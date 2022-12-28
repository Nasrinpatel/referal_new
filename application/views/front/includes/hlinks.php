<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ?>styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ?>styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/front/') ?>fonts/css/fontawesome-all.min.css">
<!-- <link rel="manifest" href="_manifest.json"> -->
<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('docs/Referral-Logo.png') ?>">

<!-- for use multi selct -->
<link href="<?=base_url()?>assets/front/select2/css/select2.min.css" rel="stylesheet" />
<!-- <link href="<?= base_url(); ?>assets/front/select2/css/select2.min.css" rel="stylesheet" type="text/css" /> -->

<!-- for data table -->
<link href="<?= base_url(); ?>assets/front/styles/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/front/styles/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?= base_url(); ?>assets/front/styles/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />

<!-- for country code-->
<link href="<?= base_url(); ?>assets/front/styles/intlTelInput.css?v="<?= time() ?> rel="stylesheet" type="text/css" />





<script type="text/javascript" src="<?= base_url('assets/front/') ?>scripts/jquery-3.6.0.js"></script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>scripts/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>scripts/additional-methods.min.js"></script>

<!-- for use show sweet alert -->
<script type="text/javascript" src="<?= base_url('assets/front/') ?>scripts/sweetalert.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>scripts/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>scripts/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>scripts/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/front/') ?>scripts/firebase.js"></script>
<!-- for country code-->
<script type="text/javascript" src="<?= base_url('assets/front/') ?>scripts/intlTelInput-jquery.js?v="<?= time() ?>></script>
<script>
	$(document).ready(function () {
		$(".phone_with_code").intlTelInput({
			hiddenInput: "full_phone",
			nationalMode: false,       
			separateDialCode: true,
			autoHideDialCode: true, 
			autoPlaceholder: "aggressive",
			placeholderNumberType: "MOBILE",
			utilsScript: "<?= base_url('assets/front/') ?>scripts/utils.js" // just for formatting/placeholders etc
		}).on('countrychange', function (e, countryData) {
            $('.country_code').val('+'+$(".phone_with_code").intlTelInput("getSelectedCountryData").dialCode);
        });
		$('.country_code').val('+'+$(".phone_with_code").intlTelInput("getSelectedCountryData").dialCode);
		$(".phone_with_code").val($(".phone_with_code").val().replace(/\s+/g, ''));
		jQuery.validator.addMethod("intlTelNumber", function(value, element) {
			return this.optional(element) || $(".phone_with_code").intlTelInput("isValidNumber");
		}, "Please enter a valid International Phone Number");
	});	
</script>
<script type="text/javascript">
	
	//for month show
	const consMonth = ["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"];
	function success_message(title,text){
		Swal.fire({
			title: title,
			html: text,
			icon: "success",
			button: "Okay!",
		});
	}
	function error_message(title,text){
		Swal.fire({
			title: title,
			html: text,
			icon: "error",
			button: "Okay!",
		});
	}

	function confirm_message(title,text,url){
		Swal.fire({
			title: title,
			text: text,
			icon: title,
			showCancelButton: false,
			confirmButtonColor: '#3085d6',
			// cancelButtonColor: '#d33',
			confirmButtonText: 'OK'
		}).then((result) => {
			/* if (result.isConfirmed) {
				Swal.fire(
				'Deleted!',	
				'Your file has been deleted.',
				'success'
				)
			} */
			window.location.reload(url);
		})
	}

	$(document).ready(function(){
		<?php if($this->session->flashdata('success')){ ?>
			success_message("<?= $this->session->flashdata('success_title') ?>","<?= $this->session->flashdata('success') ?>");
		<?php } ?>
		<?php if($this->session->flashdata('error')){ ?>
			error_message("<?= $this->session->flashdata('error_title') ?>","<?= $this->session->flashdata('error') ?>");
		<?php } ?>
		$('.js-example-basic-single').select2();
		$('.customer_referral').select2();

	});
	
	function close_popup(){
		var wrappers = document.querySelectorAll('.header, #footer-bar, .page-content');
		const activeMenu = document.querySelectorAll('.menu-active');
		for(let i=0; i < activeMenu.length; i++){activeMenu[i].classList.remove('menu-active');}
		for(let i=0; i < wrappers.length; i++){wrappers[i].style.transform = "translateX(-"+0+"px)"}
	}
	function open_popup(popup_id){
		document.getElementById(popup_id).classList.add('menu-active');
		document.getElementsByClassName('menu-hider')[0].classList.add('menu-active');
	}
	
	function formatDate(date) {
		var d = new Date(date),
			month = '' + (d.getMonth() + 1),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if (month.length < 2) month = '0' + month;
		if (day.length < 2) day = '0' + day;

		return [day, month, year].join('-')
	}

	function formatDateModify(date,sep) {
		if(sep != 'M'){
		var d = new Date(date),
			month = '' + consMonth[d.getMonth()],
			day = '' + d.getDate(),
			year = d.getFullYear();
			if (day.length < 2) day = '0' + day;
		}
		
		// if (month.length < 2) month = '0' + month;
		
		if(sep == 'd'){
			return [day]
		}else if(sep == 'm'){
			return [month]
		}else if(sep == 'M'){
			var d = new Date(date),
			month = '' + (d.getMonth()+1),
			day = '' + d.getDate(),
			year = d.getFullYear();
			return [month]
		}else{
			return [year]
		}
	}

	//load firebase
	var firebaseConfig = {
							apiKey: "AIzaSyBdFVq817H_iwDUwtqrIXEnSrfDidR8gDU",
							authDomain: "referral-cc86d.firebaseapp.com",
							projectId: "referral-cc86d",
							storageBucket: "referral-cc86d.appspot.com",
							messagingSenderId: "203818732753",
							appId: "1:203818732753:web:059887a6d496729e4609f0",
							measurementId: "G-V7L75LDC89"
						};

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

	function getCodeBoxElement(index) {
        return document.getElementById('codeBox' + index);
	}
	function onKeyUpEvent(index, event) {
		const eventCode = event.which || event.keyCode;
		if (getCodeBoxElement(index).value.length === 1) {
			if (index !== 6) {
				getCodeBoxElement(index+ 1).focus();
			} else {
				getCodeBoxElement(index).blur();
			// Submit code
				console.log('submit code ');
			}
		}
		if (eventCode === 8 && index !== 1) {
			getCodeBoxElement(index - 1).focus();
		}
	}
	function onFocusEvent(index) {
		for (item = 1; item < index; item++) {
			const currentElement = getCodeBoxElement(item);
			if (!currentElement.value) {
				currentElement.focus();
				break;
			}
		}
	}
	$(document).ready(function(){
		// CKEDITOR.disableAutoInline = true;
		// Replace the <textarea id="ckeditor"> with a CKEditor
		// instance, using default configuration.
		//CKEDITOR.replace( 'editor1');
	});
	
	function onClickDeleteCnf(cur){
		var delUrl = $(cur).data('url');

		Swal.fire({
			title: 'Are you sure?',
			text: "You wan't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, Delete it'
		}).then((result) => {
			if (result.isConfirmed==true) {
				console.log(result.isConfirmed);
				$.ajax({
					type: "POST",
					url: delUrl,
					// data: $(this).serialize(),
					dataType: "json",
					success: function (response) {
						// close_popup();
						if(response.status == 'success'){
							// success_message('',);
							confirm_message('success',response.message,response.url);
						}else{
							// error_message('',response.message);
							confirm_message('error',response.message,response.url);
						}
					}
				});
			}
		})
	}
</script>
