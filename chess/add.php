<?php

/**
 * @author Offdark
 * @copyright 2014
 */

    include 'includes/functions.php';
    $fileName = basename( $_SERVER['REQUEST_URI'], '?'. $_SERVER['QUERY_STRING'] );

    if( isset( $_POST['singUp'] ) ){ // START Cheking if Button was Sabmit

      if( $_POST['password'] == $_POST['re_password'] ){
                
                unset( $_POST['singUp']);
                unset( $_POST['re_password']);
                $_POST['hashed_password']  = sha1(sha1(trim( htmlspecialchars( $_POST['password'], ENT_QUOTES ) )));
                unset($_POST['password']);
                $user = new User();

                    if( $user->add( $_POST ) ){

                        $_SESSION['id'] = $user->lastInsertId;
                        $_SESSION['fileName'] = $fileName;
                        header( 'Location:'. URL .'secretQ.php' );
                    }
                    else{   $_SESSION['error'] = true; header( 'Location: '. URL .'?mod=signUp' );  }
      }
      else{  $_SESSION['pas_error'] = true; header( 'Location: '. URL .'?mod=signUp' );    }
    }
    else{   header( 'Location: '. URL .'?mod=signUp' );  }

