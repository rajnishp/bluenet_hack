<?php

	
$db_handle = mysqli_connect("localhost","root","redhat111111","bluenethack");

//Check connection
	if (mysqli_connect_errno()) {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	if (isset($_POST['update_value'])) {
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
		$match_name = $_POST['m_name'];
		$sr_id = $_POST['sr_id'];
		$match_mobile = $_POST['m_phone'];
		$match2_mobile = $_POST['m2_phone'];
		$match2_name = $_POST['m_name'];
		$time = date("Y-m-d H:i:s");
		$sql = mysqli_query ($db_handle, "UPDATE service_request SET name='$name',mobile='$mobile',requirements='$str2',gender='$gender',timings='$timing',
											expected_salary='$salary',address='$address',area='$area',remarks='$remarks',match_name='$match_name',
											match_mobile='$match_mobile',match2_name='$match2_name',match2_mobile='$match2_mobile',last_updated='$time' 
											WHERE id='$sr_id' ;");
		if(mysqli_connect_errno()){		
		}
		else { 
			header("Location: cem_view.php"); 
		}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BlueTeam | Fill Worker Details</title>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
 	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>


</head>

<body>
	<center>
	<div id="container" class="effect mainnav-lg">
		
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
				      	<label class="col-md-3 control-label">Match 1 Name</label>
							<div class="col-md-3">
				        	<input type="text" name ="m_name" class="form-control" placeholder="Match 1 Name" />
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Match 1 Mobile</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="m_phone" class="form-control" placeholder="Match 1 Mobile" />
				      	</div> <!-- /.col -->
				    </div>
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Match 2 Name</label>
							<div class="col-md-3">
				        	<input type="text" name ="m2_name" class="form-control" placeholder="Match 2 Name" />
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Match 2 Mobile</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="m2_phone" class="form-control" placeholder="Match 2 Mobile" />
				      	</div> <!-- /.col -->
				    </div>
				    <div class="form-group">
					    <label class="col-md-3 control-label"></label>
					    <div class="col-md-7">
							<input type="hidden" name="sr_id" value="<?= $_POST['update_sr']?>">
					        <button type="submit" name="update_value" value="Submit">Update</button>
					    </div>
				    </div> <!-- /.form-group -->
				</form>
	</div>
	</center>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
</body>
</html>
