<ul class="user-link">

<li>
    <?php  if( !$login ){
        echo '<a class="sign-up" href="'. URL .'?mod=signUp">';
        echo "<span>Sign Up</span>";
    }
    else{
        echo '<a class="sign-up" href="">';
        echo "<span>Account</span>";
    }  ?>
    </a>
</li>
<li>

    <?php  if( !$login ){
        echo '<a class="sign-in" href="'. URL .'?mod=signIn">';
        echo " <span>Sign In</span>";
    }
    else{
        echo '<a class="sign-in" href="'. URL .'?mod=logOut">';
        echo " <span>Log out</span>";
    }  ?>
    </a>
</li>

</ul>