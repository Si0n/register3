<?php
require_once(__DIR__ . './functions.php');
$search = isset($_GET['search'])   ? makeProtect( $_GET['search'] ) : '' ;
$page =  isset($_GET['p'])   ? makeProtect( $_GET['p'] )   : 1 ;
$tablePanelHeadingText = 'Список уже зарегистрированных абитуриентов';
if ($search !== '')
{
    $currentURL = '?search={search}&amp;p={page}';
    $currentURL = str_replace('{search}', $search, $currentURL);
    $tablePanelHeadingText = 'Список студентов подходящих под параметры: '.$search;
}
else {
    $currentURL = '?page=list&amp;p={page}';
}
if (isset($text))
{
    $tablePanelHeadingText .= $text;
}
$nextPage = $page + 1;
$previousPage = $page - 1;
$firstPage = 1;
$countPerPage = 2;
$countStudents = count($data);
$pageCount = ceil( $countStudents / $countPerPage);
$noteNumber = $page * $countPerPage;
$k = $noteNumber - $countPerPage;
$firstURL = str_replace('{page}', $firstPage, $currentURL);
$lastURL = str_replace('{page}', $pageCount, $currentURL);
$previousURL = str_replace('{page}', $previousPage, $currentURL);
$nextURL = str_replace('{page}', $nextPage, $currentURL);
$curURL = str_replace('{page}', $page, $currentURL);
$per_page = 10;
require './template/list.php';