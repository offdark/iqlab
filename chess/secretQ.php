<?php

/**
 * @author Offdark
 * @copyright 2014
 */

include 'includes/functions.php';


    if( empty($_SESSION['id']) || empty($_SESSION['fileName']) ){
       header( 'Location: ../index.php' );
    }

    $fileName = $_SESSION['fileName'];

        if( isset( $_POST['submit'] ) ){ // START Cheking if Button was Sabmit

            $user = new User();

            if( $fileName == 'recPass_email.php' ){

                echo "good";
                $user->updatePassword( $_POST,  $id = array( 'id' => $_SESSION['id']->id ) );
                DIE;
                header( 'Location: newPass.php' );

            }
            elseif( $fileName == 'add.php' ){

                $user->table_name = 'password_reset';
                $user->saveQuestions( $_POST );
                session_unset();
                header( 'Location: login.php' );
            }
            else{ header( 'Location: secretQ.php' );  }
        }
        else // END Cheking if Button was Sabmit

    include 'html/header.inc';
?>


<form action="secretQ.php" method="POST" class="form">
    <fieldset>
        
        <label>Security question 1: 
        <select name="secretQ1" size="1">
        <?php $secretQuastions1 = secretQ( $id = 1 );
                foreach( $secretQuastions1 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select>
        </label>
        
        <label>answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA1"  type="text" name="secretQA1" value="" placeholder="" /></span>
        </label><br />
        
        <label>Security question 2:  
        <select name="secretQ2" size="1">
        <?php  $secretQuastions2 = secretQ( $id = 2 );
                foreach( $secretQuastions2 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select>
        </label>
        
        <label>answer  <span class="mark-red">*</span>
        <span class="input"><input id="secretQA2" type="text" name="secretQA2" value="" placeholder="" /></span>
        </label>
        
        <input type="submit" name="submit" class="btn-form" value="Submit" />

    </fieldset>
</form>
