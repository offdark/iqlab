<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 5/8/14
 * Time: 5:28 PM
 */
//Start session
session_start();

//Check whether the session variable SESS_MEMBER_ID is present or not
if(!isset( $_SESSION['username']) && !isset($_SESSION['password']) ) {

    header("location: index.php");
    exit();
}

include 'functions.php';

$valid_extensions = array( 'jpeg' => 'image/jpeg',
                            'png' => 'image/png',
                            'gif' => 'image/gif',
                            'pdf' => 'application/pdf',
                            'doc' => 'application/vnd.ms-word'
                         );

// Define file size limit
$limit_size = 30000000;


    $name = isset( $_FILES['userfile']['name'] ) ? htmlentities( $_FILES['userfile']['name'] ) : null;
    $type = isset( $_FILES['userfile']['type'] ) ? htmlentities( $_FILES['userfile']['type'] ) : null;
    $size = isset( $_FILES['userfile']['size'] ) ? $_FILES['userfile']['size']                 : null;


//CREATING FOLDER FOR FILES
$folder_name = 'base';

//DESTINATION
$uploadfile = $folder_name. '/' .basename($name);


    if( $size > $limit_size ){
        echo "your file is too big";
    }
    else{
      
        if( in_array($type, $valid_extensions) ){

            if ( is_dir($folder_name)  ) { //checking if base exist if not creating it

                if ( move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile ) ) {

                    echo "done";
                    add_element( $uploadfile, true );

                } else {

                    echo "didnt write to file!\n";
                }

            }else { mkdir( $folder_name ); move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile); add_element( $uploadfile, true ); }

        }else{

            echo "You didnt upload file or your img format is not allowed!!! <br> Allowed formats: doc, pdf, jpg, jpeg, png, gif";
        }

    }

if( isset($_GET['id']) ){
    
    unlink( $_GET['id'] );
    remove_element( $_GET['id'], false );
}

if( isset($_GET['reset_id']) ){
    
    remove_element( $_GET['reset_id'], true );
}

$count_elements = count(glob($folder_name. '/*'));

?>

<!DOCTYPE html>
<html>
<head>

    <script>
        function deleletconfig(){

            var del = confirm("Are you sure you want to delete this record?");
            return del;
        }
    </script>
    <script>
        function counter_reset(){

            var del = confirm("Are you sure you want to reset counter?");
            return del;
        }
    </script>
</head>

<body>
    <form enctype="multipart/form-data" action="admin.php" method="POST">
        <!--  MAX_FILE_SIZE -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
        Upload a file <input name="userfile" type="file" />
        <input type="submit" name="upload" value="Upload" />&nbsp;
    </form>
        <a href="logout.php"> Logout </a>

        <br/>   <br/>

<?php if( $count_elements != null ): ?>
    
    <table border="0" width="700" > <!-- START of TABLE -->

        <tr bgcolor="#9acd32">
            <th>Counter </th>
            <th>Name</th>
            <th>File</th>
            <th colspan="2">Edit</th>

        </tr>
        <form method="POST" action="admin.php">
    <?php $items = simplexml_load_file("counter.xml");  
 
            foreach($items as $item): ?>

        <tr>
            <td align="center"><?php  echo $item->counter; ?> </td>
            <td align="center"><?php  echo $item->attributes()->id ?> </td>
            <td align="center"><?php  echo '<img src="' .extension($item->attributes()->id). '" />'; ?> </td>
            <td align="center">
                <a href="admin.php?id=<?php echo $item->attributes()->id; ?>" onclick="return deleletconfig()"> Delete </a>
            </td>
            <td align="center">
                 <a href="admin.php?reset_id=<?php echo $item->attributes()->id; ?>" onclick="return counter_reset()"> Counter reset </a>
            </td>

        </tr>
        <?php   endforeach    ?>
        </form>
    </table> <!-- START of TABLE-->
</body>
</html>
<?php   endif;    ?>