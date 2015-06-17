<?php
require_once ('dashboard.php');
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
<br><br>
<form class="form-horizontal"  id="register" method="post" action="reg.php">
    <div class="form-group">
        <label class="col-sm-3 control-label">Имя</label>
        <div class="col-sm-5">
            <input name="name" type="text" class="form-control"  value="<?=htmlProtect($student->getName()) ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Фамилия:</label>
        <div class="col-sm-5">
            <input name="surname" type="text" class="form-control" value="<?=htmlProtect($student->getSurname()) ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Год Рождения:</label>
        <div class="col-sm-5">
            <input name="birthDate" type="text" class="form-control" value="<?=htmlProtect($student->getBirthDate()) ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Номер группы:</label>
        <div class="col-sm-5">
            <input name="group" type="text" class="form-control" value="<?=htmlProtect($student->getGroupNumber()) ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">E-mail:</label>
        <div class="col-sm-5">
            <input name="email" type="text" class="form-control" value="<?=htmlProtect($student->getEmail()) ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Балл на ЕГЭ:</label>
        <div class="col-sm-5">
            <input name="mark" type="text" class="form-control" value="<?=htmlProtect($student->getMark()) ?>">
        </div>
    </div>
    <div class="col-sm-9">
    <table class="table table-bordered">

                <tr><td><strong>Место жительства:</strong></td>

                    <td><label class="checkbox-inline">
            <input type="radio" name="local" value="L" <?=htmlProtect($local) ?>>Местный
        </label></td>

                    <td><label class="checkbox-inline">
            <input type="radio" name="local" value="N" <?=htmlProtect($localNot) ?>>Приезжий
        </label></td> </tr>

                <tr><td><strong>Пол:</strong></td>

                    <td> <label class="checkbox-inline">
            <input type="radio" name="sex" value="M" <?=htmlProtect($male) ?>>Мужской
        </label></td>

                    <td><label class="checkbox-inline">
                <input type="radio" name="sex" value="F" <?=htmlProtect($female) ?>>Женский
        </label></td> </tr>
        </table></div>


    <div class="btn-group" role="group" aria-label="...">
        <a class="btn btn-default" href="index.php" role="button">Вернуться на главную</a>
        <?php if ($student->getName() != '') :?>
        <button type="submit" name="submit" class="btn btn-info">Редактировать</button>
        <?php else : ?>
        <button type="submit" name="submit" class="btn btn-info">Зарегистрироваться</button>
        <?php endif ?>
        </div>
</form>
