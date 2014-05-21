<?php

/**
 * @author Offdark
 * @copyright 2014
 */

    include '../../includes/Session.class.php';


    if( isset($_GET['session']) == 'delete' ){

        $session->logout();
    }else


        echo "you sign in like admin ";


?>

<a href="index.php?session=delete"> logout </a>