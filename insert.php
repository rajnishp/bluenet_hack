<?php
session_start();
$start = time() ;
$config['host'] = "localhost" ;
$config['user'] = "root" ;
$config['password'] = "redhat111111" ;
$config['database'] = "bluenethack" ;
$db_handle = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($_POST['insert'])) {
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$timing = $_POST['timing'];
	$salary = $_POST['salary'];
	$area = $_POST['area'];
	$remarks = $_POST['remarks'];
	$gender = $_POST['gender'];
	$skill = count($_POST['skill']);
	for($i=0; $i < $skill; $i++) {
      $requirement .= ",".$_POST['skill'][$i];
    }
    $str2 = substr($requirement, 1); 
	$sql = mysqli_query ($db_handle, "INSERT INTO service_request (name, mobile, requirements, gender, timings, expected_salary, address, area, remarks) 
										VALUES ('$name','$mobile','$str2','$gender','$timing','$salary','$address','$area','$remarks');");
	if(mysqli_connect_errno()){		
	}
	else { 
		header("Location: insert.php"); 
		}
}
?><!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BlueTeam | Fill Worker Details</title>

</head>

<body>
	<center>
	<div id="container" class="effect mainnav-lg">
		

		<div class="boxed">

			<!--CONTENT CONTAINER-->
			<!--===================================================-->
			<div id="content-container">
				
				<!--Page Title-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<div id="page-title">
					<h1 class="page-header text-overflow">Request</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title
				Date of Request	Name	Contact No.	FM (Family Members)	WH (Working Hour)	Requirement	Any other requirement	Time Slot	Relegion	Language	Married/Unmarried	Needed Gender	Area	Address	Veg/Non-Veg	Needed From

				-->

				<form class="form-horizontal" action="" method="post">
				    <div class="form-group">
				      <label class="col-md-3 control-label">Name</label>
				      <div class="col-md-3">
				        <input type="text" name ="name" class="form-control" placeholder="Name" />
				      </div> <!-- /.col -->
				      <label class="col-md-1 control-label">Mobile No.</label>
				      <div class="col-md-3">
				        <input type="text" name ="mobile" class="form-control" placeholder="Enter 10 digit mobile number" />
				      </div> <!-- /.col -->
				    </div> <!-- /.form-group -->
				    <div class="form-group">
				      	<label class="col-md-3 control-label">address</label>
							<div class="col-md-3">
				        	<input type="text" name ="address" class="form-control" placeholder="address" />
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Worker timings</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="timing" class="form-control" placeholder="Working Hours" />
				      	</div> <!-- /.col -->
				    </div> <!-- /.form-group -->
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Requierment</label>
				      	<div class="col-md-3">
				        	<input type="checkbox" name = "skill[]" data-toggle="button" value ='maid' /> Maid &nbsp;&nbsp;&nbsp;
							<input type="checkbox" name = "skill[]" data-toggle="button" value ='cook' /> Cook &nbsp;&nbsp;&nbsp;
							<input type="checkbox" name = "skill[]" data-toggle="button" value ='driver' /> driver <br/><br/>           
							<input type="checkbox" name = "skill[]" data-toggle="button" value ='electrician' /> electrician &nbsp;&nbsp;&nbsp;           
							<input type="checkbox" name = "skill[]" data-toggle="button" value ='plumber' /> Plumber &nbsp;&nbsp;&nbsp;           
							<input type="checkbox" name = "skill[]" data-toggle="button" value ='carpenter' /> Carpenter <br/><br/>          
							<input type="checkbox" name = "skill[]" data-toggle="button" value ='babysitter' /> Babysitter &nbsp;&nbsp;&nbsp;           
							<input type="checkbox" name = "skill[]" data-toggle="button" value ='oldage' /> Old age care &nbsp;&nbsp;&nbsp;           
							<input type="checkbox" name = "skill[]" data-toggle="button" value ='patient' />  Patient care &nbsp;&nbsp;&nbsp;           
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Other Specifications</label>
				      	<div class="col-md-3">
				        	<select name = "gender" > 
								<option value="M" selected >Male</option>
								<option value="F">Female</option>
							</select>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Expected Salary</label>
							<div class="col-md-3">
				        	<input type="text" name ="salary" class="form-control" placeholder="Expected Salary" />
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Area</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="area" class="form-control" placeholder="Area" />
				      	</div> <!-- /.col -->
				    </div>
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Remarks</label>
							<div class="col-md-3">
				        	<input type="text" name ="remarks" class="form-control" placeholder="remarks" />
				      	</div> <!-- /.col -->
				    </div>
				    <div class="form-group">
					    <label class="col-md-3 control-label"></label>
					    <div class="col-md-7">
					        <button type="submit" name="insert" value="Submit">Insert</button>
					    </div>
				    </div> <!-- /.form-group -->
				</form>
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
	</center>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
</body>
</html>
