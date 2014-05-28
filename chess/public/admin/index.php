<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/21/14
 * Time: 5:46 PM
 */


include '../../includes/Session.class.php';

    if( !$session->is_logged_in() || $session->role != 'admin'  ){

        header( 'Location: http://localhost/test/chess/index.php' );
    }else
    

if( isset($_GET['session']) == 'delete' ){

    $session->logout();
}else


echo "you sign in like admin ";

print_r($_SESSION);

include 'html/header.inc';

