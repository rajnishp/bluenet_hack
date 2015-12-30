<?php

	
$db_handle = mysqli_connect("localhost","root","redhat11111p","bluenethack");

//Check connection
	if (mysqli_connect_errno()) {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	if (isset($_POST['update_status'])) {
		$newStatus = $_POST['new_status'];
		$sr_id = $_POST['sr_id'];
		$sql = mysqli_query ($db_handle, "UPDATE `service_request` SET `status`= $newStatus WHERE `id` =  $sr_id ;");


	}

	if (isset($_POST['update_sr'])) {
		$newStatus = $_POST['new_status'];
		$match1_name = $_POST['match1_name'];
		$match1_mobile = $_POST['match1_mobile'];
		$match2_mobile = $_POST['match2_mobile'];
		$match2_name = $_POST['match2_name'];
		$sr_id = $_POST['sr_id'];
		
		$sql = mysqli_query ($db_handle, "UPDATE `service_request` SET `status`= $newStatus, 
													`match_name`= $match1_name, 
													`match2_name`= $match2_name, 
													`match_mobile`=$match_mobile  WHERE `id` =  $sr_id ;");

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
	<div id="container" class="effect mainnav-lg">
		
		<table id="example" class="display" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Position</th>
	                <th>Office</th>
	                <th>Age</th>
	                <th>Status</th>
	                <th>Match 1</th>
	                <th>Match 2</th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                
	            </tr>
	        </tfoot>
	        <tbody>
	            <tr>
	            	<?php 
		            	$members = mysqli_query($db_handle, "") ;
						while ($memrow = mysqli_fetch_array($members)){
					?>
					
	                <td>Tiger Nixon</td>
	                <td>System Architect</td>
	                <td>Edinburgh</td>
	                <td>61</td>
	                <td>
	                	<form method="POST" action="#">
							<select class="selectpicker" id="request_status">

								<option class="btn-info" value="Open">Open</option>
								<option class="btn-warning" value="ME-Open" >ME - Open</option>
								<option class="btn-success" value="CEM-Open" >CEM - Open</option>
								<option class="btn-success" value="Done" >Done</option>
								<option class="btn-success" value="Decay" >Decay</option>

							</select>
							<button type="submit" value="update_status" class="btn btn-primary"> Update </button>
						</form>
	                </td>
	                <td></td>
	                <td></td>
	            </tr>
	            <?php
	            	}
				?>
	        </tbody>
    	</table>



	</div>
	<!--===================================================-->
	<!-- END OF CONTAINER -->
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
</body>
</html>
