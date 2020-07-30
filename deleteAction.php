<html>

<head>
<link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css" />
</head>

<?php

session_start();

if(isset($_SESSION["user_name"]) && $_SESSION["user_name"]!=""){

} else {
	
	header ("Location: main.php");	
}

?>

<?php 
require ("functions.php");
$con = dbConnect();

/** getting id for deleting the record from user **/
$id = $_REQUEST["id"];

$del_sql = "DELETE FROM `place` WHERE `place`.`id` = '$id'";

$del_data = $con->query($del_sql);

header("Location:dashboard.php");

?>
