<?php 

    include 'includes/functions.php';
    
     if(  empty($_SESSION['fileName']) || $_SESSION['fileName'] != 'secretQ.php' ){
         session_unset(); 
         header( 'Location: '. URL );
     }
 
    include 'html/header.inc';
    include 'html/welcome.inc';
    session_unset();