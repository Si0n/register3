<?php include 'header.php'; ?>
<div role="tabpanel">
<ul class="nav nav-tabs" role="tablist">

    <?php if (isset($student['Name'])) : ?>
    <li role="presentation" class="noactive"><a href="?page=dashboard" aria-controls="home" role="tab" data-toggle="tab">Личный кабинет</a></li>
    <?php else : ?>
    <li role="presentation" class="noactive"><a href="?page=registration" aria-controls="home" role="tab" data-toggle="tab">Регистрация</a></li>
    <?php endif ?>
    <li role="presentation" class="noactive"><a href="?page=list" aria-controls="profile" role="tab" data-toggle="tab">Список студентов</a></li>


</ul>
</div>
<!-- форма поиска среди зарегистрированных пользователей-->
<br>
<form action="" method="get" name="go">
    <div class="col-lg-6">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Поиск среди студентов..." name="search" type="text" size="40">
        </div><!-- /.col-lg-6 -->
    </div>
</form>
<br>
