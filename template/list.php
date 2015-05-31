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
    <?php for ($k; $k < $noteNumber; $k++):
        if (!isset($data[$k]['Name'])):continue;
        endif ?>
        <tr>
            <td> <?=$data[$k]['Name'] ?></td>
            <td><?= $data[$k]['Surname'] ?></td>
            <td><?=$data[$k]['Sex'] ?></td>
            <td><?=$data[$k]['GroupNumber'] ?></td>
            <td><?=$data[$k]['Mark'] ?></td>
            <td><?=$data[$k]['Local'] ?></td>
            <td><?=$data[$k]['BirthDate'] ?></td>
        </tr>
    <?php endfor ?>
</table>
</div>
<nav align="center">
    <ul class="pagination">
        <?php if ($firstURL != $curURL) : ?>
        <li>
            <a href="<?=$firstURL ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php endif;

        if($previousPage >= $firstPage):?>
            <li><a href="<?=$previousURL?>"><?=$previousPage?></a></li>
        <?php endif ?>
        <li><a href="<?=$curURL?>"><?=$page?></a></li>
        <?php
        if ($nextPage <= $pageCount):?>
            <li><a href="<?=$nextURL?>"><?=$nextPage?></a></li>
        <?php endif;
        if ($lastURL != $curURL) :
        ?>
        <li><a href="<?=$lastURL?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
        <?php endif ?>
    </ul>
</nav>
<?php endif ?>