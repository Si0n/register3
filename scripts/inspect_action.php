<?php
$ID = isset($_GET['ID'])   ?  $_GET['ID'] : '' ;
if (isset($_GET['img']) && ((($_GET['img']) == IMAGE_FULL_SIZE) ||
    ($_GET['img'] == IMAGE_CRP_SIZE)))
{
    $img = $_GET['img'];
} else {
    $img = IMAGE_CRP_SIZE;
}

if ($ID == '')
{
    $ID = $student->getID();
}
$profileByID = $db->findStudentByID($ID);
