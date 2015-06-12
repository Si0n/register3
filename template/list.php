<?php require 'main.php'; ?>

<!-- форма поиска среди зарегистрированных пользователей-->
<br>
<form action="" method="get" name="go">
    <div class="col-lg-6">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Поиск по студентам..." name="search" type="text" size="40">
        </div><!-- /.col-lg-6 -->
    </div>
</form>
<br>
<div class="panel panel-default">

    <div class="panel-heading"><?=htmlProtect($tablePanelHeadingText)?></div>
    <div class="panel-body">
    </div>
    <?php if ($isSuccessfulSearch) : ?>
    <table class="table">
        <tr>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Пол:Мужской(М)/Женский(F)</td>
            <td>Группа</td>
            <td>Средний Бал</td>
            <td>Местный(L)/Приезжий(N)</td>
            <td>Год Рождения</td>
        </tr>
        <?php foreach ($students as $number=>$student): ?>
            <tr>
                <td><?= htmlProtect($student->getName()) ?></td>
                <td><?= htmlProtect($student->getSurname()) ?></td>
                <td><?=htmlProtect($student->getSex()) ?></td>
                <td><?=htmlProtect($student->getGroupNumber()) ?></td>
                <td><?=htmlProtect($student->getMark()) ?></td>
                <td><?=htmlProtect($student->getLocal()) ?></td>
                <td><?=htmlProtect($student->getBirthDate()) ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
    <?php if ($numpages > 1) : ?>
<nav align="center">
    <ul class="pagination">
        <?php for($i=1;$i<=$numpages;$i++):
            if ($i == $p) : ?>
                <li class="active"><a href=<?=str_replace('replace', $i, $pageLinker)?>><?= $i?></a> </li>
                <?php else :?>
                <li><a href=<?=str_replace('replace', $i, $pageLinker)?>><?= $i?></a> </li>
                <?php endif; ?>
        <?php endfor; ?>
    </ul>
</nav>
<?php endif;
    endif;
require './template/footer.php';