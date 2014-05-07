<?php


/**
 * ������� �������� $IshodnoeImage ��������� ��������� $ItogovoeImage
 * � ��������� ������������� ������� $maxShirina � ������� $maxVisota.
 *
 * @param string $IshodnoeImage
 * @param string $ItogovoeImage
 * @param int $maxShirina
 * @param int $maxVisota
 * @return boolean
 */
function sozdatMiniaturu($IshodnoeImage, $location, $maxShirina, $maxVisota) {
    
    $ItogovoeImage = $location. "/" .$maxShirina. "x" .$maxVisota. "_" .$IshodnoeImage;
    
    
    // ���������� ���������� � ���������� ��������:
    $VsyaInfaOKartinke = getImageSize($location. '/' .$IshodnoeImage);
 
    // �������� ������ ���� ��� ��������:
    switch ($VsyaInfaOKartinke[2]) :
        // ���� �������� PNG, GIF, JPEG:
        case IMAGETYPE_PNG:
            $TipIzobrageinya = 'png';
            break;
 
        case IMAGETYPE_GIF:
            $TipIzobrageinya = 'gif';
            break;
           
        case IMAGETYPE_JPEG:
            $TipIzobrageinya = 'jpeg';
            break;
           
        // ����������� ��� �����, �����������:   
        default:
            return false;
            break;
    endswitch;
 
    if (!function_exists('imagecreatefrom' . $TipIzobrageinya)) :
        return false;
    endif;
 
    // �������� ��������:
    $imgSrc = call_user_func('imagecreatefrom' . $TipIzobrageinya, $location. '/' .$IshodnoeImage);
 
    // ������ $ishodnyaShirina � $ishodnyaVisota ������ ������� � ������� ��������� Image:
    list($ishodnyaShirina, $ishodnyaVisota) = $VsyaInfaOKartinke;
 
    // ����������� ��������� �����������:
    if (($ishodnyaShirina > $maxShirina) || ($ishodnyaVisota > $maxVisota)) :
        if ($ishodnyaShirina > $ishodnyaVisota) :
            $proporcia = $maxShirina / $ishodnyaShirina;
        else :
            $proporcia = $maxVisota / $ishodnyaVisota;
        endif;
    else :
        $proporcia = 1;
    endif;
 
    $novayaShirina = round($ishodnyaShirina * $proporcia); // ������ �����
    $novayaVisota = round($ishodnyaVisota * $proporcia); // ������ �����
 
    // ���������� ����������� ����� ��������:
    $umenshennoeIzobragenie = imagecreatetruecolor($novayaShirina, $novayaVisota);
    // ��������������� ������ ������ �� ������������:
    ImageCopyResampled($umenshennoeIzobragenie, $imgSrc, 0, 0, 0, 0, $novayaShirina, $novayaVisota, $ishodnyaShirina, $ishodnyaVisota);
    // ��������� � $ItogovoeImage
    call_user_func_array('image' . $TipIzobrageinya, array($umenshennoeIzobragenie, $ItogovoeImage));
 
    return true;
}
 
