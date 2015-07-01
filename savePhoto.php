<?php
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
if (isset($_POST['submit']))
{
if ($_FILES['photo']['size'] > 0)
{
    $loadedImage = $image->isImageBroken($_FILES['photo']);
    if (!$loadedImage)
    {
        $newPhotoName = $image->makeNewNameOfPhoto($student->getID());
        if ($image->saveImage($_FILES['photo'], $newPhotoName))
        {
            $student->savePhoto($newPhotoName);
            $db->savePhoto($newPhotoName, $password);
            header('Location: inspect.php?register=ok');
            exit();
        }
    }
}
    header('Location: inspect.php?register=fail');
    exit();

} else {
    header('Location: inspect.php');
    exit();
}
