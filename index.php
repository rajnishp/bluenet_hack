<?php
session_start();
	$db_handle = mysqli_connect("localhost","root","redhat@11111p","bluenethack");

//Check connection
	if (mysqli_connect_errno()) {
	  	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (isset($_SESSION['user_id'])) {  
		header('Location: request.php');
	}
	if (isset($_POST['request'])) {
	
		$firstname = mysqli_real_escape_string($db_handle, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db_handle, $_POST['lastname']);
		$email = mysqli_real_escape_string($db_handle, $_POST['email']);
		$phone = mysqli_real_escape_string($db_handle, $_POST['phone']);
		$employee_type = mysqli_real_escape_string($db_handle, $_POST['employee_type']);
		$pas = mysqli_real_escape_string($db_handle, $_POST['password']) ;
		$awe = mysqli_real_escape_string($db_handle, $_POST['password2']) ;
		if((strlen($firstname)< 2) OR (strlen($lastname)< 2) OR (strlen($email)< 8) OR (strlen($phone)< 10) OR (strlen($pas)< 4)) {
			echo "Something went wrong, Try again";
		}
		else {
			if ( $pas == $awe ) {
				$pas = md5($pas);
				mysqli_query($db_handle,"INSERT INTO user(first_name, last_name, email, phone, password, employee_type) 
													VALUES ('$firstname', '$lastname', '$email', '$phone', '$pas', '$employee_type') ; ") ;		
				$user_create_id = mysqli_insert_id($db_handle);
				
				if(mysqli_error($db_handle)){ echo "Please Try Again"; } 
				else {
					$_SESSION['user_id'] = $user_create_id;
					$_SESSION['first_name'] = $firstname ;
					$_SESSION['email'] = $email;
					header("Location: request.php");
				}
			}
			else {  
				//header('Location: ./index.php?status=1');
				echo "Password do not match, Try again";
			}
		}
	}

	if (isset($_POST['login'])) {
		$email = mysqli_real_escape_string($db_handle, $_POST['username']); 
		$password = md5(mysqli_real_escape_string($db_handle, $_POST['passwordlogin']));
		$response = mysqli_query($db_handle,"select * from user where email = '$email' AND password = '$password';") ;
		$num_rows = mysqli_num_rows($response);
		if ( $num_rows > 0){
			$responseRow = mysqli_fetch_array($response);
			$_SESSION['first_name'] = $responseRow['first_name'] ;
			$_SESSION['email'] = $responseRow['email'];
			$_SESSION['user_id'] = $responseRow['id'];
			echo $responseRow['id'];
			header("Location: request.php");
		}
		else {
			echo "Sorry! Invalid username or password!";      
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
	
</head>
<body>
	<div class="row" >
        <div class = "col-xs-3 col-ls-3"></div>
        <div class = "col-xs-2 col-ls-4" style="width:350px; margin-top:85px; background-color: #F8F8F8 ;">
			<ul class="nav nav-tabs" role="tablist" style="font-size:14px; margin-bottom: 0px; margin-top: 12px;">
				<li role="presentation" class="active" id="signup_modal">
					<a href="#tabSignup" role="tab" data-toggle="tab">SignIn</a>
                </li>
            </ul>
			<div class="tab-content" style="margin-bottom: 12px">         
				<div role="tabpanel" class="row tab-pane active" id="tabSignup" style="line-height: 2;" >
                    <p align="center"><font size="5" >Sign In for Blueteam</font></p></br>
                    <form method="post">
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                            <input type="text" class="form-control" name="username" placeholder="Email ">
                        </div>
                        <br/>
                        <div class="input-group">
                            <span class="input-group-addon">Password&nbsp;</span>
                            <input type="password" class="form-control" name="passwordlogin" placeholder="Password">
                        </div><br/>
                        <input type="submit" class="btn btn-success btn-lg" name = "login" value = "Log in" >
                    </form>
                </div>  
            </div>  
        </div>	
        <div class = "col-xs-1 col-ls-1"></div>
        <div class = "col-xs-2 col-ls-4" style="width:350px; margin-top:85px; background-color: #F8F8F8 ;">
<!-- signin signup nav tabs starts ---->            
            <ul class="nav nav-tabs" role="tablist" style="font-size:14px; margin-bottom: 0px; margin-top: 12px;">
                <li role="presentation" class="active" id="signup_modal">
                    <a href="#tabSignup" role="tab" data-toggle="tab">SignUp</a>
                </li>
            </ul>
            <div class="tab-content" style="margin-bottom: 12px">
                <div role="tabpanel" class="row tab-pane active" id="tabSignup" style="line-height: 2;">  
                    <p align="center"><font size="5" >Let's Collaborate!!</font></p><br>
                    <form method="post">                    
						<div>
							<div class="col-md-6" style="padding-left: 0px;">                  
								<input type="text" class="form-control" style="width: 100%" name="firstname" placeholder="First name" />  
							</div>
							<div class="col-md-6" style="padding-left: 0px;">
								<input type="text" class="form-control" style="width: 100%" name="lastname" placeholder="Last name" />                    
							</div>
						</div><br/><br> 
						<input type="text" class="form-control" style="width: 98%" name="email" placeholder="Email" /><br/>                   
						<input type="text" class="form-control" style="width: 98%" name="phone" placeholder="Mobile Number" /><br/>                   
						<div>
							<div class="col-md-6" style="padding-left: 0px;">
								<input type="password" class="form-control" style="width: 100%" name="password" placeholder="password"/>
							</div>
							<div class="col-md-6" style="padding-left: 0px;">
								<input type="password" class="form-control" style="width: 100%" name="password2" placeholder="Re-enter password"/><br/><br/>
							</div>
						</div>
						<input type="submit" class="btn btn-primary btn-lg" name = "request" value = "Sign up" >
                    </form>
                </div>           
            </div>
        </div>
    </div>
	
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
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
   
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>
</body>
</html>
