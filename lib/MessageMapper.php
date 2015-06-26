<?php
/**
 * Created by PhpStorm.
 * User: Sion
 * Date: 26.06.2015
 * Time: 10:20
 */

class MessageMapper {

    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function getCountInDb($ID)
    {
        $sql = "SELECT COUNT(*) FROM messages WHERE id_target = :id_target";
        $countMes = $this->pdo->prepare($sql);
        $countMes->bindParam(":id_target", $ID);
        $countMes->execute();
        $count = $countMes->fetchColumn();
        return $count;
    }




    //добавить сообщение
    public function addMessage($id_author, $id_target, $message)
    {

        $STH = $this->pdo->prepare("INSERT INTO messages
                                  (id_author, id_target, message)
                                  VALUES (:id_author, :id_target, :message);");
        $STH->bindValue(':id_author', $id_author);
        $STH->bindValue(':id_target', $id_target);
        $STH->bindValue(':message', $message);
        $STH->execute();
    }




    public function readMessage($id, $offset)
    {
        $sql    = "SELECT * FROM messages WHERE id_target = :id ORDER BY id_message DESC LIMIT $offset, 4";
        $cpswrd = $this->pdo->prepare($sql);
        $cpswrd->bindValue(':id', $id);
        $cpswrd->execute();
        $message = $cpswrd->fetchAll(PDO::FETCH_CLASS, "Message");
        return $message;
    }

    //прочитать сообщение
} 