<?php

/**
 * @author Offdark
 * @copyright 2014
 */

include '../includes/Session.class.php';
include '../includes/functions.php';

    $id = $_SERVER['QUERY_STRING'];
    
     if( isset( $_POST['submit'] ) && !empty( $_POST['secretQA1']) && !empty( $_POST['secretQA1']) ){ // START Cheking if Button was Sabmit
        
        $parse_id = $_SERVER['QUERY_STRING'];
        parse_str($parse_id);
        
        $filds = new stdClass();
        $filds->user_id = $id;
        $filds->secretQ1  = trim( htmlspecialchars( $_POST['secretQ1'], ENT_QUOTES ) );
        $filds->secretQ2  = trim( htmlspecialchars( $_POST['secretQ2'], ENT_QUOTES ) );
        $filds->secretQA1 = trim( htmlspecialchars( $_POST['secretQA1'], ENT_QUOTES ) );
        $filds->secretQA2 = trim( htmlspecialchars( $_POST['secretQA2'], ENT_QUOTES ) );     

        //$table_name = 'password_reset';
        User::$table_name = 'password_reset';
        User::add( $filds );
        
                header( 'Location: ../index.php' );
        
        
        //$user = User::reset_password();

        //Checking
        /**    if( $user->login == $login_name &&
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
            
            } **/
    }
    else // END Cheking if Button was Sabmit


?>


<form action="process_secretQ.php?<?php echo htmlspecialchars($id); ?>" method="POST" >
    <fieldset>
        
        <label>Security question 1:  </label>
        <select name="secretQ1" size="1">
        <?php $secretQuastions1 = secretQ( $id = 1 );
                foreach( $secretQuastions1 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select><br /><br />
        <label>answer  <span class="mark-red">*</span></label>
        <span class="input"><input id="secretQA1"  type="text" name="secretQA1" value="" placeholder="" /></span><br /><br />
        
        <label>Security question 2:  </label>
        <select name="secretQ2" size="1">
        <?php  $secretQuastions2 = secretQ( $id = 2 );
                foreach( $secretQuastions2 as $value ){       
                    echo '<option value="' .htmlspecialchars($value). '" >' .$value. '</option>';   
                } ?>
        </select><br /><br />
        <label>answer  <span class="mark-red">*</span></label>
        <span class="input"><input id="secretQA2" type="text" name="secretQA2" value="" placeholder="" /></span><br />

        <br />
        <input type="submit" name="submit" value="Submit" style="width: 261px;" />

    </fieldset>
</form>
