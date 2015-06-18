<?php
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
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
        case 'registration' :
            $navbarEditClass = $navbarActive;
            include('./scripts/register.php'); break;
        case 'list' :
            $navbarListClass = $navbarActive;
            require_once ('./scripts/list_action.php'); break;
        case 'inspect' :
            $navbarInspectClass = $navbarActive;
            include ('./template/inspect.php'); break;
        default :
            header('Content-Type: text/html; charset=UTF-8');
            header("HTTP/1.0 404 Not Found");
            die('Произошла ошибка: <b>Страница не найдена.</b>');
    }
}
else {
    include 'template/main.php';
}




