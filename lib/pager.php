<?php
require_once(__DIR__ . './functions.php');
function paginator($data)
{
    $search = isset($_GET['search'])   ? makeProtect( $_GET['search'] ) : '' ;
    $page =  isset($_GET['p'])   ? makeProtect( $_GET['p'] )   : 1 ;
    $tablePanelHeadingText = 'Список уже зарегистрированных абитуриентов';
    if ($search !== '')
    {
        $currentURL = 'main.php?&search={search}&p={page}';
        $currentURL = str_replace('{search}', $search, $currentURL);
        $tablePanelHeadingText = 'Список студентов подходящих под параметры: '.$search;
    }
    else {
        $currentURL = 'main.php?page=list&p={page}';
    }

    $nextPage = $page + 1;
    $previousPage = $page - 1;
    $firstPage = 1;
    $countPerPage = 5;
    $countStudents = count($data);
    $pageCount = ceil( $countStudents / $countPerPage);
    $noteNumber = $page * $countPerPage;
    ?>
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading"><?=$tablePanelHeadingText?></div>
        <div class="panel-body">
        </div>
        <table class="table">
            <tr>
                <td>Имя</td>
                <td>Фамилия</td>
                <td>Пол</td>
                <td>Группа</td>
                <td>Email</td>
                <td>Средний Бал</td>
                <td>Местный/Приезжий</td>
                <td>Год Рождения</td>
            </tr>
            <?php for ($k = $noteNumber - $countPerPage; $k < $noteNumber; $k++):
                if (!isset($data[$k]['Name'])):continue;
                endif ?>
                <tr>
                    <td> <?=$data[$k]['Name'] ?></td>
                    <td><?= $data[$k]['Surname'] ?></td>
                    <td><?=$data[$k]['Sex'] ?></td>
                    <td><?=$data[$k]['GroupNumber'] ?></td>
                    <td><?=$data[$k]['Email'] ?></td>
                    <td><?=$data[$k]['Mark'] ?></td>
                    <td><?=$data[$k]['Local'] ?></td>
                    <td><?=$data[$k]['BirthDate'] ?></td>
                </tr>
            <?php endfor ?>
        </table>
    </div>
    <nav>
        <?php
        $firstURL = str_replace('{page}', $firstPage, $currentURL);
        $lastURL = str_replace('{page}', $pageCount, $currentURL);
        $previousURL = str_replace('{page}', $previousPage, $currentURL);
        $nextURL = str_replace('{page}', $nextPage, $currentURL);
        $curURL = str_replace('{page}', $page, $currentURL);
        ?>
        <ul class="pagination">
            <li>
                <a href="<?=$firstURL ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php if($previousPage >= $firstPage):?>
                <li><a href="<?=$previousURL?>"><?=$previousPage?></a></li>
            <?php endif ?>
            <li><a href="<?=$curURL?>"><?=$page?></a></li>
            <?php
            if ($nextPage <= $pageCount):?>
                <li><a href="<?=$nextURL?>"><?=$nextPage?></a></li>
            <?php endif ?>
            <li><a href="<?=$lastURL?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
<?php }