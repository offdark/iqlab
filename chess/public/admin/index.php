<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/21/14
 * Time: 5:46 PM
 */


include '../../includes/Session.class.php';

if( isset($_GET['session']) == 'delete' ){

    $session->logout();
}else


echo "you sign in like admin ";


?>

<a href="index.php?session=delete"> logout </a>