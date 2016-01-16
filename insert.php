<?php
session_start();
$start = time() ;
$config['host'] = "localhost" ;
$config['user'] = "root" ;
$config['password'] = "redhat@11111p" ;
$config['database'] = "bluenethack" ;
$db_handle = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (!isset($_SESSION['user_id'])) {  
		header('Location: index.php');
	}
if (isset($_POST['insert'])) {
	$name = $_POST['name'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];
	$timing = $_POST['timing'];
	$salary = $_POST['salary'];
	$area = $_POST['area'];
	$status = $_POST['new_status'];
	$remarks = $_POST['remarks'];
	$time = $_POST['work_time'];
	$created_time = $_POST['created_time'];
	$worker_area = $_POST['worker_area'];
	$gender = $_POST['gender'];
	$user_id = $_SESSION['user_id'];
	$skill = count($_POST['skill']);
	for($i=0; $i < $skill; $i++) {
      $requirement .= ", ".$_POST['skill'][$i];
    }
    $str2 = substr($requirement, 1); 
	$sql = mysqli_query ($db_handle, "INSERT INTO service_request (name, mobile, requirements, gender, timings, expected_salary, address, area, user_id,
										remarks, status, worker_area, work_time, created_time)	VALUES ('$name','$mobile','$str2','$gender','$timing',
										'$salary', '$address', '$area','$user_id','$remarks', '$status', '$worker_area', '$time', '$created_time');");
	$sr_id = mysqli_insert_id($db_handle);
	$eachworkarea = explode(",", $worker_area);
	foreach ($eachworkarea as $workareas) {
		$newarea = trim($workareas);
		$workarea = mysqli_query ($db_handle, "SELECT * FROM area WHERE name='$newarea');");
		if(mysqli_num_rows($workarea) != 0){
			$areas = mysqli_fetch_array($workarea);
			$area_id = $areas['id'];
			$sql = mysqli_query ($db_handle, "INSERT INTO sr_area (id, sr_id) VALUES ('$area_id', '$sr_id');");
		}
		else {
			$sql = mysqli_query ($db_handle, "INSERT INTO area (name) VALUES ('$newarea');");
			$area_id = mysqli_insert_id($db_handle);
			$sql = mysqli_query ($db_handle, "INSERT INTO sr_area (id, sr_id) VALUES ('$area_id', '$sr_id');");
		}
	}
	if(mysqli_connect_errno()){		
	}
	else { 
		//header("Location: index.php"); 
		}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>BlueNet | Fill Details</title>
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
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">      
                     <div class="clearfix"></div>
                    <li class="active"><a href="request.php">
				<div class="icon-bg bg-orange"></div><i class="glyphicon glyphicon-home"></i>
				<span class="menu-title">View all request</span></a>
			  </li>
			  <li><a href="request.php?status=cem_open">
				<div class="icon-bg bg-pink"></div><i class="glyphicon glyphicon-user"></i>
				<span class="menu-title">CEM Open</span></a>   
			  </li>
			  <li><a href="request.php?status=open">
				<div class="icon-bg bg-pink"></div><i class="glyphicon glyphicon-search"></i>
				<span class="menu-title">ME Open</span></a>   
			  </li>
			  <li><a href="request.php?status=done">
				<div class="icon-bg bg-violet"></div><i class="glyphicon glyphicon-ok"></i>
				<span class="menu-title">Done Request</span></a>
			  </li>
			  <li><a href="request.php?status=salary_issue">
				<div class="icon-bg bg-blue"></div><i class="glyphicon glyphicon-usd"></i>
				<span class="menu-title">Salary Issues</span></a>
			  </li>
			  <li><a href="request.php?status=delete">
				<div class="icon-bg bg-blue"></div><i class="glyphicon glyphicon-remove"></i>
				<span class="menu-title">Deleted Requests</span></a>
			  </li>
			  <li><a href="request.php?status=not_interested">
				<div class="icon-bg bg-blue"></div><i class="glyphicon glyphicon-exclamation-sign"></i>
				<span class="menu-title">Not Interested</span></a>
			  </li>
			  <li><a href="request.php?status=just_to_know">
				<div class="icon-bg bg-blue"></div><i class="glyphicon glyphicon-pencil"></i>
				<span class="menu-title">Only Information Purpose</span></a>
			  </li>
			  <li><a href="request.php?status=decay">
				<div class="icon-bg bg-blue"></div><i class="glyphicon glyphicon-trash"></i>
				<span class="menu-title">Decay Requests</span></a>
			  </li>
			  <li><a href="request.php?status=followback">
				<div class="icon-bg bg-blue"></div><i class="glyphicon glyphicon-repeat"></i>
				<span class="menu-title">Follow back Requests</span></a>
			  </li>
			  <li><a href="24hour.php">
				<div class="icon-bg bg-blue"></div><i class=" glyphicon glyphicon-time"></i>
				<span class="menu-title">View 24hours Requests</span></a>
			  </li>
			  <li><a href="insert.php">
				<div class="icon-bg bg-red"></div><i class="glyphicon glyphicon-plus"></i>
				<span class="menu-title">Insert New Service Request</span></a>
			  </li>
			  <li><a href="area.php">
				<div class="icon-bg bg-blue"></div><i class="glyphicon glyphicon-print"></i>
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
				<div class="page-title">BlueNet Hack</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a id="menu-toggle" href="#" class="hidden-xs"><i class="glyphicon glyphicon-th-list"></i></a>
			</div>
			<ol class="breadcrumb page-breadcrumb pull-right">
                 <li><a href="logout.php">Logout</a></li>
                 <li></li>
                 <li><?= strtoupper($_SESSION['first_name']) ?></li>
            </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
            </div>
            <!--END PAGE WRAPPER-->
           <div class="col-lg-2"></div>
			<div class="col-lg-10">
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
				        	<input type="checkbox" name = "skill[]" value ='maid' /> Maid &nbsp;&nbsp;&nbsp;
							<input type="checkbox" name = "skill[]" value ='cook' /> Cook &nbsp;&nbsp;&nbsp;
							<input type="checkbox" name = "skill[]" value ='driver' /> driver <br/><br/>           
							<input type="checkbox" name = "skill[]" value ='electrician' /> electrician &nbsp;&nbsp;&nbsp;           
							<input type="checkbox" name = "skill[]" value ='plumber' /> Plumber &nbsp;&nbsp;&nbsp;           
							<input type="checkbox" name = "skill[]" value ='carpenter' /> Carpenter <br/><br/>          
							<input type="checkbox" name = "skill[]" value ='babysitter' /> Babysitter &nbsp;&nbsp;&nbsp;           
							<input type="checkbox" name = "skill[]" value ='oldage' /> Old age care &nbsp;&nbsp;&nbsp;           
							<input type="checkbox" name = "skill[]" value ='patient' />  Patient care &nbsp;&nbsp;&nbsp;           
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Other Specifications</label>
				      	<div class="col-md-3">
				        	<select name = "gender" > 
								<option value="M" selected >Male</option>
								<option value="F">Female</option>
								<option value="A">Any</option>
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
						<label class="col-md-3 control-label">Working Time in Hours</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="work_time" class="form-control" placeholder="Working Time in Hours"/>
				      	</div>
				      	<label class="col-md-1 control-label">Created Date</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="created_time" class="form-control" placeholder="Created Date" />
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Remarks</label>
							<div class="col-md-3">
				        	<input type="text" name ="remarks" class="form-control" placeholder="remarks" />
				      	</div> <!-- /.col -->
				      	<label class="col-md-1 control-label">Worker Area</label>
				      	<div class="col-md-3">
				        	<input type="text" name ="worker_area" class="form-control" placeholder="Worker Area" />
				      	</div>
				    </div>
				    <div class="form-group">
				      	<label class="col-md-3 control-label">Status</label>
							<div class="col-md-3">
								<select name="new_status">
									<option value="open" selected>Open</option>
									<option value="followback">Followback</option>
									<option value="cem_open" >CEM - Open</option>
									<option value="salary_issue" >Salary Issues</option>
									<option value="not_interested" >Not Interested</option>
									<option value="just_to_know" >Only Information Purpose</option>
									<option value="done" >Done</option>
									<option value="decay" >Decay</option>
									<option value="delete" >Delete</option>
								</select>
							</div>
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
