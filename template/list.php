<?php require 'main.php'; ?>
<div class="col-md-12">
<div class="panel panel-default">
    <div class="panel-heading"><?=htmlProtect($tablePanelHeadingText)?></div>
    <div class="panel-body">
    </div>
    <?php if ($isSuccessfulSearch) : ?>
    <table class="table">

        <tr>
            <td><a href="<?=htmlProtect(getPaginatorLink($p, 'name', 'ASC', $search))?>"><span class="badge">Имя &#9650;</span></a>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'name', 'DESC', $search))?>"><span class="badge">&#9660;</span></a>
            </td>

            <td><a href="<?=htmlProtect(getPaginatorLink($p, 'surname', 'ASC', $search))?>"><span class="badge">Фамилия &#9650;</span></a>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'surname', 'DESC', $search))?>"><span class="badge">&#9660;</span></a></td>
            <td><a href="<?=htmlProtect(getPaginatorLink($p, 'sex', 'ASC', $search))?>"><span class="badge">Пол &#9650;</span></a>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'sex', 'DESC', $search))?>"><span class="badge">&#9660;</span></a></td>
            <td><a href="<?=htmlProtect(getPaginatorLink($p, 'groupNumber', 'ASC', $search))?>"><span class="badge">Номер группы &#9650;</span></a>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'groupNumber', 'DESC', $search))?>"><span class="badge">&#9660;</span></a></td>
            <td><a href="<?=htmlProtect(getPaginatorLink($p, 'mark', 'ASC', $search))?>"><span class="badge">Балл &#9650;</span></a>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'mark', 'DESC', $search))?>"><span class="badge">&#9660;</span></a></td>
            <td><a href="<?=htmlProtect(getPaginatorLink($p, 'local', 'ASC', $search))?>"><span class="badge">Место проживания &#9650;</span></a>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'local', 'DESC', $search))?>"><span class="badge">&#9660;</span></a></td>
            <td><a href="<?=htmlProtect(getPaginatorLink($p, 'birthDate', 'ASC', $search))?>"><span class="badge">Год рождения &#9650;</span></a>
                <a href="<?=htmlProtect(getPaginatorLink($p, 'birthDate', 'DESC', $search))?>"><span class="badge">&#9660;</span></a></td>
        </tr>
        <?php foreach ($students as $number=>$student): ?>
            <tr>
                <td><?=htmlProtect($student->getName()) ?></td>
                <td><?=htmlProtect($student->getSurname()) ?></td>
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
                <li class="active"><a href=<?=htmlProtect(getPaginatorLink($i, $order, $sort, $search))?>><?= $i?></a> </li>
                <?php else :?>
                <li><a href=<?=htmlProtect(getPaginatorLink($i, $order, $sort, $search))?>><?= $i?></a> </li>
                <?php endif; ?>
        <?php endfor; ?>
    </ul>
</nav></div>
<?php endif;
    endif;
require './template/footer.php';