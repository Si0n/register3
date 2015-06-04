<?php
include 'ini.php';
$db = new StudentsMapper($pdo);
$p =  isset($_GET['p'])   ? makeProtect( $_GET['p'] ) : 1 ;
$x = 2;
if ($p > 1)
{
    $page = $p * $x -2;
} else {
    $page = 0;
}

$search = isset($_GET['search'])   ? makeProtect( $_GET['search'] ) : '' ;

$count = $db->getCountInDb($search);
$students = $db->searchFromStudents($search, $page);
if (count($students) == 0)
{
   $text = ' <br> Нет совпадений в базе студентов.';
}
$numpages = ceil ($count/2);
require './template/list.php';