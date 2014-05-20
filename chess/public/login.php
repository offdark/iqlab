<?php

/**
 * @author Offdark
 * @copyright 2014
 */


    if( isset($_POST['singIn']) ){ // START Cheking if Button was Sabmit 

        $login_name = ( !empty($_POST['loginName']) ) ? trim( htmlspecialchars($_POST['loginName']) ) : null;
        $password   = ( !empty($_POST['password']) )  ? trim( htmlspecialchars($_POST['password']) )  : null;
                
        $check_user = new User();
        $check_user->setLoginName($login_name);
        $check_user->setPassword($password);
        
        
        $dbService = new MYSQLDatabase(); 
        $user = $dbService->login($check_user);
        //Витягаємо всі поля користувача з БД

            if( $user->getLoginName()      == $check_user->getLoginName() && 
                $user->getHeshedPassword() == $check_user->getHeshedPassword() && 
                $user->getRole()           == 'admin'
              ){    
                
                    $session->logged_in($user);
                    header( 'Location: http://localhost/' );   
                             
            }elseif( $user->getLoginName()      == $check_user->getLoginName() &&
                     $user->getHeshedPassword() == $check_user->getHeshedPassword() && 
                     $user->getRole()           == 'user'
                   ){
                             
                        $session->logged_in($user);
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
		      <span class="math"><img src="?image_pin=yes&r=8448726659" alt="" width="40" height="20" /></span>
		      <input id="LPIN" class="" style="width: 310px;" type="text" name="LPIN" value="" placeholder="" /><br />								</span>
			
				<input type="hidden" name="action" value="signin">
				<input type="submit" name="singIn" class="btn-form" value="Sign In" style="width: 261px;" />
				<a href="recover.php" class="link-forgot-password">Forgot Password?</a>
						
		</fieldset>
    </form>
		
</body>
</html>
