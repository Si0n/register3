<?php
class Image
{
    protected $maxImageSize = 200000;
    protected $imageWidth = 200;
    protected $imageHeight = 200;
    protected $imageRGB = 0xFFFFFF;
    protected $imageQuality = 95;
    public function isImageBroken($image)
    {
        $message = FALSE;
        $photo_errors = $image["error"];
        if ($photo_errors > 0)
        {
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
            case UPLOAD_ERR_NO_FILE:
                $message = " Файл не был загружен";
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
        }}
        if (!$message){
            $imageInfo = getimagesize($image['tmp_name']);
            if ((($imageInfo["mime"] != "image/gif") ||
                    ($imageInfo["mime"] != "image/jpeg") ||
                    ($imageInfo["mime"] != "image/pjpeg") ||
                    ($imageInfo["mime"] != "image/png")) &&
                ($image["size"] > $this->maxImageSize)
            ) //проверка расширения файла, и размера
            {
                $message = "Неподходящий формат или размер фотографии";
            }
        }
        return $message;
    }
    public function makeNewNameOfPhoto($ID)
    {
        $baseName = '-photo';
        $newName = $ID . $baseName . '.jpg';
        return $newName;
    }

    public function saveImage($image, $name)
    {
        $src = 'E:/OpenServer/domains/localhost/php/register3/upload/'. 'full-'.$name;
        $dest = 'E:/OpenServer/domains/localhost/php/register3/upload/'.'cr-'.$name;
       move_uploaded_file($image["tmp_name"], $src);
       if  ($this->img_resize($src, $dest, 200, 200))
       {
           return TRUE;
       } else return FALSE;
    }
    public function img_resize($src, $dest)
    {
        if (file_exists($src)) {
            $size = getimagesize($src);

            if ($size === FALSE)
            {
                return FALSE;
            }
            $extension = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
            $imageCreateFrom = "imagecreatefrom" . $extension;
            if (!function_exists($imageCreateFrom))
            {
                return FALSE;
            }

            $widthCompression = $this->imageWidth / $size[0];
            $heightCompression = $this->imageHeight / $size[1];

            $compression       = min($widthCompression, $heightCompression);
            $useWidthCompression = ($widthCompression == $compression);

            $newWidth   = $useWidthCompression  ? $this->imageWidth  : floor($size[0] * $compression);
            $newHeight  = !$useWidthCompression ? $this->imageHeight : floor($size[1] * $compression);
            $newLeftPosition    = $useWidthCompression  ? 0 : floor(($this->imageWidth - $newWidth) / 2);
            $newTopPosition = !$useWidthCompression ? 0 : floor(($this->imageHeight - $newHeight) / 2);

            $image =  $imageCreateFrom($src);

            $idest = imagecreatetruecolor($this->imageWidth, $this->imageHeight);
            imagefill($idest, 0, 0, $this->imageRGB);
            imagecopyresampled($idest, $image, $newLeftPosition, $newTopPosition, 0, 0,
                $newWidth, $newHeight, $size[0], $size[1]);
            imagejpeg($idest, $dest, $this->imageQuality);
            imagedestroy($image);
            imagedestroy($idest);
            return TRUE;
        } return FALSE;
    }

    public function showDefaultImage()
    {
        return 'default.png';
    }
}