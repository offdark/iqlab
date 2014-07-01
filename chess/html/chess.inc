<div class="container-content" >
    <script>

        var myColor = "<?php echo $_SESSION['myColor']; ?>";
        var whiteFigures = [ "&#9812;", "&#9813;", "&#9814;", "&#9815;", "&#9816;", "&#9817;" ];
        var blackFigures = [ "&#9818;", "&#9819;", "&#9820;", "&#9821;", "&#9822;", "&#9823;" ];
        var color = ( myColor == 'white' )  ? whiteFigures : blackFigures;
        var figure = '';
        var fromFigurePosition = '';
        var toFigurePossition = '';

        function isValueInArray( arr, val ) {
            inArray = false;
            for ( i = 0; i < arr.length; i++ )
                if ( val == arr[i] )
                    inArray = true;
            return inArray;
        }


        $(document).ready(function(){


            $("td").click(function(){

                if ( figure != '' && fromFigurePosition != ''  ) {


                   //     alert( $(this).attr('id') );
                 //         toFigurePosition =  $(this).attr('id');
                    alert(figure);
                    alert(fromFigurePosition);

                }
                else {
                  //    alert( $(this).attr('id') );
                    //  alert( $(this).text() );
                  //  var value = fruits.indexOf("bbb", 4);
                  //  $.inArray( $(this).text(), color ) != -1
                 //   color.indexOf( $(this).text() ) >= 0
                //    alert($(this).text());
                   var ppp =  isValueInArray( color, $(this).text());

                 //   alert(ppp);
                    var aaa = $(this).text();
                //    alert(aaa);
                //    alert(myColor);

                    $.each(color, function( index, value ) {

                      //  alert( index + ": " + value );
                    });

                    if(  $(this).text() != '' ){
                        figure = $(this).text();
                     //   alert(figure);

                        if( $.inArray( $(this).text(), color ) >= 0  ){

                            fromFigurePosition =  $(this).attr('id');
                            figure = $(this).text();
                        }
                        else{  alert("please choose your color");  }

                    }else { alert("choose figure to go"); }

                }

            });

        });
    </script>


        <?php  $continueGame->select($_GET['mod']); ?>
        <?php $game_arr = array(

            'B1' => '&#9814;',
            'C1' => '&#9815;',
            'D1' => '&#9812;',
            'E1' => '&#9817;',
            'F1' => '&#9815;',
            'G1' => '&#9816;',

            'A2' => '&#9817;',
            'B2' => '&#9817;',
            'C2' => '&#9817;',
            'D2' => '&#9817;',
            'E2' => '&#9817;',
            'F2' => '&#9817;',
            'G2' => '&#9817;',
            'H2' => '&#9820;',

            'B8' => '&#9822;',
            'C8' => '&#9821;',
            'D8' => '&#9818;',
            'E8' => '&#9819;',
            'F8' => '&#9821;',
            'G8' => '&#9822;',

            'B7' => '&#9823;',
            'C7' => '&#9823;',
            'D7' => '&#9823;',
            'E7' => '&#9823;',
            'F7' => '&#9823;',
            'G7' => '&#9823;',
            'H7' => '&#9823;'
        );
        $remove = 'F2';
        $gameMove = array('D2' => '&#9816;' );

    //    $continueGame->moveFigure( $gameMove, $remove); ?>



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



                        <td align="center">


                             <input name="<?php  ?>" class="inputUser" type="text" required value="<?php ?>">

                        </td>


        </tr>

                </form>
                	</table>
                    
                    <div class="row-bottom">
											<span class="date"> <a href="index.php?id=<?php  ?>&action=save" >Save</a>
                       </span>
											<span class="info"><a class="del-but" href="index.php?id=<?php  ?>&action=del" >Delete</a>
                       </span>
                    </div>
                    
                    
    
    
										</div>