<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content"> 
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add to existing Product </center></strong></div>
                                        </div>
                                        <div class="modal-body">  
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Name:</label>
                                          <?php 
					$qry= "SELECT * FROM tb_products ORDER BY name ASC";
					$res= mysqli_query($con,$qry);
					$num = mysqli_num_rows($res);
					if ($num > 0){
					  echo ' <select type="text" name="prodname" class = "form-control" placeholder="Product Name" >';
					   while ($row=mysqli_fetch_array($res)){
					   echo'<option value="'.$row['productID'].'" >'.$row['name'].'</option>\n';
					   }
	   
				  	 echo '</select>';
						   }
						   ?>
                                 </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Quantity:</label>
                                    <div class="controls">
                                        <input type="text" required name="quantity" placeholder="Quantity"  class = "form-control" >
                                    </div>
                                </div>

								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div> 
                                     
                                          
                                      
                                    </div> 
									
									  </form>  
									  
									   <?php include ('connect.php');
                            if (isset($_POST['go'])) {
							
							 $pid = $_POST['prodname'];
                                $quty = $_POST['quantity'];
								
 				$query = mysqli_query($con,"select * from tb_products WHERE productID = '$pid'") or die(mysqli_error());
                   $row = mysqli_fetch_array($query);
					$prodqty=$row['quantity'];				
					$newqty=$prodqty+$quty;			
                               
								
mysqli_query($con,"update tb_products set quantity='$newqty' WHERE productID = '$pid'")or die(mysqli_error());

                                
                                //header('location:product.php');
                            }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>