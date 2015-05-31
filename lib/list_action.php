<?php
include 'ini.php';
$db = new StudentsMapper($pdo);
$search = isset($_GET['search'])   ? makeProtect( $_GET['search'] ) : '' ;
$data = $db->searchFromStudents($search);
if (count($data) == 0)
{
   $text = ' <br> Нет совпадений в базе студентов.';
}
require 'paginator.php';
