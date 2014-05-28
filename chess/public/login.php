<?php

/**
 * @author Offdark
 * @copyright 2014
 */

include '../includes/Session.class.php';
include '../includes/functions.php';

    if( $session->is_logged_in() && $session->role == 'admin'  ){

        header( 'Location: http://localhost/test/chess/public/admin/index.php' );
    }
    elseif( $session->is_logged_in() && $session->role == 'user' ){

        header( 'Location: http://localhost/test/chess/public/index.php' );
    }


    if( isset( $_POST['singIn'] ) && !empty( $_POST['loginName']) && !empty( $_POST['password']) ){ // START Cheking if Button was Sabmit

        $login_name      = trim( htmlspecialchars( $_POST['loginName'], ENT_QUOTES ) )            ?: null;
        $hashed_password = sha1(sha1(trim( htmlspecialchars( $_POST['password'], ENT_QUOTES ) ))) ?: null;

        $user = new User();
        $user->login( $login_name, $hashed_password );

        //Checking
            if( $user->login == $login_name &&
                $user->role  == 'admin' &&
                $user->hashed_password == $hashed_password
              ){
                
                    $session->logged_in($user);
                    header( 'Location: http://localhost/test/chess/public/admin/index.php' );
            }
            elseif( $user->login == $login_name &&
                    $user->role  == 'user' &&
                    $user->hashed_password == $hashed_password
                   ){
                    
                   
                        header( 'Location: http://localhost/test/chess/public/index.php' );
            }
            else{

                header( 'Location: http://localhost/test/chess/public/login.php' );
            
            }

    }
    else // END Cheking if Button was Sabmit
    include 'html/header.inc';
    
?>


<form action="login.php" method="POST" class="form" >
    <fieldset>

        <label>Username <span class="mark-red">*</span>
        <input id="Username" class="input" type="text" name="loginName" required />
        </label>

        <label>Password <span class="mark-red">*</span>
        <input id="Password" class="input" type="password" name="password" required />
        </label>

        <label>Prove you're not a robot <span class="mark-red">*</span>
		      <span class="math"><img src="" alt="" width="40" height="20" /></span>
		      <input id="LPIN" class="input" style="width: 310px;" type="text" name="LPIN" value="" />
        </label>
        <input type="submit" name="singIn" class="btn-form" value="Sign In"  />
        <a href="recover_password.php" class="link-forgot-password">Forgot Password?</a>

    </fieldset>
</form>

</body>
</html>

