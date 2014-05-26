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
    
                if( User::add( $filds ) ){
                    
                     header( 'Location: secretQ.php' );
                }
                else{
                    
                    echo "ups... such email or login alread taken ";
                }
             
           }
           else{
    
               echo "password not same";
           }
}else

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

<form action="add.php" method="POST" >
    <fieldset>

        <label>Login <span class="mark-red">*</span></label>
        <span class="input"><input id="Username" type="text" name="login" value="" placeholder="" /></span><br />

        <label>E-mail <span class="mark-red">*</span></label>
        <span class="input"><input id="Password" class="" type="email" name="email" value="" placeholder="" /></span><br />

        <label>Name <span class="mark-red">*</span></label>
        <span class="input"><input id="Username" class="" style="" type="text" name="name" value="" placeholder="" /></span><br />

        <label>Password <span class="mark-red">*</span></label>
        <span class="input"><input id="Password" class="" style="" type="password" name="password" value="" placeholder="" /></span><br />

        <label>Repeat Password <span class="mark-red">*</span></label>
        <span class="input"><input id="Password" class="" style="" type="password" name="re_password" value="" placeholder="" /></span><br />

        <input type="hidden" name="action" value="signin">
        <input type="submit" name="singUp" class="btn-form" value="Sign Up" style="width: 261px;" />

    </fieldset>
</form>

</body>
</html>