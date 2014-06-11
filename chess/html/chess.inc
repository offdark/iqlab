<div class="container-content" >

    <script type="text/javascript">
        function changeIt(_src){
            alert(_src);
        }
     </script>
    <table border="1">
    <?php

        for( $x = 1, $a = 'a'; $x <= 8; $x++, $a++  ){

            echo '<tr>';

            for( $y = 1; $y <= 8; $y++ ){

               $color =  ( ($x + $y) % 2 ) ? "D18B47" : "FFCE9E";

                echo "<td class='$a$y' bgcolor='". $color ."' height='50' width='50'><img src='chess_img/rook-w.png'  onclick='changeIt(this.src)'  height='42' width='42' > </td>";

            }

            echo '</tr>';
        }

    ?>
    </table>
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


    </br>

    <table id="chess_board" cellpadding="0" cellspacing="0">
        <tr>
            <td id="A8"><a href="#" class="rook black">&#9820;</a></td>
            <td id="B8"><a href="#" class="night black">&#9822;</a></td>
            <td id="C8"><a href="#" class="bishop black">&#9821;</a></td>
            <td id="D8"><a href="#" class="king black">&#9819;</a></td>
            <td id="E8"><a href="#" class="queen black">&#9818;</a></td>
            <td id="F8"><a href="#" class="bishop black">&#9821;</a></td>
            <td id="G8"><a href="#" class="night black">&#9822;</a></td>
            <td id="H8"><a href="#" class="rook black">&#9820;</a></td>
        </tr>
        <tr>
            <td id="A7"><a href="#" class="pawn black">&#9823;</a></td>
            <td id="B7"><a href="#" class="pawn black">&#9823;</a></td>
            <td id="C7"><a href="#" class="pawn black">&#9823;</a></td>
            <td id="D7"><a href="#" class="pawn black">&#9823;</a></td>
            <td id="E7"><a href="#" class="pawn black">&#9823;</a></td>
            <td id="F7"><a href="#" class="pawn black">&#9823;</a></td>
            <td id="G7"><a href="#" class="pawn black">&#9823;</a></td>
            <td id="H7"><a href="#" class="pawn black">&#9823;</a></td>
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
            <td id="A2"><a href="#" class="pawn white">&#9817;</a></td>
            <td id="B2"><a href="#" class="pawn white">&#9817;</a></td>
            <td id="C2"><a href="#" class="pawn white">&#9817;</a></td>
            <td id="D2"><a href="#" class="pawn white">&#9817;</a></td>
            <td id="E2"><a href="#" class="pawn white">&#9817;</a></td>
            <td id="F2"><a href="#" class="pawn white">&#9817;</a></td>
            <td id="G2"><a href="#" class="pawn white">&#9817;</a></td>
            <td id="H2"><a href="#" class="pawn white">&#9817;</a></td>
        </tr>
        <tr>
            <td id="A1"><a href="#" class="rook white">&#9814;</a></td>
            <td id="B1"><a href="#" class="night white">&#9816;</a></td>
            <td id="C1"><a href="#" class="bishop white">&#9815;</a></td>
            <td id="D1"><a href="#" class="king white">&#9813;</a></td>
            <td id="E1"><a href="#" class="wife white">&#9812;</a></td>
            <td id="F1"><a href="#" class="bishop white">&#9815;</a></td>
            <td id="G1"><a href="#" class="night white">&#9816;</a></td>
            <td id="H1"><a href="#" class="rook white">&#9814;</a></td>
        </tr>
    </table>


 </div>
