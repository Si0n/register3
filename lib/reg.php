<?
include 'classLoader.php';
require 'PDO.php';
require 'functions.php';


/*
 * require('Student.php');
require('StudentsMapper.php');
require('ErrorsMapper.php');
 *
 *
 */

if (isset($_POST['submit']))
{
    $db = new StudentsMapper($pdo);
    $redirect = new ErrorsMapper($pdo);
    $cookiePass = getCookie('password');
    $checkExistingStud = $db->isPswrdInDB($cookiePass);
    $name = isset($_POST['name']) ? makeProtect(strval($_POST['name'])) : '';
    $surname = isset($_POST['surname']) ? makeProtect(strval($_POST['surname'])) : '';
    $sex = isset($_POST['sex']) ? makeProtect(strval($_POST['sex'])) : '';
    $group = isset($_POST['group']) ? makeProtect(strval($_POST['group'])) : '';
    $email = isset($_POST['email']) ? makeProtect(strval($_POST['email'])) : '';
    $mark = isset($_POST['mark']) ? makeProtect(strval($_POST['mark'])) : '';
    $local = isset($_POST['local']) ? makeProtect(strval($_POST['local'])) : '';
    $birthDate = isset($_POST['birthDate']) ? makeProtect(strval($_POST['birthDate'])) : '';
    $stud = array('Name' => $name,
        'Surname' =>$surname,
        'Sex'=> $sex,
        'GroupNumber' => $group,
        'Email' => $email,
        'Mark' => $mark,
        'Local' => $local,
        'BirthDate' => $birthDate);
    $student = new Student($stud, $pdo);
    $errors = $student->inspectStudent($cookiePass);
    $errCookie = $student->generatePswrd();
    $redirect->insertErrorsIntoDB($errors, $errCookie);
    SetCookie("errors", $errCookie, time()+3, "/");
    $success = TRUE;
    foreach ($errors as $error)
    {
        if ($error == TRUE)
        {
            $success = FALSE;
        }
    }
     if ($success)
     {
         if (!isset($_COOKIE['password']))
         {
             $cookiePass = $student->generatePswrd();
             SetCookie("password", $cookiePass,time()+4*60*60*24*365, "/");
             $db->saveStudent($student);
         } else {
             $db->updateStudent($student, $cookiePass);
         }

     }
    header("Location: http://localhost/php/students/template/main.php?page=registration");
    }