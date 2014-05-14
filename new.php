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
 
 

if( $size > $limit_size ){
    echo "your file is too big";
}
else{
 if( in_array($type, $valid_extensions) ){
    
    $location = save_img( 'bbb' );
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



function create_folder( $folder_name, $time = true ){

    mkdir( $folder_name );

    if( $time == false ){

        $file_name = $folder_name. '/index.html';
        $open_file = fopen($file_name, 'w');
        $data = '<h1> sorry </h1>';
        fwrite( $open_file, $data );
        fclose( $open_file );

    }else{   copy( 'user_images/index.html', $folder_name. '/index.html');  }

}


    function save_img( $user_id ){

        $path = 'user_images';
		$save_path = $path.'/u0/'.$user_id.'/1';

        if( !file_exists($path) ){

            create_folder( $path, $time = false );
            create_folder( $path. "/u0" );
            create_folder( $path. "/u0/" .$user_id );
            create_folder( $save_path );
            return $save_path;

        }

        $folder_check = folder_check( $user_id, $path );
        echo $folder_check;

        if( !empty($folder_check) ){

            return $folder_check;
        }else{

            foreach( glob( $path."/*" ) as $U ){

                if( is_dir($U) ){

                    if( count( glob($U. "/*")) < 3){

                        echo "<br> still have space ";

                    }
                    else{

                        if( !is_dir(++$U) ){ // if we dont have folder+1 we created it

                            echo "creating new folder";
                            create_folder($U);
                            create_folder( "user_images/" .$U. "/" .$user_id );
                            $path = "user_images/" .$U. "/" .$user_id;
                            create_folder( $path. "/1" );
                            return $save_path;

                            //           echo "created new folder";
                        }

                    }

            }
        }

    }

    }

    function folder_check( $user_id, $folder_name ){
    //    echo "<br>function";
        
        foreach( glob($folder_name."/*") as $filename ){ // checking if folder_name is not empty

        //    echo '<br>'.$filename;
            if( is_dir($filename) ){ // cheking if filename is a dir
                      
           //     echo '<br> user_id: '.$user_id;

                if( is_dir($filename."/".$user_id)){
                    
            //      echo '<br>last if : ' .$filename."/".$user_id.'<br>';
                    $file = $filename."/".$user_id. "/".count(glob($filename."/".$user_id. "/*"));
                    echo '<br>'.$file;

                  if( count(glob($file."/*")) < 3){ //checking last folder from 1 - 255


                         echo '<br>inside if ' .$file;
                         return $file;
                         
                     }else{
                        
                        if( count( glob($filename. "/" .$user_id. "/*") ) < 3 ){
                            echo 'new folder';

                            if( !is_dir(++$file) ){ // if we dont have folder+1 we created it

                                create_folder($file);
                                return $file;
                                //           echo "created new folder";
                            }

                        }


                        }

                     }


                   }

                    
                }
            }


        

   

   $folder_name = 'user_images';
   
  folder_check( 'bbb', $folder_name );
   
   

?>
<!DOCTYPE html>
<html>
<head>


</head>

<body>


<form enctype="multipart/form-data" action="new.php" method="POST">
    <!--  MAX_FILE_SIZE -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
    Select a file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
</body>
</html>