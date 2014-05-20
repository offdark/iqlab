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

    if( isset($_POST['singIn']) ){ // START Cheking if Button was Sabmit 

        $login_name = ( !empty( $_POST['loginName']) ) ? trim( htmlspecialchars( $_POST['loginName'] ) ) : null;
        $password   = ( !empty( $_POST['password']) )  ? trim( htmlspecialchars( $_POST['password'] ) )  : null;
                
        $check_user = new User();
        $check_user->login = $login_name;
        $check_user->setPassword($password);
        
        
        $dbService = new MYSQLDatabase(); 
        $dbUser = $dbService->login($check_user);
        //Checking

            if( $dbUser->login  == $check_user->login &&
                $dbUser->role   == 'admin' &&
                $dbUserser->getHashedPassword() == $check_user->getHashedPassword()
              ){    
                
                  //  $session->logged_in($dbUser);
                    header( 'Location: http://http://localhost/test/chess/public/index.php' );
                             
            }elseif( $dbUser->login  == $check_user->login &&
                     $dbUser->role   == 'user' &&
                     $dbUser->getHashedPassword() == $check_user->getHashedPassword()
                   ){
                             
                     //   $session->logged_in($dbUser);
                        header( 'Location: http://localhost/' );   
                         
            }else{
                
                header( 'Location: http://localhost/' );
            }

    }else // END Cheking if Button was Sabmit 
    
?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

    <form action="" method="POST" class="login.php">
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
