<?php

/**
 * @author 
 * @copyright 2014
 */

include 'includes/functions.php';
include'html/header.inc';


  if( $session->is_logged_in() && $session->role == 'admin'  ){

      header( 'Location: admin/index.php' );
  }
  elseif( $session->is_logged_in() && $session->role == 'user' ){

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

      $admin = new Admin();
      include'html/allUsers.inc';
  }

  
  if( isset( $_GET['mod'] ) ){
    switch($_GET['mod']):
    
        case 'signUp':
            include 'html/signUp.inc';
            break;
            
        case 'signIn':
            include 'html/signIn.inc';
            break;
            
        case 'recPass':
            include 'html/emailValidation.inc';
            break;
            
        case 'logOut':
            $session->logout();
            break;
         
    endswitch;
    }
    else{  include'html/indexContent.inc';  }


include'html/footer.inc';
