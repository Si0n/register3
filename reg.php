<?
error_reporting(-1);
ini_set('display_errors', 1);
require './scripts/ini.php';
if (isset($_POST['submit'])) {
        if ($_FILES["photo"]["error"] != 4) {
            if ($_FILES["photo"]["error"] > 0)
            {
                $photo_error = "Ошибка загрузки: " . $_FILES["photo"]["error"];
            }
            else
            {
                if ((($_FILES["photo"]["type"] == "image/gif")
                        || ($_FILES["photo"]["type"] == "image/jpeg")
                        || ($_FILES["photo"]["type"] == "image/pjpeg")
                        || ($_FILES["photo"]["type"] == "image/png")
                    )
                    && ($_FILES["photo"]["size"] < 200000000))
                {


                    if (file_exists("upload/" . $_FILES["photo"]["name"]))
                    {
                        $photo_error = 'Это фото уже существует на сервере';
                    }
                    else
                    {
                        $file_name = $_FILES["photo"]["name"];
                    }
                }

                else
                {
                    $photo_error = "Неподходящий формат файла";
                }}
        }

    if (isset($_COOKIE['password'])) {
        $cookiePass = $_COOKIE['password'];
    } else {
        $cookiePass = '';
    }
    $name      = isset($_POST['name']) ? strval($_POST['name']) : '';
    $surname   = isset($_POST['surname']) ? strval($_POST['surname']) : '';
    $sex       = isset($_POST['sex']) ? strval($_POST['sex']) : '';
    $group     = isset($_POST['group']) ? strval($_POST['group']) : '';
    $email     = isset($_POST['email']) ? strval($_POST['email']) : '';
    $mark      = isset($_POST['mark']) ? intval($_POST['mark']) : '';
    $local     = isset($_POST['local']) ? strval($_POST['local']) : '';
    $birthDate = isset($_POST['birthDate']) ? intval($_POST['birthDate']) : '';
    $stud      = array(
        'name' => $name,
        'surname' => $surname,
        'sex' => $sex,
        'groupNumber' => $group,
        'email' => $email,
        'mark' => $mark,
        'local' => $local,
        'birthDate' => $birthDate
    );
    $student   = new Student;
    $student->setFields($stud);
    $errors = $studentValidator->inspectStudent($db, $student, $cookiePass);
    if (isset($file_name))
    {
        $student->savePhoto($file_name);
    }
    if (isset($photo_error))
    {
        $errors['photo'] = $photo_error;
    }
    if (empty($errors)) {
        if (!isset($_COOKIE['password'])) {
            $cookiePass = $student->generatePswrd();
            $db->saveStudent($student);
            move_uploaded_file($_FILES["photo"]["tmp_name"],
                "upload/" . $_FILES["photo"]["name"]);
            SetCookie("password", $cookiePass, time() + 4 * 60 * 60 * 24 * 365, "/");

        } else {
            $db->updateStudent($student, $cookiePass);
            move_uploaded_file($_FILES["photo"]["tmp_name"],
                "upload/" . $_FILES["photo"]["name"]);
        }
        header('Location: index.php?register=ok');
    }
    require 'template/edit.php';
}