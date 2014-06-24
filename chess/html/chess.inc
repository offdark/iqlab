<div class="container-content" >
    

        <?php  $data = $continueGame->select($_GET['mod']); ?>




</div>

</div>                  <div class="editUser-block">
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