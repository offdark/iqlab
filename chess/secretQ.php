<?php

/**
 * @author Offdark
 * @copyright 2014
 */

include 'includes/functions.php';

    if( empty($_SESSION['id']) || empty($_SESSION['fileName']) ){
       header( 'Location: '. URL );
    }

        if( isset( $_POST['submit'] ) ){ // START Cheking if Button was Sabmit
            $user = new User();

            if( $_SESSION['fileName'] == 'recPass_email.php' ){
                $_POST['user_id'] = $_SESSION['id']->id;

                if ( $user->resetPassword( $_POST, 'password_reset' ) != null ){

                    $_SESSION['fileName'] = fileName();
                    $_SESSION['new_password'] = $user->new_password;
                    header( 'Location: '. URL .'newPass.php' );
                }
                else{  $_SESSION['error'] = true;  }
            }
            elseif( $_SESSION['fileName'] == 'add.php' || $_SESSION['fileName'] == 'home.php' ){
                $_POST['user_id'] = $_SESSION['id'];
                $user->table_name = 'password_reset';
                
                if( $user->saveQuestions( $_POST ) ){
                    $_SESSION['fileName'] = fileName();
                    header( 'Location: '. URL .'welcome.php' );
                }
                else{ $_SESSION['error'] = true; }           
            }
    }
    
    include 'html/header.inc';
    include 'html/secretQ.inc';
    include 'html/footer.inc';