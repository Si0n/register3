<?php
// загрузка функций
require_once( 'functions.php');
//автолоадер классов
spl_autoload_register(function ($class) {
    include './lib/'.$class . '.php';
});
require_once 'PDO.php';

