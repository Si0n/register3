<?php
class Student
{
    protected $name;
    protected $surname;
    protected $sex;
    protected $groupNumber;
    protected $email;
    protected $mark;
    protected $local;
    protected $birthDate;
    protected $password;
    protected $ID;

    public function setFields($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = trim($value);
        }

        $this->name      = $data['name'];
        $this->surname  = $data['surname'];
        $this->sex      = $data['sex'];
        $this->groupNumber = $data['groupNumber'];
        $this->email    = $data['email'];
        $this->mark   = $data['mark'];
        $this->local     = $data['local'];
        $this->birthDate    = $data['birthDate'];

    }
    public function getName()
    {
    return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }
    public function getSex()
    {
        return $this->sex;
    }
    public function getShowSex()
    {
        if ($this->sex == 'F')
        {
            return 'Женский';
        } else {
            return 'Мужской';
        }
    }

    public function getGroupNumber()
    {
        return $this->groupNumber;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMark()
    {
        return $this->mark;
    }
    public function getLocal()
    {
        return $this->local;
    }
    public function getShowLocal()
    {
        if ($this->local == 'N') {
            return 'Местный';
        } else return 'Приезжий';
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function getPassword()
    {
        return $this->password;
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
        $this->password = $code;
        return $code;
    }
    public function inspectStudent()
    {
        $err = array();
        if (!preg_match("/^[А-Яа-яЁё]{2,}$/u", $this->name)) {
            $err['name'] = 'Имя должно содержать только буквы кириллицы';
        }
        if (!preg_match("/^[А-Яа-яЁё]{2,}$/u", $this->surname)) {
            $err['surname'] = 'Фамилия должна содержать только кириллические символы ';
        }
        if (!preg_match("/^(19|20)[0-9]{2}$/u", $this->birthDate)) {
            $err['birth'] = 'Введите год рождения в формате 19(20)XX';
        }
        if (!preg_match("/^.{1,6}$/u", $this->groupNumber)) {
            $err['group'] = 'Номер группы должен содержать от 1 до 6 символов.';
        }
        if ($this->mark < 165  || $this->mark > 200) {
            $err['mark'] = "Недостаточно балов, или неверный формат.";
        }
        if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $this->email)) {
            $err['email'] = 'Проверьте правильность введенного Вами почтового ящика';
        }
        return $err;
    }

    /*public function isThisEmailInDB($cookie = '')
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

        $statement = $this->pdo->prepare("SELECT * FROM students WHERE email= :email AND password= :password");
        $statement->bindParam(":password", $cookie);
        $statement->bindParam(":email", $this->email);
        $statement->execute();
        $students = $statement->fetch();
        if (empty($students)) {
            return TRUE;
        } else {
            return FALSE;
        }


    }*/


}