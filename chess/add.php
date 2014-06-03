<?php

/**
 * @author Offdark
 * @copyright 2014
 */

    include 'includes/functions.php';
    $fileName = basename( $_SERVER['REQUEST_URI'], '?'. $_SERVER['QUERY_STRING'] );

    if( isset( $_POST['singUp'] ) ){ // START Cheking if Button was Sabmit

      if( $_POST['password'] == $_POST['re_password'] ){
                
                unset( $_POST['singUp']);
                unset( $_POST['re_password']);
                $_POST['hashed_password']  = sha1(sha1(trim( htmlspecialchars( $_POST['password'], ENT_QUOTES ) )));
                unset($_POST['password']);
                $user = new User();

                if( $user->add( $_POST ) ){
                   
                    $_SESSION['id'] = $user->lastInsertId;
                    $_SESSION['fileName'] = $fileName;
                    header( 'Location:'. URL .'secretQ.php' );
                }
                else{
                    
                    echo "ups... such email or login alread taken ";
                }
             
           }
           else{
                include 'html/header.inc';
               echo "password not same";
           }
}
else

    include 'html/header.inc';
?>
<div class="container-content">

    content


<form action="add.php" method="POST" class="form" >
    <fieldset>

        <label>Login <span class="mark-red">*</span>
        <input id="Username" class="input" type="text" name="login" required /><br />
        </label>

        <label>E-mail <span class="mark-red">*</span>
        <input id="Password" class="input" type="email" name="email" required /><br />
        </label>

        <label>Name <span class="mark-red">*</span>
        <input id="Username" class="input" type="text" name="realName" required /><br />
        </label>

        <label>Password <span class="mark-red">*</span>
        <input id="Password" class="input" type="password" name="password" required /><br />
        </label>

        <label>Repeat Password <span class="mark-red">*</span>
        <input id="Password" class="input" type="password" name="re_password" required /><br />
        </label>

        <input type="submit" name="singUp" class="btn-form" value="Sign Up" />

    </fieldset>
</form>

</div>

</body>
</html>