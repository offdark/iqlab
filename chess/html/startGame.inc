<div class="container-content" >
    
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <script type="text/javascript">

        var start_possition = null;
        var start_figure = null;
        var end_possition = null;


        $(function(){
            $('td').click(function(){

                alert( $(this).attr('id') );
                start_possition = $(this).attr('id');
                start_figure    =  $(this).text()
                alert( $(this).text() );

                if( start_possition != null && start_figure != null ){

                    end_possition = $(this).attr('id');
                   
                }

            });
        });



    </script>
    
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
                            <a class="edit-but" href="index.php?login=<?php echo $values['login']; ?>&action=startGame" >Send request</a>
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