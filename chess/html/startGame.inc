<div class="container-content" >

    
    							<div class="users-block">
								<div class="content-heading">
									<h2>Choose User to start a Game</h2>
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
                            <a class="edit-but" href="index.php?id=<?php echo $values['id']; ?>&action=startGame" >Send request</a>
                         </td>

                   <?php endforeach; ?>

                    </tr>
                                                
                              	</tbody>
											</table>
										</div>
										
									</div>
								</div>
							</div>


    <div class="users-block">
        <div class="content-heading">
            <h2>Income invitations</h2>
            <a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/db.png" width="22" height="22" alt="image users" /></a>
        </div>
        <div class="inner-content">
            <div class="scroll-pane-hold">
                <div class="scroll-pane-invitations">
                    <table class="general-table">
                        <tbody>

                        <?php foreach( $data as $key => $values ): ?>
                       <tr>   <td class="invitations">User: <?php echo $values['from_user_login']; ?> </td> </tr>
                        <tr>   <td class="invitations">Message: <?php echo $values['text'];?> </td> </tr>

                        <tr>


                            <td class="invitations">Created: <?php echo $values['created']; ?><hr /></td>

                            <td class="col02">
                                <a class="edit-but" href="index.php?id=<?php echo $values['id']; ?>&action=accept" > Accept </a>
                                <a class="del-but" href="index.php?id=<?php echo $values['id']; ?>&action=decline" > Decline </a>
                            <hr />

                            </td>

                            
                            <?php endforeach; ?>
                        
                        </tr>
                    
                        </tbody>
                    </table>
                    
                </div>

            </div>
        </div>
    </div>

    <div class="users-block">
        <div class="content-heading">
            <h2>Outcome invitations</h2>
            <a class="link-ico" style="margin: 9px 3px 0 0; float:right"><img src="images/db.png" width="22" height="22" alt="image users" /></a>
        </div>
        <div class="inner-content">
            <div class="scroll-pane-hold">
                <div class="scroll-pane-invitations">
                    <table class="general-table">
                        <tbody>

                        <?php foreach( $outcome_list as $key => $values ): ?>
                        <tr>
                            <td class="invitations">User:   </td>
                        </tr>

                        <tr>
                            <td class="invitations">Created: <?php echo $values['created']; ?> <hr /></td>
                            <td class="col02">
                                Status: <?php echo $values['status']; ?>
                                <hr />
                            </td>

                            <?php endforeach; ?>

                        </tr>

                        </tbody>
                    </table>

                </div>

            </div>
        </div>
    </div>

</div>
</div>