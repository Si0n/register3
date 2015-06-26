<?php
require_once ('main.php');
if (isset($errors)):
    foreach ($errors as $error): ?>
        <div class="col-md-12">
        <div class="alert alert-warning" role="alert"><p><?=$error; ?></p></div></div>
    <?php endforeach;
endif;
?>
    <form id="register" method="post" action="reg.php" enctype="multipart/form-data">
        <div class="col-md-12">
            <div class="col-md-4">
        <label for="file">Загрузить фото:</label>
        <input type="file" name="photo" id="file" >
</div></div>

        <div class="col-md-12">
        <div class="col-md-4">
        <div class="form-group">
            <br>
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
            <div class="col-md-4">
                <strong>Место жительства:</strong>
            </div></div>
            <div class="col-md-12">
            <div class="col-md-2"><label class="checkbox-inline">
                    <input type="radio" name="local" value="L" <?= ($student->getLocal() == $student::RESIDENCE_LOCAL) ? 'checked' : '' ?>>Местный
                </label></div>
            <div class="col-md-2"><label class="checkbox-inline">
                    <input type="radio" name="local" value="N" <?= ($student->getLocal() == $student::RESIDENCE_NOT_LOCAL) ? 'checked' : '' ?>>Приезжий
                </label></div></div>

            <div class="col-md-12">
                <div class="col-md-4">
                    <strong>Пол:</strong>
                </div></div>
            <div class="col-md-12">
                <div class="col-md-2"><label class="checkbox-inline">
                        <input type="radio" name="sex" value="M" <?= ($student->getSex() == $student::GENDER_MALE) ? 'checked' : '' ?>>Мужской
                    </label></div>
                <div class="col-md-2"><label class="checkbox-inline">
                        <input type="radio" name="sex" value="F" <?= ($student->getSex() == $student::GENDER_FEMALE) ? 'checked' : '' ?>>Женский
                    </label></div>
            </div>
        <div class="text-center">
        <a class="btn btn-default" href="index.php" role="button">Вернуться на главную</a>
            <?php if ($password != '') :?>
                <button type="submit" name="submit" class="btn btn-info">Редактировать</button>
            <?php else : ?>
                <button type="submit" name="submit" class="btn btn-info">Зарегистрироваться</button>
            <?php endif ?></div>
</form>
