<?php

/**
 * @author Offdark
 * @copyright 2014
 */

    include 'includes/functions.php';

    if( !$session->is_logged_in() || $session->role != 'user'  ){

          header( 'Location: '. URL );
      }else 
               switch ( $session->status ):
              case 'blocked':   
                  break;
              case 'deleted':            
                  break;
              case 'inactive':
                   $_SESSION['fileName'] = fileName();
                   header( 'Location: '. URL .'secretQ.php' );
                   break;
               case 'active':

              endswitch;
   
   include 'html/header.inc';
   include 'html/footer.inc';
           
   


