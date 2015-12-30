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
            <div id="modal-config" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                                &times;</button>
                            <h4 class="modal-title">
                                Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et nisl eget
                                porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie.
                                Nunc vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis
                                magna et aliquam. Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor
                                vitae quam dictum condimentum. Integer a sodales elit, eu pulvinar leo. Nunc nec
                                aliquam nisi, a mollis neque. Ut vel felis quis tellus hendrerit placerat. Vivamus
                                vel nisl non magna feugiat dignissim sed ut nibh. Nulla elementum, est a pretium
                                hendrerit, arcu risus luctus augue, mattis aliquet orci ligula eget massa. Sed ut
                                ultricies felis.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">
                                Close</button>
                            <button type="button" class="btn btn-primary">
                                Save changes</button>
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
                    <li class="active"><a href="cem_view.php">
                        <div class="icon-bg bg-orange"></div>
						<span class="menu-title">View all request</span></a>
                    </li>
                    <li><a href="cem_view.php?status=cem_open">
                        <div class="icon-bg bg-pink"></div>
						<span class="menu-title">CEM Open</span></a>   
                    </li>
                    <li><a href="cem_view.php?status=open">
                        <div class="icon-bg bg-pink"></div>
						<span class="menu-title">Open Requests</span></a>   
                    </li>
                    <li><a href="cem_view.php?status=done">
                        <div class="icon-bg bg-violet"></div>
						<span class="menu-title">Done Request</span></a>
                    </li>
                    <li><a href="cem_view.php?status=decay">
                        <div class="icon-bg bg-blue"></div>
						<span class="menu-title">Decay Requests</span></a>
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
