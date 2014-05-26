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
 
 

   echo $user->id;
       echo $user->email;
        echo $user->login;
        echo $user->status;
        echo $user->realName;
        echo $user->points;
        echo $user->created;
        echo $user->edited;
        echo $user->role;
        echo $user->hashed_password;