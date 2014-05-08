<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/8/14
 * Time: 4:45 PM
 */


?>
<!DOCTYPE html>
<html>
<head>

</head>

<body>
<br>

<form method="POST" action="process.php">

Username <input name="username"  type="text" required>
Password <input type="password" name="password" required>
<input type="submit"  name="add" value="Sign in" />
<input name="reset"  type="reset" value="Clear"/>

</form>


<table border="0" width="600" > <!-- START of TABLE -->

    <tr bgcolor="#9acd32">
        <th>Name</th>
        <th>File</th>

    </tr>
    <br/>
    
    <form method="POST" action="admin.php">
        <?php $images = glob("base/*");

        foreach($images as $image): ?>

            <tr>
                <td align="center"><?php  echo $images[0]; ?> </td>
                <td align="center"><?php  echo '<img src="'.$image.'" />' ?> </td>
                <td align="center">
                </td>

            </tr>
        <?php   endforeach    ?>


</body>
</html>
