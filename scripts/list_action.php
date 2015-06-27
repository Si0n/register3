<?php
$listTab = 'active';
$p =  isset($_GET['p'])   ? intval( $_GET['p'] ) : 1 ;
$recordsPerPage = 4; //Количество результатов на страницу, для теста 4
$offset = ($p -1) * $recordsPerPage;
$search = isset($_GET['search'])   ?  $_GET['search'] : '' ;
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'ASC';
$order = isset($_GET['order']) ? $_GET['order'] : 'ID';
$takeRes = 4; //сколько взять результатов

$count = $db->getCountInDb($search);
$students = $db->searchFromStudents($order, $sort, $offset, $takeRes, $search);

    if ($count == 0)
    {
        $tablePanelHeadingText = TAB_HEADER_NOTHING_FOUND;
        $isSuccessfulSearch = FALSE;
    } elseif ($students == 'failed')
{
    $tablePanelHeadingText = TAB_HEADER_WRONG_REQUEST;
    $isSuccessfulSearch = FALSE;
}
    else {
        if ($search == '')
        {
            $tablePanelHeadingText = TAB_HEADER_ALL_STUDENTS_REQUEST;
        } else {
            $tablePanelHeadingText = TAB_HEADER_SOME_STUDENTS_REQUEST;
        }

        $isSuccessfulSearch = TRUE;
    }
    $numpages = ceil ($count/$recordsPerPage);
    require './template/list.php';

