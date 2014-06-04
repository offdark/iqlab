<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/29/14
 * Time: 6:30 PM
 */ 
 
 include 'includes/functions.php';
 include 'html/header.inc';

    if( $_SESSION['fileName'] == 'secretQ.php' ){
        $new_password = $_SESSION['new_password'];
        session_unset();
    }
    else{   session_unset();  header( 'Location: '. URL .'?mod=signIn' );  } 
    
 include 'html/newPassword.inc';
 include 'html/footer.inc';