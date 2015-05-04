<form id="register" method="post" action="./lib/reg.php">
    <div class="row">
        <div class="col-xs-6 col-sm-6">
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Имя</span>
                <input name="name" type="text" class="form-control"  value="<?=$student['Name']; ?>"  aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Фамилия:</span>
                <input name="surname" type="text" class="form-control" value="<?=$student['Surname']; ?>" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Год Рождения:</span>
                <input name="birthDate" type="text" class="form-control" value="<?=$student['BirthDate']; ?>" aria-describedby="sizing-addon1">
            </div>
            <div class="col-xs-6 col-sm-4">
                <div class="col-lg-6">
                    <p class="text-center">Пол:</p>
                    <div class="input-group">
               <span class="input-group-addon">
               <input type="radio" name="sex" value="M" checked>Мужской<Br>
               </span>
                    </div>
                </div>
                <!-- /input-group -->
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="input-group">
               <span class="input-group-addon">
               <input type="radio" name="sex" value="F">Женский<Br>
               </span>
                    </div>
                </div>
                <!-- /input-group -->
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-xs-6 col-sm-6">
                <div class="col-lg-6">
                    <p class="text-center">Местный/Приезжий</p>
                    <div class="input-group">
               <span class="input-group-addon">
               <input type="radio" name="local" value="L" checked>Местный<Br>
               </span>
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="input-group">
               <span class="input-group-addon">
               <input type="radio" name="local" value="N">Приезжий<Br>
               </span>
                    </div>
                    <!-- /input-group -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Номер Группы</span>
                <input name="group" type="text" class="form-control" value="<?=$student['GroupNumber']; ?>" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">E-mail</span>
                <input name="email" type="text" class="form-control" value="<?=$student['Email']; ?>" aria-describedby="sizing-addon1">
            </div>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id="sizing-addon1">Балл на ЕГЭ</span>
                <input name="mark" type="text" class="form-control" value="<?=$student['Mark']; ?>" aria-describedby="sizing-addon1">
            </div>
            </br>
            <div class="btn-group" role="group" aria-label="...">
                <?php if (!isset($student['Name'])) : ?>
                    <button type="submit" name="submit" class="btn btn-default">Зарегистрировать меня</button>
                <?php else : ?>
                    <button type="submit" name="submit" class="btn btn-default">Редактировать мои данные</button>
                <?php endif; ?>
            </div>
        </div>
    </div>