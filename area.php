<?php
session_start();
	$db_handle = mysqli_connect("localhost","root","redhat@11111p","bluenethack");

//Check connection
	if (mysqli_connect_errno()) {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (!isset($_SESSION['user_id'])) {  
		header('Location: index.php');
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
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">      
                     <div class="clearfix"></div>
                    <li class="active"><a href="request.php">
				<div class="icon-bg bg-orange"></div>
				<span class="menu-title">View all request</span></a>
			  </li>
			  <li><a href="request.php?status=cem_open">
				<div class="icon-bg bg-pink"></div>
				<span class="menu-title">CEM Open</span></a>   
			  </li>
			  <li><a href="request.php?status=open">
				<div class="icon-bg bg-pink"></div>
				<span class="menu-title">ME Open</span></a>   
			  </li>
			  <li><a href="request.php?status=done">
				<div class="icon-bg bg-violet"></div>
				<span class="menu-title">Done Request</span></a>
			  </li>
			  <li><a href="request.php?status=salary_issue">
				<div class="icon-bg bg-blue"></div>
				<span class="menu-title">Salary Issues</span></a>
			  </li>
			  <li><a href="request.php?status=delete">
				<div class="icon-bg bg-blue"></div>
				<span class="menu-title">Deleted Requests</span></a>
			  </li>
			  <li><a href="request.php?status=not_interested">
				<div class="icon-bg bg-blue"></div>
				<span class="menu-title">Not Interested</span></a>
			  </li>
			  <li><a href="request.php?status=decay">
				<div class="icon-bg bg-blue"></div>
				<span class="menu-title">Decay Requests</span></a>
			  </li>
			  <li><a href="request.php?status=followback">
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
                    <ol class="breadcrumb page-breadcrumb pull-right">
						 <li><a href="logout.php">Logout</a></li>
					</ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
            </div>
            <!--END PAGE WRAPPER-->
            <div class="col-lg-3"></div>
			<div class="col-lg-9">
				<ul>
					<?php
						$srs = mysqli_query($db_handle, "SELECT name FROM area; ") ;
						while ($srsrow = mysqli_fetch_array($srs)){
							$allarea = $srsrow['name'];
								echo "<li><a href=\"findAreaRequests.php?area=".$allarea."\">".$allarea."</a></li>" ;	
						} 
					?>
				</ul>
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
