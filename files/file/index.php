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
 
 $user_id = 'kkk';


function create_folder( $folder_name, $time ){
          
      mkdir( $folder_name );
     
     if( $time == false ){
     
        $file_name = $folder_name. '/index.html';
        $open_file = fopen($file_name, 'w');
        $data = '<h1> sorry </h1>';
        fwrite( $open_file, $data );
        fclose( $open_file );
        
     }else{   copy( 'user_images/index.html', $folder_name. '/index.html');  }
     
}


    function checking_folder( $user_id, $folder, $time ){

        
            switch ($time) {
            case 0:
                create_folder( $folder, false );
                return image_tree( $user_id );
                break;
            case 1:
                create_folder( $folder, true );
                return image_tree( $user_id );
                break;
            case 2:
                create_folder( $folder, true );
                return image_tree( $user_id );
                break;
            case 3:
                create_folder( $folder, true );
                return image_tree( $user_id );
                break;
            default:
                return $type;
                break;
                                   
        }        

    }


    function image_tree( $user_id = 0, $i = 0, $j = 0 ){
        
        $user_images = 'user_images';
        
            if ( is_dir($user_images) ) { //checking if user_images
                      
                $u = $user_images. '/u'. $i; // i = NAME FROM 0 TO 255
                
                    if( is_dir($u) ){ //cheking if folder Ui exists
                        
                        if( count(glob($u. '/*')) < 3 ){
                            
                            
                            
                            if( is_dir( $u.'/'.$user_id ) ){ //cheking if user_id exists
                            
                              
                              if( count(glob($u.'/'.$user_id. '/*')) < 3 ){
                                
                            
                                $folder = $u. '/' .$user_id. '/' .$j; // j = NAME FROM 1 TO 255
                                
                                if( is_dir( $folder) ){ //cheking if folder from 1 - 255 exist 
                                
                                    
                                    if( $num_files_last = count(glob($folder. '/*')) < 3 ){
                                        
                                        echo "ok";
                                        return $user_images;
                                
                                     }else{ return image_tree( $user_id, $i, ++$j );   }
                                     
                                
                                 }else{ return checking_folder( $user_id, $folder, 3 );   }
                            
                            
                                }else{ echo 'your done'; }
                               
                               
                                
                            }else{ return checking_folder( $user_id, $u. '/' .$user_id, 2 );   }
                          
                          
                            
                        }else{ return image_tree( $user_id, ++$i );  }
                        
                    } //cheking if folder Ui exists END
                    else {  checking_folder( $user_id, $u, 1 );    }
    
            } //checking if user_images END
            else { checking_folder( $user_id, $user_images, 0 );    }
        
    }
    
    
    image_tree( $user_id );
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