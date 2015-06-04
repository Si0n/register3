<?php
class Page
{
protected $page;
protected $perPage;
protected $total;
protected $link;

public function __construct($page, $perPage, $total)
{
$this->page = $page;
$this->perPage = $perPage;
$this->total = $total;
}
public function setLinkTemplate($link)
{
$this->link = $link;

}
public function getPagination()
{



}
}
/*
include 'ini.php';
$db = new StudentsMapper($pdo);
$p =  isset($_GET['p'])   ? makeProtect( $_GET['p'] ) : 0 ;
$x = 2;
if ($p > 1)
{
    $page = $p * $x -2;
} else {
    $page = 0;
}

$search = isset($_GET['search'])   ? makeProtect( $_GET['search'] ) : '' ;

$count = $db->getCountInDb($search);
$data = $db->searchFromStudents($search, $page);
if (count($data) == 0)
{
    $text = ' <br> Нет совпадений в базе студентов.';
}
$numpages = ceil ($count/2);
require './template/list.php'; */