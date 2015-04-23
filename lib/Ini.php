<?php
class Ini
{
    public function printPage($fileName)
    {
       include './../temp/' . $fileName . '.php';

    }
    public function loadLibs()
    {
        require_once(__DIR__ . './PDO.php');
        require_once(__DIR__ . './functions.php');
        require_once(__DIR__ . './pager.php');

    }
}