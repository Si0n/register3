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

    public function setFields($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = trim($value);
        }

        $this->name      = $data['Name'];
        $this->surname  = $data['Surname'];
        $this->sex      = $data['Sex'];
        $this->groupNumber = $data['GroupNumber'];
        $this->email    = $data['Email'];
        $this->mark   = $data['Mark'];
        $this->local     = $data['Local'];
        $this->birthDate    = $data['BirthDate'];
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


    }


}