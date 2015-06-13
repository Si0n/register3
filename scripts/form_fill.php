<?php
if (!isset($stud)) {
    if (!isset($student)) {
        $stud = array('name' => 'Ваше Имя',
            'surname' => 'Ваша Фамилия',
            'groupNumber' => 'Номер Вашей группы',
            'email' => 'Ваша электронная почта',
            'mark' => 'Ваш балл на ЕГЭ',
            'birthDate' => 'Год вашего рождения');
    } else {
        $stud = array('name' => $student->getName(),
            'surname' => $student->getSurname(),
            'groupNumber' => $student->getGroupNumber(),
            'email' => $student->getEmail(),
            'mark' => $student->getMark(),
            'birthDate' => $student->getBirthDate());
    }
}
require 'template/edit.php';