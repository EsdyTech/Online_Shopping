<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <div class="alert alert-info"><strong><center>Add Category </center></strong></div>
                                        </div>
                                        <div class="modal-body">
                              <form  method="post" enctype="multipart/form-data">
                                
                                <hr>
								
								 <div class="control-group">
                                           <label class="control-label" for="inputEmail">Name:</label>
                                           <input type="text" name="catname" class = "form-control" placeholder="Category Name">
                                          
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

                                $catname = $_POST['catname'];
                                

                                $querys = mysqli_query($con,"select * from category where category_name= '$catname'") or die (mysqli_error());
                                $count = mysqli_num_rows($querys);
                            

                            if ($count  > 0){
                                
                                echo "   <script type='text/javascript'>
                                alert('Category Exists!');
                                window.location= 'category.php';
                            </script>";   

                            }

                    else{



                                mysqli_query($con,"insert into category (category_name) values ('$catname')
                                ") or die(mysqli_error());

                                header('location:category.php');
                            }
                        }
                            ?>
									  
									  
									  
									  
                                </div>
                            </div>