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
const TAB_HEADER_NOTHING_FOUND = 0;
const TAB_HEADER_WRONG_REQUEST = 1;
const TAB_HEADER_ALL_STUDENTS_REQUEST = 2;
const TAB_HEADER_SOME_STUDENTS_REQUEST = 3;


$pdo  = new PDO($dsn, $user, $pass, $opt);
$studentValidator = new StudentValidator();
$db   = new StudentsMapper($pdo);
$image = new Image();
$messenger = new MessageMapper($pdo);
if (isset($_COOKIE['password'])) {
    $password = $_COOKIE['password'];
    $headerMessage = 'К сожалению, Вас нет в списке студентов.';
    if ($db->findStudentByPassword($password)) {
        $student       = $db->findStudentByPassword($password);
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
    $register = strval($_GET['register']);
    if ($register== 'ok')
    {
        $registerMessage = 'Вы успешно сохранили Ваши данные.';
    } elseif ($register == 'fail')
    {
        $registerMessage = 'Ошибка при загрузке фото.';
    }

}

$include = isset($_GET['page'])   ?  $_GET['page'] : 'main' ;
$ID = isset($_GET['ID'])   ?  $_GET['ID'] : '' ;
$err =  isset($_GET['err'])   ? 'Вы ничего не ввели, либо использовали недопустимые символы' : FALSE ;
if ($ID != '')
{
   if ($ID == 'self') {
       $ID = $student->getID();
   }
    $profileByID = $db->findStudentByID($ID);
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
