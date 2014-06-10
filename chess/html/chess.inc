<div class="container-content" >
    <table border="1">
    <?php

        for( $x = 1, $a = 'a'; $x <= 8; $x++, $a++  ){

            echo '<tr>';

            for( $y = 1; $y <= 8; $y++ ){

               $color =  ( ($x + $y) % 2 ) ? "black" : "white";

                echo "<td class='$a$y' bgcolor='". $color ."' height='50' width='50'> </td>";

            }

            echo '</tr>';
        }

    ?>
    </table>
 </div>
