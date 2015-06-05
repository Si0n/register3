<?php
require './lib/ini.php';
//беру пароль с куки и достает студента который сохранен с этим паролем
$password = getCookie('password');
$db = new StudentsMapper($pdo);
if ($db->isPswrdInDB($password)) {
    $student = $db->isPswrdInDB($password);
    $headerMessage = "Доброе пожаловать $student->getName()!";
} else {
    $headerMessage = 'Вы ещё не зарегистрированы. Воспользуйтесь регистрацией.';
}
require './template/main.php';