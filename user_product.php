<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('admin/connect.php'); ?>

<body>
    <?php
    include('navtop.php');
    ?>
    <div id="background">
        <?php
        include ('navbarfixed.php');
        ?>

        <div id="page">
           <?php include ('nav_sidebar2.php');?>
            <div id="content">
                <div class="hero-unit-table"> 
                    <div id="header">
                    
                    </div>
                    <div id="body">



                        <h3>Select From the Category of Products</h3>
                        <p>
                        
						<?php include ('navbar_menu.php');?>
						

                        </p>
                        
                        
                        
                          <ul class="thumbnails">
                            <?php
                            $query = mysqli_query($con,"select * from tb_products ORDER BY productID DESC limit 12") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['productID'];
                                ?>

                                <li class="span3">
                                    <div class="thumbnail">
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-info"><div class="font1"><?php echo $row['name']; ?></div></div>
                                        <hr>

        <a  href="#<?php echo $id; ?>"   data-toggle="modal"><img src="admin/<?php echo $row['location'] ?>" class="img-rounded" alt="" width="50" height="50"></a>
                                        <p>
                                            <p> Price: <?php echo $row['price']; ?></p>
                                        </p>




                                    </div>
                                </li>
                                
                                
                                
                                 <div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                    </div>
                                    <div class="modal-body">

                                        <div class="span2">

                                            <img src="admin/<?php echo $row['location']; ?>" width="200" height="200" class="img-rounded">      
                                        </div>
                                        <div class="span3">
											<p>Name</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;<?php echo $row['name'] ?></div>
											<p>Description</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;<?php echo $row['description'] ?></div>
											
                                            <div class="alert alert-success">&nbsp;&nbsp;&nbsp;&nbsp;Made in: <?php echo $row['originated'] ?> </div>
											<p>Price</p>
                                            <div class="alert alert-success">&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['price'] ?></div>
                                            
                                        </div>





                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove"></i>&nbsp;Close</button>
                                    </div>
                                </div>
                                <!-- end modal -->

                                
                        <?php }?>
                        
                        </ul>
<!--GETTING THE PRODUCTS WITH THEIR CATEGORY NAME CODE STARTS HERE-->
                        
                        <ul class="thumbnails">
                            <?php
                            $query = mysqli_query($con,"select * from tb_products WHERE category = '$_GET[catname]'") or die(mysqli_error());
                            while ($row = mysqli_fetch_array($query)) {
                                $id = $row['productID'];
								$qty = $row['quantity'];
								
				$query1 = mysqli_query($con,"SELECT *,SUM(qty) as qty FROM order_details WHERE productID = '$id' AND status = 'Delivered'");
									$row1 = mysqli_fetch_array($query1);
									$total_qty = $qty - $row1['qty'];									
                                ?>

                                <li class="span3">
                                    <div class="thumbnail">   
                                        <img data-src="holder.js/300x200" alt="">
                                        <div class="alert alert-success"><div class="font1"><?php echo $row['name']; ?></div></div>
                                        <hr>


               <a  href="#<?php echo $id; ?>"   data-toggle="modal"><img src="admin/<?php echo $row['location'] ?>" class="img-rounded" alt="" width="50" height="50"></a>


                                        <p>
                                            <a> Price: <?php echo $row['price']; ?></a>
                                        </p>
                                     										<?php if($total_qty > 0){ ?>
  <a href="#add<?php echo $id; ?>"   data-toggle="modal" class="btn btn-success"><i class="icon-shopping-cart icon-large"></i>&nbsp;Add to Cart</a>
										<?php }else{ ?>
										<span class="label label-important">Out of Stock</span>
										<?php } ?>
                                        <?php include('order_modal.php'); ?>
                                    <?php } ?>
                                    <?php
                                    if (isset($_POST['order'])) {
                                        $member_id = $_POST['member_id'];
                                        $quantity = $_POST['quantity'];
                                        $price = $_POST['price'];
                                        $product_id = $_POST['product_id'];
                                        $total = $quantity * $price;
                mysqli_query($con,"insert into order_details (memberID,qty,productID,price,total,status) values('$member_id','$quantity','$product_id','$price','$total','Pending')") or die(mysqli_query());
                                     /*    header('location:user_wines.php'); */
										?>
																<script>
																window.location = 'user_school.php';				
																</script>
										<?php
                                    }
                                    ?>
                        </ul>

                    </div>
                    <div id="footer">
                        <?php include('footer_user.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php include('footer_bottom.php'); ?>
</body>



</html>