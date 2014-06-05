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
                    <?php  if( !$session->is_logged_in() ): ?>
                        <a class="sign-up" href="<?php echo URL; ?>?mod=signUp">
                        <span>Sign Up</span>   
                    <?php else: ?>
                        <a class="sign-up" href="">
                        <span>Account</span>
                    <?php endif; ?>
                    </a>
                </li>
                <li>
                      <?php  if( !$session->is_logged_in() ): ?>
                        <a class="sign-in" href="<?php echo URL; ?>?mod=signIn">
                        <span>Sign In</span> 
                     <?php else: ?>
                        <a class="sign-in" href="<?php echo URL; ?>?mod=logOut">
                        <span>Log out</span>
                    <?php endif; ?>
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