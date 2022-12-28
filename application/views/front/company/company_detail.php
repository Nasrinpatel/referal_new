
<?php /*<div class="content-page">
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<div class="page-title-right">
							<ol class="breadcrumb m-0">
								<a type="button" onclick="history.back()" style="margin-right: 10px;" class="btn btn-info waves-effect waves-light">
									<span class="btn-label"><i class="mdi mdi-keyboard-backspace"></i></span>Back
								</a>
								<a type="button" href="<?=base_url('admin/Company/edit/').$comDetData->cm_id?>" style="margin-right: 10px;" class="btn btn-primary waves-effect waves-light">
									<span class="btn-label"><i class="mdi mdi-account-edit"></i></span>edit
								</a>
								<a type="button" href="<?=base_url('admin/Company/delete/').$comDetData->cm_id?>" onclick="return confirm('Are you sure you want to delete this company?');" id="" class="btn btn-danger waves-effect waves-light">
									<span class="btn-label"><i class="mdi mdi-delete"></i></span>Delete
								</a>
							</ol>
						</div>
						<h4 class="page-title">Company Detail</h4>
					</div>
				</div>
			</div>     
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-lg-12"></div>
							</div>
							<div class="row">
								<div class="col-lg-5">
									<div class="row">
										<div class="col-lg-12">
											<img src="<?=base_url('upload/company_logo/').$comDetData->company_logo?>" alt="" class="img-fluid mx-auto d-block rounded">
										</div>
									</div>
								</div> <!-- end col -->
								<div class="col-lg-7">
									<div class="ps-xl-3 mt-3 mt-xl-0">
										<h4 class="mb-3"><?=$comDetData->company_name?></h4>
										<h4 class="mb-3"><?=$comDetData->company_phone_no?></h4>
										<p class="text-muted mb-2"><?=$comDetData->company_address?>.</p>
										<p class="text-muted mb-2"><?=$comDetData->company_email?>.</p>
										<p class="text-muted mb-2"><?=$comDetData->company_website?>.</p>
										<p class="text-muted mb-2"><?=$comDetData->notes?>.</p>
									</div>
								</div> <!-- end col -->
							</div><!-- end row -->
						</div>
					</div> <!-- end card-->
				</div> <!-- end col-->
			</div><!-- end row-->
		</div> 
	</div> 
</div> */?>

<div class="page-content">

	<div class="card rounded-0 bg-8" data-card-height="450">
		<!-- <div class="card-bottom pl-3 pb-4">
			<h1 class="color-white font-24 mb-n1">
				Appkit is built for You
			</h1>
			<p class="color-white font-14 opacity-50">
				Add your touch, your style, your ideas
			</p>
		</div> -->
		
		<div class="card-overlay bg-gradient">
			<img src="<?=base_url('upload/company_logo/').$comDetData->company_logo?>" alt="" class="img-fluid mx-auto d-block rounded">
		</div>
	</div>


	<div class="card card-style" style="margin-top:-60px; z-index:1">
		<div class="d-flex justify-content-between">
			<div>
				<a href="#" class="shareToFacebook icon-xl text-center"><i class="fab fa-facebook-f font-14 color-facebook"></i></a>
			</div>
			<div>
				<a href="#" class="shareToTwitter icon-xl text-center"><i class="fab fa-twitter font-14 color-twitter"></i></a>
			</div>
			<div>
				<a href="#" class="shareToWhatsApp icon-xl text-center"><i class="fab fa-whatsapp font-14 color-whatsapp"></i></a>
			</div>
			<div>
				<a href="#" class="shareToLinkedIn icon-xl text-center"><i class="fab fa-linkedin-in font-14 color-linkedin"></i></a>
			</div>
			<div>
				<a href="#" class="shareToMail icon-xl text-center"><i class="fa fa-envelope font-14 color-mail"></i></a>
			</div>
			<div>
				<a href="#" class="shareToCopyLink icon-xl text-center"><i class="fa fa-link font-14 color-dark-dark"></i></a>
			</div>
		</div>
	</div>

	<div class="card card-style">
		<div class="content">
			<p class="mb-n1 color-highlight font-600"></p>
			<h1>
				Company Details
			</h1>

			<div class="row">
				<div class="col-3"><label class="font-14 fw-bold">Name </label></div>
				<div class="col-1"> : </div>
				<div class="col-8"><p><?=$comDetData->company_name?></p></div>

				<div class="col-3"><label class="font-14 fw-bold">Phone No </label></div>
				<div class="col-1"> : </div>
				<div class="col-8"><?=$comDetData->company_phone_no?></div>

				<div class="col-3"><label class="font-14 fw-bold">Address </label></div>
				<div class="col-1"> : </div>
				<div class="col-8"><?=$comDetData->company_address?></div>

				<div class="col-3"><label class="font-14 fw-bold">Email </label></div>
				<div class="col-1"> : </div>
				<div class="col-8"><?=$comDetData->company_email?></div>

				<div class="col-3"><label class="font-14 fw-bold">Website </label></div>
				<div class="col-1"> : </div>
				<div class="col-8"><?=$comDetData->company_website	?></div>
			</div>
			
			<h4></h4>
			<p></p>

			<h4></h4>
			<p></p>

			<h4></h4>
			<p></p>
			
			<!-- <div class="row text-center row-cols-3 mb-0">
				<a class="col mb-4" data-lightbox="gallery-1" href="images/pictures/27t.jpg" title="Vynil and Typerwritter">
					<img src="images/empty.png" data-src="images/pictures/32s.jpg" class="preload-img img-fluid rounded-xs" alt="img">
				</a>
				<a class="col mb-4" data-lightbox="gallery-1" href="images/pictures/22t.jpg" title="Cream Cookie">
					<img src="images/empty.png" data-src="images/pictures/18s.jpg" class="preload-img img-fluid rounded-xs" alt="img">
				</a>
				<a class="col mb-4" data-lightbox="gallery-1" href="images/pictures/23t.jpg" title="Cookies and Flowers">
					<img src="images/empty.png" data-src="images/pictures/16s.jpg" class="preload-img img-fluid rounded-xs" alt="img">
				</a>
			</div> -->

			
			<h4></h4>
			<p></p>
		</div>
	</div>

</div>

<!-- Added to Bookmarks Menu-->
<div id="menu-heart" 
		class="menu menu-box-modal rounded-m" 
		data-menu-hide="800"
		data-menu-width="250"
		data-menu-height="170">
	
	<h1 class="text-center mt-3 pt-2">
		<i class="fa fa-check-circle color-green-dark fa-3x"></i>
	</h1>
	<h3 class="text-center pt-2">Added to Bookmarks</h3>
</div>
