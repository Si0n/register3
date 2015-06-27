<?php require 'main.php'; ?>
<div class="col-md-12">
<div class="panel panel-default">
    <?php if ($tablePanelHeadingText == TAB_HEADER_NOTHING_FOUND) :?>
    <div class="panel-heading">Нет совпадений по запросу «<?=htmlProtect($search) ?>»</div>
   <? elseif ($tablePanelHeadingText == TAB_HEADER_WRONG_REQUEST) : ?>
    <div class="panel-heading">Неверный запрос</div>
        <? elseif ($tablePanelHeadingText == TAB_HEADER_ALL_STUDENTS_REQUEST) : ?>
    <div class="panel-heading">Список всех зарегистрированных студентов. Найдено результатов: <?=htmlProtect($count) ?>.</div>
        <? elseif ($tablePanelHeadingText == TAB_HEADER_SOME_STUDENTS_REQUEST):?>
    <div class="panel-heading">Показаны только абитуриенты, найденные по запросу «<?=htmlProtect($search) ?>». Количество найденных результатов: <?=htmlProtect($count) ?>. <a href="index.php?page=list"><span class="badge">Показать всех студентов</span></a></div>
        <? endif?>
    <div class="panel-body">
    </div>
    <?php if ($isSuccessfulSearch) : ?>
    <table class="table">

        <tr>
            <td>
                <?php if ($order == 'name' && $sort == 'ASC') :?>
        <a href="<?=htmlProtect(getPaginatorLink($p, 'name', 'DESC', $search))?>"><span class="badge">Имя &#9650;</span></a>
                <?php else : ?>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'name', 'ASC', $search))?>"><span class="badge">Имя &#9660;</span></a>
            <?php endif ?>
        </td>

            <td>
    <?php if ($order == 'surname' && $sort == 'ASC') :?>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'surname', 'DESC', $search))?>"><span class="badge">Фамилия &#9650;</span></a></td>
    <?php else : ?>
        <a href="<?=htmlProtect(getPaginatorLink($p, 'surname', 'ASC', $search))?>"><span class="badge">Фамилия &#9660;</span></a>
    <?php endif ?>
            <td>
    <?php if ($order == 'sex' && $sort == 'ASC') :?>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'sex', 'DESC', $search))?>"><span class="badge">Пол &#9650;</span></a>
    <?php else : ?>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'sex', 'ASC', $search))?>"><span class="badge">Пол &#9660;</span></a></td>
        <?php endif ?>
            <td>    <?php if ($order == 'groupNumber' && $sort == 'ASC') :?>
        <a href="<?=htmlProtect(getPaginatorLink($p, 'groupNumber', 'DESC', $search))?>"><span class="badge">Номер группы &#9650;</span></a>
    <?php else : ?>
        <a href="<?=htmlProtect(getPaginatorLink($p, 'groupNumber', 'ASC', $search))?>"><span class="badge">Номер группы &#9660;</span></a>
                <?php endif ?>
            </td>
            <td><?php if ($order == 'mark' && $sort == 'ASC') :?>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'mark', 'DESC', $search))?>"><span class="badge">Балл &#9650;</span></a>
    <?php else : ?>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'mark', 'ASC', $search))?>"><span class="badge">Балл &#9660;</span></a>
                <?php endif ?>
            </td>
            <td>
    <?php if ($order == 'local' && $sort == 'ASC') :?>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'local', 'DESC', $search))?>"><span class="badge">Место проживания &#9650;</span></a>
    <?php else : ?>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'local', 'ASC', $search))?>"><span class="badge">Место проживания &#9660;</span></a>
    <?php endif ?>
        </td>
            <td><?php if ($order == 'birthDate' && $sort == 'ASC') :?>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'birthDate', 'DESC', $search))?>"><span class="badge">Год рождения &#9650;</span></a>
    <?php else : ?>
        <a href="<?=htmlProtect(getPaginatorLink($p, 'birthDate', 'ASC', $search))?>"><span class="badge">Год рождения &#9660;</span></a>
                <?php endif ?>

            </td>
        </tr>
        <?php foreach ($students as $number=>$student): ?>
            <tr>
                <td><a href="index.php?ID=<?=htmlProtect($student->getID())?>"><span class="badge"><?=htmlProtect($student->getName()) ?></span></a></td>
                <td><?=htmlProtect($student->getSurname()) ?></td>
                <td><?=htmlProtect($student->getShowSex()) ?></td>
                <td><?=htmlProtect($student->getGroupNumber()) ?></td>
                <td><?=htmlProtect($student->getMark()) ?></td>
                <td><?=htmlProtect($student->getShowLocal()) ?></td>
                <td><?=htmlProtect($student->getBirthDate()) ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
    <?php if ($numpages > 1) : ?>
        <div class="text-center">
        <nav>
            <ul class="pagination">
        <?php for($i=1;$i<=$numpages;$i++):
            if ($i == $p) : ?>
                <li class="active"><a href=<?=htmlProtect(getPaginatorLink($i, $order, $sort, $search))?>><?= $i?></a></li>
                <?php else :?>
                <li><a href=<?=htmlProtect(getPaginatorLink($i, $order, $sort, $search))?>><?= $i?></a> </li>
                <?php endif; ?>
        <?php endfor; ?>
    </ul>
</nav></div></div>
<?php endif;
    endif;
require './template/footer.php';