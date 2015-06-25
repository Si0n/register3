<?php require_once 'main.php';?>
<div class="row">
    <div class="col-md-12">
    <div class="col-md-3">
        <label><?= ($ID != 'self') ? 'Фото:' : 'Ваше фото:' ?>
<img src="scripts/image_preview.php?photo=<?=htmlProtect($profileByID->getPhoto())?>"></label></div>
    <div class="col-md-5">
<ul class="list-group">
    <li class="list-group-item">Имя: <b><?=htmlProtect($profileByID->getName()) ?></b></li>
    <li class="list-group-item">Фамилия: <b><?=htmlProtect($profileByID->getSurname()) ?></b></li>
    <li class="list-group-item">Год рождения: <b><?=htmlProtect($profileByID->getBirthDate()) ?></b></li>
    <li class="list-group-item">Группа: <b><?=htmlProtect($profileByID->getGroupNumber()) ?></b></li>
    <li class="list-group-item">Балл ЕГЭ <b><?=htmlProtect($profileByID->getMark())?></b></li>
    <li class="list-group-item">Местный/Приезжий: <b><?=htmlProtect($profileByID->getShowLocal()) ?></b></li>
    <?php if ($ID == 'self') : ?>
    <li class="list-group-item">E-mail для связи <b><?=htmlProtect($profileByID->getEmail()) ?></b></li>
    <?php endif ?>
    <li class="list-group-item">Пол: <b><?=htmlProtect($profileByID->getShowSex()) ?></b></li>
</ul></div></div></div>