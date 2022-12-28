
		<!-- Right bar overlay-->
		<div class="rightbar-overlay"></div>
		

		<!-- Vendor js -->
		<script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>

		<!-- Chart JS -->
		<script src="<?= base_url(); ?>assets/libs/chart.js/Chart.bundle.min.js"></script>

		<script src="<?= base_url(); ?>assets/libs/moment/min/moment.min.js"></script>
		<script src="<?= base_url(); ?>assets/libs/jquery.scrollto/jquery.scrollTo.min.js"></script>

		<!-- Chat app -->
		<script src="<?= base_url(); ?>assets/js/pages/jquery.chat.js"></script>

		<!-- Todo app -->
		<script src="<?= base_url(); ?>assets/js/pages/jquery.todo.js"></script>

		<!-- Dashboard init JS -->
		<script src="<?= base_url(); ?>assets/js/pages/dashboard-3.init.js"></script>

		<!-- create quotation js -->
		<script src="<?= base_url() ?>assets/js/create-quotation.js"></script>

		<!-- App js-->
		<script src="<?= base_url(); ?>assets/js/app.min.js"></script>

		<!-- Plugins js -->
		<script src="<?= base_url()?>assets/libs/dropzone/min/dropzone.min.js"></script>
		<script src="<?= base_url()?>assets/libs/dropify/js/dropify.min.js"></script>
		
		<!-- Sweet Alerts js -->
		<script src="<?= base_url()?>assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

		<!-- Tippy js-->
        <script src="<?= base_url() ?>assets/libs/tippy.js/tippy.all.min.js"></script>

		<!-- select multi select js -->
		<script src="<?= base_url()?>assets/libs/selectize/js/standalone/selectize.min.js"></script>
        <script src="<?= base_url()?>assets/libs/mohithg-switchery/switchery.min.js"></script>
        <script src="<?= base_url()?>assets/libs/multiselect/js/jquery.multi-select.js"></script>
        <script src="<?= base_url()?>assets/libs/select2/js/select2.min.js"></script>
        <script src="<?= base_url()?>assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
        <script src="<?= base_url()?>assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js"></script>
        <script src="<?= base_url()?>assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="<?= base_url()?>assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>

		<!-- Init js-->
		<script src="<?= base_url()?>assets/js/pages/form-fileuploads.init.js"></script>
		<script src="<?= base_url()?>assets/js/pages/form-advanced.init.js"></script>
		<script src="<?= base_url(); ?>assets/js/datatables/js/datatables.init.js"></script>
		<script src="<?= base_url(); ?>assets/js/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/datatables/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url(); ?>assets/js/datatables/js/responsive.bootstrap4.min.js"></script>

		
		<script  type="text/javascript">
				// Set CodeIgniter base_url in JavaScript var to use within
			var _BASE_URL_ = "<?=base_url()?>";
			var _CSRF_NAME_ = "<?=$this->security->get_csrf_token_name()?>";

			(function($) {
				/**
				 * New jQuery function to set/refresh CSRF token in Body & to attach AjaxPOST
				 * @param  {[type]} $ [description]
				 * @return {[type]}   [description]
				 */
				$.fn.CsrfAjaxSet = function(CsrfObject) {
					// getting meta object from body head section by csrf name
					var CsrfMetaObj = $('meta[name="' + _CSRF_NAME_ + '"]'),
					CsrfSecret = {};
					// if CsrfObject not set/pass in function
					if (typeof CsrfObject == 'undefined') {
						// assign meta object in CsrfObject
						CsrfObject = CsrfMetaObj;
						// get meta tag name & value
						CsrfSecret[CsrfObject.attr('name')] = CsrfObject.attr('content');
					}
					// CsrfObject pass in function
					else {
						// get Csrf Token Name from JSON
						var CsrfName = Object.keys(CsrfObject);
						// set csrf token name & hash value in object
						CsrfSecret[CsrfName[0]] = CsrfObject[CsrfName[0]];
					}
					// attach CSRF object for each AjaxPOST automatically
					$.ajaxSetup({
						data: CsrfSecret
					});
				};
				/**
				 * New jQuery function to get/refresh CSRF token from CodeIgniter
				 * @param  {[type]} $ [description]
				 * @return {[type]}   [description]
				 */
				$.fn.CsrfAjaxGet = function() {
					return $.get(_BASE_URL_ + 'Csrfdata', function(CsrfJSON) {
						$(document).CsrfAjaxSet(CsrfJSON);
					}, 'JSON');            
				};
			})(jQuery);
		</script>

		<script>
			// Function for masking the character 
			function MaskCharacter(num) {
				
				var str = num.toString();
				var mask = '*';
				//for show only last two digit
				/* return ('' + str).slice(0, -n)
					.replace(/./g, mask)
					+ ('' + str).slice(-n); */

				//for show first two digit and last two digit 
				var first = str.substr( 0, 2 ); // Get the first two digits
				var second = mask.repeat( ( str.length - Number(4) ) ); // Apply enough asterisks to cover the middle numbers
				var third = str.substr( -2 );
				return first+second+third;
			}			
			// var num = 8200394893;
			// console.log(MaskCharacter(num));
					
		</script>
		<?php
		include('dataTable.php');
	 	if($error=$this->session->flashdata('error_flash'))
		{ 
			$errorClass=$this->session->flashdata('error_flash_class');
			if($errorClass=="all-success")
			{	
				?>
				<script>
					$(document).ready(function() {	
						Swal.fire({
									title:"Good job!",
									text: '<?php print_r($error); ?>',
									icon:"success"
								});
					});
				</script>
			<?php 
			} 
			else
			{ 	?>
				<script>
				$(document).ready(function() {
					Swal.fire({
								icon:"error",
								title:"Oops...",
								text:'<?php print_r($error); ?>',
								// footer:"<a href>Why do I have this issue?</a>"
							});
				});
				</script>
				<?php 
			}
		}
		?>

		<script>
			//for show reference customer name if add quotation 
			function setReferBy(cusId){
				var dataVal = $(this).data(cusId);
				// alert(dataVal);
			}

			$(document).ready(function(){

				$('.refer_change').on('change',function(){
					// debugger;
					var refVal = $(".refer_change option:selected").attr("data-refer");
					// var refVal = $(".refer_change :selected").val();
					// debugger;
					if(refVal != ''){
						$('#refer_by').css('display','block');
						$('#refer_by').html("<b>Reference By : </b>"+refVal);
					}else{
						$('#refer_by').css('display','none');
						// $('#refer_by').html("<b>Reference By : </b> ");
					}
					// debugger;
				});

				//for add customer to if any customer come any other person reference 
				$('#referralCheck').on('click',function(){
					if($("#referralCheck").is(':checked')){
						// alert('checked');
						$("#refer_by").removeAttr('disabled');  // checked
					}else{
						// alert('unchecked');
						$("#refer_by").attr('disabled','disabled');  // unchecked
					}
				});

				$('#productDelete').on('click',function(a){
					a.preventDefault();
					debugger;
					var pro_id = $('#productId').val();
					// alert(pro_id);return;
					Swal.fire({
								title:"Are you sure?",
								text:"You won't be able to delete this product!",
								icon:"warning",
								showCancelButton:!0,
								confirmButtonColor:"#28bb4b",
								cancelButtonColor:"#f34e4e",
								confirmButtonText:"Yes, delete it!"}).
								then((result) => {
								/* Read more about isConfirmed, isDenied below */
								if (result.isConfirmed) { 
									debugger;
									$.ajax({  
										url:'<?= base_url('admin/Product/delete/') ?>'+ pro_id,   
										method: "get",
										contentType: false,
										cache: false,
										processData: false,
										success: function(response) {
											debugger;
											Swal.fire("Deleted!","Your file has been deleted.","success");
											setTimeout(
												function() {
													window.location.href = "<?= base_url('admin/Product/index') ?>";
												}, 2000);
											debugger;
										}
									});
									
								} else if (result.isDenied) {
									Swal.fire('Changes are not saved', '', 'info')
								}
								debugger;
							});
							debugger;
					// 'admin/product/delete/$proDetData->pro_id?>
				});

				// for add multiple time products add in quotation
                $('#add-invoice-item').click(function () {
                    var invoice_items = 
								'<div class="row item-row">'
                                	+'<hr>'
									+'<div class="form-group mb-1 col-sm-12 col-md-5">'
										+'<label for="item_name">Item</label>'
											+'<br>'
											+'<input type="text" class="form-control item_name" name="qut_item_name[]" id="item_name" placeholder="Item Name">'
									+'</div>'
									+'<div class="form-group mb-1 col-sm-12 col-md-2">'
										+'<label for="qty_hrs" class="cursor-pointer">Qty/Hr</label>'
										+'<br>'
											+'<input type="number" class="form-control qty_hrs" name="qut_qty_hrs[]" id="qty_hrs" value="1">'
									+'</div>'
									+'<div class="skin skin-flat form-group mb-1 col-sm-12 col-md-2">'
										+'<label for="unit_price">Unit Price</label>'
										+'<br>'
											+'<input class="form-control unit_price" type="number" name="qut_unit_price[]" value="0" id="unit_price" />'
									+'</div>'
									+'<div class="form-group mb-1 col-sm-12 col-md-2">'
										+'<label for="profession">Sub Total</label>'
											+'<input type="number" class="form-control sub-total-item" readonly="readonly" name="qut_sub_total_item[]" value="0" />'
											+'<p style="display:none" class="form-control-static"><span class="amount-html">0</span></p>'
									+'</div>'
									+'<div class="form-group col-sm-12 col-md-1 text-xs-center mt-1">'
										+'<label for="profession">&nbsp;</label><br><button type="button" class="btn icon-btn btn-sm btn-outline-danger waves-effect waves-light remove-item" data-repeater-delete=""> <span class="fa fa-trash"></span></button>'
									+'</div>'
                                +'</div>'
                    $('#item-list').append(invoice_items).fadeIn(500);
                });

				// for remove particular products 
				$(document).on('click','.remove-item',function(){
					// alert("hii");
					$(this).closest('.item-row').remove();
					update_total();
				});

				//for admin password change
				$(document).on('change','#confPass',function(){
					var newPass = $('#newPass').val();
					var cnfPass = $(this).val();
					if(newPass != cnfPass){
						Swal.fire({
							icon:"error",
							title:"Oops...",
							text:'Confirm password not match with new password',
							// footer:"<a href>Why do I have this issue?</a>"
						});
						$('#newPass').val('');
						$(this).val('');
						$('#updatePass').attr('disabled','disabled');
					}else{
						$('#updatePass').removeAttr('disabled','disabled');
					}
				});
				
			});

		</script>
	</body>
</html>
