<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/8/14
 * Time: 4:49 PM
 */
session_start();

$admin_name = 'admin';
$admin_pass = '123';

$usernmae = isset( $_POST['username'] ) ? htmlentities( $_POST['username'] ) : null;
$password = isset( $_POST['password'] ) ? htmlentities( $_POST['password'] ) : null;

    if( $usernmae != $admin_name && $password != $admin_pass  ){

        header("Location:index.php");

    }else{

    session_regenerate_id();
    $_SESSION['name']     = $username;
    $_SESSION['password'] = $password;

    header("Location:admin.php");

    }







