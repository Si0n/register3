<?php
$local = '';
$localNot = '';
$male = '';
$female = '';
if ($student->getLocal() == $student::RESIDENCE_LOCAL)
{
    $local = 'checked';
} else {
    $localNot = 'checked';
}
if ($student->getSex() == $student::GENDER_FEMALE)
{
    $female = 'checked';
} else {
    $male = 'checked';
}
require 'template/edit.php';