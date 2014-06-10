
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
                    
                    <div class="editUser-block">
								<div class="content-heading">
									<h2>Edit user</h2>
									<a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/db.png" width="22" height="22" alt="image users" /></a>
								</div>
								
            
            <table border="0" width="100%" > <!-- START of TABLE -->

                <tr bgcolor="#C9D3DC">

                    <?php   foreach( $user  as $key => $values  ): ?>
                        <th><?php echo $key; ?> </th>

                    <?php   endforeach;    ?>

                </tr>
                <form method="POST" action="index.php">


                    <tr>

                    <?php foreach( $user as $value  ): ?>
                        
                        <td align="center">
                        <?php  if( $value != $user['id'] ): ?> 
                          
                             <input name="<?php echo $key; ?>" class="inputUser" type="text" required value="<?php echo htmlspecialchars($value); ?>"> 
                        <?php else: ?> 
                             <?php echo htmlspecialchars($value); ?>
                       
                       <?php endif;?>
                        </td>
                    <?php   endforeach;    ?>

                        




        </tr>
        
                </form>
                	</table>
                    
                    <div class="row-bottom">
											<span class="date"> <a href="index.php?id=<?php echo $user['id']; ?>&action=save" >Save</a>
                       </span>
											<span class="info"><a class="del-but" href="index.php?id=<?php echo $user['id']; ?>&action=del" >Delete</a>
                       </span>
                    </div>
                    
                    
    
    
										</div>
							<div class="pass-block">
								<div class="content-heading">
									<h2>Change password</h2>
									<a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/db.png" width="25" height="22" alt="image description" /></a>
								</div>
								<div class="inner-content">
								
									
											<table class="general-table">
									
                    
                                                <tbody>
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
										
										
									
								</div>
							</div>
				<div class="secret-block">
								<div class="content-heading">
									<h2>Change secret Questions & Answers</h2>
                                  
									<a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/db.png" width="25" height="22" alt="image description" /></a>
								</div>
								<div class="inner-content">
								
										
										 <label class="list">Security question 1: 
        <select name="secretQ1" size="1" class="list">
        <?php $secretQuestions1 = secretQ( $id = 1 );
                foreach( $secretQuestions1 as $value ): ?>       
                    <option value="<?php echo htmlspecialchars($value); ?>" > <?php echo $value; ?></option>   
                <?php endforeach; ?>
        </select>
        </label><br />
        
        <label class="list">answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA1"  type="text" name="secretQA1" required /></span>
        </label><br /><br />
         
        <label class="list">Security question 2:  
        <select name="secretQ2" size="1" class="list">
               <?php $secretQuestions2 = secretQ( $id = 2 );
                foreach( $secretQuestions2 as $value ): ?>       
                    <option value="<?php echo htmlspecialchars($value); ?>" > <?php echo $value; ?></option>   
                <?php endforeach; ?>
        </select>
        </label><br />
        
        <label class="list">answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA2" type="text" name="secretQA2" required /></span>
        </label>
                                             <div class="row-bottom">
											<span class="date"> <a href="index.php?id=<?php echo $user['id']; ?>&action=save" >Save</a>
                       </span>
										
                    </div>
										
										
									
								</div>
							</div>
									</div>
								</div>
						
      
    
</div>
