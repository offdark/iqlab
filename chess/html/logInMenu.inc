<ul class="user-link">

<li>
    <?php  if( !$login ): ?>
        <a class="sign-up" href="<?php echo URL; ?>?mod=signUp">
        <span>Sign Up</span>   
    <?php else: ?>
        <a class="sign-up" href="">
        <span>Account</span>
    <?php endif; ?>
    </a>
</li>
<li>
      <?php  if( !$login ): ?>
        <a class="sign-in" href="<?php echo URL; ?>?mod=signIn">
        <span>Sign In</span> 
     <?php else: ?>
        <a class="sign-in" href="<?php echo URL; ?>?mod=logOut">
        <span>Log out</span>
    <?php endif; ?>
    </a>
</li>

</ul>