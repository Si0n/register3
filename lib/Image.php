<?php
class Image
{
    public function isImageBroken($image)
    {
        if ($image["error"] == UPLOAD_ERR_NO_FILE) { //фото не загружено, функция завершается с false
            return FALSE;
        }
        if ($image["error"] != UPLOAD_ERR_OK) //сохранить ошибку
        {
            $photo_errors = $image["error"];
            switch ($photo_errors) {
                case UPLOAD_ERR_INI_SIZE:
                    $message = "Размер принятого файла превысил максимально допустимый размер";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $message = "Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $message = "Загружаемый файл был получен только частично";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $message = "Отсутствует временная папка";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $message = "Не удалось записать файл на диск";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $message = "PHP-расширение остановило загрузку файла. PHP не предоставляет способа определить какое расширение остановило загрузку файла";
                    break;

                default:
                    $message = "Unknown upload error";
                    break;


            }
            return $message;
        } else {
            $imageInfo = getimagesize($image['tmp_name']);
            if ((($imageInfo["mime"] != "image/gif") || ($image["photo"]["type"] != "image/jpeg") || ($image["photo"]["type"] != "image/pjpeg") || ($image["photo"]["type"] != "image/png")) && ($image["size"] > 200000)) //проверка расширения файла, и размера
            {
                return "Неподходящий формат или размер фотографии";

            }
        }
        return FALSE;
    }

    public function makeNewNameOfPhoto($ID)
    {
        $baseName = '-photo-';
        do {
            $randomNumber = mt_rand(100000, 999999);
        }
        while (file_exists("upload/" . $ID . $baseName . $randomNumber. '.jpg'));// проверка существования на сервере
        $newName = $ID . $baseName . $randomNumber. '.jpg';
        return $newName;
    }

    public function saveImage($image, $name)
    {
        $src = 'upload/'. $name;
        $dest = 'upload/'.'cr-'.$name;
       move_uploaded_file($image["tmp_name"], $src);
        $this->img_resize($src, $dest, 200, 200);
    }
    public function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=95)
    {
        if (!file_exists($src)) return false;

        $size = getimagesize($src);

        if ($size === false) return false;
        $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
        $icfunc = "imagecreatefrom" . $format;
        if (!function_exists($icfunc)) return false;

        $x_ratio = $width / $size[0];
        $y_ratio = $height / $size[1];

        $ratio       = min($x_ratio, $y_ratio);
        $use_x_ratio = ($x_ratio == $ratio);

        $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
        $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
        $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
        $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);

        $isrc =  $icfunc($src);

        $idest = imagecreatetruecolor($width, $height);

        imagefill($idest, 0, 0, $rgb);
        imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
            $new_width, $new_height, $size[0], $size[1]);
        imagejpeg($idest, $dest, $quality);
        imagedestroy($isrc);
        imagedestroy($idest);
        return true;
    }















    public function showDefaultImage()
    {
        return 'default.png';
    }
}