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
 
// If file upload form is submitted 
$status = $statusMsg = ''; 

if(isset($_POST["upload"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 

            //Storing data
            $name = $_REQUEST["pname"];
            $loc = $_REQUEST["location"];
            $type = $_REQUEST["type"];
         
            // Insert image content into database 
            $insert = "INSERT into `place` (`name`,`image`,`location`,`type`) VALUES ('$name','$imgContent','$loc','$type')";
            $query_run = mysqli_query($con,$insert);
             
            if($query_run){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully.";
                header("Location: dashboard.php"); 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>