<?php
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/check_student.php';
if (isset($_GET['page']))
{
    $include = $_GET['page'];
    switch ($include) {
        case 'registration' : include ('./template/edit.php'); break;
        case 'dashboard' : include ('./template/dashboard.php'); break;
        case 'list' : include_once('./scripts/list_action.php'); break;
        case 'inspect' : include ('./template/inspect.php'); break;
        default : die('Произошла ошибка: <b>Страница не найдена.</b>');
    }
}



