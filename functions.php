<?php

function dbConnect() {
    
	$con = mysqli_connect("localhost:3306", "root", "root5300@", "tourist");
	if($con->connect_error){
		echo "connection failed". mysqli_connect_error();
	} else {
		 //echo "connected";
		return $con;
	}
	
}
$res = dbConnect();
?>
