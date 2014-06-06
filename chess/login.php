<?php

/**
 * @author Offdark
 * @copyright 2014
 */

include 'includes/functions.php';


    if( isset( $_POST['singIn'] ) && !empty( $_POST['loginName']) && !empty( $_POST['password']) ){ // START Cheking if Button was Sabmit

        $login_name      = trim( htmlspecialchars( $_POST['loginName'], ENT_QUOTES ) )            ?: null;
        $hashed_password = sha1(sha1(trim( htmlspecialchars( $_POST['password'], ENT_QUOTES ) ))) ?: null;
        $user = new User();
        $user->login( $login_name, $hashed_password );

        //Checking
            if( $user->login == $login_name &&
                $user->role  == 'admin' &&
                $user->hashed_password == $hashed_password
              ){
                
                    $session->logged_in($user);
                    header( 'Location: index.php' );
            }
            elseif( $user->login == $login_name &&
                    $user->role  == 'user' &&
                    $user->hashed_password == $hashed_password
                   ){
                    
                        $session->logged_in($user);
                        header( 'Location: index.php' );
            }
            else{
                $_SESSION['error'] = true;
                header( 'Location: '. URL .'?mod=signIn' );
            
            }
    }
    else{  header( 'Location: '. URL .'?mod=signIn' ); } // END Cheking if Button was Sabmit
