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
        $STH = $this->db->prepare("INSERT INTO Students (name, surname, sex, groupNumber, email, mark, local, birthDate, password) VALUES (:name, :surname, :sex, :groupNumber, :email, :mark, :local, :birthDate, :password);");
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
        $STH = $this->db->prepare("UPDATE `Students` SET `name`= :name,`surname`= :surname,`sex`= :sex,`groupNumber`= :groupNumber,`email`= :email,`mark`= :mark,`local`= :local,`birthDate`= :birthDate WHERE password= :password");
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
        $student = $cpswrd->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "student");
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

    public function isThisEmailInDB($email)
    {

            $statement = $this->db->prepare("SELECT * FROM students WHERE email= :email");
            $statement->bindParam(":email", $email);
            $statement->execute();
            $students = $statement->fetch();

            if (empty($students)) {
                return FALSE;
            } else {
                return TRUE;
            }
        }
        public function isThisEmailAndCookiEinDB($email, $cookie)
        {
        $statement = $this->db->prepare("SELECT * FROM students WHERE email= :email AND password= :password");
        $statement->bindParam(":password", $cookie);
        $statement->bindParam(":email", $email);
        $statement->execute();
        $students = $statement->fetch();
        if (!empty($students)) {
            return FALSE;
        } else {
            return $this->isThisEmailInDB($email);
        }


    }




}

