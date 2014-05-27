<?php

/**
 * @author Offdark
 * @copyright 2014
 */
include '../includes/functions.php';

?>

<form action="process_secretQ" method="POST" >
    <fieldset>
        
        <label>Security question 1:  </label>
        <select name="secretQ1" size="1">
        <?php $secretQuastions1 = secretQ( $id = 1 );
                foreach( $secretQuastions1 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select><br /><br />
        <label>answer  <span class="mark-red">*</span></label>
        <span class="input"><input id="answer1"  type="text" name="answer1" value="" placeholder="" /></span><br /><br />
        
        <label>Security question 2:  </label>
        <select name="secretQ2" size="1">
        <?php  $secretQuastions2 = secretQ( $id = 2 );
                foreach( $secretQuastions2 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select><br /><br />
        <label>answer  <span class="mark-red">*</span></label>
        <span class="input"><input id="answer2" type="text" name="answer2" value="" placeholder="" /></span><br />

        <br />
        <input type="submit" name="submit" class="btn-form" value="Submit" style="width: 261px;" />

    </fieldset>
</form>
