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
 
    $user_id = 'test';

    if( $size > $limit_size ){

        echo "your file is too big";
    }
    else{

        if( in_array($type, $valid_extensions) ){

            $rand = rand( 1, 100000 );
            $location = save_img($user_id);
            $uploadfile = $location. '/' .basename($rand.$name);

             move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);

             thumbnail(save_img($user_id),$uploadfile,60);
             thumbnail(save_img($user_id),$uploadfile,160);

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

        return $folder_name;
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

            if( !empty($folder_check) ){

                return $folder_check;
            
            }else{

                foreach( glob( $path."/*" ) as $U ){

                    if( is_dir($U) ){

                        if( count( glob($U. "/*")) < 6 ){
                        
                            if( !is_dir($U. "/" .$user_id ) ){

                                create_folder($U. "/" .$user_id);
                                return create_folder($U. "/" .$user_id. "/1");
                        
                            }elseif( basename($U. "/" .$user_id) == '0' ){
                            

                            if( count( glob($path. "/*") ) < 6 ){
                            
                                if( !is_dir(++$U) ){ // if we dont have folder+1 we created it


                                    create_folder($U);
                                    create_folder( $U. "/" .$user_id );
                                    return create_folder( $U. "/" .$user_id. "/1" );

                                    //           echo "created new folder";
                                }
                            }else {   echo "we are done no more space in U directories: ";    }
                            
                          }
                    }
                    else{
                        
                        if( count( glob($path. "/*") ) < 6 ){
                            
                            if( !is_dir(++$U) ){ // if we dont have folder+1 we created it

                                create_folder($U);
                                create_folder( $U. "/" .$user_id );
                                return create_folder( $U. "/" .$user_id. "/1" );
                            }
                        }else {     echo "we are done no more space in U directories: ";    }
                    }
                    }
                }

                if( !is_dir(++$U) ){ // if we dont have folder+1 we created it

                    echo "creating new folder";
                    create_folder($U);
                    create_folder( $U. "/" .$user_id );
                    return create_folder( $U. "/" .$user_id. "/1" );

                    //           echo "created new folder";
                }
            }
    } // END OF function save_img


    function folder_check( $user_id, $folder_name ){

        foreach( glob($folder_name."/*") as $filename ){ // checking if folder_name is not empty

            if( is_dir($filename) ){ // cheking if filename is a dir

                if( is_dir($filename."/".$user_id)){

                    foreach( glob($filename. "/" .$user_id."/*") as $file ){
                        
                        if(is_dir($file)){
                            
                            if( count(glob($file."/*")) < 6 ){ //checking last folder from 1 - 255

                                return $file;
                         
                            }else{
                        
                                if( count( glob($filename. "/" .$user_id. "/*") ) < 6 ){

                                    if( !is_dir(++$file) ){ // if we dont have folder+1 we created it

                                        create_folder($file);
                                        return $file;
                                    }

                                 }else {  echo "<br>sory but no more space for user: " .$user_id;   }

                            }
                        }
                    }
                }
            } // cheking if filename is a dir END
        }  // checking if folder_name is not empty END
    } // END OF function folder_check


function thumbnail($directSave,$image,$width){ // уменьшаем изображение пропорционально в зависемости от нужной ширины

    $size      = getimagesize($image);
    $format    = substr(stristr($size['mime'],'/'),1);
    $creatfunc = "imagecreatefrom".$format;
    $src       = $creatfunc($image);
    $iw        = $size[0];
    $ih        = $size[1];
    $koe       = $iw/$width;
    $new_h     = ceil($ih/$koe);
    $dst       = imagecreatetruecolor($width,$new_h);

    ImageCopyResampled($dst, $src, 0, 0, 0, 0, $width, $new_h, $iw, $ih);

    $saveimg   = "image".$format;
    $nameimage = $directSave."/thumb_".$width."x".$new_h."_".substr(strrchr($image,'/'),1);
    $saveimg($dst,$nameimage);
    imagedestroy($src);

    return $nameimage;
}

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