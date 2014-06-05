<div class="container-content">



    <form action="login.php" method="POST" class="form" >
        <fieldset>
            <?php if( isset($_SESSION['error'])): ?>  <span class="mark-red"> Username &/or Password wrong </span><?php unset($_SESSION['error']); endif; ?>
       <br />
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
            <a href="<?php echo URL; ?>?mod=recPass" class="link-forgot-password">Forgot Password?</a>
        </fieldset>
    </form>

</div>