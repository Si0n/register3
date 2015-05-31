<?php
// загрузка функций
require_once(__DIR__ . './functions.php');
//автолоадер классов
spl_autoload_register(function ($class) {
    include $class . '.php';
});
// загрузка конфига pdo и создание экземпляра
require('config.php');
$pdo = new PDO($dsn, $user, $pass, $opt);

