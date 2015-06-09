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
<nav align="center">
    <ul class="pagination">
        <?php for($i=1;$i<=$numpages;$i++):?>
        <li><a href=<?=str_replace('replace', $i, $pageLinker)?> "><?= $i?></a> </li>
        <?php endfor; ?>
    </ul>
</nav>
<?php endif;
require './template/footer.php';