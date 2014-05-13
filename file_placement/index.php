    <!doctype html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <title>Save images</title>
        </head>
        <body>
            <form enctype='multipart/form-data' action='index.php' method='POST'>
                <input type="hidden" name="MAX_FILE_SIZE" value="30000000" />
                Select a file: <input name="file" type="file" />
                <input type='submit' value='Submit' name='send'>
            </form>
<?php

    include 'thumbnails.php';
    $max = 3; // limit

    $id_user = 'bbb';

    if(!(empty($_POST['send']))){
        if(stristr($_FILES['file']['type'],'/',true) != 'image')
            print "<script>alert('File is not picture !')</script>";
        else save_image( "id-".$id_user );
    }


function create_direct( $folder_name, $time = true ){

    mkdir( $folder_name );

    if( $time == false ){

        $file_name = $folder_name. '/index.html';
        $open_file = fopen($file_name, 'w');
        $data = '<h1> sorry </h1>';
        fwrite( $open_file, $data );
        fclose( $open_file );

    }else{   copy( 'user_images/index.html', $folder_name. '/index.html');  }

}

    function save_image($idUser){ // Сохраняем полученые изображения и уменьшеные копии
		$file = time().'.'.substr(strrchr($_FILES['file']['name'],'.'),1);
		$dirsave = save_folder($idUser);
		$uploadfile = $dirsave.'/'.$file;
		move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile);
		print "<p>You thumb image: <br><img alt='thumb image' src='".thumbnail(save_folder($idUser),$uploadfile,60)."'></p>";
	}
	
	function search_folder($idUser,$folder){ //ищем директорию пользователя если она есть и свободна для записи
		global $max;
		$dir_save = null;
		$dir = opendir($folder);
		while(($file = readdir($dir)) !== false){
			if($file != "." and $file != ".."){
				if(is_dir($folder.'/'.$file)){
					if( $file == $idUser){
						if((count(scandir($folder.'/'.$file.'/'.(count(scandir($folder.'/'.$file))-3)))-2) < $max){
							 $dir_save .= $folder.'/'.$idUser.'/'.(count(scandir($folder.'/'.$file))-3);
						}
						else{
							if((count(scandir($folder.'/'.$file))-2) < $max){
								create_direct($folder.'/'.$file.'/'.(count(scandir($folder.'/'.$file))-2));
								$dir_save .=  $folder.'/'.$file.'/'.(count(scandir($folder.'/'.$file))-3);
							}
						}
					}
					else{ 
						$dir_save .= search_folder( $idUser, $folder.'/'.$file);
					}
				}
			}
		}
		closedir($dir);
		return $dir_save;
	}
		
	function save_folder($idUser){ // выводим директорию для сохранения изображения
		global $max;

        $homeDir = './user_images';
		$saveDir = $homeDir.'/u0/'.$idUser.'/1';
		$alert = "<script>alert('Server folders overflow !')</script>";
		
		if(!(file_exists($homeDir))){ //проверяем создание первичных папок если нету создаем
			create_direct( $homeDir, $time = false );
			create_direct($homeDir.'/u0');
			create_direct($homeDir.'/u0/'.$idUser);
			create_direct($saveDir);
			return $saveDir;
		}
		else{ 
			$dir_save = search_folder($idUser,'.');
			if( !(empty($dir_save)) ) return $dir_save;  // проверяем есть ли в наличиеи папка пользоватиля и свободна ли она для записи
			else{
				$folder = opendir($homeDir); 
				while(($file = readdir($folder)) !== false){
					if($file != ".." and $file !="."){
						if(is_dir($homeDir.'/'.$file)){  
							if((count(scandir($homeDir.'/'.$file))-2) < $max){  // ищем доступную директорию 'U' для записи
								if(!(file_exists($homeDir.'/'.$file.'/'.$idUser))){ // если в ней уже есть папка пользователя значит она полная
									create_direct($homeDir.'/'.$file.'/'.$idUser);
									create_direct($homeDir.'/'.$file.'/'.$idUser.'/1');
									return $homeDir.'/'.$file.'/'.$idUser.'/1';
								}
								elseif((count(scandir($homeDir))-4) == substr($file,1)){ // если директория 'u' последняя создаем новую диреторию 'U' +1  и поддиректории 
									if((count(scandir($homeDir))-2) < $max){
										create_direct($homeDir.'/u'.(substr($file,1)+1));
										create_direct($homeDir.'/u'.(substr($file,1)+1).'/'.$idUser);
										create_direct($homeDir.'/u'.(substr($file,1)+1).'/'.$idUser.'/1');
										return $homeDir.'/u'.(substr($file,1)+1).'/'.$idUser.'/1';
									}
									else{
                                        print $alert;
                                        return;
                                    }
								}
							}
							else continue;
						}
					}
				}
				closedir($folder); 
				if((count(scandir($homeDir))-2) < $max){    // если нет дотупных директорий 'u' создаем
					create_direct($homeDir.'/u'.(count(scandir($homeDir))-3));
					create_direct($homeDir.'/u'.(count(scandir($homeDir))-4).'/'.$idUser);
					create_direct($homeDir.'/u'.(count(scandir($homeDir))-4).'/'.$idUser.'/1');
					return $homeDir.'/u'.(count(scandir($homeDir))-4).'/'.$idUser.'/1';
				}
                else{
                    print $alert;
                    return;
                }
			}
		}	
	}
	
	function thumbnail($directSave,$image,$width){ // уменьшаем изображение пропорционально в зависемости от нужной ширины
		$size = getimagesize($image);
		$format = substr(stristr($size['mime'],'/'),1);
		$creatfunc = "imagecreatefrom".$format;
		$src = $creatfunc($image);
        $iw = $size[0];
		$ih = $size[1];
		$koe = $iw/$width;
		$new_h = ceil($ih/$koe);
		$dst = imagecreatetruecolor($width,$new_h);
		ImageCopyResampled($dst, $src, 0, 0, 0, 0, $width, $new_h, $iw, $ih);
		$saveimg = "image".$format;
		$nameimage = $directSave."/thumb_".$width."x".$new_h."_".substr(strrchr($image,'/'),1);
		$saveimg($dst,$nameimage);
		imagedestroy($src);
		return $nameimage;
	}
	

?>
        </body>
    </html>