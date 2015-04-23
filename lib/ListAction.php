<?php
$page = new Ini();
$page->loadLibs();
$db = new StudentsMapper($pdo);
$search = isset($_GET['search'])   ? makeProtect( $_GET['search'] ) : '' ;
paginator($db->searchFromStudents($search));
