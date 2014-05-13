<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/8/14
 * Time: 4:45 PM
 */
include 'functions.php';

if( isset($_GET['id']) ){

    $path = isset( $_GET['id'] ) ? htmlspecialchars($_GET['id']) : exit;
    
    if( download_file( $path ) ){
        
        add_element( $path, false );  
    }
}


?>
<!DOCTYPE html>
<html>
<head>

</head>

<body>
<br>

<form method="POST" action="process.php">

Username <input name="username"  type="text" required>&nbsp;
Password <input type="password" name="password" required>
<input type="submit"  name="add" value="Sign in" />
<input name="reset"  type="reset" value="Clear"/>

</form>

<?php   if( $count_elements = count( glob( 'base/*' ) ) != null ):   ?>

<table border="0" width="600" > <!-- START of TABLE -->

    <tr bgcolor="#9acd32">
        <th>Download times </th>
        <th>File</th>
        <th>Download</th>

    </tr>
    <br/>
    
    <form method="POST" action="index.php">
        
        <?php  $items = simplexml_load_file("counter.xml");  
 
            foreach($items as $item):  ?>
        
            <tr>
                <td align="center"><?php  echo $item->counter; ?></td>
                <td align="center"><?php  echo '<img src="' .extension($item->attributes()->id). '" />'; ?> </td>
                <td align="center"><a href="index.php?id=<?php echo $item->attributes()->id; ?>"> <?php  echo $item->attributes()->id; ?> </a></td>
            </tr>
        <?php   endforeach;   
                endif;      ?>


</body>
</html>
