<?php


$link = 'user_images/u0/mike/';

$uploadfile = $link . basename($_FILES['userfile']['name']);


if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "���� ��������� � ��� ������� ��������.\n";
} else {
    echo "��������� ����� � ������� �������� ��������!\n";
}

 print_r($_FILES);
$user = 'mike';




function create_folders( $user_id, $flag ){

$u_id        = 0;
$folder_id   = 0;

$user_images = 'user_images';
$u           = $user_images.'/u'.$u_id;
$id_user     = $u.'/'.$user_id;
$folder_id   = $id_user. '/' .$folder_id;


    switch ($flag) {
        case 0:
        
             mkdir($user_images);
          
        case 1:
        
             mkdir($u);
            
        case 2:
        
            mkdir($id_user);
            
        case 3:
        
            mkdir($folder_id);
            break;
        default:
            echo "x �� ����� 0, 1 ��� 2";
    }

}

if ( is_dir($user_images) ) { //checking if folder exist

    echo "The file $user_images exists";

    if( is_dir($u) ){ // U0 folder

        echo "folder UO exists";

        if( is_dir($id_user) ){ // ID_USER folder

            echo $id_user;

            //todo algoritm

        }
        else{
            mkdir($id_user);
        }
    }
    else{
       mkdir($u);
    }

} else {
    mkdir($user_images);
}
$num_files = count(glob('user_images/u0/*'));
    
    if( $num_files >= 4 ){
            
            // mkdir('user_images/u1');
        
        //todo create function with saving inf into
    }

echo $num_files;
?>
<!DOCTYPE html>
<html>
<head>


</head>

<body>

<!-- ��� ����������� ������, enctype, ������ ���� ������ ������ ��� -->
<form enctype="multipart/form-data" action="index.php" method="POST">
    <!-- ���� MAX_FILE_SIZE ������ ���� ������� �� ���� �������� ����� -->
    <input type="hidden" name="MAX_FILE_SIZE" value="300000000" />
    <!-- �������� �������� input ���������� ��� � ������� $_FILES -->
    ��������� ���� ����: <input name="userfile" type="file" />
    <input type="submit" value="Send File" />
</form>
</body>
</html>