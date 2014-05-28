<?php

/**
 * @author Offdark
 * @copyright 2014
 */

include '../includes/functions.php';

    if( isset( $_POST['singUp'] ) 
            && !empty( $_POST['login']) 
            && !empty( $_POST['email'])
            && !empty( $_POST['name'])
            && !empty( $_POST['password'])
            && !empty( $_POST['re_password']) ){ // START Cheking if Button was Sabmit

        $filds = new stdClass();

        $filds->login           = trim( htmlspecialchars( $_POST['login'], ENT_QUOTES ) );
        $filds->email           = trim( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) );
        $filds->realName        = trim( htmlspecialchars( $_POST['name'], ENT_QUOTES ) );
        $filds->hashed_password = sha1(sha1(trim( htmlspecialchars( $_POST['password'], ENT_QUOTES ) )));
        $re_password            = sha1(sha1(trim( htmlspecialchars( $_POST['re_password'], ENT_QUOTES ) )));

           if( $filds->hashed_password == $re_password ){

               $user = new User();

                if( $user->save( $filds ) ){
                   
                    $lastInsertId = $user->lastInsertId;
                    header( 'Location: generate_secretQ.php?id='.$lastInsertId );
                }
                else{
                    
                    echo "ups... such email or login alread taken ";
                }
             
           }
           else{
    
               echo "password not same";
           }
}
else

    include 'html/header.inc';
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<form action="add.php" method="POST" class="form" >
    <fieldset>

        <label>Login <span class="mark-red">*</span>
        <input id="Username" class="input" type="text" name="login" required /><br />
        </label>

        <label>E-mail <span class="mark-red">*</span>
        <input id="Password" class="input" type="email" name="email" required /><br />
        </label>

        <label>Name <span class="mark-red">*</span>
        <input id="Username" class="input" type="text" name="name" required /><br />
        </label>

        <label>Password <span class="mark-red">*</span>
        <input id="Password" class="input" type="password" name="password" required /><br />
        </label>

        <label>Repeat Password <span class="mark-red">*</span>
        <input id="Password" class="input" type="password" name="re_password" required /><br />
        </label>

        <input type="hidden" name="action" value="signIn">
        <input type="submit" name="singUp" class="btn-form" value="Sign Up" />

    </fieldset>
</form>

</body>
</html>