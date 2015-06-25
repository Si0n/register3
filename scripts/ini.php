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
$studentValidator = new StudentValidator();
$db   = new StudentsMapper($pdo);
if (isset($_COOKIE['password'])) {
    $password = $_COOKIE['password'];
    if ($db->inspectStudentByPassword($password)) {
        $student       = $db->inspectStudentByPassword($password);
        $headerMessage = "Добро пожаловать, {$student->getName()}";
    }
} else {
    $headerMessage = 'Вы ещё не зарегистрированы. Воспользуйтесь регистрацией.';
    $student = new Student();
    $student->setFieldsWithWhiteSpaces();
    $password = '';
}
$successfulRegister = FALSE;
if (isset($_GET['register']))
{
    if ($_GET['register']== 'ok')
    {
        $successfulRegister = 'Вы успешно сохранили Ваши данные.';
    }
}

$include = isset($_GET['page'])   ?  $_GET['page'] : 'main' ;
$ID = isset($_GET['ID'])   ?  $_GET['ID'] : '' ;
if ($ID != '' && $ID != 'self')
{
    $include = 'inspect';
    $profileByID = $db->inspectStudentByID($ID);
} elseif ($ID == 'self'){
    $profileByID = $db->inspectStudentByID($student->getID());
    if ($profileByID)
    {
        $include = 'inspect';
    }
}
$search = '';
if (isset($_GET['search'])) {
    $include = 'list';
    include_once('./scripts/list_action.php');
}
