<div class="modal fade" id="joke" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                          
                                            <h4 class="modal-title" id="myModalLabel"></h4>
                                        </div>
                                        <div class="modal-body">
                            <form  method="post" enctype="multipart/form-data">
                                <div class="alert alert-info"><strong><center>Add New User </center></strong></div>
                                <hr>
								
								<div class="control-group">
                                    <label class="control-label" for="inputEmail">FirstName:</label>
                                    <div class="controls">
                                        <input type="text" required class = "form-control"name="fn" id="inputEmail" placeholder="Firstname">
                                    </div>
                                </div>
                               
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">LastName:</label>
                                    <div class="controls">
                                        <input type="text"  required name="ln" class = "form-control" placeholder="Lastname">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Username:</label>
                                    <div class="controls">
                                        <input type="text" name="un" required  class = "form-control" placeholder="Username">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Password:</label>
                                    <div class="controls">
                                        <input type="password" name="p" required class = "form-control"  placeholder="Password">
                                    </div>
                                </div>

								<div class = "modal-footer">
											 <button name = "go" class="btn btn-primary">Save</button>
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           

								</div>
							
									   </div>
                                     
                                          
                                      
                                    </div>
									
									  </form>  

                            <?php
                            if (isset($_POST['go'])) {

                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $un = $_POST['un'];
                                $p = $_POST['p'];

                          
								
										$query = mysqli_query($con,"select * from tb_user where username= '$un'") or die (mysqli_error());
                                        $count = mysqli_num_rows($query);
                                       


									if ($count  > 0){ 
									?>
										<script>
											alert("Username Already Exits!");
										</script>
									<?php
										}
										else{
									 mysqli_query($con,"insert into tb_user (firstname,lastname,username,password) values('$fn','$ln','$un','$p')") or die(mysqli_error());
									?>
									<script>
										alert('User Added Successfully!');
										header('location:user.php');
									
									</script>
									<?php }} ?>	
									  
									  
									  
									  
                                </div>
                            </div>