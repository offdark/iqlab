<div class="container-content" >

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">


        $(function(){
            $('td').click(function(){

                alert( $(this).attr('id') );
                alert( $(this).text() );
                 alert( $("a").attr('title') );

        });
               
        });


     </script>



    <table id="chess_board" cellpadding="0" cellspacing="0">
        
        <tr >
            <img src="chess_img/letters.png" />
        </tr>
        
        <tr>
            <td id="A8"><a href="#" title="left" >&#9820;</a></td>
            <td id="B8"><a href="#" >&#9822;</a></td>
            <td id="C8"><a href="#" >&#9821;</a></td>
            <td id="D8"><a href="#" >&#9819;</a></td>
            <td id="E8"><a href="#" >&#9818;</a></td>
            <td id="F8"><a href="#" >&#9821;</a></td>
            <td id="G8"><a href="#" >&#9822;</a></td>
            <td id="H8"><a href="#" >&#9820;</a></td>
        </tr>
        <tr>
            <td id="A7"><a href="#" >&#9823;</a></td>
            <td id="B7"><a href="#" >&#9823;</a></td>
            <td id="C7"><a href="#" >&#9823;</a></td>
            <td id="D7"><a href="#" >&#9823;</a></td>
            <td id="E7"><a href="#" >&#9823;</a></td>
            <td id="F7"><a href="#" >&#9823;</a></td>
            <td id="G7"><a href="#" >&#9823;</a></td>
            <td id="H7"><a href="#" >&#9823;</a></td>
        </tr>
        <tr>
            <td id="A6"></td>
            <td id="B6"></td>
            <td id="C6"></td>
            <td id="D6"></td>
            <td id="E6"></td>
            <td id="F6"></td>
            <td id="G6"></td>
            <td id="H6"></td>
        </tr>
        <tr>
            <td id="A5"></td>
            <td id="B5"></td>
            <td id="C5"></td>
            <td id="D5"></td>
            <td id="E5"></td>
            <td id="F5"></td>
            <td id="G5"></td>
            <td id="H5"></td>
        </tr>
        <tr>
            <td id="A4"></td>
            <td id="B4"></td>
            <td id="C4"></td>
            <td id="D4"></td>
            <td id="E4"></td>
            <td id="F4"></td>
            <td id="G4"></td>
            <td id="H4"></td>
        </tr>
        <tr>
            <td id="A3"></td>
            <td id="B3"></td>
            <td id="C3"></td>
            <td id="D3"></td>
            <td id="E3"></td>
            <td id="F3"></td>
            <td id="G3"></td>
            <td id="H3"></td>
        </tr>
        <tr>
            <td id="A2"><a href="#" >&#9817;</a></td>
            <td id="B2"><a href="#" >&#9817;</a></td>
            <td id="C2"><a href="#" >&#9817;</a></td>
            <td id="D2"><a href="#" >&#9817;</a></td>
            <td id="E2"><a href="#" >&#9817;</a></td>
            <td id="F2"><a href="#" >&#9817;</a></td>
            <td id="G2"><a href="#" >&#9817;</a></td>
            <td id="H2"><a href="#" >&#9817;</a></td>
        </tr>
        <tr>
            <td id="A1"><a href="#" >&#9814;</a></td>
            <td id="B1"><a href="#" >&#9816;</a></td>
            <td id="C1"><a href="#" >&#9815;</a></td>
            <td id="D1"><a href="#" >&#9813;</a></td>
            <td id="E1"><a href="#" >&#9812;</a></td>
            <td id="F1"><a href="#" >&#9815;</a></td>
            <td id="G1"><a href="#" >&#9816;</a></td>
            <td id="H1"><a href="#" >&#9814;</a></td>
        </tr>
    
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
