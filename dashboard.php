<?php include('session.php'); ?>
<?php include('header.php'); ?>

<?php include('admin/connect.php'); ?>

<body>
    <?php
    include('navtop.php');
	error_reporting(0);
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

                          <div id="content">
                <div class="hero-unit-table">                        <!-- image slider -->
                    <div class="slider-wrapper theme-default">

                          <div id="slider" class="nivoSlider">
                            <img src="admin/images/shopp.jpg" data-thumb="images/shop.jpg" alt="" />
                           <img src="admin/images/shop2.jpg" data-thumb="images/shop.jpg" alt="" />
                            <img src="admin/images/banner1.jpg" data-thumb="images/toystory.jpg" alt="" />
                            <img src="admin/images/shopp.jpg" data-thumb="images/shop.jpg" alt="" />
                            <img src="admin/images/bag1.jpg" data-thumb="images/toystory.jpg" alt="" />
                              <img src="admin/images/shopp.jpg" data-thumb="images/shop.jpg" alt="" />
                            <img src="admin/images/bag2.jpg" data-thumb="images/wineries.jpg" alt="" />
                              <img src="admin/images/shopp.jpg" data-thumb="images/shop.jpg" alt="" />
                            <img src="admin/images/bag3.jpg"  alt="" data-transition="slideInLeft" />
                        </div>

                       </div></div>
                        
                        
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


               <a  href="#<?php echo $id; ?>"   data-toggle="modal"><img src="admin/<?php echo $row['location'] ?>" class="img-rounded" alt="" width="160" height="200"></a>


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
																<!-- <script>
																window.location = 'user_school.php';				
																</script> -->
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