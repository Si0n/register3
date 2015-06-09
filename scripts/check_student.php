<?php
require 'ini.php';
//беру пароль с куки и достает студента который сохранен с этим паролем
$db = new StudentsMapper($pdo);
if (isset($_COOKIE['password']))
{
    $password = $_COOKIE['password'];


if ($db->isPswrdInDB($password)) {
    $students = $db->isPswrdInDB($password);
    $student = $students[0];
    $headerMessage = "Доброе пожаловать, {$student->getName()}";

}
}

else {
    $headerMessage = 'Вы ещё не зарегистрированы. Воспользуйтесь регистрацией.';
}
require './template/main.php';
if (isset($_GET['search'])) {
    include_once('./scripts/list_action.php');
}
