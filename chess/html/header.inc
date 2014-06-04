<!DOCTYPE html>
<html>
<head>
<link href="<?php echo URL; ?>css/style.css" media="all" rel="stylesheet" type="text/css">
<meta charset="UTF-8">
</head>
<body>
    <div id="main">
        
        <div class="container-center">
        
            <div class="header-top">
                
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

            </div>

        </div>

        <div id="nav">
            <ul>
                <li><a  class="active" href="index.php">Головна</a></li>
                <li><a  href="">Мої результати</a></li>
                <li><a  href="">Мої активні партії</a></li>
                <li><a  href="">Гра</a></li>
                <li><a  href="">Всі результати</a></li>
            </ul>
        </div>