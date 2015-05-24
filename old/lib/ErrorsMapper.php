<?php
class ErrorsMapper
{
    private $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function inspectErrors($errors)
    {
        $err = array();
        if ($errors['name'])
        {
            $err[] = 'Проверьте правильность вводимого имени.';
        }
        if ($errors['surname'])
        {
            $err[] = 'Проверьте правильность вводимой фамилии.';
        }
        if ($errors['birth'])
        {
            $err[] = 'Проверьте правильность вводимого года рождения, он должен быть в формате 19(20)ХХ.';
        }
        if ($errors['groupNum'])
        {
            $err[] = 'Проверьте правильность вводимого номера группы: не длиннее 6 символов.';
        }
        if ($errors['email'])
        {
            $err[] = 'Проверьте правильность вводимого E-mail.';
        }
        if ($errors['mark'])
        {
            $err[] = 'Недостаточно баллов для регистрации';
        }
        if ($errors['emailMatch'])
        {
            $err[] = 'Пользователь с таким эмейлом уже существует';
        }

        return $err;

    }
    public function insertErrorsIntoDB($errors, $password)
    {
        $STH = $this->pdo->prepare("INSERT INTO errors (name, surname, birth, groupNum, email, mark, emailMatch, cookie) VALUES (:name, :surname, :birth, :groupNum, :email, :mark, :emailMatch, :cookie);");
        $STH->bindValue(':name', $errors['name'], PDO::PARAM_BOOL);
        $STH->bindValue(':surname', $errors['surname'], PDO::PARAM_BOOL);
        $STH->bindValue(':birth', $errors['birth'], PDO::PARAM_BOOL);
        $STH->bindValue(':groupNum', $errors['group'], PDO::PARAM_BOOL);
        $STH->bindValue(':email', $errors['email'], PDO::PARAM_BOOL);
        $STH->bindValue(':mark', $errors['mark'], PDO::PARAM_BOOL);
        $STH->bindValue(':emailMatch', $errors['emailMatch'], PDO::PARAM_BOOL);
        $STH->bindValue(':cookie', $password);
        $STH->execute();
    }
    public function getErrorsFromDB($cookie)
    {
        $sql = "SELECT * FROM errors WHERE cookie= :cookie";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':cookie', $cookie);
        $statement->execute();
        $result = $statement->fetch();
        return $result;
    }
    public function deleteErrorsInDB($cookie)
    {
        $sql = "DELETE FROM errors WHERE cookie= :cookie";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':cookie', $cookie);
        $statement->execute();
    }




}