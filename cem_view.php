<?php

	$db_handle = mysqli_connect("localhost","root","redhat11111p","bluenethack");

//Check connection
	if (mysqli_connect_errno()) {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$sr_id = $_GET["id"];

	if (isset($_POST['update_status'])) {
		
		$newStatus = $_POST['new_status'];
		
		$sql = mysqli_query ($db_handle, "UPDATE service_request SET status= '$newStatus' WHERE id = '$sr_id' ;");


	}

	if (isset($_POST['update_sr'])) {
		$newStatus = $_POST['new_status'];
		$match1_name = $_POST['match1_name'];
		$match1_mobile = $_POST['match1_mobile'];
		$match2_mobile = $_POST['match2_mobile'];
		$match2_name = $_POST['match2_name'];
		
		
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
	<title>BlueTeam | CEM View</title>

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
	                <th>Mobile</th>
	                <th>Requirement</th>
	                <th>Timing</th>
	                <th>Salary</th>
	                <th>Address</th>
	                <th>Remarks</th>
	                <th>Match 1</th>
	                <th>Match 2</th>
	                <th></th>
	            </tr>
	        </thead>
	        <tfoot>
	            <tr>
	                
	            </tr>
	        </tfoot>
	        <tbody>
	            <tr>
	            	<?php 
	            		
		            	$srs = mysqli_query($db_handle, "SELECT * FROM service_request WHERE id = $sr_id; ") ;
						while ($srsrow = mysqli_fetch_array($srs)){
					?>
					
	                <td><?= $srsrow['name'] ?> </td>
	                <td><?= $srsrow['mobile'] ?> </td>
	                <td><?= $srsrow['requirements'] ?> </td>
	                <td><?= $srsrow['timings'] ?> </td>
	                <td><?= $srsrow['expected_salary'] ?> </td>
	                <td><?= $srsrow['address'] ?> </td>
	                <td><?= $srsrow['remarks'] ?> </td>
	                <td><?= $srsrow['match_name'] ?> <?= $srsrow['match_mobile'] ?> </td>
	                <td><?= $srsrow['match2_name'] ?> <?= $srsrow['match2_mobile'] ?> </td>
	                <td>
	                	<form method="POST" action="">
							<select name="new_status">
								<option value="<?= $srsrow['status'] ?>" selected><?= $srsrow['status'] ?></option>
								<option value="open">Open</option>
								<option value="me_open" >ME - Open</option>
								<option value="cem_open" >CEM - Open</option>
								<option value="done" >Done</option>
								<option value="decay" >Decay</option>

							</select>
							<button type="submit" name="update_status" class="btn btn-primary"> Update </button>
						</form>
	                </td>
	                <td><button type="submit" value="update_sr" class="btn btn-primary"> Update </button></td>
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
