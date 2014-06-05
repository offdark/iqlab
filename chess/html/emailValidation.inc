<div class="container-content">


<form action="recPass_email.php" method="POST" class="form" >
    <fieldset>
        <?php if( isset($_SESSION['error'])): ?><span class="mark-red"> Wrong Email </span><?php unset($_SESSION['error']); endif; ?>
       <br />
        <label>Enter your Email <span class="mark-red">* </span><input type="email" name="email" class="input"  required /></label>
        <input type="submit" name="submit" class="btn-form" value="Submit" />

    </fieldset>
</form>

</div>