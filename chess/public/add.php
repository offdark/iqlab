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


    if( isset( $_POST['singUp'] ) ){ // START Cheking if Button was Sabmit

        $filds = new stdClass();

        $filds->login              = ( !empty( $_POST['login']) )       ? trim( htmlspecialchars( $_POST['login'], ENT_QUOTES ) )                   : null;
        $filds->email              = ( !empty( $_POST['email']) )       ? trim( filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) )              : null;
        $filds->realName           = ( !empty( $_POST['name']) )        ? trim( htmlspecialchars( $_POST['name'], ENT_QUOTES ) )                    : null;
        $filds->hashed_password    = ( !empty( $_POST['password']) )    ? sha1(sha1(trim( htmlspecialchars( $_POST['password'], ENT_QUOTES ) )))    : null;
        $filds->re_hashed_password = ( !empty( $_POST['re_password']) ) ? sha1(sha1(trim( htmlspecialchars( $_POST['re_password'], ENT_QUOTES ) ))) : null;

       if( $filds->hashed_password == $filds->re_hashed_password ){


           User::add( $filds );
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