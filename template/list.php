<div class="panel panel-default">

    <div class="panel-heading"><?=$tablePanelHeadingText?></div>
    <div class="panel-body">
    </div>
    <?php if (!isset($text)) : ?>
    <table class="table">
        <tr>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Пол</td>
            <td>Группа</td>
            <td>Средний Бал</td>
            <td>Местный/Приезжий</td>
            <td>Год Рождения</td>
        </tr>
        <?php foreach ($students as $number=>$student): ?>
            <tr>
                <td> <?=$student->getName() ?></td>
                <td><?= $student->getSurname() ?></td>
                <td><?=$student->getSex() ?></td>
                <td><?=$student->getGroupNumber() ?></td>
                <td><?=$student->getMark() ?></td>
                <td><?=$student->getLocal() ?></td>
                <td><?=$student->getBirthDate() ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<nav align="center">
    <ul class="pagination">
        <?php for($i=1;$i<=$numpages;$i++):?>
        <li><a href="index.php?page=list&p=<?= $i?> "><?= $i?></a> </li>
        <?php endfor; ?>
    </ul>
</nav>
<?php endif; ?>