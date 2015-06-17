<?php
$listTab = 'active';
$p =  isset($_GET['p'])   ? intval( $_GET['p'] ) : 1 ;
$recordsPerPage = 4; //Количество результатов на страницу, для теста 4
$offset = ($p -1) * $recordsPerPage;
$search = isset($_GET['search'])   ?  $_GET['search'] : '' ;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'ASC';
$order = isset($_GET['order']) ? $_GET['order'] : 'ID';

$count = $db->getCountInDb($search);
$students = $db->searchFromStudents($order, $sort, $offset, $search);

    if ($count == 0)
    {
        $tablePanelHeadingText = ' Нет совпадений в базе студентов.';
        $isSuccessfulSearch = FALSE;
    } elseif ($students == 'failed')
{
    $tablePanelHeadingText = "Невозможно обработать запрос";
    $isSuccessfulSearch = FALSE;
}
    else {
        $tablePanelHeadingText = "Найдено студентов: $count";
        $isSuccessfulSearch = TRUE;
    }
    $numpages = ceil ($count/$recordsPerPage);
    require './template/list.php';

