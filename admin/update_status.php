<?php
include('connect.php');


$get_id=$_GET['id'];
$product_id=$_GET['product_id']; $qty=$_GET['qty'];

$cart_table = mysqli_query($con,"select  * from tb_products where productID='$product_id'") or die(mysqli_error());
$cart_count = mysqli_num_rows($cart_table);
$cart_row = mysqli_fetch_array($cart_table);
$quantityStock = $cart_row['quantity'];


if ($cart_count > 0)
{
    $remQuantity = $quantityStock - $qty;
    mysqli_query($con,"update tb_products set quantity='$remQuantity' WHERE productID = '$product_id'")or die(mysqli_error());

    mysqli_query($con,"update order_details set status='Delivered', modeofpayment='Paypal' where orderid='$get_id'")or die(mysqli_error());
    
    header('location:orders.php');

}



?>