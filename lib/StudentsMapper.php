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
        $STH = $this->db->prepare("INSERT INTO Students
                                  (name, surname, sex, groupNumber, email, mark, local, birthDate, password, photo)
                                  VALUES (:name, :surname, :sex, :groupNumber, :email, :mark, :local, :birthDate, :password, :photo);");
        $STH->bindValue(':password', $student->getPassword());
        $STH->bindValue(':name', $student->getName());
        $STH->bindValue(':surname', $student->getSurname());
        $STH->bindValue(':sex', $student->getSex());
        $STH->bindValue(':groupNumber', $student->getGroupNumber());
        $STH->bindValue(':email', $student->getEmail());
        $STH->bindValue(':mark', $student->getMark());
        $STH->bindValue(':photo', $student->getPhoto());
        $STH->bindValue(':local', $student->getLocal());
        $STH->bindValue(':birthDate', $student->getBirthDate());
        $STH->execute();
    }
    public function updateStudent(Student $student, $password)
    {
        if ($student->getPhoto() == '')
        {
            $STH = $this->db->prepare("UPDATE `Students` SET `name`= :name,`surname`= :surname,
                                  `sex`= :sex,`groupNumber`= :groupNumber,`email`= :email,
                                  `mark`= :mark,`local`= :local,`birthDate`= :birthDate WHERE password= :password");

        } else {
            $STH = $this->db->prepare("UPDATE `Students` SET `name`= :name,`surname`= :surname,
                                  `sex`= :sex,`groupNumber`= :groupNumber,`email`= :email,
                                  `mark`= :mark,`local`= :local,`birthDate`= :birthDate, photo= :photo WHERE password= :password");
            $STH->bindValue(':photo', $student->getPhoto());
        }
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
    public function inspectStudentByPassword($password)
    {
        $sql    = "SELECT * FROM students WHERE password= :password";
        $cpswrd = $this->db->prepare($sql);
        $cpswrd->bindValue(':password', $password);
        $cpswrd->execute();
        $cpswrd->setFetchMode(PDO::FETCH_CLASS, "student");
        $student = $cpswrd->fetch();
        return $student;
    }
    public function inspectStudentByID($ID)
    {
        $sql    = "SELECT * FROM students WHERE ID= :ID";
        $cpswrd = $this->db->prepare($sql);
        $cpswrd->bindValue(':ID', $ID);
        $cpswrd->execute();
        $cpswrd->setFetchMode(PDO::FETCH_CLASS, "student");
        $student = $cpswrd->fetch();
        return $student;
    }






    public function getCountInDb($string = '')
    {
        if ($string === '') {
            $sql = "SELECT COUNT(*) FROM students";
        } else {
            $sql = "SELECT COUNT(*) FROM students
                    WHERE Name LIKE :string or Surname LIKE :string or GroupNumber
                    LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark
                    LIKE :string"; // or Surname LIKE :string or GroupNumber LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark LIKE :string
        }
        $srchStudents = $this->db->prepare($sql);
        $reg          = "%$string%";
        $srchStudents->bindParam(":string", $reg);
        $srchStudents->execute();
        $count = $srchStudents->fetchColumn();
        return $count;
    }
    public function searchFromStudents($order, $sort='ASC', $offset, $takeRes, $string = '')
    {
        $orderVariations = array(1=>'ID',
            'name',
            'surname',
            'sex',
            'groupNumber',
            'mark',
            'local',
            'birthDate');
        $sortVariations = array (1=> 'ASC', 2=> 'DESC');
        $legitSort = in_array($sort, $sortVariations);
        $legitOrder = in_array($order, $orderVariations);
        if ($legitOrder && $legitSort)
        {
            if ($string === '') {
                $sql = "SELECT * FROM students ORDER BY $order $sort LIMIT $offset, $takeRes";
            } else {
                $sql = "SELECT * FROM students WHERE Name
                        LIKE :string or Surname LIKE :string or GroupNumber
                        LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark
                        LIKE :string ORDER BY $order $sort LIMIT $offset, 4"; // or Surname LIKE :string or GroupNumber LIKE :string or Email LIKE :string or BirthDate LIKE :string or Mark LIKE :string
            }
            $srchStudents = $this->db->prepare($sql);
            $reg          = "%$string%";
            $srchStudents->bindParam(":string", $reg);
            $srchStudents->execute();
            $stud = $srchStudents->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "student");
            return $stud;
        }
        return 'failed';
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
    public function isThisEmailAndCookiEinDB($password, $email)
    {
        $statement = $this->db->prepare("SELECT * FROM students WHERE email= :email AND password= :password");
        $statement->bindParam(":password", $password);
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
