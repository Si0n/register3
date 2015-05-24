<?php
class Student
{
    private $pdo;
    public $name;
    public $surname;
    public $sex;
    public $groupNumber;
    public $email;
    public $mark;
    public $local;
    public $birthDate;
    public $pswrd;
    public function __construct($array, PDO $pdo)
    {

        $this->name        = $array['Name'];
        $this->surname     = $array['Surname'];
        $this->sex         = $array['Sex'];
        $this->groupNumber = $array['GroupNumber'];
        $this->email       = $array['Email'];
        $this->mark        = $array['Mark'];
        $this->local       = $array['Local'];
        $this->birthDate   = $array['BirthDate'];
        $this->pdo         = $pdo;
    }
    public function getInfoAboutStudent()
    {
        $data = array(
            $this->name,
            $this->surname,
            $this->sex,
            $this->groupNumber,
            $this->mark,
            $this->local,
            $this->birthDate
        );
        return $data;
    }
    public function generatePswrd()
    {
        $length = 10;
        $chars  = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
        $code   = "";
        $clen   = mb_strlen($chars) - 1;
        while (mb_strlen($code) < $length) {
            $code .= $chars[mt_rand(0, $clen)];
        }
        $code        = sha1($code);
        $this->pswrd = $code;
        return $code;
    }
    public function inspectStudent($cookie)
    {
        $err = array();
        if (!preg_match("/^[А-Яа-яЁё]{2,}$/u", $this->name)) {
            $err['name'] = TRUE;
        } else {
            $err['name'] = FALSE;
        }
        if (!preg_match("/^[А-Яа-яЁё]{2,}$/u", $this->surname)) {
            $err['surname'] = TRUE;
        } else {
            $err['surname'] = FALSE;
        }
        if (!preg_match("/^(19|20)[0-9]{2}$/u", $this->birthDate)) {
            $err['birth'] = TRUE;
        } else {
            $err['birth'] = FALSE;
        }
        if (!preg_match("/^.{1,6}$/u", $this->groupNumber)) {
            $err['group'] = TRUE;
        } else {
            $err['group'] = FALSE;
        }
        if ($this->mark < 165) {
            $err['mark'] = TRUE;
        } else {
            $err['mark'] = FALSE;
        }
        if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $this->email)) {
            $err['email'] = TRUE;
        } else {
            $err['email'] = FALSE;
        }
        if ($this->isThisEmailInDB($cookie)) {
            $err['emailMatch'] = TRUE;
        } else {
            $err['emailMatch'] = FALSE;
        }
        return $err;
    }

    public function isThisEmailInDB($cookie = '')
    {
        if ($cookie == '') {
            $statement = $this->pdo->prepare("SELECT * FROM students WHERE email= :email");
            $statement->bindParam(":email", $this->email);
            $statement->execute();
            $students = $statement->fetch();

            if (empty($students['Name'])) {
                return FALSE;
            } else {
                return TRUE;
            }
        }

        $statement = $this->pdo->prepare("SELECT * FROM students WHERE email= :email AND pswrd= :password");
        $statement->bindParam(":password", $cookie);
        $statement->bindParam(":email", $this->email);
        $statement->execute();
        $students = $statement->fetch();
        if (empty($students)) {
            return TRUE;
        } else {
            return FALSE;
        }


    }


}