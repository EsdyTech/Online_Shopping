<div id="sidebar">
<br />
<?php
                $userr_query = mysqli_query($con,"select * from tb_member where memberID='$ses_id'") or die(mysqli_error());
                $rowr = mysqli_fetch_array($userr_query);
               // $rowr['Firstname'] . " " . $rowr['Lastname'];
                ?>
&nbsp;&nbsp;&nbsp;<b>Welcome Customer <?php echo  $rowr['Firstname'];?>!!!</b>
<br /><br />
                <a href="#" class="logo"><img src="images/shop.jpg" alt=""></a>
                <ul>
                    <li class="">
                        <span><a href="dashboard.php" ><i class="icon-home icon-large"></i> Home</a></span>
                    </li>
                    <li>
                        <span><a href="user_product.php"><i class=" icon-th-large icon-large"></i>Order Now</a></span>
                    </li>

                    <li>
                        <span><a href="user_about.php"><i class="icon-info-sign icon-large"></i> About US</a></span>
                    </li>

                    <li>
                        <span><a href="user_contact.php"><i class="icon-phone-sign icon-large"></i> Contact US</a></span>
                    </li>
					<li>
                        <span><a href="user_faq.php"><i class="icon-comment icon-large"></i> FAQ's</a></span>
                    </li>
                   
							<li>
                        <span><a href="profile.php"></i>My Profile</a></span>
                    </li>
                </ul>
                <?php include('sidebar.php'); ?>
                <div class="newsletter">

                </div>
            </div>