<div class="container-content">

    <form action="add.php" method="POST" class="form" >
        <fieldset>

            <?php if( isset($_SESSION['error'])){  echo '<span class="mark-red"> User with such Login &/or Email already exist </span>'; unset($_SESSION['error']);  } ?>
            <br />
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
                <input id="Password" class="input" type="password" name="password" required /><?php if( isset($_SESSION['pas_error'])){  echo '<span class="mark-red"> Password does not match </span>';  } ?><br />

            </label>

            <label>Repeat Password <span class="mark-red">*</span>
                <input id="Password" class="input" type="password" name="re_password" required /><?php if( isset($_SESSION['pas_error'])){  echo '<span class="mark-red"> Password does not match </span>'; unset($_SESSION['pas_error']);  } ?><br />

            </label>

            <input type="submit" name="singUp" class="btn-form" value="Sign Up" />

        </fieldset>
    </form>

</div>