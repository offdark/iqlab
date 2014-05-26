<?php

/**
 * @author Offdark
 * @copyright 2014
 */

include '../includes/Session.class.php';
include '../includes/functions.php';



     if( isset( $_POST['submit'] ) && !empty( $_POST['answer1']) && !empty( $_POST['answer2']) ){ // START Cheking if Button was Sabmit

        $answer1 = trim( htmlspecialchars( $_POST['answer1'], ENT_QUOTES ) ) ?: null;
        $answer2 = trim( htmlspecialchars( $_POST['answer2'], ENT_QUOTES ) ) ?: null;

        $user = User::reset_password();

        //Checking
            if( $user->login == $login_name &&
                $user->role  == 'admin' &&
                $user->hashed_password == $hashed_password
              ){
                
                    $session->logged_in($user);
                    header( 'Location: http://localhost/test/chess/public/admin/index.php' );
            }
            elseif( $user->login == $login_name &&
                    $user->role  == 'user' &&
                    $user->hashed_password == $hashed_password
                   ){
                    
                        header( 'Location: http://localhost/test/chess/public/index.php' );
            }
            else{

                header( 'Location: http://localhost/test/chess/public/login.php' );
            
            }

    }
    else // END Cheking if Button was Sabmit


?>


<form action="recover_password.php" method="POST" >
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