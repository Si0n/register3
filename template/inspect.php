<?php require 'main.php'; ?>
<ul class="list-group">
    <li class="list-group-item">Имя: <b><?=htmlProtect($student->getName()) ?></b></li>
    <li class="list-group-item">Фамилия: <b><?=htmlProtect($student->getSurname()) ?></b></li>
    <li class="list-group-item">Год рождения: <b><?=htmlProtect($student->getBirthDate()) ?></b></li>
    <li class="list-group-item">Группа: <b><?=htmlProtect($student->getGroupNumber()) ?></b></li>
    <li class="list-group-item">Балл ЕГЭ <b><?=htmlProtect($student->getMark())?></b></li>
    <li class="list-group-item">Местный/Приезжий (Local/Not local): <b><?=htmlProtect($student->getShowLocal()) ?></b></li>
    <li class="list-group-item">E-mail для связи <b><?=htmlProtect($student->getEmail()) ?></b></li>
    <li class="list-group-item">Пол: <b><?=htmlProtect($student->getShowSex()) ?></b></li>
</ul>