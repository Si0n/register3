<?
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
if (isset($_POST['submit']))
{
    $db = new StudentsMapper($pdo);
    if (isset($_COOKIE['password']))
    {
        $cookiePass = $_COOKIE['password'];
    }
    $name = isset($_POST['name']) ? strval($_POST['name']) : '';
    $surname = isset($_POST['surname']) ? strval($_POST['surname']) : '';
    $sex = isset($_POST['sex']) ? strval($_POST['sex']) : '';
    $group = isset($_POST['group']) ? strval($_POST['group']) : '';
    $email = isset($_POST['email']) ? strval($_POST['email']) : '';
    $mark = isset($_POST['mark']) ? intval($_POST['mark']) : '';
    $local = isset($_POST['local']) ? strval($_POST['local']) : '';
    $birthDate = isset($_POST['birthDate']) ? intval($_POST['birthDate']) : '';
    $stud = array('name' => $name,
        'surname' =>$surname,
        'sex'=> $sex,
        'groupNumber' => $group,
        'email' => $email,
        'mark' => $mark,
        'local' => $local,
        'birthDate' => $birthDate);
    $student = new Student;
    $student->setFields($stud);
    $errors = $student->inspectStudent();
    if (isset($cookiePass))
    {
        if ($db->isThisEmailAndCookiEinDB($student->getEmail(), $cookiePass))
        {
            $errors['email_match'] = 'Такой эмейл уже зарегистрирован.';
        }

    } else {

        if ($db->isThisEmailInDB($student->getEmail()))
        {
            $errors['email_match'] = 'Такой эмейл уже зарегистрирован.';
        }

    }


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
             $db->saveStudent($student);
             SetCookie("password", $cookiePass,time()+4*60*60*24*365, "/");
         } else {
             $db->updateStudent($student, $cookiePass);
         }
        $successfulRegister = TRUE;
     }
    include './template/register.php';
    }