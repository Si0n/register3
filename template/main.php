<?php include 'header.php'; ?>
<b><?=htmlProtect($headerMessage)?></b>
<div role="tabpanel">
<ul class="nav nav-tabs" role="tablist">
    <?php if ($student->getName() != '') : ?>
    <li role="presentation" class="<?=$dashboardTab ?>"><a href="index.php?page=dashboard" aria-controls="home" role="tab" data-toggle="tab">Личный кабинет</a></li>
    <?php else :  ?>
    <li role="presentation" class="<?=$dashboardTab ?>"><a href="index.php?page=registration" aria-controls="home" role="tab" data-toggle="tab">Регистрация</a></li>
    <?php endif ?>
    <li role="presentation" class="<?=$listTab ?>"><a href="index.php?page=list" aria-controls="profile" role="tab" data-toggle="tab">Список студентов</a></li>
</ul>
</div>
</br>
