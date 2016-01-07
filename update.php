<?php

	
$db_handle = mysqli_connect("localhost","root","redhat@11111p","bluenethack");

//Check connection
	if (mysqli_connect_errno()) {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sr_id = $_GET['sr_id'];
	if(!isset($sr_id)){
		header("Location: cem_view.php"); 
	}
	if (isset($_POST['update_value'])) {
		$name = $_POST['name'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$timing = $_POST['timing'];
		$salary = $_POST['salary'];
		$area = $_POST['area'];
		$remarks = $_POST['remarks'];
		$work_time = $_POST['work_time'];
		$created_time = $_POST['created_time'];
		$worker_area = $_POST['worker_area'];
		$worker_area = $_POST['worker_area'];
		$gender = $_POST['gender'];
		$skill = count($_POST['skill']);
		for($i=0; $i < $skill; $i++) {
		  $requirement .= ",".$_POST['skill'][$i];
		}
		$str2 = substr($requirement, 1);
		$match_name = $_POST['m_name'];
		$sr_id = $_GET['sr_id'];
		$match_mobile = $_POST['m_phone'];
		$match2_mobile = $_POST['m2_phone'];
		$match2_name = $_POST['m_name'];
		$time = date("Y-m-d H:i:s");
		$sql = mysqli_query ($db_handle, "UPDATE service_request SET name='$name',mobile='$mobile',requirements='$str2',gender='$gender',timings='$timing',
											expected_salary='$salary',address='$address',area='$area',remarks='$remarks',match_name='$match_name',
											match_mobile='$match_mobile',match2_name='$match2_name',match2_mobile='$match2_mobile',last_updated='$time', 
											worker_area='$worker_area', work_time='$work_time', created_time='$created_time' WHERE id='$sr_id' ;");
		$eachworkarea = explode(",", $worker_area);
		foreach ($eachworkarea as $workareas) {
			$workarea = mysqli_query ($db_handle, "SELECT * FROM area WHERE name='$workareas');");
			if(mysqli_num_rows($workarea) != 0){
				$areas = mysqli_fetch_array($workarea);
				$area_id = $areas['id'];
				$sql = mysqli_query ($db_handle, "INSERT INTO sr_area (id, sr_id) VALUES ('$area_id', '$sr_id');");
			}
			else {
				$sql = mysqli_query ($db_handle, "INSERT INTO area (name) VALUES ('$workareas');");
				$area_id = mysqli_insert_id($db_handle);
				$sql = mysqli_query ($db_handle, "INSERT INTO sr_area (id, sr_id) VALUES ('$area_id', '$sr_id');");
			}
		}
		if(mysqli_connect_errno()){		
		}
		else { 
			header("Location: cem_view.php"); 
		}
	}
	if (isset($_POST['add_note'])) {
		$note = $_POST['noteVal'];
		$sr_id = $_GET['sr_id'];
		$sql = mysqli_query ($db_handle, "INSERT INTO notes (sr_id, note) VALUES ('$sr_id', '$note') ;") ;
		if(mysqli_connect_errno()){		
		}
		else { 
			header("Location: #"); 
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bluenet</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
 	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>
</head>
<body>
    <div>
            <!--BEGIN MODAL CONFIG PORTLET-->
            <div id="addNote" class="modal fade modal-form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
                            <h4 class="modal-title">Add Note</h4>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal" action="" method="post">
							<div class="form-group">
							  <label class="control-label">Note</label>
								<textarea class="form-control" name='noteVal' placeholder="Add Note"></textarea>
							</div> <!-- /.form-group -->
                            <button type="submit" name="add_note" class="btn btn-primary pull-right">Add</button><br/>
                          </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--END MODAL CONFIG PORTLET-->
        
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">      
                     <div class="clearfix"></div>
                    <li class="active"><a href="index.php">
                        <div class="icon-bg bg-orange"></div>
						<span class="menu-title">View all request</span></a>
                    </li>
                    <li><a href="index.php?status=cem_open">
                        <div class="icon-bg bg-pink"></div>
						<span class="menu-title">CEM Open</span></a>   
                    </li>
                    <li><a href="index.php?status=open">
                        <div class="icon-bg bg-pink"></div>
						<span class="menu-title">Open Requests</span></a>   
                    </li>
                    <li><a href="index.php?status=done">
                        <div class="icon-bg bg-violet"></div>
						<span class="menu-title">Done Request</span></a>
                    </li>
                    <li><a href="index.php?status=salary_issue">
                        <div class="icon-bg bg-blue"></div>
						<span class="menu-title">Salary Issues</span></a>
                    </li>
                    <li><a href="index.php?status=not_interested">
                        <div class="icon-bg bg-blue"></div>
						<span class="menu-title">Not Interested</span></a>
                    </li>
                    <li><a href="index.php?status=decay">
                        <div class="icon-bg bg-blue"></div>
						<span class="menu-title">Decay Requests</span></a>
                    </li>
                    <li><a href="index.php?status=followback">
                        <div class="icon-bg bg-blue"></div>
						<span class="menu-title">Follow back Requests</span></a>
                    </li>
                    <li><a href="24hour.php">
                        <div class="icon-bg bg-blue"></div>
						<span class="menu-title">View 24hours Requests</span></a>
                    </li>
                    <li><a href="insert.php">
                        <div class="icon-bg bg-red"></div>
						<span class="menu-title">Insert New Service Request</span></a>
                    </li>
                    <li><a href="area.php">
                        <div class="icon-bg bg-blue"></div>
						<span class="menu-title">Print Area</span></a>
                    </li>
                </ul>
            </div>
        </nav>
            <!--END SIDEBAR MENU-->
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">BlueNet Hack</div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
            </div>
            <!--END PAGE WRAPPER-->
            <?php
				$sr_id = $_GET['sr_id'];
				$srs = mysqli_query($db_handle, "SELECT * FROM service_request WHERE id = '$sr_id'; ") ;
				$srsrow = mysqli_fetch_array($srs);
				$reqirements = $srsrow['requirements'];
				$reqire = explode(",", $reqirements);
            ?>
            <div class="col-lg-2"></div>
			<div class="col-lg-10">
            <form class="form-horizontal" action="" method="post">
				    <div class="form-group">
				      <label class="col-md-3 control-label">Name</label>
				      <div class="col-md-3">
				        <input type="text" name ="name" class="form-control" placeholder="Name" value="<?= $srsrow['name'] ?>"/>
				      </div> <!-- /.col -->
				      <label class="col-md-1 control-label">Mobile No.</label>
				      <div class="col-md-3">
				        <input type="text" name ="mobile" class="form-control" placeholder="Enter 10 digit mobile number" value="<?= $srsrow['mobile'] ?>"/>
				      </div> <!-- /.col -->
				    </div> <!-- /.form-group -->
				    <div class="form-group">
				      	<label class="col-md-3 control-label">address</label>
							<div class="col-md-3">
				        	<input type="text" name ="address" class="form-control" placeholder="address" value="<?= $srsrow['address'] ?>"/>
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Worker timings</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="timing" class="form-control" placeholder="Working Hours" value="<?= $srsrow['timings'] ?>"/>
				      	</div> <!-- /.col -->
				    </div> <!-- /.form-group -->
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Requierments</label>
				      	<div class="col-md-3">
							<?php 
								$abd = array();
								foreach ($reqire as $donereqire){
									array_push($abd , "$donereqire");
									echo '<input type="checkbox" name = "skill[]" value ='.$donereqire.' checked/>&nbsp;&nbsp;&nbsp;'.$donereqire.'<br/>';
								}
								$allreqirements = array("maid","cook","driver","electrician","plumber","carpenter","babysitter","oldage","patient");
								$nawreqire = array_diff($allreqirements, $abd);
								foreach ($nawreqire as $val)
								   echo '<input type="checkbox" name = "skill[]" value ='.$val.'/>&nbsp;&nbsp;&nbsp;'.$val.'<br/>';
							?>          
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Other Specifications</label>
				      	<div class="col-md-3">
				        	<select name = "gender" >
								<?php 
									$gender = $srsrow['gender'];
									if($gender == "M") {
								?> 
								<option value="M" selected >Male</option>
								<option value="F">Female</option>
								<option value="A">Any</option>
								<?php
									}
									else if($gender == "F") {
								?>
								<option value="M"  >Male</option>
								<option value="F" selected>Female</option>
								<option value="A">Any</option>
								<?php } else { 	?>
								<option value="M"  >Male</option>
								<option value="F" >Female</option>
								<option value="A" selected>Any</option>
								<?php } ?>
							</select>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Expected Salary</label>
							<div class="col-md-3">
				        	<input type="text" name ="salary" class="form-control" placeholder="Expected Salary" value="<?= $srsrow['expected_salary'] ?>"/>
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Area</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="area" class="form-control" placeholder="Area" value="<?= $srsrow['area'] ?>"/>
				      	</div> <!-- /.col -->
				    </div>
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Remarks</label>
							<div class="col-md-3">
				        	<input type="text" name ="remarks" class="form-control" placeholder="remarks" value="<?= $srsrow['remarks'] ?>"/>
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Worker Area</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="worker_area" class="form-control" placeholder="Worker Area" value="<?= $srsrow['worker_area'] ?>"/>
				      	</div>
				    </div>
				    <div class="form-group">
						<label class="col-md-3 control-label">Working Time in Hours</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="work_time" class="form-control" placeholder="Working Time in Hours" value="<?= $srsrow['work_time'] ?>"/>
				      	</div>
				      	<label class="col-md-1 control-label">Created Date</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="created_time" class="form-control" placeholder="Created Date" value="<?= $srsrow['created_time'] ?>"/>
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Match 1 Name</label>
							<div class="col-md-3">
				        	<input type="text" name ="m_name" class="form-control" placeholder="Match 1 Name" value="<?= $srsrow['match_name'] ?>"/>
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Match 1 Mobile</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="m_phone" class="form-control" placeholder="Match 1 Mobile" value="<?= $srsrow['match_mobile'] ?>"/>
				      	</div> <!-- /.col -->
				    </div>
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Match 2 Name</label>
							<div class="col-md-3">
				        	<input type="text" name ="m2_name" class="form-control" placeholder="Match 2 Name" value="<?= $srsrow['match2_name'] ?>"/>
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Match 2 Mobile</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="m2_phone" class="form-control" placeholder="Match 2 Mobile" value="<?= $srsrow['match2_mobile'] ?>"/>
				      	</div> <!-- /.col -->
				    </div>
				    <div class="form-group">
					    <label class="col-md-3 control-label"></label>
					    <div class="col-md-7">
					        <button type="submit" name="update_value" value="Submit">Update</button>
					    </div>
				    </div> <!-- /.form-group -->
				</form>
				<ul>
				<?php
					$notes = mysqli_query($db_handle, "SELECT * FROM notes WHERE sr_id = '$sr_id'; ") ;
					
					while($notesrow = mysqli_fetch_array($notes)){
						$note_val = $notesrow['note'] ;
						echo "<li>".$note_val."</li>" ;
					}
					
				?>
				</ul>
				<a class='btn btn-success active' data-toggle='modal' data-target='#addNote'>Add Note</a>
    	</div>
        </div>
    </div>
    <script src="script/jquery-1.10.2.min.js"></script>
    <script src="script/jquery-migrate-1.2.1.min.js"></script>
    <script src="script/jquery-ui.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/bootstrap-hover-dropdown.js"></script>
    <script src="script/responsive-tabs.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
</body>
</html>
