<?php
include('connect.php');

$get_id=$_GET['id'];

mysqli_query($con,"delete from tb_user where user_id='$get_id'")or die(mysqli_error());
header('location:user.php');
?>
