<?php
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
if (isset($_POST['submit']))
{
    $loadedImage = $image->isImageBroken($_FILES['photo']);
    if ($loadedImage)
    {
        $errors[] = $loadedImage;
        header('Location: index.php?register=fail&ID=self');
    } else {
        $newPhotoName = $image->makeNewNameOfPhoto($student->getID());
        $student->savePhoto($newPhotoName);
        $image->saveImage($_FILES['photo'], $newPhotoName);
        $db->savePhoto($newPhotoName, $password);
        header('Location: index.php?register=ok&ID=self');
    }

}
