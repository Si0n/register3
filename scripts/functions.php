<?php
function htmlProtect($in)
{
    return htmlspecialchars($in, ENT_QUOTES);
}
function getPaginatorLink($page, $order, $search = FALSE)
{
    $link_start = 'index.php?';
    if ($search) {
        $link = array(
            'search' => $search,
            'order' => $order,
            'p' => $page
        );
    } else {
        $link = array(
            'page' => 'list',
            'order' => $order,
            'p' => $page
        );
    }
    $pageLinker = $link_start . http_build_query($link);
    return $pageLinker;
}