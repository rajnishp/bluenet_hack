<?php

	$db_handle = mysqli_connect("localhost","root","redhat111111","bluenethack");

//Check connection
	if (mysqli_connect_errno()) {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$status = $_GET["status"];

	if (isset($_POST['update_status'])) {
		$newStatus = $_POST['new_status'];
		$sr_id = $_POST['sr_id'];
		$sql = mysqli_query ($db_handle, "UPDATE service_request SET status= '$newStatus' WHERE id = '$sr_id' ;");
		if(mysqli_connect_errno()){		
		}
		else { 
			header("Location: index.php"); 
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
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/animate.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css"/>
	
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.css"/> -->
	
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
            <div class="col-lg-3"></div>
			<div class="col-lg-9">
            <table id="example1" class="display" cellspacing="0" width="100%">
	        <thead>
	            <tr>
	                <th>Name</th>
	                <th>Mobile</th>
	                <th>Requirement</th>
	                <th>Gender</th>
	                <th>Timing</th>
	                <th>Salary</th>
	                <th>Address</th>
	                <th>Remarks</th>
	                <th>Work Time</th>
	                <th>Created Date</th>
	                <th>Date</th>
	                <th>Match 1</th>
	                <th>Match 2</th>
	                <th>Status</th>
	                <th>Edit</th>
	            </tr>
	        </thead>
	        <tbody>
				<?php
					if(isset($status)){
						$srs = mysqli_query($db_handle, "SELECT * FROM service_request WHERE status = '$status'; ") ;
					}
					else {
						$srs = mysqli_query($db_handle, "SELECT * FROM service_request ") ;
					}
					while ($srsrow = mysqli_fetch_array($srs)){
				?>
	            <tr>					
	                <td><?= $srsrow['name'] ?> </td>
	                <td><?= $srsrow['mobile'] ?> </td>
	                <td><?= $srsrow['requirements'] ?> </td>
	                <td><?= $srsrow['gender'] ?> </td>
	                <td><?= $srsrow['timings'] ?> </td>
	                <td><?= $srsrow['expected_salary'] ?> </td>
	                <td><?= $srsrow['address'] ?> </td>
	                <td><?= $srsrow['remarks'] ?> </td>
	                <td><?= $srsrow['work_time'] ?> </td>
	                <td><?= $srsrow['created_time'] ?> </td>
	                <td><?= $srsrow['date'] ?> </td>
	                <td><?= $srsrow['match_name'] ?> <?= $srsrow['match_mobile'] ?> </td>
	                <td><?= $srsrow['match2_name'] ?> <?= $srsrow['match2_mobile'] ?> </td>
	                <td>
	                	<form method="POST" action="">
							<select name="new_status">
								<option value="<?= $srsrow['status'] ?>" selected><?= $srsrow['status'] ?></option>
								<option value="open">Open</option>
								<option value="followback">Followback</option>
								<option value="cem_open" >CEM - Open</option>
								<option value="salary_issue" >Salary Issues</option>
								<option value="not_interested" >Not Interested</option>
								<option value="done" >Done</option>
								<option value="decay" >Decay</option>
							</select>
							<input type="hidden" name="sr_id" value="<?= $srsrow['id'] ?>">
							<button type="submit" name="update_status" class="btn btn-primary"> Update </button>
						</form>
	                </td>
	                <td>
						<form method="post" action="update.php?sr_id=<?= $srsrow['id'] ?>">
							<button type="submit" name="update_sr" class="btn btn-primary"> Edit </button>
						</form>
					</td>
	            </tr>
	            <?php
	            	}
				?>
	        </tbody>
    	</table>
    	</div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    
    <script type="text/javascript">
		$(document).ready(function() {
		    $('#example1').DataTable( {
		    "iDisplayLength": 50 });
		} );
	</script>
    <script src="script/jquery-migrate-1.2.1.min.js"></script>
    <script src="script/jquery-ui.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/bootstrap-hover-dropdown.js"></script>
    <script src="script/html5shiv.js"></script>
    <script src="script/respond.min.js"></script>
    <script src="script/jquery.metisMenu.js"></script>
    <script src="script/jquery.slimscroll.js"></script>
    <script src="script/jquery.cookie.js"></script>
    <script src="script/icheck.min.js"></script>
    <script src="script/custom.min.js"></script>
    <script src="script/jquery.news-ticker.js"></script>
    <script src="script/jquery.menu.js"></script>
    <script src="script/pace.min.js"></script>
    <script src="script/holder.js"></script>
    <script src="script/responsive-tabs.js"></script>
    <script src="script/index.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>
</body>
</html>
