<?php
$ID = isset($_GET['ID'])   ?  $_GET['ID'] : '' ;
if ($ID == '')
{
    $ID = $student->getID();
}
$profileByID = $db->findStudentByID($ID);
$include = 'inspect';