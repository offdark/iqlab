<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/8/14
 * Time: 5:36 PM
 */

 session_start();
 session_destroy();
 header('Location: index.php');
exit;

?>