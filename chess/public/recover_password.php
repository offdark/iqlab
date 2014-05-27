<?php

/**
 * @author Offdark
 * @copyright 2014
 */
include '../includes/functions.php';
    
    
      if( isset( $_POST['submit'] ) && !empty( $_POST['login']) ){ // START Cheking if Button was Sabmit

        $filds = new stdClass();

        $filds->login = trim( htmlspecialchars( $_POST['login'], ENT_QUOTES ) );

        
}

?>

<form action="recover_password.php" method="POST" >
    <fieldset>
        
        <label>Enter your Login </label>
        <span class="input"><input type="text" name="login" value="" placeholder="" /></span><br /><br />
        <input type="submit" name="submit" class="btn-form" value="Submit" style="width: 261px;" />

    </fieldset>
</form>
