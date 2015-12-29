<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BlueTeam | Fill Worker Details</title>

</head>

<body>
	<div id="container" class="effect mainnav-lg">
		

		<div class="boxed">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow">Request</h1>

					<!--Searchbox-->
					<div class="searchbox">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Search..">
							<span class="input-group-btn">
								<button class="text-muted" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</div>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title
				Date of Request	Name	Contact No.	FM (Family Members)	WH (Working Hour)	Requirement	Any other requirement	Time Slot	Relegion	Language	Married/Unmarried	Needed Gender	Area	Address	Veg/Non-Veg	Needed From

				-->

				<form class="form-horizontal" id="sr_form" onsubmit="return (validateSR());">

				    <div class="form-group">

				      <label class="col-md-3 control-label">Name</label>

				      <div class="col-md-3">
				        <input type="text" id ="name" class="form-control" placeholder="Name" />
				      </div> <!-- /.col -->

				      <label class="col-md-1 control-label">Mobile No.</label>

				      <div class="col-md-3">
				        <input type="text" id ="Mobile" class="form-control" placeholder="Mobile" />
				      </div> <!-- /.col -->


				    </div> <!-- /.form-group -->

				    <div class="form-group">

				      	<label class="col-md-3 control-label">Family Members</label>

				      	

				      	<div class="col-md-3">
				        	<input type="text" id ="family_members" class="form-control" placeholder="Family Members" />
				      	</div> <!-- /.col -->

				      	<label class="col-md-1 control-label">Working Hours</label>

				      	<div class="col-md-3">
				        	<input type="text" id ="working_hours" class="form-control" placeholder="Working Hours" />
				      	</div> <!-- /.col -->

				    </div> <!-- /.form-group -->

				    <div class="form-group">

				      	<label class="col-md-3 control-label">Requierment</label>
				      	<div class="col-md-3">
				        	<input type="text" id ="id_proof_id" class="form-control" placeholder="Id Proof Id" />
				      	</div> <!-- /.col -->

				      	<label class="col-md-1 control-label">Other Specifications</label>
				      	<div class="col-md-3">
				        	<input type="text" id ="id_proof_id" class="form-control" placeholder="Id Proof Id" />
				      	</div> <!-- /.col -->

				    </div> <!-- /.form-group -->

				    <div class="form-group">
						<label class="col-md-3 control-label">Area</label>
						<div class="col-md-3">
							<input type="text" id="mobile" class="form-control" placeholder="Enter 10 digit mobile number">
						</div>
					
						<label class="col-md-1 control-label">Address</label>
						<div class="col-md-3">
							<textarea type="text" id="address" class="form-control" placeholder="Full Address" rows="4"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-lg-3 control-label">Needed Veg/Non-veg</label>
							<div class="col-lg-3">
								<div class="radio">
									<label class="form-radio form-icon">
										<input type="radio" name="gender" value="Male"> veg
									</label>

									<label class="form-radio form-icon">
										<input type="radio" name="gender" value="Female"> non-veg
									</label>

								</div>
							</div>

							<label class="col-lg-1 control-label">Needed Gender</label>
							<div class="col-lg-3">
								<div class="radio">
									<label class="form-radio form-icon">
										<input type="radio" name="gender" value="Male"> Male
									</label>

									<label class="form-radio form-icon">
										<input type="radio" name="gender" value="Female"> Female
									</label>

									<label class="form-radio form-icon">
										<input type="radio" name="gender" value="Other"> Other
									</label>
								</div>
							</div>

							
						
					</div>

					

					

				    <div class="form-group">
					    <label class="col-md-3 control-label"></label>
					    <div class="col-md-7">
					        <button type="submit" class="btn btn-success">Submit Details</button>
					    </div>
				    </div> <!-- /.form-group -->

				</div>
			

			</div>
			<!--===================================================-->
			<!--END CONTENT CONTAINER-->

			
			<?php require_once 'views/navbar/main_navbar.php'; ?>
			
		</div>

		

		<!-- FOOTER -->
		<!--===================================================-->
		<footer id="footer">

			<!-- Visible when footer positions are fixed -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<div class="show-fixed pull-right">
				<ul class="footer-list list-inline">
					<li>
						<p class="text-sm">SEO Proggres</p>
						<div class="progress progress-sm progress-light-base">
							<div style="width: 80%" class="progress-bar progress-bar-danger"></div>
						</div>
					</li>

					<li>
						<p class="text-sm">Online Tutorial</p>
						<div class="progress progress-sm progress-light-base">
							<div style="width: 80%" class="progress-bar progress-bar-primary"></div>
						</div>
					</li>
					<li>
						<button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
					</li>
				</ul>
			</div>



			<!-- Visible when footer positions are static -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
<!-- 			<div class="hide-fixed pull-right pad-rgt">Powered By: <a href="http://dpower4.com" target="_blank"> Dpower4 </a></div> -->



			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
			<!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
			<!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

<!-- 			<p class="pad-lft">&#0169; 2015 BlueTeam</p> -->



		</footer>
		<!--===================================================-->
		<!-- END FOOTER -->


		<!-- SCROLL TOP BUTTON -->
		<!--===================================================-->
		<button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
		<!--===================================================-->



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
	
</body>
</html>
