<?php
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
    switch ($include) {
        case 'registration' :
            include('./template/edit.php'); break;
        case 'inspect' :
            require 'template/inspect.php'; break;
        case 'list' :
            require_once ('./scripts/list_action.php'); break;
        case 'main' :
            include 'template/main.php'; break;
        default :
            header('Content-Type: text/html; charset=UTF-8');
            header("HTTP/1.0 404 Not Found");
            die('Произошла ошибка: <b>Страница не найдена.</b>');
    }