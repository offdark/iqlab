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



    <table id="chess_board" cellpadding="0" cellspacing="0">
        <tr >
            <img src="chess_img/letters.png" />
        </tr>
        <?php  echo chessboard(); ?>

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