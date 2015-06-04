<?php
class StudentsMapper
{

    private $db;
    public function __construct(PDO $pdo)
    {
        $this->db = $pdo;

    }


    public function saveStudent(Student $student)
    {
        $STH = $this->db->prepare("INSERT INTO Students (Name, Surname, Sex, GroupNumber, Email, Mark, Local, BirthDate, password) VALUES (:name, :surname, :sex, :groupNumber, :email, :mark, :local, :birthDate, :pswrd);");
        $STH->bindValue(':password', $student->getPassword());
        $STH->bindValue(':name', $student->getName());
        $STH->bindValue(':surname', $student->getSurname());
        $STH->bindValue(':sex', $student->getSex());
        $STH->bindValue(':groupNumber', $student->getGroupNumber());
        $STH->bindValue(':email', $student->getEmail());
        $STH->bindValue(':mark', $student->getMark());
        $STH->bindValue(':local', $student->getLocal());
        $STH->bindValue(':birthDate', $student->getBirthDate());
        $STH->execute();
    }
    public function updateStudent(Student $student, $password)
    {
        $STH = $this->db->prepare("UPDATE `Students` SET `Name`= :name,`Surname`= :surname,`Sex`= :sex,`GroupNumber`= :groupNumber,`Email`= :email,`Mark`= :mark,`Local`= :local,`BirthDate`= :birthDate WHERE pswrd= :pswrd");
        $STH->bindValue(':password', $password);
        $STH->bindValue(':name', $student->getName());
        $STH->bindValue(':surname', $student->getSurname());
        $STH->bindValue(':sex', $student->getSex());
        $STH->bindValue(':groupNumber', $student->getGroupNumber());
        $STH->bindValue(':email', $student->getEmail());
        $STH->bindValue(':mark', $student->getMark());
        $STH->bindValue(':local', $student->getLocal());
        $STH->bindValue(':birthDate', $student->getBirthDate());
        $STH->execute();
    }

    public function isPswrdInDB($password)
    {
        $sql         = "SELECT * FROM students WHERE password= :password";
        $cpswrd      = $this->db->prepare($sql);
        $cpswrd->bindValue(':password', $password);
        $cpswrd->execute();
        $student = $cpswrd->fetchAll();

        if (count($cpswrd) > 0) {
            return $student;
        } else
            return false;

    }

    public function getCountInDb($string = '')
    {
        if ($string === '') {
            $sql = "SELECT * FROM students ORDER BY GroupNumber";
        } else {
            $sql = "SELECT * FROM students WHERE Name LIKE :string or Surname LIKE :string or GroupNumber LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark LIKE :string";  // or Surname LIKE :string or GroupNumber LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark LIKE :string

        }
        $srchStudents = $this->db->prepare($sql);
        $reg          = "%$string%";
        $srchStudents->bindParam(":string", $reg);
        $srchStudents->execute();
        $stud = $srchStudents->fetchAll();
        $count = count($stud);
        return $count;


    }
    public function searchFromStudents($string = '', $offset)
    {
        if ($string === '') {
            $sql = "SELECT * FROM students ORDER BY ID LIMIT $offset, 2";
        } else {
            $sql = "SELECT * FROM students WHERE Name LIKE :string or Surname LIKE :string or GroupNumber LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark LIKE :string ORDER BY ID LIMIT $offset, 2";  // or Surname LIKE :string or GroupNumber LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark LIKE :string

        }
        $srchStudents = $this->db->prepare($sql);
        $reg          = "%$string%";
        $srchStudents->bindParam(":string", $reg);
        $srchStudents->execute();
        $stud = $srchStudents->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "student");
        return $stud;
    }

}

