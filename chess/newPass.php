<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/29/14
 * Time: 6:30 PM
 */ 
 
 include 'includes/functions.php';
 include 'html/header.inc';

    if( $_SESSION['fileName'] == 'secretQ.php' ){
        $new_password = $_SESSION['new_password'];
        session_unset();
    }
    else{   session_unset();  header( 'Location: login.php' );  }
 ?>
 
   <div class="container-content">

            <?php echo "your new password is: ". $new_password;
                    echo "<br> now you can log in using your new password =) "; ?>
       </div>

        <div class="container-footer">

            footer

        </div>

    </div>





</body>
</html>

 