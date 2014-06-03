<?php

function __autoload($class_name) {

    if( file_exists('../includes/' .$class_name. '.class.php') ) {
        require_once( '../includes/' .$class_name. '.class.php' );
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}

    $login_name = 'admin';
    $hashed_password = sha1(sha1('123'));

 $user = new User();
 $user->login( $login_name, $hashed_password );


    $filds = new stdClass();

    $filds->email           = 'change@121212.com';
    $filds->realName        = 'foo';

    $filds = array ('email' => 'best', 'realname' => 'try');
    $id = array('id' => 59);

   

    MYSQLDb::update( $filds, 'user', $id );