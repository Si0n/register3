<?php
function htmlProtect($in)
{
    return htmlspecialchars($in, ENT_QUOTES);
}
function getPaginatorLink($page, $order, $sort, $search = FALSE)
{
    $link_start = 'index.php?';
    if ($search) {
        $link = array(
            'search' => $search,
            'order' => $order,
            'sort' => $sort,
            'p' => $page
        );
    } else {
        $link = array(
            'page' => 'list',
            'order' => $order,
            'sort' => $sort,
            'p' => $page
        );
    }
    $pageLinker = $link_start . http_build_query($link);
    return $pageLinker;
}
function getPagiForMessage($page, $id)
{
    $link_start = 'index.php?';
    $link = array(
        'ID' => $id,
        'pmess' => $page
    );
    $pageLinker = $link_start . http_build_query($link);
    return $pageLinker;
}




