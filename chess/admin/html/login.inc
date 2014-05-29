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