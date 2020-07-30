<?php
//echo "logout action";
session_start();
session_destroy();
header ("Location: main.php");
?>
