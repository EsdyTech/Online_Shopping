<?php
include('connect.php');

$get_id=$_GET['id'];

mysqli_query("delete from messages where message_id='$get_id'")or die(mysqli_error());
header('location:messages.php');
?>
