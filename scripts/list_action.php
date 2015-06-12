<?php
$p =  isset($_GET['p'])   ? intval( $_GET['p'] ) : 1 ;
$offset = 2;
if ($p > 1)
{
    $page = $p * $offset -2;
} else {
    $page = 0;
}
$link_start = 'index.php?';
$search = isset($_GET['search'])   ?  $_GET['search'] : '' ;
if (isset($_GET['search']))
{

    $link = array('search' => $search,
                  'p' => 'replace');
    $tablePanelHeadingText = "Результаты поиска: {$search}. ";

} else {
    $link = array('page' => 'list',
                'p' => 'replace');
    $tablePanelHeadingText = 'Список студентов. ';
}

$count = $db->getCountInDb($search);
$students = $db->searchFromStudents($search, $page);
$pageLinker= $link_start . http_build_query($link);
if (count($students) == 0)
{
   $text = ' Нет совпадений в базе студентов.';
    $isSuccessfulSearch = FALSE;
} else {
    $text = "Найдено студентов: $count";
    $isSuccessfulSearch = TRUE;
}
$tablePanelHeadingText .= $text;
$numpages = ceil ($count/2);
require './template/list.php';