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
//константы для вывода надписи в заголовке таблицы
const TAB_HEADER_NOTHING_FOUND = 0;
const TAB_HEADER_WRONG_REQUEST = 1;
const TAB_HEADER_ALL_STUDENTS_REQUEST = 2;
const TAB_HEADER_SOME_STUDENTS_REQUEST = 3;
//константы для изменения класса активной вкладки
const MAIN_INSPECT_ACTIVE_TAB = 0;
const MAIN_REGISTER_ACTIVE_TAB = 1;
const MAIN_LIST_ACTIVE_TAB = 2;
const MAIN_NO_ACTIVE_TABS = 3;
//константы размера изображения для $_GET
const IMAGE_FULL_SIZE = 'full';
const IMAGE_CRP_SIZE = 'cr';
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
$photoError = FALSE; //ошибки по загрузке фото, которые в случае ошибок заполнятся в savePhoto.php, и выведутся в inspect.php
$register = FALSE; // =>savePhoto.php, reg.php => TRUE = > обрабатывается в edit.php
$mainActiveTab = MAIN_NO_ACTIVE_TABS;
$ID = isset($_GET['ID'])   ?  $_GET['ID'] : '' ;
$err =  isset($_GET['err'])   ? 'Вы ничего не ввели, либо использовали недопустимые символы' : FALSE ;
$search = '';
