<?php

/**
 * @author 
 * @copyright 2014
 */

include 'includes/functions.php';
include'html/header.inc';


  if( $session->is_logged_in() && $session->role == 'admin'  ){

      $admin = new Admin();

      if( isset($_GET['id']) && $_GET['action'] == 'edit' ){

          $user = $admin->getUserById($_GET['id']);
          include'html/editUser.inc';

      }elseif( isset($_GET['id']) &&  $_GET['action'] == 'save' ){

      }
      elseif( isset($_GET['id']) &&  $_GET['action'] == 'del') {
          echo 'delete';
      }
      elseif( isset($_GET['mod']) && $_GET['mod'] == 'logOut' ){
            $session->logout();
      }
      elseif( isset($_GET['action']) == 'create'){
             include'html/creatUserAdmin.inc';
      }
      elseif( isset($_GET['action']) == 'createNewUser' ){

      }
      else{
          $list = $admin->allUsers();
          include'html/usersList.inc';
      }
      
      
      
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

      
    
    if( isset($_GET['mod']) == 'newGame' ){
        include 'html/chess.inc';
      }
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
    else{    }


include'html/footer.inc';
