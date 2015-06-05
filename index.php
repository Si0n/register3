<?php
$include =  isset($_GET['page'])   ? htmlspecialchars ( $_GET['page'], ENT_QUOTES) : '' ;
require './scripts/check_student.php';
switch ($include) {
    case 'registration' : include ('./template/register.php'); break;
    case 'dashboard' : include ('./template/dashboard.php'); break;
    case 'list' : include_once('./scripts/list_action.php'); break;
    case '' : continue;
}

if (isset($_GET['search'])) {
    include_once('./scripts/list_action.php');
}
