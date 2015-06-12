<?php
// загрузка функций
require_once( 'functions.php');
require('config.php');
//автолоадер классов
spl_autoload_register(function ($class) {
    include './lib/'.$class . '.php';
});
$pdo = new PDO($dsn, $user, $pass, $opt);

//беру пароль с куки и достает студента который сохранен с этим паролем
$db = new StudentsMapper($pdo);
if (isset($_COOKIE['password']))
{
    $password = $_COOKIE['password'];


    if ($db->isPswrdInDB($password)) {
        $student = $db->isPswrdInDB($password)[0];
        $headerMessage = "Доброе пожаловать, {$student->getName()}";

    }
}

else {
    $headerMessage = 'Вы ещё не зарегистрированы. Воспользуйтесь регистрацией.';
}
if (isset($_GET['search'])) {
    include_once('./scripts/list_action.php');
}
