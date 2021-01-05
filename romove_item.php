<?php
include('admin/connect.php');
$get_id=$_GET['id'];
$pid=$_GET['pid'];



mysqli_query($con,"delete from order_details where orderid='$get_id'")or die(mysqli_error());



 mysqli_query($con,"update tb_products set quantity='$_GET[qty]' WHERE productID = '$pid'")or die(mysqli_error());



header('location:user_cart.php');
?>
