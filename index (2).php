<?php
/*
$num_files = count(glob('user_images/*'));



$uploadfile = $link . basename($_FILES['userfile']['name']);


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "good.\n";
} else {
    echo "not good!\n";
}

$user = 'mike';
 **/



function save_image($user_id=0){

    $user_images = 'user_images';


    if ( is_dir($user_images) ) { //checking if user_images

        for( $i = 0; $i <= 3; $i++ ){ //START FIRST FOR
            $u = $user_images. '/u'. $i; // creating folder U0

            if( is_dir($u) ){ //cheking if folder Ui exists

                if( $num_files = count(glob($u. '/*')) < 3 ){

                        if( is_dir($u.'/'.$user_id )){

                          x:  for( $j = 1; $j <= 3; $j++ ){ //START SECOND FOR
                                $folder = $u. '/' .$user_id. '/' .$j; // NAME FROM 0 TO 255

                                if( is_dir( $folder) ){

                                    if( $num_files_last = count(glob($folder. '/*')) < 3 ){

                                        echo "fuck";
                                        return;

                                    }
                                } else{
                                    mkdir( $folder );
                                    $file_name = $folder. '/index.html';
                                    $open_file = fopen($file_name, 'w');
                                    $data = '<h1> fuck you </h1>';
                                    fwrite( $open_file, $data );
                                    fclose( $open_file );
                                    --$j;

                                }
                            } //END SECOND FOR
                        } else {
                            mkdir( $u. '/'. $user_id );
                            $file_name = $u. '/' .$user_id. '/index.html';
                            $open_file = fopen($file_name, 'w');
                            $data = '<h1> fuck you </h1>';
                            fwrite( $open_file, $data );
                            fclose( $open_file );
                                goto x;

                        }

                }

            } else {
                mkdir( $u );
                $file_name = $u. '/index.html';
                $open_file = fopen($file_name, 'w');
                $data = '<h1> fuck you </h1>';
                fwrite( $open_file, $data );
                fclose( $open_file );
                   --$i;
            }
        }//END FIRST FOR


    } else {
        mkdir( $user_images );
        $file_name = $user_images. '/index.html';
        $open_file = fopen($file_name, 'w');
        $data = '<h1> fuck you </h1>';
        fwrite( $open_file, $data );
        fclose( $open_file );
            return save_image();

    }

}
$stas = 'iii';
save_image($stas);


?>
<!DOCTYPE html>
<html>
<head>


</head>

<body>


<form enctype="multipart/form-data" action="index.php" method="POST">
    <!--  MAX_FILE_SIZE -->
    <input type="hidden" name="MAX_FILE_SIZE" value="300000000" />

    Select a file: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
</body>
</html>