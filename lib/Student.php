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
        $this->name        = $data['name'];
        $this->surname     = $data['surname'];
        $this->sex         = $data['sex'];
        $this->groupNumber = $data['groupNumber'];
        $this->email       = $data['email'];
        $this->mark        = $data['mark'];
        $this->local       = $data['local'];
        $this->birthDate   = $data['birthDate'];
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
        if ($this->sex == 'F') {
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
        } else
            return 'Приезжий';
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
        $this->password = $code;
        return $code;
    }
}