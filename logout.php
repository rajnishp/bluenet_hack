<?php
	session_start();
	//$requestedPage = $_GET['url'] ;
    unset($_SESSION['user_id']);
    unset($_SESSION['first_name']);
    unset($_SESSION['email']);
    session_destroy();
    //header('Location: '.$requestedPage);
    header('Location: index.php');
    mysqli_close($db_handle);
?>
