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

        $login_name      = ( !empty( $_POST['loginName']) ) ? trim( htmlspecialchars( $_POST['loginName'], ENT_QUOTES ) ) : null;
        $hashed_password = ( !empty( $_POST['password']) )  ? sha1(sha1(trim( htmlspecialchars( $_POST['password'], ENT_QUOTES ) )))  : null;

        $user = new User();
        $user->login( $login_name, $hashed_password );

        //Checking
            if( $user->login == $login_name &&
                $user->role  == 'admin' &&
                $user->getHashedPassword() == $hashed_password
              ){
                
                    $session->logged_in($user);
                    header( 'Location: http://localhost/test/chess/public/admin/index.php' );
            }
            elseif( $user->login == $login_name &&
                    $user->role  == 'user' &&
                    $user->getHashedPassword() == $hashed_password
                   ){
                    
                        header( 'Location: http://localhost/test/chess/public/index.php' );
            }
            else{

                header( 'Location: http://localhost/test/chess/public/login.php' );
            
            }

    }
    else // END Cheking if Button was Sabmit
    
?>
      <!DOCTYPE html>
<html>
<head>

</head>
<body>

<form action="login.php" method="POST" >
    <fieldset>

        <label>Username <span class="mark-red">*</span></label>
        <span class="input"><input id="Username" class="" style="" type="text" name="loginName" value="" placeholder="" /></span><br />

        <label>Password <span class="mark-red">*</span></label>
        <span class="input"><input id="Password" class="" style="" type="password" name="password" value="" placeholder="" /></span><br />

        <label>Prove you're not a robot <span class="mark-red">*</span></label>
		      <span class="input">
		      <span class="math"><img src="" alt="" width="40" height="20" /></span>
		      <input id="LPIN" class="" style="width: 310px;" type="text" name="LPIN" value="" placeholder="" /><br /></span>

        <input type="hidden" name="action" value="signin">
        <input type="submit" name="singIn" class="btn-form" value="Sign In" style="width: 261px;" />
        <a href="recover.php" class="link-forgot-password">Forgot Password?</a>

    </fieldset>
</form>

</body>
</html>

