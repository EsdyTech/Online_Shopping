<?php
include('connect.php');

$get_id=$_GET['id'];

mysqli_query($con,"delete from tb_products where productID='$get_id'")or die(mysqli_error());
header('location:product.php');
?>
