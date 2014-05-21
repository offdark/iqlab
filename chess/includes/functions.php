<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/21/14
 * Time: 5:04 PM
 */

function __autoload($class_name) {

    if( file_exists('../includes/' .$class_name. '.class.php') ) {
        require_once( '../includes/' .$class_name. '.class.php' );
    } else {
        throw new Exception("Unable to load $class_name.");
    }