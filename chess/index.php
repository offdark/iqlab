<?php

/**
 * @author 
 * @copyright 2014
 */

include 'includes/functions.php';
$login = false;
include'html/header.inc';

/**
 * if( $session->is_logged_in() && $session->role == 'admin'  ){

 *     header( 'Location: admin/index.php' );
 * }
 * elseif( $session->is_logged_in() && $session->role == 'user' ){

 *     header( 'Location: home.php' );

 * }
 */

    if( isset( $_GET['mod'] ) && $_GET['mod'] == 'signUp' ){
        include 'html/signUp.inc';
    }

    if( isset( $_GET['mod'] ) && $_GET['mod'] == 'signIn' ){
        include 'html/signIn.inc';
    }

    if( isset( $_GET['mod'] ) && $_GET['mod'] == 'recPass' ){
        include 'html/emailValidation.inc';
    }
    
    if( isset( $_GET['mod'] ) && $_GET['mod'] == 'logOut' ){
       $session->logout();
    }

include'html/footer.inc';

