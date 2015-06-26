<?php
class Message {
    protected $date;
    protected $id_author;
    protected $id_target;
    protected $message;
public function getDate()
{
    return $this->date;
}
    public function getIDauthor()
    {
        return $this->id_author;
    }
    public function getIDtarget()
    {
        return $this->id_target;
    }
    public function outputMessage()
    {
        return $this->message;
    }
} 