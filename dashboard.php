<html>

<head>
<link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css" />
</head>

<nav class="navbar navbar-dark bg-dark">
	<ul class="navbar-nav ml-auto ">	
		<li class="nav-item">
			<a class="nav-link" href="addPlace.php">Add</a>
		</li>	
		<li class="nav-item">
			<a class="nav-link" href="logout.php">Logout</a>
		</li>
	</ul>
</div>	
</nav>

<?php

session_start();

if(isset($_SESSION["user_name"]) && $_SESSION["user_name"]!=""){

} else {
	
	header ("Location: main.php");	
}

?>

<div class="container">	
<?php
require ("functions.php");
$con = dbConnect();


$where="";

if(isset($_REQUEST['pname']) && $_REQUEST['pname']!=""){
	$where = $where . " AND`name` = '$_REQUEST[pname]'";	
	$result = mysqli_query($con,"SELECT * FROM `place` where 1=1 $where")or die("Failed to query dtabase".mysqli_error($con));;
}else{
	$result = mysqli_query($con, "SELECT * FROM `place`") or die("Failed to query dtabase".mysqli_error($con));
}


// while($res = mysqli_fetch_assoc($result)){
// 	echo $res['name'];
// 	echo $res['type'];
// 	echo $res['location'];
// }

?>

<!-- search box for filter -->
<form class="search" action="dashboard.php" style="margin:auto;max-width:300px">

<input type="text" placeholder="Search by place..." name="pname"autocomplete="off"><br>

<input type="submit" value="search">
</form>
<!-- end search box for filter -->



<?php while($row =mysqli_fetch_assoc($result)){
?>
<div class = "card col-md-4 mt-4 mr-4" style="width:18rem; float:left">
	<img class="card-img-top" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="image caption">
	<div class="card-body">
		<h5 class="card-title"><?php echo $row['name']; ?><br><small><?php echo $row['location']; ?></small></h5>
		<p class="card-text"><?php echo $row['type']; ?></p>
		<a href="deleteAction.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a>
	</div>
</div>
</div>
<?php } ?>
</html>
