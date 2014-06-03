<?php

/**
 * @author Offdark
 * @copyright 2014
 */

    include 'includes/functions.php';




    if( !$session->is_logged_in() || $session->role != 'user'  ){

          header( 'Location: index.php' );
      }else 
               switch ( $session->status ):
              case 'blocked':   
                  break;
              case 'deleted':            
                  break;
              case 'inactive':
                   header( 'Location: secretQ.php' );
                   break;
               case 'active':
                  
              endswitch;  
 
            
           
    


    if( isset($_GET['session']) == 'delete' ){

        $session->logout();
    }else


        echo "you sign in like user ";


?>

<a href="home.php?session=delete"> logout </a>