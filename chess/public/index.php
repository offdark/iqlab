<?php

/**
 * @author Offdark
 * @copyright 2014
 */
 
 function __autoload($class_name) {

    if( file_exists('../includes/' .$class_name. '.class.php') ) {
        require_once( '../includes/' .$class_name. '.class.php' );
    } else {
        throw new Exception("Unable to load $class_name.");
    }
}
  $session = new Session();
 //include '../includes/Session.class.php';
 
    if( !$session->is_logged_in() ){ 
       
       $session->logout();
    } 
    else
 
 
 ?>
 
 
 
 <a href="logout.php"> logout </a>