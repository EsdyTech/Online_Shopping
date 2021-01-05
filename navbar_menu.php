 <?php include('admin/connect.php'); ?>

 <?php    
 error_reporting(0);
 
  $qry= "SELECT * FROM category";
 $res=@mysqli_query($con,$qry);
	
	 
 echo '<div class="hero-unit-table">';
 
 while ($row=mysqli_fetch_assoc($res)){
 echo " ";
echo '<a href = "products.php?catid='.$row[catid].'" name = "" class = "btn btn-success">'.$row[category_name].'</a>';}		
echo'</div>';


?>