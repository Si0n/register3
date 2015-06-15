<?php
class DataMapper
{
    private $student;
    private $pdo;
    private $cookiePassword;
    private $email;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function addStudentAndCookie(Student $student, $cookiePassword)
    {
        $this->student        = $student;
        $this->email          = $student->getEmail();
        $this->cookiePassword = $cookiePassword;
    }

    public function inspectStudent()
    {
        $err = array();
        if (!preg_match("/^[А-Яа-яЁё]{1,}$/u", $this->student->getName())) {
            $err['name'] = 'Имя должно содержать только буквы кириллицы';
        }
        if (!preg_match("/^[А-Яа-яЁё\'\-\s]{1,}$/u", $this->student->getSurname())) {
            $err['surname'] = 'Фамилия должна содержать только кириллические символы ';
        }
        if (!preg_match("/^(19|20)[0-9]{2}$/u", $this->student->getBirthDate())) {
            $err['birth'] = 'Введите год рождения в формате 19(20)XX';
        }
        if (!preg_match("/^.{1,6}$/u", $this->student->getGroupNumber())) {
            $err['group'] = 'Номер группы должен содержать от 1 до 6 символов.';
        }
        if ($this->student->getMark() < 165 || $this->student->getMark() > 200) {
            $err['mark'] = "Недостаточно балов, или неверный формат.";
        }
        if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $this->student->getEmail())) {
            $err['email'] = 'Проверьте правильность введенного Вами почтового ящика';
        }
        if ($this->cookiePassword != '') {
            if ($this->isThisEmailAndCookiEinDB()) {
                $err['email_match'] = 'Такой эмейл уже зарегистрирован.';
            }
        } else {
            if ($this->isThisEmailInDB()) {
                $err['email_match'] = 'Такой эмейл уже зарегистрирован.';
            }
        }
        return $err;
    }
    private function isThisEmailInDB()
    {

        $statement = $this->pdo->prepare("SELECT * FROM students WHERE email= :email");
        $statement->bindParam(":email", $this->email);
        $statement->execute();
        $students = $statement->fetch();

        if (empty($students)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    private function isThisEmailAndCookiEinDB()
    {
        $statement = $this->pdo->prepare("SELECT * FROM students WHERE email= :email AND password= :password");
        $statement->bindParam(":password", $this->cookiePassword);
        $statement->bindParam(":email", $this->email);
        $statement->execute();
        $students = $statement->fetch();
        if (!empty($students)) {
            return FALSE;
        } else {
            return $this->isThisEmailInDB();
        }
    }
}