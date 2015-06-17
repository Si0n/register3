<?php
// загрузка функций
require_once('functions.php');
require('config.php');
//автолоадер классов
spl_autoload_register(function($class)
{
    if (file_exists('./lib/' . $class . '.php')) {
        include './lib/' . $class . '.php';
    }
});
$pdo  = new PDO($dsn, $user, $pass, $opt);
$studentValidator = new StudentValidator(); // data mapper(проверка данных при регистрации)
//беру пароль с куки и достает студента который сохранен с этим паролем
$db   = new StudentsMapper($pdo);
if (isset($_COOKIE['password'])) {
    $password = $_COOKIE['password'];
    if ($db->getStudentFromDB($password)) {
        $student       = $db->getStudentFromDB($password);
        $headerMessage = "Доброе пожаловать, {$student->getName()}";
    }
} else {
    $headerMessage = 'Вы ещё не зарегистрированы. Воспользуйтесь регистрацией.';
    $student = new Student();
    $student->setFields();
}
if (isset($_GET['search'])) {
    include_once('./scripts/list_action.php');
}
