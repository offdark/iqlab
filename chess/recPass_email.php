<?php

/**
 * @author Offdark
 * @copyright 2014
 */

    include 'includes/functions.php';
    session_unset();    

      if( isset( $_POST['submit'] ) && !empty( $_POST['email']) ){ // START Cheking if Button was Sabmit

          $user = new User();

          if( $user->emailCheck( $_POST ) !=  null ){
            
                $_SESSION['id'] = $user->id;
                $_SESSION['fileName'] = fileName();
                header( 'Location: secretQ.php' );
          }
}
else
 
    include 'html/header.inc';
?>

<form action="recPass_email.php" method="POST" class="form" >
    <fieldset>
        
        <label>Enter your Email <span class="mark-red">* </span><input type="email" name="email" class="input"  required /></label>
        <input type="submit" name="submit" class="btn-form" value="Submit" />

    </fieldset>
</form>
