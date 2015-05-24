<?php
include 'ini.php';
$password = getCookie('password');
$db = new StudentsMapper($pdo);
$student = $db->isPswrdInDB($password);