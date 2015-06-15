<?php
if (!isset($student)) {
    $stud = array('name' => '',
        'surname' => '',
        'groupNumber' => '',
        'email' => '',
        'mark' => '',
        'birthDate' => '');
} else {
    $stud = array('name' => $student->getName(),
        'surname' => $student->getSurname(),
        'groupNumber' => $student->getGroupNumber(),
        'email' => $student->getEmail(),
        'mark' => $student->getMark(),
        'birthDate' => $student->getBirthDate());
}
require 'template/edit.php';