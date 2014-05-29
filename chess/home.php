<?php

/**
 * @author Offdark
 * @copyright 2014
 */

    include '../includes/functions.php';



    if( !$session->is_logged_in() || $session->role != 'user'  ){

        header( 'Location: http://localhost/test/chess/index.php' );
    }else 
             switch ( $session->status ):
            case 'blocked':   
                break;
            case 'deleted':            
                break;
            case 'inactive':
                 header( 'Location: http://localhost/test/chess/public/generate_secretQ.php' );
                 break;
             case 'active':
                
            endswitch;  
            
           
    


    if( isset($_GET['session']) == 'delete' ){

        $session->logout();
    }else


        echo "you sign in like admin ";


?>

<a href="index.php?session=delete"> logout </a>