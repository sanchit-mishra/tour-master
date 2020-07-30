<?php

$uname = $_POST["uname"];
$pass = $_POST["pass"];

require ("functions.php");
$con = dbConnect();
	
$result = mysqli_query($con, "SELECT * FROM admin WHERE uname = '$uname' and pass = '$pass'") or die("Failed to query dtabase".mysqli_error($con));
	
$row = mysqli_fetch_array($result);

	if($row['uname'] == $uname && $row['pass'] == $pass){
	
		session_start();
		$_SESSION['user_name'] = $row['uname'];
	
		header ("Location: dashboard.php");
		
	} else {

		header ("Location: loginform.php?msg=Username or password is incorrect");
	}

?> 
