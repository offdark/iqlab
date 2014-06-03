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
    $login = true;
   include 'html/header.inc';
           
    


    if( isset($_GET['mod']) == 'del' ){

        $session->logout();
    }



