<?php
include('connect.php');

$get_id=$_GET['id'];

mysqli_query($con,"delete from category where catid='$get_id'")or die(mysqli_error());
header('location:category.php');
?>
