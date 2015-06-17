<?php
class Student
{
    const GENDER_FEMALE = 'F';
    const GENDER_MALE = 'M';
    const RESIDENCE_LOCAL = 'L';
    const RESIDENCE_NOT_LOCAL = 'N';
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
    public function setFields($data='')
    {
        if (is_array($data)) {
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
        } else {
            $this->name = '';
            $this->surname = '';
            $this->sex = '';
            $this->groupNumber = '';
            $this->email = '';
            $this->mark = '';
            $this->local = '';
            $this->birthDate = '';
        }

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
        if ($this->sex == Student::GENDER_FEMALE) {
            return 'Женский';
        } elseif ($this->sex == Student::GENDER_MALE) {
            return 'Мужской';
        } else {
            return '';
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
        if ($this->local == Student::RESIDENCE_LOCAL) {
            return 'Местный';
        } elseif ($this->local == Student::RESIDENCE_NOT_LOCAL)
        {
            return 'Приезжий';
        } else {
            return '';
        }

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