<?php

/**
 * @author Offdark
 * @copyright 2014
 */

include '../includes/Session.class.php';

function __autoload($class_name) {

    if( file_exists('../includes/' .$class_name. '.class.php') ) {
        require_once( '../includes/' .$class_name. '.class.php' );
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}

    if( $session->is_logged_in() && $session->role == 'admin'  ){

        header( 'Location: http://localhost/test/chess/public/admin/index.php' );
    }
    elseif( $session->is_logged_in() && $session->role == 'user' ){

        header( 'Location: http://localhost/test/chess/public/index.php' );
    }


    if( isset( $_POST['singIn'] ) ){ // START Cheking if Button was Sabmit

        $login_name = ( !empty( $_POST['loginName']) ) ? trim( htmlspecialchars( $_POST['loginName'], ENT_QUOTES ) ) : null;
        $password   = ( !empty( $_POST['password']) )  ? trim( htmlspecialchars( $_POST['password'], ENT_QUOTES ) )  : null;

        $check_user = new User();
        $check_user->login = $login_name;
        $check_user->setPassword($password);

        $dbService = new MYSQLDatabase();
        $dbUser = $dbService->login($check_user);
        //Checking

            if( $dbUser->login == $check_user->login &&
                $dbUser->role  == 'admin' &&
                $dbUser->getHashedPassword() == $check_user->getHashedPassword()
              ){
                    $session->logged_in($dbUser);
                    header( 'Location: http://localhost/test/chess/public/admin/index.php' );
            }
            elseif( $dbUser->login == $check_user->login &&
                    $dbUser->role  == 'user' &&
                    $dbUser->getHashedPassword() == $check_user->getHashedPassword()
                   ){
                        $session->logged_in($dbUser);
                        header( 'Location: http://localhost/test/chess/public/index.php' );
            }
            else{

                header( 'Location: http://localhost/test/chess/public/login.php' );
            }

    }
    else // END Cheking if Button was Sabmit
        include 'html/login.inc';


