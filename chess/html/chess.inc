<div class="container-content" >

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">

        <script type="text/javascript">
        var start_possition = null;
        var end_possition = null;
        var curent_side = null;

        $(function(){
            $('td').click(function(){

                alert( $(this).attr('id') );
                var c_id = $(this).attr('id');
                var c_name = $(this).data('cr_name');
                var c_side = $(this).data('cr_side');

                //define state
                if( from === null ){

                    //check clicked figure

                    // is mine
                    if(c_side != curent_side){
                        return ;
                    }

                    //if empty
                    if(c_name.length == 0){
                        return;
                    }
                    // set start coordinate
                    from = c_id;
                }
                else{
                    // start is defined
                    if( from == c_id ){
                        return;
                    }else if(  ){

                    }
                    // check move
                    to = c_id;


                }
                //do some action
            });
        });


    </script>



    <table id="chess_board" cellpadding="0" cellspacing="0">
        <tr >
            <img src="chess_img/letters.png" />
        </tr>

        <?php  echo chessboard(); putFiguresChessBoard();?>


    </table>
    <tr >
        <img src="chess_img/letters.png" />
    </tr>

</div>


</br>

<form action="" method="POST" class="form">
    <fieldset>
        <label>Figure:
            <select name="figure" size="1">
                <?php $figures = figures();
                foreach( $figures as $value ): ?>
                    <option value="<?php echo htmlspecialchars($value); ?>" > <?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Move:
            <select name="secretQ2" size="1">
                <?php $secretQuestions2 = secretQ( $id = 2 );
                foreach( $secretQuestions2 as $value ): ?>
                    <option value="<?php echo htmlspecialchars($value); ?>" > <?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <input type="submit" name="submit" class="btn-form" value="Go" />

    </fieldset>
</form>
</div>