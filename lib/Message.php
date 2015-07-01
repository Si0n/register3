<?php
class Message {
    protected $date;
    protected $id_author;
    protected $id_target;
    protected $message;
    protected $template = "/^.{1,}$/u";
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

    public function isThisTextValid($text)
    {
        if (preg_match($this->template, $text))
        {
            return TRUE;
        } else return FALSE;
    }
} 