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
                        <a class="sign-up" href="<?php echo URL; ?>">
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
        
        
        
        			<div class="container-content">

							<div class="users-block">
								<div class="content-heading">
									<h2>Interest last 10 days</h2>
									<a class="link-ico" style="margin: 9px 3px 0 0;"><img src="images/ico54.png" width="21" height="19" alt="image description" /></a>
								</div>
								<div class="inner-content">
									<div class="scroll-pane-hold">
										<div class="scroll-pane">
											<table class="general-table">
												<tbody>
												    <tr>
															<td class="col01">Monday 09, Jun</td>
															<td class="col02">3.1%</td>
														</tr><tr>
															<td class="col01">Sunday 08, Jun</td>
															<td class="col02">1.0%</td>
														</tr><tr>
															<td class="col01">Saturday 07, Jun</td>
															<td class="col02">1.0%</td>
														</tr><tr>
															<td class="col01">Friday 06, Jun</td>
															<td class="col02">3.0%</td>
														</tr><tr>
															<td class="col01">Thursday 05, Jun</td>
															<td class="col02">2.7%</td>
														</tr><tr>
															<td class="col01">Wednesday 04, Jun</td>
															<td class="col02">2.4%</td>
														</tr><tr>
															<td class="col01">Tuesday 03, Jun</td>
															<td class="col02">2.0%</td>
														</tr><tr>
															<td class="col01">Monday 02, Jun</td>
															<td class="col02">3.3%</td>
														</tr><tr>
															<td class="col01">Sunday 01, Jun</td>
															<td class="col02">1.0%</td>
														</tr><tr>
															<td class="col01">Saturday 31, May</td>
															<td class="col02">1.0%</td>
														</tr>												</tbody>
											</table>
										</div>
										<div class="row-bottom">
											<span class="date">Saturday, Sunday  </span>
											<span class="info">non-trading days: 1%</span>
										</div>
									</div>
								</div>
							</div>
                            	<div class="games-block">
								<div class="content-heading">
									<h2>Interest last 10 days</h2>
									<a class="link-ico" style="margin: 9px 3px 0 0;"><img src="images/ico54.png" width="21" height="19" alt="image description" /></a>
								</div>
								<div class="inner-content">
									<div class="scroll-pane-hold">
										<div class="scroll-pane">
											<table class="general-table">
												<tbody>
												    <tr>
															<td class="col01">Monday 09, Jun</td>
															<td class="col02">3.1%</td>
														</tr><tr>
															<td class="col01">Sunday 08, Jun</td>
															<td class="col02">1.0%</td>
														</tr><tr>
															<td class="col01">Saturday 07, Jun</td>
															<td class="col02">1.0%</td>
														</tr><tr>
															<td class="col01">Friday 06, Jun</td>
															<td class="col02">3.0%</td>
														</tr><tr>
															<td class="col01">Thursday 05, Jun</td>
															<td class="col02">2.7%</td>
														</tr><tr>
															<td class="col01">Wednesday 04, Jun</td>
															<td class="col02">2.4%</td>
														</tr><tr>
															<td class="col01">Tuesday 03, Jun</td>
															<td class="col02">2.0%</td>
														</tr><tr>
															<td class="col01">Monday 02, Jun</td>
															<td class="col02">3.3%</td>
														</tr><tr>
															<td class="col01">Sunday 01, Jun</td>
															<td class="col02">1.0%</td>
														</tr><tr>
															<td class="col01">Saturday 31, May</td>
															<td class="col02">1.0%</td>
														</tr>												</tbody>
											</table>
										</div>
										<div class="row-bottom">
											<span class="date">Saturday, Sunday  </span>
											<span class="info">non-trading days: 1%</span>
										</div>
									</div>
								</div>
							</div>
       
         </div>
        
</div>