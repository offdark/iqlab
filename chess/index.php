<?php

/**
 * @author 
 * @copyright 2014
 */


    echo "hello<br>";
    $test = '123';



    echo "<br>" .sha1($test);;

?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
	
    <a href="public/login.php"> Sing in </a><br />
    <a href="public/add.php"> Sign up </a>
    
    <form action="process.php" method="post">
    Name: <input type="text" name="name"><br>
    E-mail: <input type="text" name="email"><br>
    <input type="submit">
    </form>

</body>
</html>
