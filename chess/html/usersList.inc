
        			<div class="container-content">
                    <div class="admin-blocks"> 
                    <div id="sidebar">
					<ul class="side-list">
						<li class="active">
							<a href="">
								<span class="text">My account</span>
							</a>
						</li>
						<li>
							<a href="index.php?action=creat">
							
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
                    
                    
                        
							<div class="users-block">
								<div class="content-heading">
									<h2>Users</h2>
									<a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/db.png" width="22" height="22" alt="image users" /></a>
								</div>
								<div class="inner-content">
									<div class="scroll-pane-hold">
										<div class="scroll-pane">
											<table class="general-table">
												<tbody>

                                            <?php foreach( $list as $key => $values ): ?>
                                            <tr>
                                            
                                <td class="col01"><?php echo $values['login']; ?> </td>

                        <td class="col02">
                            <a class="edit-but" href="index.php?id=<?php echo $values['id']; ?>&action=edit" >Edit</a>
        
                            <a class="del-but" href="index.php?id=<?php echo $values['id']; ?>&action=del" >Delete</a>
                        </td>

                   <?php endforeach; ?>

                    </tr>
                                                
                              	</tbody>
											</table>
										</div>
										
									</div>
								</div>
							</div>
                            	<div class="games-block">
								<div class="content-heading">
									<h2>Games</h2>
									<a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/game.png" width="25" height="22" alt="image description" /></a>
								</div>
								<div class="inner-content">
									<div class="scroll-pane-hold">
										<div class="scroll-pane">
											<table class="general-table">
												<tbody>
												    <tr>
															<td class="col01">Monday 09, Jun</td>
															<td class="col02">done</td>
														</tr><tr>
															<td class="col01">Sunday 08, Jun</td>
															<td class="col02">active</td>
														</tr><tr>
															<td class="col01">Saturday 07, Jun</td>
															<td class="col02">active</td>
														</tr>
																									</tbody>
											</table>
										</div>
										
									</div>
								</div>
							</div>
                            
                            
							<div class="creatUser-block">
								<div class="content-heading">
									<h2>Creat User</h2>
									<a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/db.png" width="22" height="22" alt="image users" /></a>
								</div>
								<div class="inner-content">
									
									
											<table class="general-table">
									
                    
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
											<span class="date"> <a href="index.php?action=createNewUser" >Save</a>
                       </span>
										
                    </div>
                                                                                        
									
										
									
								</div>
							</div>
                            	<div class="creatGame-block">
								<div class="content-heading">
									<h2>Creat Game</h2>
									<a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/game.png" width="25" height="22" alt="image description" /></a>
								</div>
								<div class="inner-content">
									<div class="scroll-pane-hold">
										<div class="scroll-pane">
											<table class="general-table">
												<tbody>
												    
																									</tbody>
											</table>
										</div>
										
									</div>
								</div>
							</div>
       </div>
         </div>
        
</div>