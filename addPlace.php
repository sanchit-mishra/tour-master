<html>

<head>
<link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css" />
</head>

<nav class="navbar navbar-dark bg-dark">
<ul class="navbar-nav ml-auto">	
<li class="nav-item">
	<a class="nav-link" href="dashboard.php">Dashboard</a>
</li>	
<li class="nav-item">
	<a class="nav-link" href="logout.php">Logout</a>
</li>
</ul>
</nav>

<?php

session_start();

if(isset($_SESSION["user_name"]) && $_SESSION["user_name"]!=""){

} else {
	header ("Location: main.php");	
}

?>

<form class="container" action="upload.php" method="post" enctype="multipart/form-data">

<h3 class="justify-content-center mt-2">Add Place</h3>
<div class="form-group row">
    <label class="col-md-2">Enter Place Name:</label>
    <input type="text" class="form-control col-md-5" name="pname" placeholder="Place Name" autocomplete="off" required></input>
</div>

<div class="form-group row">
    <label class="col-md-2">Enter Location:</label>
    <input type="text" class="form-control col-md-5" name="location" placeholder="Location" autocomplete="off" required></input>
</div>

<div class="form-group row">
    <label class="col-md-2">Location Type:</label>
    <input type="text" class="form-control col-md-5" name="type" placeholder="Type" autocomplete="off" required></input>
</div>
<div class="form-group row">
    <label class="col-md-2">Select Image File:</label>
    <input type="file" class="btn btn-secondary bg-light text-dark mr-2" name="image"> 
    <input type="submit" class="btn btn-primary" name="upload" value="Upload">

</form>

</html>
