<?php
$class2 = "active";
$class1 = "noactive";
$p =  isset($_GET['p'])   ? intval( $_GET['p'] ) : 1 ;
$offset = 4; //Количество результатов на страницу
$page = ($p -1) * $offset;
$search = isset($_GET['search'])   ?  $_GET['search'] : '' ;
if (isset($_GET['order']))
{
    $order = $_GET['order'];
} else {
    $order = 'ID';
}

$count = $db->getCountInDb($search);
$students = $db->searchFromStudents($order, $page, $search);
if ($count == 0)
{
    $tablePanelHeadingText = ' Нет совпадений в базе студентов.';
    $isSuccessfulSearch = FALSE;
} else {
    $tablePanelHeadingText = "Найдено студентов: $count";
    $isSuccessfulSearch = TRUE;
}
$numpages = ceil ($count/$offset);
require './template/list.php';