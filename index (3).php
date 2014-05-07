<?php
// Define permitted image extensions
$valid_extensions = array( 'jpeg' => 'image/jpeg',
                            'png' => 'image/png', 
                             'gif' => 'image/gif', 
                         );

// Define file size limit 
$limit_size = 30000000;

$name    = isset( $_FILES['userfile']['name'] )    ? htmlentities( $_FILES['userfile']['name'] )    : null;
$type    = isset( $_FILES['userfile']['type'] )    ? htmlentities( $_FILES['userfile']['type'] )    : null;
$size    = isset( $_FILES['userfile']['size'] )    ? $_FILES['userfile']['size']                    : null;
//$user_id = isset( $_FILES['userfile']['user_id'] ) ? htmlentities( $_FILES['userfile']['user_id'] ) : 0;
 
 $user_id = 'rrr';

if( $size > $limit_size ){
    echo "your file is too big";
}
else{
 if( in_array($type, $valid_extensions) ){
    
    $location = image_tree( $user_id );
    $uploadfile = $location. '/' .basename($name);
     
    if ( move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile) ) {
            
        include 'thumbnails.php';
            
            if ( sozdatMiniaturu( $name, $location, 250, 250 ) )
                echo "file saved";
            else
                echo "ups...";
            
    } else {
    
        echo "didnt write to file!\n";
    }
    
 }else{
    
    echo "You didnt upload file or your img format is not allowed!!! <br> Allowed formats: jpg, jpeg, png, gif";
 }
 
}

function create_folder( $folder_name, $files_count = null,  $param = null ){



    if( $param == true ){

        mkdir( $folder_name );
        $file_name = $folder_name. '/index.html';
        $open_file = fopen($file_name, 'w');
        $data = '<h1> sorry </h1>';
        fwrite( $open_file, $data );
        fclose( $open_file );
    }
    elseif( $param == null ){
        $x = loops($files_count);
        mkdir( $folder_name.$x );

    }
}

function loops( $i ){


    while( $i < 3){

       $i++;
        break;
    }
    return $i++;

}


    function image_tree( $user_id = 0 ){
        
        $user_images = 'user_images';
        
        if ( is_dir($user_images) ) { //checking if user_images

            $num_files = count(glob($user_images. '/*'));

            echo $num_files;
            $u = $user_images. '/u'; // i = NAME FROM 0 TO 255

            if( is_dir($u) ){ //cheking if folder Ui exists

                if( count(glob($user_images. '/'. $u .'/*')) < 3 ){ //cheking if folder Ui exists

                    return $u;

                } //cheking if folder Ui exists END
                else {  create_folder( $u, $num_files, $param = null );  }


            } //cheking if folder Ui exists END
            else {  create_folder($u); return image_tree();  }
        } //checking if user_images END
        else {  create_folder( $user_images );  return image_tree();    }
    }
?>
<!DOCTYPE html>
<html>
<head>

</head>

<body>


<form enctype="multipart/form-data" action="index.php" method="POST">
    <!--  MAX_FILE_SIZE -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
    Select a file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
</body>
</html>