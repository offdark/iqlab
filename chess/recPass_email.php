<?php

/**
 * @author Offdark
 * @copyright 2014
 */

    include 'includes/functions.php';
    session_unset();    

      if( isset( $_POST['submit'] ) && !empty( $_POST['email']) ){ // START Cheking if Button was Sabmit

          $user = new User();

          if( $user->emailCheck( $_POST ) !=  null ){
            
                $_SESSION['id'] = $user->id;
                $_SESSION['fileName'] = fileName();
                header( 'Location: '. URL .'secretQ.php' );
          }
          else{ $_SESSION['error'] = true; header( 'Location: '. URL .'?mod=recPass' ); }
    }
    else{   header( 'Location: '. URL .'?mod=recPass' );  }