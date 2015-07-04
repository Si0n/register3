<?php
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
if (isset($_POST['submitPhoto']))
{
    $loadedImage = $image->isImageBroken($_FILES['photo']);
    if (!$loadedImage)
    {
        $newPhotoName = $image->makeNewNameOfPhoto($student->getID());
        if ($image->saveImage($_FILES['photo'], $newPhotoName))
        {
            $student->savePhoto($newPhotoName);
            $db->savePhoto($newPhotoName, $password);
        } else {
            $photoError = 'Ошибка при сохранении фотографии.';
        }
        $register = TRUE;
    } else {
        $photoError = $loadedImage;
    }

}
require 'inspect.php';