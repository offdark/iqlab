
        			<div class="container-content">
                    <div class="admin-blocks"> 
                    <div id="sidebar">
					<ul class="side-list">
						<li class="active">
							<a href="index.php">
								<span class="text">My account</span>
							</a>
						</li>
						<li>
							<a href="">
							
								<span class="text">Create User</span>
							</a>
						</li>
						<li class="last">
							<a href="">
							
								<span class="text">Create Game</span>
							</a>
						</li>
                        <li class="last">
							<a href="">
							
								<span class="text">Active Games</span>
							</a>
						</li>
                        <li class="last">
							<a href="">
							
								<span class="text">Done Games</span>
							</a>
						</li>
					</ul>
				</div>
                                    <div class="editUser-block">
								<div class="content-heading">
									<h2>Creat User</h2>
									<a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/db.png" width="22" height="22" alt="image users" /></a>
								</div>
								
            	<table class="general-table">
									
                      <form action="index.php" method="POST" class="form" >
                                                <tbody>
                                                <?php if( isset($_SESSION['error'])): ?> <span class="mark-red"> User with such Login &/or Email already exist </span> <?php unset($_SESSION['error']); endif; ?>
            <br />
												    <tr>
                                                    
                                                   
															<td class="col01"> Login <span class="mark-red">*</span><input   type="text" name="login" required /> </td>
													
                                                      
														</tr><tr>
                                                       
															<td class="col01"> Email <span class="mark-red">*</span><input  type="email" name="email" required /> </td>
															
														</tr>
                                                        <tr>
                                                    
                                                   
															<td class="col01"> Name <span class="mark-red">*</span><input   type="text" name="realName" required />
                                                            </td>
													
                                                      
														</tr>
															
													
                                                        <tr>
                                                    
                                                   
															<td class="col01"> Password <span class="mark-red">*</span><input   type="password" name="re_password" required /><?php if( isset($_SESSION['pas_error'])): ?><span class="mark-red"> Password does not match </span><?php unset($_SESSION['pas_error']); endif; ?><br />
                                                            </td>
													
                                                      
														</tr><tr>
                                                       
															<td class="col01"> Repeat Password <span class="mark-red">*</span><input  type="password" name="re_password" required /><?php if( isset($_SESSION['pas_error'])): ?><span class="mark-red"> Password does not match </span><?php unset($_SESSION['pas_error']); endif; ?><br />
                                                 </td>
															
														</tr>
                                                        
                                                         
                                                        
																									</tbody>
											</table>
            
                    
                    <div class="row-bottom">
											<span class="date"> <a href="index.php?id=<?php echo $user['id']; ?>&action=save" >Save</a>
                       </span>
										
                    </div>
                    </form>
                    
                    
    
    
										</div>
    
    
										</div>
						
									</div>
								</div>
						
      
    
</div>
