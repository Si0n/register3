<?php
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
$class1 = "active";
$class2 = "noactive";
if (isset($_GET['page']) || isset($_GET['search']))
{
    if (isset($_GET['page']))
    {
        $include = $_GET['page'];
    }
    if (isset($_GET['search']))
    {
        $include = 'list';
    }
    switch ($include) {
        case 'registration' : include('./scripts/register.php'); break;
        case 'dashboard' : include ('./template/dashboard.php'); break;
        case 'list' :
            $class2 = "active";
            $class1 = "noactive";
            require_once ('./scripts/list_action.php'); break;
        case 'inspect' :include ('./template/inspect.php'); break;
        default :
            header('Content-Type: text/html; charset=UTF-8');
            header("HTTP/1.0 404 Not Found");
            die('Произошла ошибка: <b>Страница не найдена.</b>');
    }
}
else {
    $class1 = "noactive";
    $class2= "noactive";
    include 'template/main.php';
}




