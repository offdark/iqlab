<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/21/14
 * Time: 5:24 PM
 */


function __autoload($class_name) {

    if( file_exists('../includes/' .$class_name. '.class.php') ) {
        require_once( '../includes/' .$class_name. '.class.php' );
    } else {
        throw new Exception("Unable to load $class_name.");
    }
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
        $session = new Session();
        $session->logged_in($dbUser);
        header( 'Location: /public/admin/' );
    }
    elseif( $dbUser->login == $check_user->login &&
        $dbUser->role  == 'user' &&
        $dbUser->getHashedPassword() == $check_user->getHashedPassword()
    ){
        $session = new Session();
        $session->logged_in($dbUser);
        header( 'Location: /public/' );
    }
    else{

        header( 'Location: /public/login.php' );
    }

}
else{
        header( 'Location: /public/login.php' );
} // END Cheking if Button was Sabmit