<?php
$p =  isset($_GET['p'])   ? htmlProtect( $_GET['p'] ) : 1 ;
$x = 2;
if ($p > 1)
{
    $page = $p * $x -2;
} else {
    $page = 0;
}

$search = isset($_GET['search'])   ? htmlProtect( $_GET['search'] ) : '' ;
if (isset($_GET['search']))
{
    $search = htmlProtect( $_GET['search'] );
    $link = "index.php?search=$search&amp;p=";
} else {
    $link = 'index.php?page=list&amp;p=';
}
$count = $db->getCountInDb($search);
$students = $db->searchFromStudents($search, $page);
if (count($students) == 0)
{
   $text = ' <br> Нет совпадений в базе студентов.';
}
$numpages = ceil ($count/2);
require './template/list.php';