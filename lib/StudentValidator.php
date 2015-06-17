<?php
class StudentValidator{
    public function inspectStudent(StudentsMapper $db, Student $student, $password)
    {
        $err = array();
        if (!preg_match("/^[А-Яа-яЁё]{1,}$/u", $student->getName())) {
            $err['name'] = 'Имя должно содержать только буквы кириллицы';
        }
        if (!preg_match("/^[А-Яа-яЁё\'\-\s]{1,}$/u", $student->getSurname())) {
            $err['surname'] = 'Фамилия должна содержать только кириллические символы ';
        }
        if (!preg_match("/^(19|20)[0-9]{2}$/u", $student->getBirthDate())) {
            $err['birth'] = 'Введите год рождения в формате 19(20)XX';
        }
        if (!preg_match("/^.{1,6}$/u", $student->getGroupNumber())) {
            $err['group'] = 'Номер группы должен содержать от 1 до 6 символов.';
        }
        if ($student->getMark() < 165 || $student->getMark() > 200) {
            $err['mark'] = "Недостаточно балов, или неверный формат.";
        }
        if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $student->getEmail())) {
            $err['email'] = 'Проверьте правильность введенного Вами почтового ящика';
        }
        if ($password != '') {
            if ($db->isThisEmailAndCookiEinDB($password, $student->getEmail())) {
                $err['email_match'] = 'Такой эмейл уже зарегистрирован.';
            }
        } else {
            if ($db->isThisEmailInDB($student->getEmail())) {
                $err['email_match'] = 'Такой эмейл уже зарегистрирован.';
            }
        }
        return $err;
    }

}