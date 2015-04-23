<?php
require_once 'classLoader.php';
include 'PDO.php';
include 'functions.php';
$password = getCookie('password');
$db = new StudentsMapper($pdo);
$student = $db->isPswrdInDB($password);