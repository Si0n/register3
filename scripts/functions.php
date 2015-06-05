<?php
function htmlProtect($in)
{
    return htmlspecialchars($in, ENT_QUOTES);
}
function getCookie($name)
{
    return htmlProtect($_COOKIE[$name]);
}
