<?php
function htmlProtect($in)
{
    return htmlspecialchars($in, ENT_QUOTES);
}
function getPaginatorLink($page, $order, $dynamicLink, $search = FALSE)
{

    $staticLink = str_replace('replaceP', $page, str_replace('replaceOrder', $order, $dynamicLink));
    if ($search)
    {
        $staticLink = str_replace('replaceSearch', $search, $staticLink);
    }
    return $staticLink;



}