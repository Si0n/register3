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
        $STH = $this->db->prepare("INSERT INTO Students (Name, Surname, Sex, GroupNumber, Email, Mark, Local, BirthDate, pswrd) VALUES (:name, :surname, :sex, :groupNumber, :email, :mark, :local, :birthDate, :pswrd);");
        $STH->bindValue(':pswrd', $student->pswrd);
        $STH->bindValue(':name', $student->name);
        $STH->bindValue(':surname', $student->surname);
        $STH->bindValue(':sex', $student->sex);
        $STH->bindValue(':groupNumber', $student->groupNumber);
        $STH->bindValue(':email', $student->email);
        $STH->bindValue(':mark', $student->mark);
        $STH->bindValue(':local', $student->local);
        $STH->bindValue(':birthDate', $student->birthDate);
        $STH->execute();
    }
    public function updateStudent(Student $student, $password)
    {
        $STH = $this->db->prepare("UPDATE `Students` SET `Name`= :name,`Surname`= :surname,`Sex`= :sex,`GroupNumber`= :groupNumber,`Email`= :email,`Mark`= :mark,`Local`= :local,`BirthDate`= :birthDate WHERE pswrd= :pswrd");
        $STH->bindValue(':pswrd', $password);
        $STH->bindValue(':name', $student->name);
        $STH->bindValue(':surname', $student->surname);
        $STH->bindValue(':sex', $student->sex);
        $STH->bindValue(':groupNumber', $student->groupNumber);
        $STH->bindValue(':email', $student->email);
        $STH->bindValue(':mark', $student->mark);
        $STH->bindValue(':local', $student->local);
        $STH->bindValue(':birthDate', $student->birthDate);
        $STH->execute();
    }

    public function isPswrdInDB($password)
    {
        $existedStud = array();
        $sql         = "SELECT * FROM students WHERE pswrd= :pswrd";
        $cpswrd      = $this->db->prepare($sql);
        $cpswrd->bindValue(':pswrd', $password);
        $cpswrd->execute();
        while ($student = $cpswrd->fetch()) {
            $existedStud = $student;
        }
        if (count($cpswrd) > 0) {
            return $existedStud;
        } else
            return false;

    }

    public function searchFromStudents($string = '')
    {
        $stud = array();
        if ($string === '') {
            $sql = 'SELECT * FROM students ORDER BY GroupNumber';
        } else {
            $sql = "SELECT * FROM students WHERE Name LIKE :string or Surname LIKE :string or GroupNumber LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark LIKE :string"; // or Surname LIKE :string or GroupNumber LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark LIKE :string

        }
        $srchStudents = $this->db->prepare($sql);
        $reg          = "%$string%";
        $srchStudents->bindParam(":string", $reg);
        $srchStudents->execute();
        while ($students = $srchStudents->fetch()) {
            $stud[] = $students;
        }
        return $stud;
    }

}

