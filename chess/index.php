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
    
    $user = new User();
    $game_invitation = new GameInvitation();
    $from_user =  $_SESSION['login'];
    
    if( isset($_GET['mod'] ) == 'newGame' ){

        $list = $user->allActiveUsers( $from_user );
        $data = $game_invitation->invitationList( $from_user );
        $outcome_list = $game_invitation->outcomeInvitations( $from_user );
        include 'html/startGame.inc';


      }
      elseif( isset( $_GET['login'] ) && $_GET['action'] == 'startGame' ){

          echo "back";

          $to_user = $_GET['login'];
          $game_invitation->sendInvitation( $from_user, $to_user );
      }
      elseif( isset( $_GET['id'] ) && $_GET['action'] == 'decline' ){

          $game_invitation->invitationCancel( $_GET['id'] );
          header( 'Location: '. URL .'?mod=newGame' );
      }
     elseif( isset( $_GET['id'] ) && $_GET['action'] == 'accept' ){

        echo "accept";
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
