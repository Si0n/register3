<?php
class ImageUploader {

public function checkImage($image){
    if ($image["photo"]["error"] == 4) { //фото не загружено, функция завершается с false
        return FALSE;
    }
    $photo = array();
        if ($image["photo"]["error"] > 0) //сохранить ошибку
        {
            $photo['error'] = "Ошибка загрузки: " . $image["photo"]["error"];
        }
        else
        {
            if ((($image["photo"]["type"] == "image/gif")
                    || ($image["photo"]["type"] == "image/jpeg")
                    || ($image["photo"]["type"] == "image/pjpeg")
                    || ($image["photo"]["type"] == "image/png")
                )
                && ($image["photo"]["size"] < 200000)) //проверка расширения файла, и размера
            {


                if (file_exists("upload/" . $image["photo"]["name"])) // проверка существования на сервере
                {
                    $photo['error'] = 'Это фото уже существует на сервере';
                }
                else
                {
                    $photo['name'] = $image["photo"]["name"]; //получаем имя файла
                }
            }
            else
            {
                $photo['error'] = "Неподходящий формат или размер фотографии";
            }}
   return $photo;
}
    public function saveImage($image)
    {
        move_uploaded_file($image["photo"]["tmp_name"],
            "upload/" . $image["photo"]["name"]);
    }
} 