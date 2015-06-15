<?php
require_once ('header.php');
if (isset($errors)):
    foreach ($errors as $error): ?>
        <div class="alert alert-warning" role="alert"><p></p><?=$error; ?></p></div>
    <?php endforeach;
endif;
if (isset($successfulRegister)):
    if ($successfulRegister):?>
        <div class="alert alert-success" role="alert">Сохранение Ваших данных прошло успешно.</div>
    <?php endif;
endif;
?>
<br>
<form class="form-horizontal"  id="register" method="post" action="reg.php">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
        <div class="col-sm-5">
            <input name="name" type="text" class="form-control"  value="<?=htmlProtect($stud['name']) ?>"  aria-describedby="sizing-addon1">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Фамилия:</label>
        <div class="col-sm-5">
            <input name="surname" type="text" class="form-control" value="<?=htmlProtect($stud['surname']) ?>" aria-describedby="sizing-addon1">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Год Рождения:</label>
        <div class="col-sm-5">
            <input name="birthDate" type="text" class="form-control" value="<?=htmlProtect($stud['birthDate']) ?>" aria-describedby="sizing-addon1">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Номер группы:</label>
        <div class="col-sm-5">
            <input name="group" type="text" class="form-control" value="<?=htmlProtect($stud['groupNumber']) ?>" aria-describedby="sizing-addon1">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">E-mail:</label>
        <div class="col-sm-5">
            <input name="email" type="text" class="form-control" value="<?=htmlProtect($stud['email']) ?>" aria-describedby="sizing-addon1">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Балл на ЕГЭ:</label>
        <div class="col-sm-5">
            <input name="mark" type="text" class="form-control" value="<?=htmlProtect($stud['mark']) ?>" aria-describedby="sizing-addon1">
        </div>
    </div>
    <p class="text-left">
        <ins><strong>Пол:</strong></ins>
        <br>
        <label class="checkbox-inline">
            <input type="radio" name="sex" value="M" checked>Мужской
        </label>
        <br>
        <label class="checkbox-inline">
            <input type="radio" name="sex" value="F">Женский
        </label>
        <br>
        <ins><strong>Место жительства</strong></ins>
        <br>
        <label class="checkbox-inline">
            <input type="radio" name="local" value="L" checked>Местный
        </label>
        <br>
        <label class="checkbox-inline">
            <input type="radio" name="local" value="N">Приезжий
        </label>
    </p>
    <div class="btn-group" role="group" aria-label="...">
        <a class="btn btn-default" href="index.php" role="button">Вернуться на главную</a>
        <?php if (isset($student)) :?>
            <button type="submit" name="submit" class="btn btn-info">Редактировать</button>
        <?php else : ?>
            <button type="submit" name="submit" class="btn btn-info">Зарегистрироваться</button>
        <?php endif ?>
</form>
</div>
</div>
</div>