<?php
require_once 'classLoader.php';
$page = new Ini();
$page->loadLibs();
$db = new StudentsMapper($pdo);
$search = isset($_GET['search'])   ? makeProtect( $_GET['search'] ) : '' ;
    $data = ($db->searchFromStudents($search));
include 'paginator.php';

