<?php
include './template/header.php';
include('./lib/check.php');
$include = $_GET['page'];
$incAction = $_GET['action'];
include './template/main.php';
switch ($include) :
    case 'registration' : include ('./template/register.php'); break;
    case 'dashboard' : include ('./template/dashboard.php'); break;
    case 'list' : include ('./lib/list_action.php'); break;
endswitch;
switch ($incAction) :
    case 'edit' : include './template/edit.php' ; break;
    case 'inspect' : include './template/inspect.php' ; break;

endswitch;
if (isset($_GET['search'])) {
    include('./lib/list_action.php');
}
