<?php
require_once ('main.php');
if (isset($errors)):
    foreach ($errors as $error): ?>
        <div class="col-md-7">
        <div class="alert alert-warning" role="alert"><p></p><?=$error; ?></p></div></div>
    <?php endforeach;
endif;
if (isset($successfulRegister)):
    if ($successfulRegister):?>
<div class="col-md-7"><div class="alert alert-success" role="alert">Сохранение Ваших данных прошло успешно.</div></div>
    <?php endif;
endif;
?>


    <form id="register" method="post" action="reg.php">
        <div class="col-md-12">
        <div class="col-md-4">
        <div class="form-group">
            <label for="name">Ваше Имя</label>
            <input name="name"  type="text" class="form-control" id="name" placeholder="Имя"  value="<?=htmlProtect($student->getName()) ?>" required>

    </div>
        <div class="form-group">
            <label for="surname">Фамилия:</label>
            <input name="surname"  type="text" class="form-control" id="surname" placeholder="Фамилия"  value="<?=htmlProtect($student->getSurname()) ?>" required>
        </div>
        <div class="form-group">
            <label for="birthDate">Год Рождения:</label>
            <input name="birthDate"  type="text" class="form-control" id="birthDate" placeholder="Год рождения"  value="<?=htmlProtect($student->getBirthDate()) ?>" required>

    </div>
        <div class="form-group">
            <label for="group">Номер группы:</label>
            <input name="group"  type="text" class="form-control" id="group" placeholder="Номер группы" value="<?=htmlProtect($student->getGroupNumber()) ?>" required>

    </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input name="email"  type="email" class="form-control" placeholder="E-mail" id="email" value="<?=htmlProtect($student->getEmail()) ?>" required>

    </div>
        <div class="form-group">
            <label for="mark">Балл на ЕГЭ:</label>

            <input name="mark"  type="text" class="form-control" id="mark" placeholder="Балл ЕГЭ" value="<?=htmlProtect($student->getMark()) ?>" required>

        </div></div></div>
        <div class="col-md-12">
        <div class="col-md-6">
        <table class="table">
<tr>
            <td>Место жительства:</td>

                <td><label class="checkbox-inline">
                        <input type="radio" name="local" value="L" <?=htmlProtect($local) ?>>Местный
                    </label>

                <label class="checkbox-inline">
                        <input type="radio" name="local" value="N" <?=htmlProtect($localNot) ?>>Приезжий
                    </label></td></tr>
<tr>
            <td>Пол:</td>

                <td><label class="checkbox-inline">
                        <input type="radio" name="sex" value="M" <?=htmlProtect($male) ?>>Мужской
                    </label>

                <label class="checkbox-inline">
                        <input type="radio" name="sex" value="F" <?=htmlProtect($female) ?>>Женский
                    </label></td></tr></table>
        </div></div>
<br><br>
    <!--<nav class="navbar navbar-default navbar-fixed-bottom"> -->
        <div class="pull-right">

            <?php if ($password != '') :?>
                <button type="submit" name="submit" class="btn btn-info">Редактировать</button>
            <?php else : ?>
                <button type="submit" name="submit" class="btn btn-info">Зарегистрироваться</button>
            <?php endif ?>
            <a class="btn btn-default" href="index.php" role="button">Вернуться на главную</a>
        </div>

</form>
