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
else
 
    include 'html/header.inc';
?>

<form action="recover_password.php" method="POST" class="form" >
    <fieldset>
        
        <label>Enter your Login <span class="mark-red">* </span><input type="text" name="login" class="input"  required /></label>
        <input type="submit" name="submit" class="btn-form" value="Submit" />

    </fieldset>
</form>
